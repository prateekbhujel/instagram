<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Conversation extends Model
{
    use HasFactory;

    protected $guarded = [];


    /**
     * Messages relationship.
    */
    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);

    }//End Method

    
    /**
     * Get the message that was sent by the authenticated user.
    */
    public function getReceiver()
    {
        if($this->sender_id == auth()->id())
        {
            return User::firstWhere('id', $this->receiver_id);

        }else
        {
            return User::firstWhere('id', $this->sender_id);

        }

    }//End Method

}
