<div class="bg-gray-200 border border-gray-300 rounded-lg py-4 px-6">
    <h3 class="font-bold text-xl mb-4">Following</h3>

    <ul>
        {{-- @forelse (current_user()->follows as $user) --}}
            <li class="">
                <div>
                    <a href="" class="flex items-center text-sm">
                        <img
                            src=""
                            alt=""
                            class="rounded-full mr-2"
                            width="40"
                            height="40"
                        >

                        {{-- {{ $user->name }} --}}
                    </a>
                </div>
            </li>
        {{-- @empty --}}
            <li>No friends yet!</li>
        {{-- @endforelse --}}
    </ul>
</div>
