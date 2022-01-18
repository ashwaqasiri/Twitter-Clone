@auth
    @unless (auth()->user()->is($user))
        <form method="POST"
              action="/profile/{{$user->name}}/follow"
        >
            @csrf

            <button type="submit"
                    class="bg-blue-500 rounded-full shadow py-2 px-4 text-white text-xs"
            >
                {{ auth()->user()->following($user) ? 'Unfollow Me' : 'Follow Me' }}
            </button>
        </form>
    @endunless
@endauth