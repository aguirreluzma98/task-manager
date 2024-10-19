<?php

namespace App\Livewire\Task;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Create extends Component
{
    public ?Task $task;

    #[Validate('required|min:5')]
    public string $title = '';

    #[Validate('nullable|string')]
    public string $description = '';

    #[Validate('required|in:pending,in_progress,verification,completed')]
    public string $status;


    public function mount(?Task $editTask)
    {
        if ($editTask) {
            $this->task = $editTask;
        } else {
            $this->task = new Task();
        }

        $this->initializeTask();
    }

    public function initializeTask(): void
    {
        $this->title = $this->task->title ?? '';
        $this->description = $this->task->description ?? '';
        $this->status = $this->task->status ?? '';
    }

    public function save()
    {
        $validated = $this->validate();

        if ($this->task->id) {
            $this->updateTask($validated);
        } else {
            $this->createNewTask($validated);
        }

        return redirect()->route('dashboard');
    }

    public function createNewTask($validated): void
    {
        Auth::user()->tasks()->create($validated);
    }

    public function updateTask($validated): void
    {
        $this->task->update($validated);
    }

    public function render()
    {
        return view('livewire.task.create')
            ->layout('components.layouts.app');
    }
}
