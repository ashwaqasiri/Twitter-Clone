<div class="flex justify-between">
    <div class=''>
        <a
            class="font-bold text-lg mb-4 block"
            href="{{route('home')}}"
        >
            Home
        </a>
    </div>

    <div class=''>
        <a
            class="font-bold text-lg mb-4 block"
            href="/explore"
        >
            Explore
        </a>
    </div>

    @auth
        <div class=''>
            <a
                class="font-bold text-lg mb-4 block"
                href="{{route('profile', auth()->user())}}"
            >
                Profile
            </a>
        </div>

        <div class=''>
            <form method="POST" action="/logout">
                @csrf

                <button class="font-bold text-lg">Logout</button>
            </form>
        </div>
    @endauth
</div>
