<?php

namespace App\Livewire\Post\View;

use Livewire\Component;

class Item extends Component
{
    public $post;
    
    public function render()
    {
        return view('livewire.post.view.item');
    }
}
