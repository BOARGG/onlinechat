<x-layouts.auth :title="__('Two-Factor Authentication')">
    <div class="habbo-card" 
        x-cloak
        x-data="{
            showRecoveryInput: @js($errors->has('recovery_code')),
            code: '',
            recovery_code: '',
            toggleInput() {
                this.showRecoveryInput = !this.showRecoveryInput;
                this.code = '';
                this.recovery_code = '';
                $dispatch('clear-2fa-auth-code');
        
                $nextTick(() => {
                    this.showRecoveryInput
                        ? this.$refs.recovery_code?.focus()
                        : $dispatch('focus-2fa-auth-code');
                });
            },
        }"
    >
        {{-- Header --}}
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-habbo-yellow rounded-2xl mb-4 pixel-corners">
                <span class="text-4xl" x-text="showRecoveryInput ? '🔑' : '🛡️'"></span>
            </div>
            <div x-show="!showRecoveryInput">
                <h1 class="text-3xl font-bold text-habbo-blue-dark">{{ __('Authentication Code') }}</h1>
                <p class="text-gray-600 mt-2">{{ __('Enter the authentication code provided by your authenticator application.') }}</p>
            </div>
            <div x-show="showRecoveryInput">
                <h1 class="text-3xl font-bold text-habbo-blue-dark">{{ __('Recovery Code') }}</h1>
                <p class="text-gray-600 mt-2">{{ __('Please confirm access to your account by entering one of your emergency recovery codes.') }}</p>
            </div>
        </div>

        {{-- Form --}}
        <form method="POST" action="{{ route('two-factor.login.store') }}" class="space-y-6">
            @csrf

            {{-- Authentication Code Input --}}
            <div x-show="!showRecoveryInput">
                <div class="flex flex-col items-center justify-center space-y-4">
                    <x-input-otp
                        name="code"
                        digits="6"
                        autocomplete="one-time-code"
                        x-model="code"
                    />
                    @error('code')
                        <p class="text-sm text-red-600 font-semibold">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Recovery Code Input --}}
            <div x-show="showRecoveryInput">
                <label for="recovery_code" class="block text-sm font-bold text-gray-700 mb-2">
                    🔑 {{ __('Recovery Code') }}
                </label>
                <input
                    type="text"
                    id="recovery_code"
                    name="recovery_code"
                    x-ref="recovery_code"
                    x-bind:required="showRecoveryInput"
                    autocomplete="one-time-code"
                    x-model="recovery_code"
                    class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 focus:border-habbo-yellow focus:ring-4 focus:ring-habbo-yellow/20 transition-all outline-none @error('recovery_code') border-red-500 @enderror"
                    placeholder="xxxx-xxxx-xxxx-xxxx"
                >
                @error('recovery_code')
                    <p class="mt-2 text-sm text-red-600 font-semibold">{{ $message }}</p>
                @enderror
            </div>

            {{-- Submit Button --}}
            <button type="submit" class="habbo-btn-primary w-full">
                {{ __('Continue') }}
            </button>
        </form>

        {{-- Toggle Input Type --}}
        <div class="mt-6 pt-6 border-t-2 border-gray-200 text-center">
            <p class="text-gray-600 text-sm">
                {{ __('or you can') }}
                <button 
                    type="button"
                    @click="toggleInput()"
                    class="font-bold text-habbo-blue hover:text-habbo-yellow transition-colors"
                >
                    <span x-show="!showRecoveryInput">{{ __('login using a recovery code') }}</span>
                    <span x-show="showRecoveryInput">{{ __('login using an authentication code') }}</span>
                </button>
            </p>
        </div>
    </div>

    {{-- Info Box --}}
    <div class="mt-6 p-4 bg-blue-50/90 backdrop-blur-sm rounded-xl border-2 border-blue-300">
        <div class="flex items-start gap-3">
            <span class="text-2xl">ℹ️</span>
            <div class="flex-1">
                <h3 class="font-bold text-blue-800 text-sm">{{ __('Need Help?') }}</h3>
                <p class="text-xs text-blue-700 mt-1">
                    {{ __('If you lost access to your authenticator app, use a recovery code to log in.') }}
                </p>
            </div>
        </div>
    </div>
</x-layouts.auth>