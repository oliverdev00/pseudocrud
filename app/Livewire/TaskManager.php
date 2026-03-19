<?php

namespace App\Livewire;

use App\Models\Task;
use App\Services\TaskService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class TaskManager extends Component
{
    use WithPagination;

    // Filter properties
    public $statusFilter = '';

    // Modal state
    public $showModal = false;
    public $editingTask = null;

    // Form properties
    public $title = '';
    public $description = '';
    public $status = 'pending';
    public $priority = 'medium';
    public $due_date = '';

    // Delete confirmation
    public $confirmingDelete = null;

    protected function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'status' => 'required|in:pending,in_progress,done',
            'priority' => 'required|in:low,medium,high',
            'due_date' => 'nullable|date|after_or_equal:today',
        ];
    }

    public function mount()
    {
        $this->due_date = now()->format('Y-m-d');
    }

    public function render(TaskService $taskService)
    {
        $tasks = $taskService->listForUser(Auth::user(), $this->statusFilter);

        return view('livewire.task-manager', [
            'tasks' => $tasks
        ])->layout('layouts.app');
    }

    public function openCreateModal()
    {
        $this->resetValidation();
        $this->reset(['editingTask', 'title', 'description', 'status', 'priority', 'due_date']);
        $this->due_date = now()->format('Y-m-d');
        $this->showModal = true;
    }

    public function editTask(Task $task)
    {
        $this->authorize('update', $task);
        
        $this->resetValidation();
        $this->editingTask = $task;
        $this->title = $task->title;
        $this->description = $task->description;
        $this->status = $task->status;
        $this->priority = $task->priority;
        $this->due_date = $task->due_date ? $task->due_date->format('Y-m-d') : '';
        
        $this->showModal = true;
    }

    public function save(TaskService $taskService)
    {
        $this->validate();

        $data = [
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status,
            'priority' => $this->priority,
            'due_date' => $this->due_date ?: null,
        ];

        if ($this->editingTask) {
            $this->authorize('update', $this->editingTask);
            $taskService->update($this->editingTask, $data);
            $this->dispatch('notify', 'Task updated successfully!');
        } else {
            $taskService->create($data, Auth::user());
            $this->dispatch('notify', 'Task created successfully!');
        }

        $this->showModal = false;
    }

    public function confirmDelete($taskId)
    {
        $this->confirmingDelete = $taskId;
    }

    public function deleteTask(TaskService $taskService)
    {
        $task = Task::findOrFail($this->confirmingDelete);
        $this->authorize('delete', $task);
        
        $taskService->delete($task);
        $this->confirmingDelete = null;
        $this->dispatch('notify', 'Task deleted successfully!');
    }
}
