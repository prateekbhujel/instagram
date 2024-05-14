<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Overtrue\LaravelLike\Traits\Likeable;


class Comment extends Model
{
    use HasFactory, SoftDeletes, Likeable;

    protected $guarded = [];

    
    public function commentable(): MorphTo
    {
        return $this->morphTo();
        
    }//End Method


    public function parent(): BelongsTo
    {
        return $this->belongsTo(Self::class, 'parent_id');

    }//End Method


    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id', 'id')->with('replies');

    }//End Method

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);

    }//End Method
}
