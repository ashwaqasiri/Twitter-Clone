<x-dashboard>
    <div>
        {{-- @include ('_publish-tweet-panel')
        
        @include ('_timeline') --}}
        {{$user->name}}

        @include ('_timeline', ['tweets' => $user->tweets])
    </div>
</x-dashboard>