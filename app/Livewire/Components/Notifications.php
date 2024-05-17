<?php

namespace App\Livewire\Components;

use App\Models\User;
use App\Notifications\NewFollowerNotification;
use Livewire\Component;

class Notifications extends Component
{


    public function toggleFollow(User $user)
    {
        abort_unless(auth()->check(),401);
        auth()->user()->toggleFollow($user);

             #send notification if is following
             if (auth()->user()->isFollowing($user)) {

                $user->notify(new NewFollowerNotification(auth()->user()));
    
            }

    }//End Method


    public function render()
    {
        return view('livewire.components.notifications', ['notifications' => auth()->user()->notifications]);

    }//End Method




}
