<?php

namespace App\Livewire\Profile;

use App\Models\User;
use App\Notifications\NewFollowerNotification;
use Livewire\Attributes\On;
use Livewire\Component;

class Home extends Component
{
    public $user;


    #[On('closeModal')]
    public function revertUrl()
    {
        $this->js("history.replaceState({}, '', '/')");
        
    }//End Method


    public function toggleFollow()
    {
        abort_unless(auth()->check(), 401);

        auth()->user()->toggleFollow($this->user);

        //Send notification to the user if is following
        if(auth()->user()->isFollowing($this->user))
            $this->user->notify(new NewFollowerNotification(auth()->user()));
        
         

    }//End Method


    public function mount($user)
    {
        $this->user = User::whereUsername($user)->withCount('followers', 'followings', 'posts')->firstOrFail();

    }//End Method


    public function render()
    {
        $this->user = User::whereUsername($this->user->username)->withCount('followers', 'followings', 'posts')->firstOrFail();
        $posts = $this->user->posts()->where('type', 'post')->get();

        return view('livewire.profile.home', compact('posts'));
        
    }//End Method


}
