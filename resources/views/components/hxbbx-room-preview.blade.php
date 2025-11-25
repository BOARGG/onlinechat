@props(['roomName', 'userCount' => 0, 'roomNumber' => 1, 'href' => '#'])

<a 
    href="{{ $href }}" 
    {{ $attributes->merge(['class' => 'group relative aspect-video overflow-hidden rounded-lg border-4 border-habbo-yellow hover:border-habbo-yellow-light transition-all cursor-pointer block']) }}
>
    {{-- Room Background --}}
    <div class="absolute inset-0 bg-gradient-to-br from-habbo-blue-light to-habbo-blue flex items-center justify-center">
        <div class="text-center text-white">
            <div class="text-4xl mb-2">🏠</div>
            <div class="font-bold text-lg">{{ $roomName ?? 'Room #' . $roomNumber }}</div>
            <div class="text-sm opacity-80 mt-1">
                👥 {{ trans_choice('messages.users', $userCount, ['count' => $userCount]) }}
            </div>
        </div>
    </div>
    
    {{-- Hover Overlay --}}
    <div class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-colors flex items-center justify-center">
        <div class="opacity-0 group-hover:opacity-100 transition-opacity">
            <div class="bg-white text-habbo-blue-dark px-4 py-2 rounded-lg font-bold shadow-lg">
                {{ __('Enter Room') }}
            </div>
        </div>
    </div>
    
    {{-- Room Badge --}}
    <div class="absolute top-2 right-2 bg-habbo-yellow px-3 py-1 rounded-lg border-2 border-habbo-yellow-dark text-white font-bold text-sm shadow-md">
        #{{ $roomNumber }}
    </div>
</a>