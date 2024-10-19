<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;

class TaskDashboard extends Component
{
    public $tasks = [];
    public $taskDescription;

    public function mount()
    {
        $this->loadTasks();
    }

    public function loadTasks()
    {
        $this->tasks = Task::where('user_id', Auth::id())->get();
    }

    public function deleteTask($taskId)
    {
        $task = Task::where('id', $taskId)->where('user_id', Auth::id())->firstOrFail();
        $task->delete();

        $this->loadTasks();
    }

    public function markAsCompleted($taskId)
    {
        $task = Task::where('id', $taskId)->where('user_id', Auth::id())->firstOrFail();
        $task->status = 'completed';
        $task->save();

        $this->loadTasks();
    }

    public function render()
    {
        return view('livewire.task-dashboard')
        ->layout('components.layouts.app');
    }
}
 