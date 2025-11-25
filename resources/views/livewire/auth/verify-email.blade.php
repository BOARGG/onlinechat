<x-layouts.auth :title="__('Verify Email')">
    <div class="habbo-card">
        {{-- Header --}}
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-habbo-yellow rounded-2xl mb-4 pixel-corners">
                <span class="text-4xl">📧</span>
            </div>
            <h1 class="text-3xl font-bold text-habbo-blue-dark">{{ __('Verify Your Email') }}</h1>
        </div>

        {{-- Message --}}
        <div class="p-4 bg-blue-50 border-2 border-blue-300 rounded-lg mb-6">
            <div class="flex items-start gap-3">
                <span class="text-2xl">✉️</span>
                <div class="flex-1">
                    <p class="text-sm text-blue-800">
                        {{ __('Please verify your email address by clicking on the link we just emailed to you.') }}
                    </p>
                </div>
            </div>
        </div>

        {{-- Success Status --}}
        @if (session('status') == 'verification-link-sent')
            <div class="mb-6 p-4 rounded-lg bg-green-50 border-2 border-green-500">
                <div class="flex items-center gap-2">
                    <span class="text-xl">✅</span>
                    <p class="text-sm text-green-700 font-semibold">
                        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                    </p>
                </div>
            </div>
        @endif

        {{-- Actions --}}
        <div class="space-y-3">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="habbo-btn-primary w-full">
                    {{ __('Resend verification email') }}
                </button>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button 
                    type="submit" 
                    class="w-full px-6 py-3 rounded-lg font-bold text-base transition-all bg-gray-200 text-gray-700 hover:bg-gray-300"
                    data-test="logout-button"
                >
                    {{ __('Log out') }}
                </button>
            </form>
        </div>
    </div>

    {{-- Help Info --}}
    <div class="mt-6 p-4 bg-yellow-50/90 backdrop-blur-sm rounded-xl border-2 border-yellow-300">
        <div class="flex items-start gap-3">
            <span class="text-2xl">💡</span>
            <div class="flex-1">
                <h3 class="font-bold text-yellow-800 text-sm">{{ __('Didn\'t receive the email?') }}</h3>
                <p class="text-xs text-yellow-700 mt-1">
                    {{ __('Check your spam folder or click the button above to resend the verification email.') }}
                </p>
            </div>
        </div>
    </div>
</x-layouts.auth>