<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Livewire\Volt\Component;

new class extends Component {
    public string $current_password = '';
    public string $password = '';
    public string $password_confirmation = '';

    public function updatePassword(): void
    {
        try {
            $validated = $this->validate([
                'current_password' => ['required', 'string', 'current_password'],
                'password' => ['required', 'string', Password::defaults(), 'confirmed'],
            ]);
        } catch (ValidationException $e) {
            $this->reset('current_password', 'password', 'password_confirmation');
            throw $e;
        }

        Auth::user()->update([
            'password' => $validated['password'],
        ]);

        $this->reset('current_password', 'password', 'password_confirmation');
        $this->dispatch('password-updated');
    }
}; ?>

<section class="w-full">
    <x-settings.layout :heading="__('Update password')" :subheading="__('Ensure your account is using a long, random password to stay secure')">
        <form method="POST" wire:submit="updatePassword" class="space-y-6">
            {{-- Current Password --}}
            <div>
                <label for="current_password" class="block text-sm font-bold text-gray-700 mb-2">
                    🔒 {{ __('Current password') }}
                </label>
                <input 
                    id="current_password"
                    type="password" 
                    wire:model="current_password"
                    required
                    autocomplete="current-password"
                    class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 focus:border-habbo-yellow focus:ring-4 focus:ring-habbo-yellow/20 transition-all outline-none @error('current_password') border-red-500 @enderror"
                    placeholder="••••••••"
                >
                @error('current_password')
                    <p class="mt-2 text-sm text-red-600 font-semibold">{{ $message }}</p>
                @enderror
            </div>

            {{-- New Password --}}
            <div>
                <label for="password" class="block text-sm font-bold text-gray-700 mb-2">
                    🔑 {{ __('New password') }}
                </label>
                <input 
                    id="password"
                    type="password" 
                    wire:model="password"
                    required
                    autocomplete="new-password"
                    class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 focus:border-habbo-yellow focus:ring-4 focus:ring-habbo-yellow/20 transition-all outline-none @error('password') border-red-500 @enderror"
                    placeholder="••••••••"
                >
                @error('password')
                    <p class="mt-2 text-sm text-red-600 font-semibold">{{ $message }}</p>
                @enderror
            </div>

            {{-- Confirm Password --}}
            <div>
                <label for="password_confirmation" class="block text-sm font-bold text-gray-700 mb-2">
                    🔒 {{ __('Confirm Password') }}
                </label>
                <input 
                    id="password_confirmation"
                    type="password" 
                    wire:model="password_confirmation"
                    required
                    autocomplete="new-password"
                    class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 focus:border-habbo-yellow focus:ring-4 focus:ring-habbo-yellow/20 transition-all outline-none"
                    placeholder="••••••••"
                >
            </div>

            {{-- Submit Button --}}
            <div class="flex items-center gap-4">
                <button type="submit" class="habbo-btn-primary" data-test="update-password-button">
                    {{ __('Save') }}
                </button>

                <div 
                    x-data="{ shown: false, timeout: null }"
                    x-init="
                        @this.on('password-updated', () => {
                            clearTimeout(timeout);
                            shown = true;
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

            {{-- Security Info --}}
            <div class="mt-6 p-4 bg-yellow-50 border-2 border-yellow-300 rounded-lg">
                <div class="flex items-start gap-3">
                    <span class="text-2xl">💡</span>
                    <div class="flex-1">
                        <h4 class="font-bold text-yellow-900 text-sm">{{ __('Password Tips') }}</h4>
                        <ul class="text-sm text-yellow-800 mt-2 space-y-1">
                            <li>• {{ __('Use at least 8 characters') }}</li>
                            <li>• {{ __('Mix uppercase and lowercase letters') }}</li>
                            <li>• {{ __('Include numbers and special characters') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </form>
    </x-settings.layout>
</section>