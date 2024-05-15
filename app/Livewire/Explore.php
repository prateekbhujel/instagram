<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Attributes\On;
use Livewire\Component;

class Explore extends Component
{
    public $var;



    #[On('closeModal')]
    public function revertUrl()
    {
        $this->js("history.replaceState({}, '', '/explore')");

    }//End Method


    public function render()
    {
        $posts = Post::limit(20)->get();

        return view('livewire.explore', compact('posts'));

    }//End Method


}
