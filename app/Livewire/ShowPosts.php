<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Attributes\Url;
use Livewire\Component;

class ShowPosts extends Component
{
    #[Url(history: true)]
    public string $search = '';

    public function render()
    {
        return view('livewire.show-posts', [
            'posts' => Post::where('title', 'LIKE', '%' . $this->search . '%')->get(),
        ]);
    }
}
