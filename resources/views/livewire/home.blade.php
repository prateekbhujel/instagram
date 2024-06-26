<div 
x-data = "{
    canLoadMore:@entangle('canLoadMore')
}"

@scroll.window.throttle = "
    scrollTop = window.scrollY || window.scrollTop;
    divHeight = window.innerHeight || document.documentElement.clientHeight;
    scrollHeight = document.documentElement.scrollHeight;

    isScrolled = scrollTop + divHeight >= scrollHeight - 1;

    {{-- Check if user can load more --}}
    if(isScrolled && canLoadMore){
        @this.loadMore();
    }
"

class="w-full h-full">

    {{-- Header Section Start --}}
    <header class="md:hidden sticky top-0 bg-white z-50">

        <div class="grid grid-cols-12 gap-2 items-center">
  
            <div class="col-span-3">
  
              <img src="{{ asset('assets/logo.png') }}" class="h-10 max-w-lg w-full" alt="logo">
  
            </div>
  
              <div class="col-span-8 flex justify-center px-2">
  
                <input type="text" placeholder="Search" 
                 class=" border-0 outline-none w-full focus:outline-none bg-gray-100 rounded-lg focus:ring-0 hover:ring-0" 
                >
                
              </div>
  
            <div class="col-span-1 justify-center">
  
              <a href="#">
                <span>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.9" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                  </svg>
                  
                </span>
              </a>
              
            </div>
  
  
        </div>
  
  
    </header>
    {{-- Header Section End --}}

    {{-- Main Section Start --}}
    <main class="grid lg:grid-cols-12 gap-8 md:mt-10">
        
        <aside class="lg:col-span-8 overflow-hidden">
             
            {{-- Story section Start --}}
            <section>

                <ul class="flex overflow-x-auto scrollbar-hide items-center justify-center gap-2">

                    @for ($i = 0; $i < 8; $i++) <!-- Adjusted to loop 20 items for example -->
                        <li class="flex flex-col justify-center w-20 gap-1 p-2">
                            
                            @if($i % 2 == 0)
                                <x-avatar wire:ignore src="https://source.unsplash.com/500x500?face-{{ $i }}"
                                    class="h-14 w-14" /> 
                            @else
                                <x-avatar wire:ignore story src="https://source.unsplash.com/500x500?face-{{ $i }}"
                                    class="h-14 w-14" />
                            @endif
                            <p class="text-xs font-medium truncate text-center">{{ fake()->username }}</p>
                        </li>
                    @endfor

                </ul>

            </section>
            {{-- Story section End --}}

            {{-- Posts Section Start --}}
            <section class="mt-5 space-y-4 p-2">

                @if ($posts)

                    @foreach ($posts as $post)
                        
                        <livewire:post.item wire:key="post-{{ $post->id }}" :post="$post" />
                    
                    @endforeach

                @else

                    <p class="font-bold flex justify-center">No Posts available right now.</p>
                
                @endif

            </section>
            {{-- Posts Section End --}}


        </aside>
        

        {{-- Suggestion and applinks Section Start --}}
        <aside class="lg:col-span-4 hidden lg:block mt-3 mr-[2.5rem]">

            <div class="flex items-center gap-2">

                <x-avatar wire:ignore src="https://source.unsplash.com/500x500?face" class="w-12 h-12" />
                <h4 class="font-semibold">
                   {{ auth()->user()->username }}<br>
                    <span class="text-sm font-normal truncate text-gray-500 mt-4">{{ auth()->user()->name }}</span>
                </h4>
                
            </div>
            

            {{-- Suggestions section Start --}}
            <section class="mt-4"> 

                <h4 class="font-bold text-gray-700/95 my-2">Suggested for you </h4>
                
                <ul class="my-2 space-y-3">
                    @foreach ($suggestedUsers as $key => $user)
                        <li class="flex items-center gap-3">
                            <a href="{{ route('profile.home', $user->username) }}">
                                <x-avatar wire:ignore src="https://source.unsplash.com/500x500?face-{{ $key }}" class="w-12 h-12" />
                                
                            </a>
                            

                            <div class="grid grid-cols-7 w-full gap-2">
                                <div class="col-span-5">
                                    <a href="{{ route('profile.home', $user->username) }}" class="font-semibold truncate text-sm">{{ $user->username }}</a> 
                                    <p class="text-xs truncate" wire:ignore> Followed by <a href="{{ route('profile.home', fake()->username) }}" wire:ignore>{{ fake()->username }}</a></p>
                                </div>

                                <div class="col-span-2 flex text-right justify-end ml-2">
                                    @if (auth()->user()->isFollowing($user))
                                        <button wire:click="toggleFollow({{ $user->id }})" 
                                            class="font-bold text-blue-900 ml-auto text-xs hover:text-blue-900/40">
                                            Following
                                        </button>    
                                    @else
                                        <button wire:click="toggleFollow({{ $user->id }})" 
                                            class="font-bold text-blue-500/100 ml-auto text-xs hover:text-slate-700">
                                            Follow
                                        </button>
                                    @endif
                                </div>
                            </div>
                            
                        </li>
                    @endforeach
                </ul>

            </section>
            {{-- Suggestions section End --}}

            {{-- Applinks Section Start --}}
            <section class="mt-5">

                <ol class="flex gap-2 flex-wrap">
                    <li class="text-xs text-gray-800/95 font-medium"><a href="https://about.instagram.com/" target="_blank" class="hover:underline">About</a></li>
                    <li class="text-xs text-gray-800/95 font-medium"><a href="https://help.instagram.com/" target="_blank" class="hover:underline">Help</a></li>
                    <li class="text-xs text-gray-800/95 font-medium"><a href="https://developers.facebook.com/docs/instagram" target="_blank" class="hover:underline">API</a></li>
                    <li class="text-xs text-gray-800/95 font-medium"><a href="https://about.instagram.com/about-us/careers" target="_blank" class="hover:underline">Job</a></li>
                    <li class="text-xs text-gray-800/95 font-medium"><a href="https://privacycenter.instagram.com/policy/?entry_point=ig_help_center_data_policy_redirect" target="_blank" class="hover:underline">Privacy</a></li>
                    <li class="text-xs text-gray-800/95 font-medium"><a href="https://www.instagram.com/explore/locations/" target="_blank" class="hover:underline">Location</a></li>

                </ol>
                <h3 class="text-gray-800/92 mt-6 text-sm">© 2024 INSTAGRAM For YOU BY <a href="https://instagram.com/prateekbhujel" class="hover:text-blue-500" target="_blank">PRATIK BHUJEL</a></h3>
            </section>
            {{-- Applinks Section End --}}

        </aside>
        {{-- Suggestion and applinks Section End --}}
        
    </main>
    {{-- Main Section End --}}

</div>