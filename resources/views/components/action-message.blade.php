@props(['on'])

<div 
    x-data="{ shown: false, timeout: null }"
    x-init="
        @this.on('{{ $on }}', () => {
            clearTimeout(timeout);
            shown = true;
            timeout = setTimeout(() => { shown = false }, 2000);
        })
    "
    x-show="shown"
    x-transition
    {{ $attributes->merge(['class' => 'text-sm font-semibold text-green-600']) }}
    style="display: none;"
>
    {{ $slot->isEmpty() ? '✓ Saved.' : $slot }}
</div>