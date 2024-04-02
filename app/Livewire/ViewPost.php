<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class ViewPost extends Component
{
    public Post $post;

    public function mount( Post $post ): void
    {
        $this->post = $post;
    }

    public function render()
    {
        return view('livewire.view-post');
    }
}
