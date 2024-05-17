<div class="w-full p-3">
    
    <h3 class="font-bold text-4xl">Notification</h3>

   
    <main class="my-7 w-full">

        <div class="space-y-5">
            
            @foreach ($notifications as $notification)

                @switch($notification->type)
                    @case('App\Notifications\NewFollowerNotification')
                        
                        @php
                            $user = \App\Models\User::find($notification->data['user_id']);
                        @endphp

                        {{-- New Follower Notification --}}
                        <div class="grid grid-cols-12 gap-2 w-full">
        
                            <a href="{{ route('profile.home', $user->username) }}" class="col-span-2">
                                <x-avatar wire:ignore src="https://source.unsplash.com/500x500?face-{{ rand(0,10) }}" class="h-10 w-10" />
                            </a>
        
                            <div class="col-span-7 font-medium">
                                <a href="{{ route('profile.home', $user->username) }}">
                                    <strong>{{ $user->username }}</strong>
                                </a>
                                Strated Following you
                                <span class="text-gray-400">{{ $notification->created_at->shortAbsoluteDiffForHumans() }}</span>
                            </div>
        
                            <div class="col-span-3">
                                @if (auth()->user()->isFollowing($user))
                                    <button wire:click="toggleFollow({{ $user->id }})" class="font-bold text-sm bg-gray-100 text-black/90 px-3 py-1 rounded-lg">Following</button>
                                @else
                                    <button wire:click="toggleFollow({{ $user->id }})" class="font-bold text-sm bg-blue-500 text-white px-3 py-1 rounded-lg">Follow</button>
                                @endif
                            </div>
        
                        </div>                    
                        @break

                        @case('App\Notifications\PostLikedNotification')

                            @php
                                $user = \App\Models\User::find($notification->data['user_id']);
                                $post = \App\Models\Post::find($notification->data['post_id']);
                            @endphp

                            {{-- Post Liked Nottfication --}}
                            <div class="grid grid-cols-12 gap-2 w-full">
            
                                <a href="{{ route('profile.home', $user->username) }}" class="col-span-2">
                                    <x-avatar wire:ignore src="https://source.unsplash.com/500x500?face-{{ rand(0,10) }}" class="h-10 w-10" />
                                </a>
            
                                <div class="col-span-7 font-medium">
                                    <a href="{{ route('profile.home', $user->username) }}">
                                        <strong>{{ $user->username }}</strong>
                                    </a>
            
                                    <a href="{{ route('post', $post->id) }}">
                                        Liked your post
                                        <span class="text-gray-400">{{ $notification->created_at->shortAbsoluteDiffForHumans() }}</span>
                                    </a>
                                </div>
            
                                <a href="{{ route('post', $post->id) }}" class="col-span-3 ml-auto">
                                    <img src="https://source.unsplash.com/500x500?nature-{{ rand(0,10) }}" alt="NotificationPostImage" class="h-11w-10 object-cover">
                                </a>
            
                            </div>
                            @break
                    
                    @case('App\Notifications\NewCommentNotification')
                        {{-- New Comment Notification --}}
                        {{-- <div class="grid grid-cols-12 gap-2 w-full">
                            <a href="#" class="col-span-2">
                                <x-avatar wire:ignore src="https://source.unsplash.com/500x500?face-{{ rand(0,10) }}" class="h-10 w-10" />
                            </a>
        
                            <div class="col-span-7 font-medium">
                                <a href="#">
                                    <strong>{{ fake()->username }}</strong>
                                </a>
        
                                <a href="#">
                                    Commented:
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                    <span class="text-gray-400">2 days ago</span>
                                </a>
                            </div>
        
                            <a href="" class="col-span-3 ml-auto">
                                <img src="https://source.unsplash.com/500x500?nature-{{ rand(0,10) }}" alt="NotificationPostImage" class="h-11w-10 object-cover">
                            </a>
                        </div>        --}}
                        @break

                    @default
                        
                @endswitch
            
            @endforeach

        </div>

    </main>



   
</div>
