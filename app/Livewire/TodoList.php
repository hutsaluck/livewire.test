<?php

namespace App\Livewire;

use App\Models\Todo;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class TodoList extends Component
{
    public Component $todos;
    public ?Todo $selected;

    public function mount(): void
    {
        $this->todos = Todo::all();

        $this->selected = $this->todos->first();
    }

    public function select( Todo $todo ): void
    {
        $this->selected = $todo;
    }

    public function deselect(): void
    {
        $this->selected = null;
    }

    public function render(): View
    {
        return view('livewire.todo-list');
    }
}
