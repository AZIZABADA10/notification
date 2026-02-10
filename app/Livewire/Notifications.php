<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Notifications extends Component
{
    public function render()
    {
        return view('livewire.notifications', [
            'notifications' => Auth::user()
                ? Auth::user()->notifications()->latest()->get()
                : []
        ]);
    }
}
