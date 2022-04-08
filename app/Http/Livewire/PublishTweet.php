<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Tweet;

class PublishTweet extends Component
{
    public $body;
  
    protected $rules = [
        'body' => 'required|max:255'
      ];

    public function addTweet()
    { 
        $this->validate();
        Tweet::create([
            'user_id' => Auth::id(),
            'body' => $this->body
        ]);
        $this->body = '';
        $this->emit('showTweets');
    }

    public function render()
    {
        return view('livewire.publish-tweet');
    }
}
