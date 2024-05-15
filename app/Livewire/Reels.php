<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Attributes\On;
use Livewire\Component;

class Reels extends Component
{
    
    

    #[On('closeModal')]
    public function revertUrl()
    {
        $this->js("history.replaceState({}, '', '/')");

    }//End Method
    

    public function togglePostLike(Post $post)
    {
        abort_unless(auth()->check(), 401);

        auth()->user()->toggleLike($post);

    }//End Method


    public function toggleFavorite(Post $post)
    {
        abort_unless(auth()->check(), 401);

        auth()->user()->toggleFavorite($post);

    }//End Method

    
    public function render()
    {
        $posts = Post::limit(20)->where('type', 'reel')->get();

        return view('livewire.reels', compact('posts'));

    }//End Method


}
 