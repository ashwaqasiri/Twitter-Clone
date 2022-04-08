<div class="inline-flex ">
    <div class="flex items-center mr-4">
        <button wire:click="addLike('{{ $tweet->id }}')" class="flex text-xs">
            <svg viewBox="0 0 20 20" class="mr-2 w-3">
                <g id="Page-1" stroke="none" stroke-width="1" fill="{{auth()->user()->isLiked($tweet)? 'red' : 'gray'}}" fill-rule="evenodd">
                    <g class=""
                    width="24" height="24" viewBox="0 0 24 24"
                    >
                        <path d="M12 4.419c-2.826-5.695-11.999-4.064-11.999 3.27 0 7.27 9.903 10.938 11.999 15.311 2.096-4.373 12-8.041 12-15.311 0-7.327-9.17-8.972-12-3.27z"/>
                    </g>
                </g>
            </svg>
            {{ $tweet->likes->count() }}
        </button>
    </div>
</div>
