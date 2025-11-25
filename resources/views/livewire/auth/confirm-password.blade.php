<x-layouts.auth :title="__('Confirm password')">
    <div class="habbo-card">
        {{-- Header --}}
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-habbo-yellow rounded-2xl mb-4 pixel-corners">
                <span class="text-4xl">🔐</span>
            </div>
            <h1 class="text-3xl font-bold text-habbo-blue-dark">{{ __('Confirm Password') }}</h1>
            <p class="text-gray-600 mt-2">{{ __('Confirm Password SubText') }}</p>
        </div>

        {{-- Session Status --}}
        @if (session('status'))
            <div class="mb-6 p-4 rounded-lg bg-blue-50 border-2 border-blue-500">
                <p class="text-sm text-blue-700 font-semibold text-center">{{ session('status') }}</p>
            </div>
        @endif

        {{-- Form --}}
        <form method="POST" action="{{ route('password.confirm.store') }}" class="space-y-6">
            @csrf

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

            {{-- Submit Button --}}
            <button type="submit" class="habbo-btn-primary w-full" data-test="confirm-password-button">
                {{ __('Confirm') }}
            </button>
        </form>
    </div>
</x-layouts.auth>