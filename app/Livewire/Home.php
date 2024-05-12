<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Attributes\On;

class Home extends Component
{

    public $posts;
    public $canLoadMore;
    public $perPageIncrements = 6;
    public $perPage = 10;


    #[On('closeModal')]
    public function revertUrl()
    {
        $this->js("history.replaceState({}, '', '/')");

    }//End Method

    #[On('post-created')] 
    function postCreated($id)  {

        $post = Post::find($id);
        $this->posts =  $this->posts->prepend($post);
        
    }//End Method

    public function loadMore()
    {
        if(!$this->canLoadMore)
            return null;

        //increment page
        $this->perPage += $this->perPageIncrements;

        //Load posts
        $this->loadPosts();

    }//End Method

    public function loadPosts()
    {
        $this->posts = Post::with('comments.replies')
                            ->latest()
                            ->take($this->perPage)
                            ->get();

        $this->canLoadMore = (count($this->posts) >= $this->perPage);

    }//End Method

    function mount()
    {
        $this->loadPosts();

    }//End Method


    public function render()
    {
        return view('livewire.home');

    }//End Method
}
