<?php

namespace App\Livewire\Profile;

use App\Models\Conversation;
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


    public function message($userId)
    {
        $authenticatedUserId = auth()->id();
        
        //check if the user is not the authenticated user
        $existingCoversation = Conversation::where(function($query) use($authenticatedUserId, $userId){
            $query->where('sender_id', $authenticatedUserId)
                  ->where('receiver_id', $userId);

        })->orWhere(function($query) use($authenticatedUserId, $userId){
            $query->where('sender_id', $userId)
                  ->where('receiver_id', $authenticatedUserId);
        })->first();

        if($existingCoversation) 
        {
            //redirect to the conversation
            return redirect()->route('chat.main', ['chat' => $existingCoversation->id]);
        }

        //Create new conversation
        $createdConversation = Conversation::create([
           'sender_id' => $authenticatedUserId,
           'receiver_id' => $userId,
        ]);
        
        return redirect()->route('chat.main', ['chat' => $createdConversation->id]);

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
