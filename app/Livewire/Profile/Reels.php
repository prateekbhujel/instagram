<?php

namespace App\Livewire\Profile;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class Reels extends Component
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

    }//End Method


    public function mount($user)
    {
        $this->user = User::whereUsername($user)->withCount('followers', 'followings', 'posts')->firstOrFail();

    }//End Method


    public function render()
    {
        $this->user = User::whereUsername($this->user->username)->withCount('followers', 'followings', 'posts')->firstOrFail();
        $posts = $this->user->posts()->where('type', 'reel')->get();

        return view('livewire.profile.reels', compact('posts'));
        
    }//End Method
}
