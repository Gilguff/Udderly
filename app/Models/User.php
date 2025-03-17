<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{

    /*Posts*/
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'author_id');
    }

    /*Comments*/
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'author_id');
    }

    /*Likes*/
    public function likings()
    {
        return $this->hasMany(Liking::class);
    }

    public function likedPosts()
    {
        return $this->belongsToMany(Post::class, 'likings', 'user_id', 'post_id');
    }

    public function like(Post $post)
    {
        if (!$this->isLiked($post)) {
            $this->likedPosts()->attach($post);
        }
    }

    public function unlike(Post $post)
    {
        $this->likedPosts()->detach($post);
    }

    public function isLiked(Post $post)
    {
        return $this->likedPosts()->where('posts.id', $post->id)->exists();
    }

    /*Follows*/
    public function following()
    {
        return $this->belongsToMany(User::class, 'followings', 'followed_id', 'follower_id');
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'followings', 'follower_id', 'followed_id');
    }

    public function follow(User $user)
    {
        if (!$this->isFollowing($user)) {
            $this->following()->attach($user);
        }
    }

    public function unfollow(User $user)
    {
        $this->following()->detach($user);
    }

    public function isFollowing(User $user)
    {
        return $this->following()->where('users.id', $user->id)->exists();
    }

    public function isFollowedBy(User $user)
    {
        return $this->following()->where('users.id', $user->id)->exists();
    }

    public function followersCount()
    {
        return $this->followers()->count();
    }

    public function followingCount()
    {
        return $this->following()->count();
    }

    /*Profile*/
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    protected static function booted()
    {
        static::created(function ($user) {
            $user->profile()->create();
        });
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
