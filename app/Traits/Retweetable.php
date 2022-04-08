<?php

namespace App\Traits;
use App\Models\Tweet;

trait Retweetable {
    
    public function retweets()
    {
        return $this->belongsToMany(Tweet::class,'retweet','user_id','tweet_id');
    }

    public function isRetweeted(Tweet $tweet)
    {
        return $this->retweet()->where('tweet_id', $tweet->id)->exists();
    }
}
?>