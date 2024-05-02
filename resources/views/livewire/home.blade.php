<div class="w-full">

    {{-- Header Section Start --}}
    <header>

    </header>
    {{-- Header Section End --}}

    {{-- Main Section Start --}}
    <main class="grid lg:grid-cols-12 gap-8 md:mt-10">
        
        <aside class="lg:col-span-8 border overflow-hidden h-[1000px]">
             
            {{-- Story section Start --}}
            <section>

                <ul class="flex overflow-x-auto scrollbar-hide items-center gap-2">

                    @for ($i = 0; $i < 10; $i++)
                        <li class="flex-col justify-center w-20 gap-1 p-2">
                            
                            @if($i % 2 == 0)
                                <x-avatar src="https://source.unsplash.com/500x500?face-{{ $i }}"
                                    class="h-14 w-14" /> 
                            @else
                                <x-avatar story src="https://source.unsplash.com/500x500?face-{{ $i }}"
                                    class="h-14 w-14" />
                            @endif
                            <p class="text-xs font-medium truncate">{{ fake()->name }}</p>
                        </li>
                    @endfor

                </ul>

            </section>
            {{-- Story section End --}}
        </aside>
        

        {{-- Suggestion and applinks Section Start --}}
        <aside class="lg:col-span-4 border hidden lg:block p-4">

            <div class="flex items-center gap-2">

                <x-avatar src="https://source.unsplash.com/500x500?face" class="w-12 h-12" />
                <h4 class="font-medium">{{ fake()->name }}</h4>

            </div>

            {{-- Sugestions section Start --}}
            <section class="mt-4"> 

                <h4 class="fomt-bold text-gray-700/95">Suggestions for you </h4>
                
                <ul class="my-2 space-y-3">
                    <li class="flex items-center gap-3">
                        <x-avatar src="https://source.unsplash.com/500x500?face-3" class="w-12 h-12" />

                        <div class="grid grid-cols-7 w-full gap-2">
                            <div class="col-span-5">
                                <h5 class="font-semibold truncate text-sm">{{ fake()->name }}</h5>
                                <p class="text-xs truncate"> Followed by {{ fake()->name }}</p>
                            </div>

                            <div class="col-span-2 flex text-right justify-end">

                                <button class="font-bold text-blue-500/100 ml-auto text-sm">Follow</button>

                            </div>

                        </div>
                        
                    </li>
                </ul>

            </section>
            {{-- Sugestions section End --}}

            {{-- Applinks Section Start --}}
            <section class="mt-5">

                <ol class="flex gap-2 flex-wrap">

                    <li class="text-xs text-gray-800/95 font-medium"><a href="#" class="hover:underline">About</a></li>
                    <li class="text-xs text-gray-800/95 font-medium"><a href="#" class="hover:underline">Help</a></li>
                    <li class="text-xs text-gray-800/95 font-medium"><a href="#" class="hover:underline">API</a></li>
                    <li class="text-xs text-gray-800/95 font-medium"><a href="#" class="hover:underline">Job</a></li>
                    <li class="text-xs text-gray-800/95 font-medium"><a href="#" class="hover:underline">Privacy</a></li>
                    <li class="text-xs text-gray-800/95 font-medium"><a href="#" class="hover:underline">Location</a></li>

                </ol>
                <h3 class="text-gray-800/92 mt-6 text-sm">© 2024 INSTAGRAM FROM YOU BY <a href="https://instagram.com/prateekbhujel" class="hover:text-blue-500">PRATIK BHUJEL</a></h3>

            </section>
            {{-- Applinks Section End --}}

        </aside>
        {{-- Suggestion and applinks Section End --}}


    </main>
    {{-- Main Section End --}}

</div>