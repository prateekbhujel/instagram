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

                <ul class="flex overflow-x-auto items-center gap-2">

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
        

        {{-- Suggestion Section Start --}}
        <aside class="lg:col-span-4 border hidden lg:block p-4"></aside>
        {{-- Suggestion Section End --}}
    </main>
    {{-- Main Section End --}}

</div>