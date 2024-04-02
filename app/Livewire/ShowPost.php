<?php

namespace App\Livewire;

use Livewire\Component;

class ShowPost extends Component
{
    public int $id;

    public function mount( $postId ): void
    {
        $this->id = $postId;
    }

    public function render()
    {
        return view('livewire.show-post');
    }
}
