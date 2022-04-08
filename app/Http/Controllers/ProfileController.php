<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        $tweets = $user->tweets()->orderByDesc('created_at')->get();
        $retweets = $user->retweets()->get();
        $likes = $user->likes()->get();
        // $tweetsMerged = $retweets->merge($userTweets->sortByDesc('created_at'));
        // $tweets = $tweetsMerged;
        return view('profile.show', [
            'user' => $user,
            'tweets' => $tweets,
            'retweets' => $retweets,
            'likes' => $likes
        ]);
    }

    public function edit(User $user)
    {
        return view('profile.edit', compact('user'));
    }

    public function update(User $user)
    {
        $attributes = request()->validate([
            'name' => ['string', 'required', 'max:255'],
            'avatar' => ['image' , 'dimensions:min_width=100,min_height=200'],
            'email' => [
                'string',
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user),
            ],
            'password' => [
                'string',
                'required',
                'min:8',
                'max:255',
                'confirmed',
            ],
        ]);

        if (request('avatar')) {
            $attributes['avatar'] = time() . '.' . request('avatar')->getClientOriginalExtension();    
            request('avatar')->move(storage_path('app/public/avatars'), $attributes['avatar']);
        }

        $user->update($attributes);

        return redirect()->route('profile',$user->name);
    }
}
