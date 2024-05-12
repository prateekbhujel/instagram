<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Attributes\On;

class Home extends Component
{


    public $posts;

    #[On('closeModal')]
    public function revertUrl()
    {
        $this->js("history.replaceState({}, '', '/')");
    }

    #[On('post-created')] 
    function postCreated($id)  {

        $post = Post::find($id);
        $this->posts =  $this->posts->prepend($post);
        
    }


    function mount()
    {
        $this->posts = Post::latest()->get();
    }


    public function render()
    {
        return view('livewire.home');
    }
}
