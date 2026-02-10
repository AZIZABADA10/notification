<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\Attributes\On;

class PostsList extends Component
{
    #[On('postCreated')]
    public function refreshPosts()
    {
        // La méthode render() sera automatiquement appelée
    }

    public function render()
    {
        return view('livewire.posts-list', [
            'posts' => Post::with('user')->latest()->get(),
        ]);
    }
}