@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'p-4 rounded-lg bg-green-50 border-2 border-green-500']) }}>
        <div class="flex items-center justify-center gap-2">
            <span class="text-xl">✅</span>
            <p class="text-sm text-green-700 font-semibold">{{ $status }}</p>
        </div>
    </div>
@endif