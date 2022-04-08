<div class="inline-flex ">
    <div class="flex items-center text-xs mr-4">
        <button wire:click="addRetweet('{{ $tweet->id }}')" type="submit" class="flex">
            <i class="fas fa-retweet fa-lg mr-1" style="{{auth()->user()->isRetweeted($tweet)? 'color:green' :'color:gray'}}"></i>
        </button>
        {{ $tweet->retweets->count() }}
    </div>
</div>