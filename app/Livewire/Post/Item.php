<?php

namespace App\Livewire\Post;

use App\Models\Comment;
use App\Models\Post;
use App\Notifications\PostLikedNotification;
use Livewire\Component;

class Item extends Component
{
    public Post $post;

    public $body;
    

    public function togglePostLike()
    {
        abort_unless(auth()->check(), 401);

        auth()->user()->toggleLike($this->post);

        //Sendning Notificaiton to the user for post liked
        if($this->post->isLikedBy(auth()->user()))
            $this->post->user->notify(new PostLikedNotification(auth()->user(), $this->post)) ;

    }//End Method
    

    public function toggleCommentLike(Comment $comment)
    {
        abort_unless(auth()->check(), 401);

        auth()->user()->toggleLike($comment);

    }//End Method

    public function toggleFavorite()
    {
      abort_unless(auth()->check(), 401);
      
      auth()->user()->toggleFavorite($this->post);
 
    }//End Method

    public function addComment()  {

        $this->validate(['body'=>'required']);

        //create comment 
        Comment::create([
            'body'              =>$this->body,
            'commentable_id'    =>$this->post->id,
            'commentable_type'  =>Post::class,
            'user_id'           =>auth()->id(),
        ]);

        $this->reset( ['body']);
    
    }//End Method

    public function render()
    {
        return view('livewire.post.item');

    }//End Method
}
