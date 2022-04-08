<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Tweet;

class LikeRetweet extends Component
{
    public $tweet;

    public function addLike(Tweet $tweet){
        $this->tweet = $tweet;
        auth()->user()->toggleLike($this->tweet);
    }

    public function addRetweet(Tweet $tweet){
        $this->tweet = $tweet;
        auth()->user()->toggleRetweet($this->tweet);
    }

    public function render()
    {
       // dd($this->tweet);
        return view('livewire.like-retweet',['tweet' => $this->tweet]);
    }
}
