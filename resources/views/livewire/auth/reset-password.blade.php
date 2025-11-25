<x-layouts.auth :title="__('Reset password')">
    <div class="habbo-card">
        {{-- Header --}}
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-habbo-yellow rounded-2xl mb-4 pixel-corners">
                <span class="text-4xl">🔄</span>
            </div>
            <h1 class="text-3xl font-bold text-habbo-blue-dark">{{ __('Reset password') }}</h1>
            <p class="text-gray-600 mt-2">{{ __('Please enter your new password below') }}</p>
        </div>

        {{-- Session Status --}}
        @if (session('status'))
            <div class="mb-6 p-4 rounded-lg bg-green-50 border-2 border-green-500">
                <p class="text-sm text-green-700 font-semibold text-center">{{ session('status') }}</p>
            </div>
        @endif

        {{-- Form --}}
        <form method="POST" action="{{ route('password.update') }}" class="space-y-5">
            @csrf
            <input type="hidden" name="token" value="{{ request()->route('token') }}">

            {{-- Email --}}
            <div>
                <label for="email" class="block text-sm font-bold text-gray-700 mb-2">
                    📧 {{ __('Email') }}
                </label>
                <input 
                    id="email"
                    type="email" 
                    name="email"
                    value="{{ request('email') }}"
                    required
                    autocomplete="email"
                    class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 focus:border-habbo-yellow focus:ring-4 focus:ring-habbo-yellow/20 transition-all outline-none @error('email') border-red-500 @enderror"
                    placeholder="your@email.com"
                >
                @error('email')
                    <p class="mt-2 text-sm text-red-600 font-semibold">{{ $message }}</p>
                @enderror
            </div>

            {{-- Password --}}
            <div>
                <label for="password" class="block text-sm font-bold text-gray-700 mb-2">
                    🔒 {{ __('Password') }}
                </label>
                <input 
                    id="password"
                    type="password" 
                    name="password"
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
                    🔒 {{ __('Confirm password') }}
                </label>
                <input 
                    id="password_confirmation"
                    type="password" 
                    name="password_confirmation"
                    required
                    autocomplete="new-password"
                    class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 focus:border-habbo-yellow focus:ring-4 focus:ring-habbo-yellow/20 transition-all outline-none"
                    placeholder="••••••••"
                >
            </div>

            {{-- Submit Button --}}
            <button type="submit" class="habbo-btn-primary w-full" data-test="reset-password-button">
                {{ __('Reset password') }}
            </button>
        </form>
    </div>
</x-layouts.auth>