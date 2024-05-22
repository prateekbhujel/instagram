<?php

namespace App\Livewire\Chat;

use Livewire\Component;

class Main extends Component
{


    public function render()
    {
        return <<<'HTML'
                <div class="w-full h-[calc(100vh_-_0.0rem)] flex bg-white rounded-lg" >
                    <!-- Chat List -->
                    <div class="hidden lg:flex relative dark:border-gray-600 w-full h-full md:w-[320px] xl:w-[400px] border-r shrink-0 overflow-y-auto  ">
                        <livewire:chat.chat-list>
                    </div>

                    <main class="grid w-full dark:border-gray-700 h-full relative overflow-y-auto"  style="contain:content">

                        <!-- Chat Componennt -->
                            Messages here...

                    </main>
                </div>
        HTML;
    }



    
}
