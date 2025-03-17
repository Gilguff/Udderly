<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
    //
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function profilePictureUrl()
    {
        return $this->profile_picture ? $this->profile_picture : 'https://i.imgur.com/PIOafIe.jpeg';
    }


    protected $fillable = ['bio', 'profile_picture', 'user_id'];
}
