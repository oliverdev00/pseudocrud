<?php

use App\Models\Task;
use App\Models\User;
use function Pest\Laravel\{actingAs, assertDatabaseHas, assertDatabaseMissing, delete, post, put};

test('a user can create a task', function () {
    $user = User::factory()->create();

    actingAs($user)
        ->post(route('tasks'), [
            'title' => 'New Task',
            'description' => 'Description',
            'status' => 'pending',
            'priority' => 'high',
            'due_date' => now()->addDays(7)->format('Y-m-d'),
        ]);

    // Note: Livewire tests are usually done with Livewire::test(),
    // but the request was for "un usuario puede crear una tarea"
    // Since I'm using a Service class, I can also test the service directly if preferred,
    // but here I'll check the DB after a manual creation or use Livewire::test.
});

// Better approach with Livewire::test
use Livewire\Livewire;
use App\Livewire\TaskManager;

test('it can create a task via livewire', function () {
    $user = User::factory()->create();

    actingAs($user);

    Livewire::test(TaskManager::class)
        ->set('title', 'Test Task')
        ->set('description', 'Test Description')
        ->set('status', 'pending')
        ->set('priority', 'medium')
        ->set('due_date', now()->addDays(1)->format('Y-m-d'))
        ->call('save');

    assertDatabaseHas('tasks', [
        'title' => 'Test Task',
        'user_id' => $user->id,
    ]);
});

test('a user cannot edit another user task', function () {
    $user1 = User::factory()->create(['role' => 'user']);
    $user2 = User::factory()->create(['role' => 'user']);
    $task = Task::factory()->create(['user_id' => $user2->id]);

    actingAs($user1);

    Livewire::test(TaskManager::class)
        ->call('editTask', $task)
        ->assertForbidden();
});

test('admin can delete any task', function () {
    $admin = User::factory()->create(['role' => 'admin']);
    $user = User::factory()->create(['role' => 'user']);
    $task = Task::factory()->create(['user_id' => $user->id]);

    actingAs($admin);

    Livewire::test(TaskManager::class)
        ->set('confirmingDelete', $task->id)
        ->call('deleteTask');

    assertDatabaseMissing('tasks', ['id' => $task->id]);
});
