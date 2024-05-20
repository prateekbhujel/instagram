<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $dates =['read_at'];


    /** 
     * Get the conversation that the message belongs to.
    */
    public function conversation(): BelongsTo
    {
        return $this->belongsTo(Conversation::class);

    }//End Method

    
    /** 
     * set the read_at attribute.
    */
    public function isRead()
    {
        return $this->read_at != null;

    }//End Method

    

}
