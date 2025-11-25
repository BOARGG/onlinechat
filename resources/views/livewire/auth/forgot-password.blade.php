<x-layouts.auth :title="__('Forgot password')">
    <div class="habbo-card">
        {{-- Header --}}
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-habbo-yellow rounded-2xl mb-4 pixel-corners">
                <span class="text-4xl">🔑</span>
            </div>
            <h1 class="text-3xl font-bold text-habbo-blue-dark">{{ __('Forgot password') }}</h1>
            <p class="text-gray-600 mt-2">{{ __('Enter your email to receive a password reset link') }}</p>
        </div>

        {{-- Session Status --}}
        @if (session('status'))
            <div class="mb-6 p-4 rounded-lg bg-green-50 border-2 border-green-500">
                <div class="flex items-center justify-center gap-2">
                    <span class="text-xl">✅</span>
                    <p class="text-sm text-green-700 font-semibold">{{ session('status') }}</p>
                </div>
            </div>
        @endif

        {{-- Form --}}
        <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
            @csrf

            {{-- Email --}}
            <div>
                <label for="email" class="block text-sm font-bold text-gray-700 mb-2">
                    📧 {{ __('Email Address') }}
                </label>
                <input 
                    id="email"
                    type="email" 
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 focus:border-habbo-yellow focus:ring-4 focus:ring-habbo-yellow/20 transition-all outline-none @error('email') border-red-500 @enderror"
                    placeholder="your@email.com"
                >
                @error('email')
                    <p class="mt-2 text-sm text-red-600 font-semibold">{{ $message }}</p>
                @enderror
            </div>

            {{-- Submit Button --}}
            <button type="submit" class="habbo-btn-primary w-full" data-test="email-password-reset-link-button">
                {{ __('Email password reset link') }}
            </button>
        </form>

        {{-- Back to Login --}}
        <div class="mt-6 pt-6 border-t-2 border-gray-200 text-center">
            <p class="text-gray-600">
                {{ __('Or, return to') }}
                <a href="{{ route('login') }}" wire:navigate class="font-bold text-habbo-blue hover:text-habbo-yellow transition-colors">
                    {{ __('log in') }}
                </a>
            </p>
        </div>
    </div>
</x-layouts.auth>