<x-dashboard>
        <header class="mb-6 relative">
            <div class="relative">
                <img src="/img/default-profile-banner.jpg"
                      alt="profile-banner"
                      class="mb-2"
                >
    
                <img src="{{ $user->avatar }}"
                     alt="profile avatar"
                     class="inline object-cover w-16 h-16 mr-2 rounded-full absolute transform -translate-x-1/2 translate-y-1/2"
                     style="left: calc(50% - 75px);
                            top: 50%; "
                     width="150"
                >
            </div>
    
            <div class="flex justify-between items-center mb-6">
                <div style="max-width: 270px">
                    <h2 class="font-bold text-2xl mb-0">{{ $user->name }}</h2>
                    <p class="text-sm">Joined {{ $user->created_at->diffForHumans() }}</p>
                </div>
    
                <div class="flex">
                    @if(auth()->user()->is($user))
                        <a href="{{route('profile.edit', $user->name)}}"
                           class="rounded-full border border-gray-300 py-2 px-4 text-black text-xs mr-2"
                        >
                            Edit Profile
                        </a>
                    @endif
                    <x-follow-button :user="$user"></x-follow-button>
                </div>
            </div>
    
            <p class="text-sm">
                The name’s Bugs. Bugs Bunny. Don’t wear it out. Bugs is an anthropomorphic gray
                and white rabbit or hare who is famous for his flippant, insouciant personality.
                He is also characterized by a Brooklyn accent, his portrayal as a trickster,
                and his catch phrase "Eh...What's up, doc?"
            </p>
    
    
        </header>
        <x-profile-tabs :tweets="$tweets" :retweets="$retweets" :likes="$likes"></x-profile-tabs>
        {{-- {{ $tweets->links() }} --}}
        {{-- @include ('_timeline', ['tweets' => $tweets]) --}}
</x-dashboard>