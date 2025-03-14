<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    //

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id');
    }

    public function likings()
    {
        return $this->hasMany(Liking::class);
    }

    public function likers()
    {
        return $this->belongsToMany(User::class, 'likings', 'post_id', 'user_id');
    }

    public function likesCount()
    {
        return $this->likers()->count();
    }

    protected $fillable = ['body'];
}
