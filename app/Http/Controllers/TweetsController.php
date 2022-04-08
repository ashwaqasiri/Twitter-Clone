<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;

class TweetsController extends Controller
{
    public function index()
    {
        return view('tweet.index');

    }

    public function store()
    {
        $attributes = request()->validate(['body' => 'required|max:255']);
        Tweet::create([
            'user_id' => auth()->id(),
            'body' => $attributes['body']
        ]);

        return redirect('/tweets');
    }

    public function retweet(Tweet $tweet)
    {
        auth()->user()->toggleRetweet($tweet);
        return redirect()->back();
    }
}
