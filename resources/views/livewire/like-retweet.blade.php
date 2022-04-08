<div>
    @auth
        <x-like-buttons :tweet="$tweet" />
    @endauth
    @auth
        <x-retweet-buttons :tweet="$tweet" />
    @endauth
</div>
