<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\On;

class NotificationsDropdown extends Component
{
    #[On('notificationReceived')]
    public function refreshNotifications()
    {
        // Rafraîchir automatiquement
    }

    public function render()
    {
        return view('livewire.notifications-dropdown', [
            'notifications' => Auth::check() 
                ? Auth::user()->unreadNotifications 
                : collect([])
        ]);
    }

    public function markAsRead($id)
    {
        $notification = Auth::user()->notifications()->find($id);
        
        if ($notification) {
            $notification->markAsRead();
        }
    }
    
    public function markAllAsRead()
    {
        Auth::user()->unreadNotifications->markAsRead();
    }
}