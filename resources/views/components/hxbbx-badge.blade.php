@props(['icon' => '⭐', 'text', 'color' => 'yellow'])

@php
    $colorClasses = [
        'yellow' => 'bg-habbo-yellow border-habbo-yellow-dark text-white',
        'blue' => 'bg-habbo-blue border-habbo-blue-dark text-white',
        'red' => 'bg-habbo-red border-habbo-red-dark text-white',
        'green' => 'bg-habbo-green border-habbo-green-dark text-white',
        'pink' => 'bg-habbo-pink border-habbo-pink-dark text-white',
        'purple' => 'bg-habbo-purple border-habbo-purple-dark text-white',
        'cream' => 'bg-habbo-cream border-yellow-600 text-habbo-blue-dark',
    ];
    $classes = $colorClasses[$color] ?? $colorClasses['yellow'];
@endphp

<div {{ $attributes->merge(['class' => 'inline-flex items-center gap-2 px-4 py-2 rounded-lg border-2 font-bold shadow-md ' . $classes]) }}>
    <span class="text-lg">{{ $icon }}</span>
    <span>{{ $text }}</span>
</div>