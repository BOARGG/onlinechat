<div class="space-y-6">
    {{-- Settings Content --}}
    <div class="grid gap-6 lg:grid-cols-[280px_1fr]">
        {{-- Sidebar Navigation --}}
        <div class="habbo-card">
            <h2 class="text-lg font-bold text-habbo-blue-dark mb-4">{{ __('SettingsMenu') }}</h2>
            <nav class="space-y-2">
                <a href="{{ route('profile.edit') }}" wire:navigate
                    class="flex items-center gap-3 px-4 py-3 rounded-lg font-semibold transition-all {{ request()->routeIs('profile.edit') ? 'bg-habbo-yellow text-white shadow-md' : 'text-gray-700 hover:bg-gray-100' }}">
                    <span class="text-xl">👤</span>
                    <span>{{ __('Profile') }}</span>
                    @if (request()->routeIs('profile.edit'))
                        <span class="ml-auto">→</span>
                    @endif
                </a>

                <a href="{{ route('user-password.edit') }}" wire:navigate
                    class="flex items-center gap-3 px-4 py-3 rounded-lg font-semibold transition-all {{ request()->routeIs('user-password.edit') ? 'bg-habbo-yellow text-white shadow-md' : 'text-gray-700 hover:bg-gray-100' }}">
                    <span class="text-xl">🔒</span>
                    <span>{{ __('Password') }}</span>
                    @if (request()->routeIs('user-password.edit'))
                        <span class="ml-auto">→</span>
                    @endif
                </a>

                @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                    <a href="{{ route('two-factor.show') }}" wire:navigate
                        class="flex items-center gap-3 px-4 py-3 rounded-lg font-semibold transition-all {{ request()->routeIs('two-factor.show') ? 'bg-habbo-yellow text-white shadow-md' : 'text-gray-700 hover:bg-gray-100' }}">
                        <span class="text-xl">🛡️</span>
                        <span>{{ __('Two-FactorAuth') }}</span>
                        @if (request()->routeIs('two-factor.show'))
                            <span class="ml-auto">→</span>
                        @endif
                    </a>
                @endif

                <a href="{{ route('appearance.edit') }}" wire:navigate
                    class="flex items-center gap-3 px-4 py-3 rounded-lg font-semibold transition-all {{ request()->routeIs('appearance.edit') ? 'bg-habbo-yellow text-white shadow-md' : 'text-gray-700 hover:bg-gray-100' }}">
                    <span class="text-xl">🎨</span>
                    <span>{{ __('Appearance') }}</span>
                    @if (request()->routeIs('appearance.edit'))
                        <span class="ml-auto">→</span>
                    @endif
                </a>
            </nav>

            <div class="my-4 border-t-2 border-gray-200"></div>
            <a href="{{ route('dashboard') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-lg font-semibold text-habbo-blue hover:bg-gray-100 transition-all">
                <span> {{ __(':SiteName Panel', ['SiteName' => config('app.name')]) }}</span>
                @if (request()->routeIs('profile.edit'))
                        <span class="ml-auto">→</span>
                    @endif
            </a>

            {{-- Divider --}}
            <div class="my-4 border-t-2 border-gray-200"></div>

            {{-- Back to Dashboard --}}
            <a href="{{ route('dashboard') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-lg font-semibold text-habbo-blue hover:bg-gray-100 transition-all">
                <span class="text-xl">←</span>
                <span> {{ __('Back to :SiteName', ['SiteName' => config('app.name')]) }}</span>
            </a>
        </div>

        {{-- Main Content --}}
        <div class="habbo-card">
            {{-- Page Header --}}
            @if (isset($heading) || isset($subheading))
                <div class="mb-6 pb-6 border-b-2 border-gray-200">
                    @if (isset($heading))
                        <h2 class="text-2xl font-bold text-habbo-blue-dark">{{ $heading }}</h2>
                    @endif
                    @if (isset($subheading))
                        <p class="text-gray-600 mt-2">{{ $subheading }}</p>
                    @endif
                </div>
            @endif

            {{-- Content --}}
            <div class="max-w-2xl">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
