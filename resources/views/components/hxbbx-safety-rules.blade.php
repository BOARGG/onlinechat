<div class="habbo-card">
    <h2 class="text-2xl font-bold text-habbo-blue-dark mb-4 flex items-center gap-2">
        🛡️ {{ __('Safety & Rules') }}
    </h2>
    <div class="space-y-4">
        <div class="p-4 bg-red-50 border-2 border-red-300 rounded-lg">
            <div class="flex items-start gap-3">
                <div class="text-2xl">⚠️</div>
                <div>
                    <h3 class="font-bold text-red-800">{{ __('Safety Reminder') }}</h3>
                    <p class="text-sm text-red-700 mt-1">
                        {{ __('Staff will never ask for your password') }}
                    </p>
                </div>
            </div>
        </div>

        <div class="space-y-3">
            <div class="flex items-start gap-3">
                <span class="text-xl">✅</span>
                <div class="text-sm text-gray-700">
                    <span class="font-bold">{{ __('Do:') }}</span> {{ __('Be respectful and kind to everyone') }}
                </div>
            </div>
            <div class="flex items-start gap-3">
                <span class="text-xl">✅</span>
                <div class="text-sm text-gray-700">
                    <span class="font-bold">{{ __('Do:') }}</span> {{ __('Report suspicious behavior') }}
                </div>
            </div>
            <div class="flex items-start gap-3">
                <span class="text-xl">✅</span>
                <div class="text-sm text-gray-700">
                    <span class="font-bold">{{ __('Do:') }}</span> {{ __('Have fun and make friends!') }}
                </div>
            </div>
            <hr class="my-2 border-gray-300">
            <div class="flex items-start gap-3">
                <span class="text-xl">❌</span>
                <div class="text-sm text-gray-700">
                    <span class="font-bold">{{ __("Don't:") }}</span> {{ __('Share personal information') }}
                </div>
            </div>
            <div class="flex items-start gap-3">
                <span class="text-xl">❌</span>
                <div class="text-sm text-gray-700">
                    <span class="font-bold">{{ __("Don't:") }}</span> {{ __('Bully or harass others') }}
                </div>
            </div>
            <div class="flex items-start gap-3">
                <span class="text-xl">❌</span>
                <div class="text-sm text-gray-700">
                    <span class="font-bold">{{ __("Don't:") }}</span> {{ __('Scam or trade unfairly') }}
                </div>
            </div>
        </div>

        <button class="habbo-btn-primary w-full mt-4">
            📜 {{ __('Read Full Rules') }}
        </button>
    </div>
</div>
