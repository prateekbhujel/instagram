<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected function casts (): array
    {
        return   [

            'hide_like_view' => 'boolean',
            'allow_commenting' => 'boolean',

        ];
    }

    public function media() : MorphMany 
    {
        return $this->morphMany(Media::class, 'mediable');
    }

    /** 
     * Posts Belongs to User.
    */
    public function user() :BelongsTo 
    {
        
        return $this->belongsTo(User::class);
    }
}
