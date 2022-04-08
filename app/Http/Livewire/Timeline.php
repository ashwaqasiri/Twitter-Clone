<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class Timeline extends Component
{
    use WithPagination;
    
    protected $listeners = ['showTweets' => 'render'];

    public function render()
    {
        $tweets = Auth::user()->timeline();
        return view('livewire.timeline',['tweets' => $tweets]);
    }
}
