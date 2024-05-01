<div>


    {{------------}}
    {{--Header----}}
    {{------------}}
    <header>

    </header>


    {{------------}}
    {{--Main------}}
    {{------------}}

    <main class="grid lg:grid-cols-12 gap-8 md:mt-10">

        <aside class="lg:col-span-8   overflow-hidden">

            {{-- Stories --}}
            <section>

                <ul class="flex overflow-x-auto items-center scrollbar-hide  gap-2">

                    <li class="flex flex-col justify-center w-20  gap-1 p-2">
                        <x-avatar story src="https://source.unsplash.com/500x500?face-{{rand(0,10)}}"
                            class=" h-14 w-14 " />
                        <p class="text-xs font-medium truncate">{{fake()->name}}</p>
                    </li>
                </ul>

            </section>

            {{-- Posts --}}
            <section class="mt-10 space-y-8">


            </section>


        </aside>


        {{-- suggestions --}}
        <aside class="lg:col-span-4 border hidden lg:block p-4">


        </aside>
    </main>


</div>