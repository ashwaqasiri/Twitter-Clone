<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;

class LikeController extends Controller
{
    public function store(Tweet $tweet)
    {
        auth()
            ->user()
            ->togglelike($tweet);

        return back();
    }
}
