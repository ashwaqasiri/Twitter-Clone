<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Traits\Followable;
//use App\Traits\Retweetable;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Followable ;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'avatar',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAvatarAttribute($value)
    {
        if (!$value) {
            return asset('img/avatar.jfif');
        }
            return asset('storage/avatars/'.$value);
    }

    public function timeline()
    {
        $ids = $this->follows()->pluck('id');

        return Tweet::whereIn('user_id',$ids)
                    ->orWhere('user_id',$this->id)
                    ->latest()->paginate(10);
    }

    public function tweets()
    {
        return $this->hasMany(Tweet::class);
    }

    public function setPasswordAttribute($value) 
    { 
        $this->attributes['password'] = bcrypt($value);
    }

    // Like Section
    public function likes()
    {
        return $this->belongsToMany(Tweet::class,'tweet_user','user_id','tweet_id');
    }

    public function toggleLike(Tweet $tweet)
    {
        $this->likes()->toggle($tweet);
    }

    public function isLiked(Tweet $tweet)
    {
        return $this->likes()->where('tweet_id', $tweet->id)->exists();
    }

    // retweets section

    public function toggleRetweet(Tweet $tweet)
    {
        $this->retweets()->toggle($tweet);
    }

    public function retweets()
    {
        return $this->belongsToMany(Tweet::class,'retweet','user_id','tweet_id')
        ->withTimestamps()
        ->orderByPivot('created_at', 'desc');
    }

    public function isRetweeted(Tweet $tweet)
    {
        return $this->retweets()->where('tweet_id', $tweet->id)->exists();
    }

    // public function getRouteKeyName()
    // {
    //     return 'name';
    // }
}
