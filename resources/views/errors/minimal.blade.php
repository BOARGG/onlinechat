<x-layouts.app :title="__('ERROR')">
    <div class="max-w-4xl mx-auto habbo-box-red border-4 p-8 text-center">
        <div class="text-6xl font-bold text-white mb-4">{{ __('Page Not Found') }}</div>
        <h1 class="text-3xl font-bold text-white mb-2">{{ __('Oops.. Something went wrong') }}</h1>
        <p class="text-white/90 mb-6">
            {{ __("Sorry, the page you're looking for doesn't exist or has been moved") }}
        </p>
        <a href="{{ url('/') }}" class="habbo-btn-primary py-3 px-6 text-xl">
            🏠 {{ __('Return to Home') }}
        </a>
    </div>
</x-layouts.app>
