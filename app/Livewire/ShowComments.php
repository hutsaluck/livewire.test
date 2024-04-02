<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Illuminate\Support\Collection;

class ShowComments extends Component
{
    public Post $post;

    public function mount( Post $post ):void
    {
        $this->post = $post;
    }

    #[Computed]
    public function comments(): Collection
    {
        return $this->post->comments()->get();
    }
    public function render()
    {
        return view('livewire.show-comments');
    }
}
