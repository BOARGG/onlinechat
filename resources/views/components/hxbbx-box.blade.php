@props(['type' => 'blue', 'title' => null, 'icon' => null])

@php
    $typeClasses = [
        'blue' => 'habbo-box-blue',
        'yellow' => 'habbo-box-yellow',
        'cream' => 'habbo-box-cream',
    ];
    $boxClass = $typeClasses[$type] ?? $typeClasses['blue'];
    
    $textColor = $type === 'cream' ? 'text-habbo-blue-dark' : 'text-white';
@endphp

<div {{ $attributes->merge(['class' => $boxClass . ' p-6']) }}>
    @if($title || $icon)
        <div class="flex items-center gap-3 mb-4">
            @if($icon)
                <span class="text-3xl">{{ $icon }}</span>
            @endif
            @if($title)
                <h3 class="text-xl font-bold {{ $textColor }}">{{ $title }}</h3>
            @endif
        </div>
    @endif
    
    <div class="{{ $textColor }}">
        {{ $slot }}
    </div>
</div>