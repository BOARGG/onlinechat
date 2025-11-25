<x-layouts.auth :title="__('Register')">
    <div class="habbo-card">
        {{-- Header --}}
        <div class="text-center mb-8">
            <div
                class="inline-flex items-center justify-center w-20 h-20 bg-habbo-yellow rounded-2xl mb-4 pixel-corners">
                <span class="text-4xl">🎉</span>
            </div>
            <h1 class="text-3xl font-bold text-habbo-blue-dark">{{ __('Join the') }} {{ config('app.name') }}!</h1>
            <p class="text-gray-600 mt-2">{{ __('Create your free account') }}</p>
        </div>

        {{-- Register Form --}}
        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf

            {{-- Name --}}
            <div>
                <label for="name" class="block text-sm font-bold text-gray-700 mb-2">
                    👤 {{ __('Username') }}
                </label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                    autocomplete="name"
                    class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 focus:border-habbo-yellow focus:ring-4 focus:ring-habbo-yellow/20 transition-all outline-none @error('name') border-red-500 @enderror"
                    placeholder="{{ __('Choose Username') }}">
                @error('name')
                    <p class="mt-2 text-sm text-red-600 font-semibold">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email --}}
            <div>
                <label for="email" class="block text-sm font-bold text-gray-700 mb-2">
                    📧 {{ __('Email Address') }}

                </label>
                <p class="text-xs text-gray-500 mb-1">
                    {{ __('You need a valid email to verify your account and gain full access') }}</p>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required
                    autocomplete="username"
                    class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 focus:border-habbo-yellow focus:ring-4 focus:ring-habbo-yellow/20 transition-all outline-none @error('email') border-red-500 @enderror"
                    placeholder="{{ __('your@email.com') }}">
                @error('email')
                    <p class="mt-2 text-sm text-red-600 font-semibold">{{ $message }}</p>
                @enderror
            </div>

            {{-- Password --}}
            <div>
                <label for="password" class="block text-sm font-bold text-gray-700 mb-2">
                    🔒 {{ __('Password') }}
                </label>
                <p class="text-xs text-gray-500 mb-1">
                    {{ __('Choose a strong password to protect your account') }}<br>
                    {{ __('It should be at least 8 characters long') }}<br>
                    {{ __('include a mix of letters, numbers, and special characters') }}<br>
                </p>
                <input id="password" type="password" name="password" required autocomplete="new-password"
                    class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 focus:border-habbo-yellow focus:ring-4 focus:ring-habbo-yellow/20 transition-all outline-none @error('password') border-red-500 @enderror"
                    placeholder="{{ __('Choose Password') }}">
                @error('password')
                    <p class="mt-2 text-sm text-red-600 font-semibold">{{ $message }}</p>
                @enderror
            </div>

            {{-- Confirm Password --}}
            <div>
                <label for="password_confirmation" class="block text-sm font-bold text-gray-700 mb-2">
                    🔒 {{ __('Confirm Password') }}
                </label>
                <input id="password_confirmation" type="password" name="password_confirmation" required
                    autocomplete="new-password"
                    class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 focus:border-habbo-yellow focus:ring-4 focus:ring-habbo-yellow/20 transition-all outline-none"
                    placeholder="{{ __('Confirm yPassword') }}">
            </div>

            {{-- Terms Agreement --}}
            <div class="flex items-start">
                <input type="checkbox" id="terms" required
                    class="w-5 h-5 mt-0.5 rounded border-2 border-gray-300 text-habbo-yellow focus:ring-4 focus:ring-habbo-yellow/20 transition-all cursor-pointer">
                <label for="terms" class="ml-2 text-sm text-gray-700">
                    {!! __('I agree to the :terms and :privacy.', [
                        'terms' =>
                            '<a href="' .
                            url('terms') .
                            '" class="font-semibold text-habbo-blue hover:text-habbo-yellow transition-colors">' .
                            __('Terms of Use') .
                            '</a>',
                        'privacy' =>
                            '<a href="' .
                            url('privacy_policy') .
                            '" class="font-semibold text-habbo-blue hover:text-habbo-yellow transition-colors">' .
                            __('Privacy Policy') .
                            '</a>',
                    ]) !!}
                </label>

            </div>

            {{-- Register Button --}}
            <div>
                <button type="submit" class="habbo-btn-primary w-full py-3 font-bold text-lg">
                    {{ __('Create an account') }} 🎉
                </button>
            </div>
        </form>

        {{-- Login Link --}}
        <div class="mt-6 pt-6 border-t-2 border-gray-200 text-center">
            <p class="text-gray-600">
                {{ __('Already have an account') }}
                <a href="{{ route('login') }}"
                    class="font-bold text-habbo-blue hover:text-habbo-yellow transition-colors">
                    {{ __('Log in here') }}
                </a>
            </p>
        </div>
    </div>
</x-layouts.auth>
