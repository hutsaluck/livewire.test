<?php

namespace App\Livewire;

use Livewire\Component;

class ShowHelp extends Component
{
    public bool $showHelp = false;

    public function toggleHelp(): void
    {
        $this->showHelp = ! $this->showHelp;
    }
    public function render()
    {
        return view('livewire.show-help');
    }
}
