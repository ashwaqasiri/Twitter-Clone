<div class="flex p-4 {{$loop->first ? 'border-b' : 'border-t'}}">
    <div class="mr-2 flex-shrink-0">
        <a href="{{route('profile',$tweet->user->name)}}">
            <img
                src="{{$tweet->user->avatar}}"
                alt=""
                class="rounded-full mr-2"
                width="50"
                height="50"
            >
        </a>
    </div>

    <div>
        <h5 class="font-bold mb-2">
            <p class="text-xs font-thin text-gray-500">{{(auth()->user()->isRetweeted($tweet))?'You Retweeted': ''}}</p>
            <a href="{{route('profile',$tweet->user->name)}}">
                {{$tweet->user->name}}
            </a>
        </h5>

        <p class="text-sm mb-3">
          {{$tweet->body}}
        </p>
        @livewire('like-retweet',['tweet' => $tweet])
        {{-- @auth
            <x-like-buttons :tweet="$tweet" />
        @endauth
        @auth
            <x-retweet-buttons :tweet="$tweet" />
        @endauth --}}
    </div>
</div>

