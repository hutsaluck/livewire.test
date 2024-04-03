<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class ViewPost extends Component
{
    public Post $post;

    public int $commentsCount = 0;

    public function mount( Post $post ): void
    {
        $this->post = $post;
        $this->post->loadCount('comments');
        $this->commentsCount = $this->post->comments_count;
    }
    
    #[On('comment-added')]
    public function commentAdded(): void
    {
        $this->commentsCount++;
    }

    public function render()
    {
        return view('livewire.view-post');
    }
}
