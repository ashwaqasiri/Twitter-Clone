<div class="flex p-4 border-b-2">
    <div class="mr-2 flex-shrink-0">
        <a href="{{route('profile',$tweet->user->name)}}">
            <img
                src="{{auth()->user()->avatar}}"
                alt=""
                class="rounded-full mr-2"
                width="50"
                height="50"
            >
        </a>
    </div>

    <div>
        <h5 class="font-bold mb-2">
            <a href="{{route('profile',$tweet->user->name)}}">
                {{$tweet->user->name}}
            </a>
        </h5>

        <p class="text-sm mb-3">
          {{$tweet->body}}
        </p>

        {{-- @auth
            <x-like-buttons :tweet="$tweet" />
        @endauth --}}
    </div>
</div>
