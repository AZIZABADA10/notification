<?php

namespace App\Livewire;

use App\Events\PostCreated;
use App\Models\Post;
use App\Models\User;
use App\Notifications\NewPostNotification;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreatePost extends Component
{
    public $title = '';
    public $content = '';

    protected $rules = [
        'title' => 'required|min:3',
        'content' => 'required|min:5',
    ];

    public function save()
    {
        $this->validate();

        // Créer le post avec relation
        $post = Post::create([
            'user_id' => Auth::id(),
            'title' => $this->title,
            'content' => $this->content,
        ]);

        // IMPORTANT : Charger la relation user
        $post->load('user');

        // Broadcast event
        broadcast(new PostCreated($post))->toOthers();

        // Envoyer notification à tous sauf moi
        $users = User::where('id', '!=', Auth::id())->get();
        
        foreach ($users as $user) {
            $user->notify(new NewPostNotification($post));
        }

        // Reset formulaire
        $this->reset(['title', 'content']);

        // Dispatch event Livewire
        $this->dispatch('postCreated');
        
        // Message de succès
        session()->flash('message', 'Post créé avec succès !');
    }

    public function render()
    {
        return view('livewire.create-post');
    }
}