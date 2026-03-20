<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin User
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]
        );

        // Regular User
        $user = User::firstOrCreate(
            ['email' => 'user@example.com'],
            [
                'name' => 'Regular User',
                'password' => Hash::make('password'),
                'role' => 'user',
            ]
        );

        // Realistic Tasks for Admin
        $adminTasks = [
            ['title' => 'Fix header responsiveness on mobile', 'description' => 'Ensure the navigation menu collapses correctly on small screens.', 'priority' => 'high', 'status' => 'done', 'due_date' => now()->subDays(2)],
            ['title' => 'Integrate Railway deployment pipeline', 'description' => 'Setup automatic deployment from GitHub to Railway.', 'priority' => 'high', 'status' => 'in_progress', 'due_date' => now()->addDays(1)],
            ['title' => 'Optimize database queries', 'description' => 'Use eager loading in TaskService to avoid N+1 issues.', 'priority' => 'medium', 'status' => 'pending', 'due_date' => now()->addDays(3)],
            ['title' => 'Design new Rilakkuma logo', 'description' => 'Create a transparent PNG version of the bear icon.', 'priority' => 'low', 'status' => 'done', 'due_date' => now()->subDays(5)],
            ['title' => 'Write Pest coverage for Roles', 'description' => 'Verify that admins can see all tasks while users only see theirs.', 'priority' => 'medium', 'status' => 'done', 'due_date' => now()->subDays(1)],
        ];

        foreach ($adminTasks as $task) {
            Task::create(array_merge($task, ['user_id' => $admin->id]));
        }

        // Realistic Tasks for Regular User
        $userTasks = [
            ['title' => 'Implement Dark Mode toggle', 'description' => 'Add a switch to the navigation bar using Alpine.js and Tailwind.', 'priority' => 'high', 'status' => 'in_progress', 'due_date' => now()->addDay()],
            ['title' => 'Update README with screenshots', 'description' => 'Capture real UI images and add them to the project documentation.', 'priority' => 'medium', 'status' => 'pending', 'due_date' => now()->addDays(2)],
            ['title' => 'Refactor TaskPolicy logic', 'description' => 'Clean up the authorization checks for better readability.', 'priority' => 'low', 'status' => 'done', 'due_date' => now()->subDays(3)],
            ['title' => 'Fix bug in task completion', 'description' => 'Ensure the status updates correctly when clicking the checkbox.', 'priority' => 'high', 'status' => 'done', 'due_date' => now()->subDay()],
            ['title' => 'Meeting with client', 'description' => 'Discuss next sprint features and UX feedback.', 'priority' => 'medium', 'status' => 'pending', 'due_date' => now()->addDays(5)],
            ['title' => 'Configure ENV variables', 'description' => 'Setup APP_KEY and DB_CONNECTION for the production server.', 'priority' => 'high', 'status' => 'pending', 'due_date' => now()->addDays(1)],
            ['title' => 'Add search functionality', 'description' => 'Allow users to search tasks by title in real-time.', 'priority' => 'low', 'status' => 'pending', 'due_date' => now()->addDays(10)],
            ['title' => 'Improve Accessibility', 'description' => 'Add ARIA labels to all interactive elements.', 'priority' => 'medium', 'status' => 'in_progress', 'due_date' => now()->addDays(4)],
        ];

        foreach ($userTasks as $task) {
            Task::create(array_merge($task, ['user_id' => $user->id]));
        }
    }
}
