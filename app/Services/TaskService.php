<?php

namespace App\Services;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class TaskService
{
    /**
     * List tasks for a given user, with optional status filter.
     * Admins see all tasks; regular users see only their own.
     */
    public function listForUser(User $user, ?string $statusFilter = null): Collection
    {
        $query = $user->isAdmin()
            ? Task::with('user')
            : $user->tasks();

        if ($statusFilter && in_array($statusFilter, ['pending', 'in_progress', 'done'])) {
            $query->where('status', $statusFilter);
        }

        return $query->latest()->get();
    }

    /**
     * Create a new task for the given user.
     */
    public function create(array $data, User $user): Task
    {
        return $user->tasks()->create($data);
    }

    /**
     * Update an existing task.
     */
    public function update(Task $task, array $data): Task
    {
        $task->update($data);

        return $task->fresh();
    }

    /**
     * Delete a task.
     */
    public function delete(Task $task): bool
    {
        return $task->delete();
    }
}
