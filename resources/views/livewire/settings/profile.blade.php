<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Volt\Component;

new class extends Component {
    public string $name = '';
    public string $email = '';

    public function mount(): void
    {
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
    }

    public function updateProfileInformation(): void
    {
        $user = Auth::user();

        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($user->id)
            ],
        ]);

        $user->fill($validated);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        $this->dispatch('profile-updated', name: $user->name);
    }

    public function resendVerificationNotification(): void
    {
        $user = Auth::user();

        if ($user->hasVerifiedEmail()) {
            $this->redirectIntended(default: route('dashboard', absolute: false));
            return;
        }

        $user->sendEmailVerificationNotification();

        Session::flash('status', 'verification-link-sent');
    }
}; ?>

<section class="w-full">
    <x-settings.layout :title="__('Profile')" :heading="__('Profile')" :subheading="__('Update your name and email address')">
        <form wire:submit="updateProfileInformation" class="space-y-6">
            {{-- Name --}}
            <div>
                <label for="name" class="block text-sm font-bold text-gray-700 mb-2">
                    👤 {{ __('Name') }}
                </label>
                <input 
                    id="name"
                    type="text" 
                    wire:model="name"
                    required
                    autofocus
                    autocomplete="name"
                    class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 focus:border-habbo-yellow focus:ring-4 focus:ring-habbo-yellow/20 transition-all outline-none @error('name') border-red-500 @enderror"
                    placeholder="{{ __('Your Habbo name') }}"
                >
                @error('name')
                    <p class="mt-2 text-sm text-red-600 font-semibold">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email --}}
            <div>
                <label for="email" class="block text-sm font-bold text-gray-700 mb-2">
                    📧 {{ __('Email') }}
                </label>
                <input 
                    id="email"
                    type="email" 
                    wire:model="email"
                    required
                    autocomplete="email"
                    class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 focus:border-habbo-yellow focus:ring-4 focus:ring-habbo-yellow/20 transition-all outline-none @error('email') border-red-500 @enderror"
                    placeholder="your@email.com"
                >
                @error('email')
                    <p class="mt-2 text-sm text-red-600 font-semibold">{{ $message }}</p>
                @enderror

                {{-- Email Verification Notice --}}
                @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail &&! auth()->user()->hasVerifiedEmail())
                    <div class="mt-4 p-4 bg-orange-50 border-2 border-orange-300 rounded-lg">
                        <div class="flex items-start gap-3">
                            <span class="text-xl">⚠️</span>
                            <div class="flex-1">
                                <p class="text-sm font-semibold text-orange-900">
                                    {{ __('Your email address is unverified.') }}
                                </p>
                                <button 
                                    type="button"
                                    wire:click.prevent="resendVerificationNotification"
                                    class="mt-2 text-sm font-bold text-habbo-blue hover:text-habbo-yellow transition-colors underline"
                                >
                                    {{ __('Click here to re-send the verification email.') }}
                                </button>

                                @if (session('status') === 'verification-link-sent')
                                    <p class="mt-2 text-sm font-semibold text-green-700">
                                        ✓ {{ __('A new verification link has been sent to your email address.') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            {{-- Submit Button --}}
            <div class="flex items-center gap-4">
                <button type="submit" class="habbo-btn-primary" data-test="update-profile-button">
                    {{ __('Save') }}
                </button>

                <div 
                    x-data="{ shown: false, timeout: null }"
                    x-init="
                        @this.on('profile-updated', () => {
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
        </form>

        {{-- Delete Account Section --}}
        <livewire:settings.delete-user-form />
    </x-settings.layout>
</section>