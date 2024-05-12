<?php

namespace App\Livewire\Post\View;

use App\Models\Post;
use LivewireUI\Modal\ModalComponent;

class Modal extends ModalComponent
{

    public $post;
    
    public static function modalMaxWidth(): string
    {
        return '5xl';
    }

    public static function closeModalOnEscape(): bool
    {
        return false;
    }

    function mount()
    {
        $this->post = Post::findOrFail($this->post);

        //Get the Url
        $url = url('post/'  . $this->post->id);

        //Push State Using Livewire js helper method
        $this->js("history.pushState({},'','{$url}')");
    }
    
    public function render()
    {
        return <<<'BLADE'

        <main class="bg-white h[calc(100vh_-_3.5rem)] md:h-[calc(100vh_-_5rem)] flex flex-col border gap-y-4 px-5">

            <header class="w-full py2">

                <div class="flex justify-end">
                        
                    <button wire:click="$dispatch('closeModal')" type="button" class="xl font-bold text-ellipsis">X</button>

                </div>

            </header>

        </main>

        BLADE;
    }
}
