<?php

use Laravel\Fortify\Actions\GenerateNewRecoveryCodes;
use Livewire\Attributes\Locked;
use Livewire\Volt\Component;

new class extends Component {
    #[Locked]
    public array $recoveryCodes = [];

    public function mount(): void
    {
        $this->loadRecoveryCodes();
    }

    public function regenerateRecoveryCodes(GenerateNewRecoveryCodes $generateNewRecoveryCodes): void
    {
        $generateNewRecoveryCodes(auth()->user());
        $this->loadRecoveryCodes();
    }

    private function loadRecoveryCodes(): void
    {
        $user = auth()->user();

        if ($user->hasEnabledTwoFactorAuthentication() && $user->two_factor_recovery_codes) {
            try {
                $this->recoveryCodes = json_decode(decrypt($user->two_factor_recovery_codes), true);
            } catch (Exception) {
                $this->addError('recoveryCodes', 'Failed to load recovery codes');
                $this->recoveryCodes = [];
            }
        }
    }
}; ?>

<div 
    class="habbo-card"
    wire:cloak
    x-data="{ showRecoveryCodes: false }"
>
    {{-- Header --}}
    <div class="flex items-start gap-4 mb-6">
        <div class="w-12 h-12 rounded-lg bg-habbo-yellow flex items-center justify-center flex-shrink-0">
            <span class="text-2xl">🔑</span>
        </div>
        <div class="flex-1">
            <h3 class="text-xl font-bold text-habbo-blue-dark">{{ __('2FA Recovery Codes') }}</h3>
            <p class="text-gray-600 text-sm mt-1">
                {{ __('Recovery codes let you regain access if you lose your 2FA device. Store them in a secure password manager.') }}
            </p>
        </div>
    </div>

    {{-- Actions --}}
    <div class="flex flex-col sm:flex-row gap-3 mb-6">
        <button
            type="button"
            x-show="!showRecoveryCodes"
            @click="showRecoveryCodes = true"
            class="habbo-btn-primary flex items-center justify-center gap-2"
            aria-expanded="false"
            aria-controls="recovery-codes-section"
        >
            <span class="text-xl">👁️</span>
            {{ __('View Recovery Codes') }}
        </button>

        <button
            type="button"
            x-show="showRecoveryCodes"
            @click="showRecoveryCodes = false"
            class="habbo-btn-secondary flex items-center justify-center gap-2"
            aria-expanded="true"
            aria-controls="recovery-codes-section"
        >
            <span class="text-xl">🙈</span>
            {{ __('Hide Recovery Codes') }}
        </button>

        @if (filled($recoveryCodes))
            <button
                type="button"
                x-show="showRecoveryCodes"
                wire:click="regenerateRecoveryCodes"
                class="px-6 py-3 rounded-lg font-bold text-base transition-all bg-habbo-blue text-white hover:bg-habbo-blue-light shadow-md flex items-center justify-center gap-2"
            >
                <span class="text-xl">🔄</span>
                {{ __('Regenerate Codes') }}
            </button>
        @endif
    </div>

    {{-- Recovery Codes Display --}}
    <div
        x-show="showRecoveryCodes"
        x-transition
        id="recovery-codes-section"
        class="space-y-4"
        x-bind:aria-hidden="!showRecoveryCodes"
    >
        @error('recoveryCodes')
            <div class="p-4 bg-red-50 border-2 border-red-300 rounded-lg">
                <div class="flex items-start gap-3">
                    <span class="text-2xl">❌</span>
                    <div class="flex-1">
                        <p class="font-bold text-red-800 text-sm">{{ $message }}</p>
                    </div>
                </div>
            </div>
        @enderror

        @if (filled($recoveryCodes))
            <div class="bg-gray-100 rounded-lg p-4 border-2 border-gray-300">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 font-mono text-sm">
                    @foreach($recoveryCodes as $code)
                        <div 
                            wire:loading.class="opacity-50 animate-pulse"
                            class="bg-white px-4 py-2 rounded border-2 border-gray-200 select-text hover:border-habbo-yellow transition-colors"
                        >
                            {{ $code }}
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="p-4 bg-yellow-50 border-2 border-yellow-300 rounded-lg">
                <div class="flex items-start gap-3">
                    <span class="text-xl">💡</span>
                    <div class="flex-1">
                        <p class="text-sm text-yellow-800">
                            {{ __('Each recovery code can be used once to access your account and will be removed after use. If you need more, click Regenerate Codes above.') }}
                        </p>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>