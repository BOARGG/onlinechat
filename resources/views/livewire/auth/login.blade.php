<x-layouts.auth :title="__('Login')">
    <div class="habbo-card">
        {{-- Header --}}
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-habbo-yellow rounded-2xl mb-4 pixel-corners">
                <span class="text-4xl">🔑</span>
            </div>
            <h1 class="text-3xl font-bold text-habbo-blue-dark">{{ __('Welcome Back') }}</h1>
            <p class="text-gray-600 mt-2">{{ __('Log in and have fun') }}</p>
        </div>

        {{-- Session Status --}}
        @if (session('status'))
            <div class="mb-6 p-4 rounded-lg bg-green-50 border-2 border-green-500">
                <p class="text-sm text-green-700 font-semibold">{{ session('status') }}</p>
            </div>
        @endif

        {{-- Login Form --}}
        <form method="POST" action="{{ route('login') }}" class="space-y-5">
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
                    autocomplete="username"
                    class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 focus:border-habbo-yellow focus:ring-4 focus:ring-habbo-yellow/20 transition-all outline-none @error('email') border-red-500 @enderror"
                    placeholder="{{ __('your@email.com') }}"
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
                    autocomplete="current-password"
                    class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 focus:border-habbo-yellow focus:ring-4 focus:ring-habbo-yellow/20 transition-all outline-none @error('password') border-red-500 @enderror"
                    placeholder="••••••••"
                >
                @error('password')
                    <p class="mt-2 text-sm text-red-600 font-semibold">{{ $message }}</p>
                @enderror
            </div>

            {{-- Remember Me --}}
            <div class="flex items-center justify-between">
                <label class="flex items-center cursor-pointer group">
                    <input 
                        type="checkbox" 
                        name="remember" 
                        class="w-5 h-5 rounded border-2 border-gray-300 text-habbo-yellow focus:ring-4 focus:ring-habbo-yellow/20 transition-all cursor-pointer"
                    >
                    <span class="ml-2 text-sm font-semibold text-gray-700 group-hover:text-habbo-blue transition-colors">
                        {{ __('Remember me') }}
                    </span>
                </label>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm font-semibold text-habbo-blue hover:text-habbo-yellow transition-colors">
                        {{ __('Forgot password') }}
                    </a>
                @endif
            </div>

            {{-- Submit Button --}}
            <button type="submit" class="habbo-btn-primary w-full text-lg">
                🚀 {{ __('Check In') }}
            </button>
        </form>

        {{-- Register Link --}}
        <div class="mt-6 pt-6 border-t-2 border-gray-200 text-center">
            <p class="text-gray-600">
                {{ __('New here') }}
                <a href="{{ route('register') }}" class="font-bold text-habbo-blue hover:text-habbo-yellow transition-colors">
                    {{ __("Register now") }}
                </a>
            </p>
        </div>
    </div>

    {{-- Safety Notice --}}
    <div class="mt-6 p-4 bg-red-50/90 backdrop-blur-sm rounded-xl border-2 border-red-300">
        <div class="flex items-start gap-3">
            <span class="text-2xl">⚠️</span>
            <div class="flex-1">
                <h3 class="font-bold text-red-800 text-sm">{{ __("Safety Reminder") }}</h3>
                <p class="text-xs text-red-700 mt-1">
                    {{ __("Staff will never ask for your password") }}
                </p>
            </div>
        </div>
    </div>
</x-layouts.auth>