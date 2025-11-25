<?php
use Livewire\Volt\Component;

new class extends Component {
    public string $appearance = 'system';

    public function mount(): void
    {
        // Lade die gespeicherte Präferenz aus Cookie oder Session
        $this->appearance = request()->cookie('flux_appearance', 'system');
    }

    public function updateAppearance(): void
    {
        $this->validate([
            'appearance' => ['required', 'in:light,dark,system'],
        ]);

        // Speichere in Cookie für 1 Jahr
        cookie()->queue('flux_appearance', $this->appearance, 525600);

        $this->dispatch('appearance-updated');
    }
}; ?>

<section class="w-full">
    <x-settings.layout :heading="__('Appearance')" :subheading="__('Update the appearance settings for your account')">
        <div class="space-y-6">
            {{-- Appearance Selector --}}
            <div class="habbo-card">
                <h3 class="text-lg font-bold text-habbo-blue-dark mb-4 flex items-center gap-2">
                    <span class="text-2xl">🎨</span>
                    {{ __('Theme Selection') }}
                </h3>
                
                <form wire:submit="updateAppearance" class="space-y-6">
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                        {{-- Light Mode --}}
                        <label class="relative cursor-pointer group">
                            <input 
                                type="radio" 
                                name="appearance" 
                                value="light" 
                                wire:model.live="appearance"
                                class="peer sr-only"
                            >
                            <div class="p-4 rounded-lg border-3 transition-all peer-checked:border-habbo-yellow peer-checked:bg-habbo-yellow/10 hover:border-habbo-yellow-dark border-gray-300 peer-checked:shadow-lg">
                                <div class="flex flex-col items-center gap-3 text-center">
                                    <div class="w-12 h-12 rounded-lg bg-yellow-100 flex items-center justify-center text-2xl transition-transform peer-checked:scale-110">
                                        ☀️
                                    </div>
                                    <div>
                                        <div class="font-bold text-gray-800">{{ __('Light Mode') }}</div>
                                        <div class="text-xs text-gray-600 mt-1">{{ __('Bright theme') }}</div>
                                    </div>
                                    <div class="opacity-0 peer-checked:opacity-100 transition-opacity">
                                        <span class="text-green-600 font-bold text-sm">✓ {{ __('Active') }}</span>
                                    </div>
                                </div>
                            </div>
                        </label>

                        {{-- Dark Mode --}}
                        <label class="relative cursor-pointer group">
                            <input 
                                type="radio" 
                                name="appearance" 
                                value="dark" 
                                wire:model.live="appearance"
                                class="peer sr-only"
                            >
                            <div class="p-4 rounded-lg border-3 transition-all peer-checked:border-habbo-yellow peer-checked:bg-habbo-yellow/10 hover:border-habbo-yellow-dark border-gray-300 peer-checked:shadow-lg">
                                <div class="flex flex-col items-center gap-3 text-center">
                                    <div class="w-12 h-12 rounded-lg bg-blue-900 flex items-center justify-center text-2xl transition-transform peer-checked:scale-110">
                                        🌙
                                    </div>
                                    <div>
                                        <div class="font-bold text-gray-800">{{ __('Dark Mode') }}</div>
                                        <div class="text-xs text-gray-600 mt-1">{{ __('Dark theme') }}</div>
                                    </div>
                                    <div class="opacity-0 peer-checked:opacity-100 transition-opacity">
                                        <span class="text-green-600 font-bold text-sm">✓ {{ __('Active') }}</span>
                                    </div>
                                </div>
                            </div>
                        </label>

                        {{-- System Mode --}}
                        <label class="relative cursor-pointer group">
                            <input 
                                type="radio" 
                                name="appearance" 
                                value="system" 
                                wire:model.live="appearance"
                                class="peer sr-only"
                            >
                            <div class="p-4 rounded-lg border-3 transition-all peer-checked:border-habbo-yellow peer-checked:bg-habbo-yellow/10 hover:border-habbo-yellow-dark border-gray-300 peer-checked:shadow-lg">
                                <div class="flex flex-col items-center gap-3 text-center">
                                    <div class="w-12 h-12 rounded-lg bg-gray-200 flex items-center justify-center text-2xl transition-transform peer-checked:scale-110">
                                        💻
                                    </div>
                                    <div>
                                        <div class="font-bold text-gray-800">{{ __('System Default') }}</div>
                                        <div class="text-xs text-gray-600 mt-1">{{ __('Auto theme') }}</div>
                                    </div>
                                    <div class="opacity-0 peer-checked:opacity-100 transition-opacity">
                                        <span class="text-green-600 font-bold text-sm">✓ {{ __('Active') }}</span>
                                    </div>
                                </div>
                            </div>
                        </label>
                    </div>

                    {{-- Save Button --}}
                    <div class="flex items-center gap-4">
                        <button type="submit" class="habbo-btn-primary">
                            {{ __('Save') }}
                        </button>

                        <div 
                            x-data="{ shown: false, timeout: null }"
                            x-init="
                                @this.on('appearance-updated', () => {
                                    clearTimeout(timeout);
                                    shown = true;
                                    
                                    // Update Flux appearance
                                    if (window.$flux) {
                                        window.$flux.appearance = '{{ $this->appearance }}';
                                    }
                                    
                                    timeout = setTimeout(() => { shown = false }, 2000);
                                })
                            "
                            x-show="shown"
                            x-transition
                            class="text-sm font-semibold text-green-600"
                            style="display: none;"
                        >
                            ✓ {{ __('Saved.') }}
                        </div>
                    </div>
                </form>
            </div>

            {{-- Current Theme Display --}}
            <div class="p-4 bg-blue-50 border-2 border-blue-300 rounded-lg">
                <div class="flex items-start gap-3">
                    <span class="text-2xl">ℹ️</span>
                    <div class="flex-1">
                        <h4 class="font-bold text-blue-900 text-sm">{{ __('Current Theme') }}</h4>
                        <p class="text-sm text-blue-800 mt-1">
                            {{ __('Currently using') }}: 
                            <span class="font-bold">
                                @if($appearance === 'light')
                                    ☀️ {{ __('Light Mode') }}
                                @elseif($appearance === 'dark')
                                    🌙 {{ __('Dark Mode') }}
                                @else
                                    💻 {{ __('System Default') }}
                                @endif
                            </span>
                        </p>
                        <p class="text-xs text-blue-700 mt-2">
                            {{ __('Your theme preference will be saved and applied across all your devices.') }}
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </x-settings.layout>
</section>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialisiere Flux Appearance beim Laden
        if (window.$flux && @js($appearance)) {
            window.$flux.appearance = @js($appearance);
        }
    });
</script>
@endpush