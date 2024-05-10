<?php

namespace App\Livewire\Post;

use App\Models\Media;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use LivewireUI\Modal\ModalComponent;


class Create extends ModalComponent
{


    use WithFileUploads;

    public $media = [];
    public $description;
    public $location;
    public $hide_like_view = false;
    public $allow_commenting = false;


    /**
     * Supported: 'sm', 'md', 'lg', 'xl', '2xl', '3xl', '4xl', '5xl', '6xl', '7xl'
     */
    public static function modalMaxWidth(): string
    {
        return '5xl';
    }


    public function submit()
    {
        //Validating the data
        $this->validate([
            'media.*'           => 'required|file|mimes:png,jpg,mp4,jpeg,mov|max:100000',
            'allow_commenting'  => 'boolean',
            'hide_like_view'    => 'boolean',
            'description'       => 'required',
        ]);

        //Differentiate either the media is reel or post type
        $type = $this->getPostType($this->media);

        //Create a new post
        $post = Post::create([

            'user_id'           => auth()->user()->id,
            'description'       => $this->description,
            'location'          => $this->location,
            'hide_like_count'   => $this->hide_like_view,
            'allow_commenting'  => $this->allow_commenting,
            'type'              => $type,

        ]);

        //Add media
        foreach($this->media as $key => $media)
        {
            //Get mime type
            $mime = $this->getMime($media);

            //Save to storage
            $path = $media->store('media', 'public');

            $url = url(Storage::url($path));

            //Create media
            Media::create([

                'url' => $url,
                'mime'=> $mime,
                'mediable_id' => $post->id,
                'mediable_type' => Post::class,

            ]);

            $this->reset();
            $this->dispatch('close');
            
            //Dispatch even for post created
            $this->dispatch('post-created', $this->post_id);

        }

    }


    public function getMime($media): string
    {
        if(str()->contains($media->getMimeType(), 'video'))
        {
            return 'video';
        }else
        {
            return 'image';
        }
    }

    public function getPostType($media) :string
    {
        if(count($media) == 1 && str()->contains($media[0]->getMimeType(), 'video'))
        {
            return 'reel' ;

        } else
        {
            return 'post' ;

        }
    }


    public function render()
    {
        return view('livewire.post.create');
    }
}
