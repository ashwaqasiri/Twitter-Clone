<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ExploreController extends Controller
{
    public function __invoke()
    {
        $users = User::whereNotIn(
                'id', auth()->user()->follows()->pluck('id'))
                ->where('id','!=',auth()->user()->id)
                ->paginate(10);
            return view('explore',compact('users'));
        // dd($users);
    }
}
