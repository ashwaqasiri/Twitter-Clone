<x-dashboard>
    <div>
        {{-- @include ('_publish-tweet-panel') --}}
        @livewire('publish-tweet')
        
        @livewire('timeline')
    </div>
</x-dashboard>