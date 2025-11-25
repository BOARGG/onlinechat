<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    @include('partials.head')
</head>

<body class="habbo-bg min-h-full antialiased">
    <div class="min-h-screen flex flex-col">
        {{-- Header --}}
        <header class="sticky top-0 z-50 backdrop-blur-md bg-habbo-blue/80 border-b-4 border-habbo-blue-dark shadow-lg">
            <div class="container mx-auto px-4">
                <div class="flex items-center justify-between h-20">
                    {{-- Logo --}}
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center gap-3 transform hover:scale-105 transition-transform">
                        <div
                            class="w-16 h-16 bg-habbo-yellow rounded-xl flex items-center justify-center font-bold text-3xl text-white shadow-lg pixel-corners">
                            H
                        </div>
                        <div class="hidden md:block">
                            <div class="text-2xl font-bold text-habbo-yellow-dark drop-shadow-lg">{{ config('app.name') }}</div>
                            <div class="text-xs text-habbo-yellow-light">{{ __('Virtual Chat') }}</div>
                        </div>
                    </a>

                    {{-- Navigation --}}
                    <nav class="hidden md:flex items-center gap-2">
                        <a href="{{ route('dashboard') }}"
                            class="px-4 py-2 rounded-lg font-semibold transition-all {{ request()->routeIs('dashboard') ? 'bg-habbo-yellow text-white shadow-md' : 'text-white hover:bg-habbo-blue-light' }}">
                            🏠 {{ __('Home') }}
                        </a>

                        <a href="{{ route('client') }}"
                            class="px-4 py-2 rounded-lg font-semibold transition-all {{ request()->routeIs('client') ? 'bg-habbo-yellow text-white shadow-md' : 'text-white hover:bg-habbo-blue-light' }}">
                            🎮 {{ __('Client') }}
                        </a>

                        <a href="{{ route('community') }}"
                            class="px-4 py-2 rounded-lg font-semibold transition-all {{ request()->routeIs('community') ? 'bg-habbo-yellow text-white shadow-md' : 'text-white hover:bg-habbo-blue-light' }}">
                            👥 {{ __('Community') }}
                        </a>

                        <a href="{{ route('credits') }}"
                            class="px-4 py-2 rounded-lg font-semibold transition-all {{ request()->routeIs('credits') ? 'bg-habbo-yellow text-white shadow-md' : 'text-white hover:bg-habbo-blue-light' }}">
                            💰 {{ __('Credits') }}
                        </a>

                        <a href="{{ route('profile.edit') }}"
                            class="px-4 py-2 rounded-lg font-semibold transition-all {{ request()->routeIs('profile.*') || request()->routeIs('user-password.*') || request()->routeIs('two-factor.*') || request()->routeIs('appearance.*') ? 'bg-habbo-yellow text-white shadow-md' : 'text-white hover:bg-habbo-blue-light' }}">
                            ⚙️ {{ __('Settings') }}
                        </a>

                        <a href="{{ route('help') }}"
                            class="px-4 py-2 rounded-lg font-semibold transition-all {{ request()->routeIs('help') ? 'bg-habbo-yellow text-white shadow-md' : 'text-white hover:bg-habbo-blue-light' }}">
                            ❓ {{ __('Help') }}
                        </a>

                    </nav>


                    {{-- User Menu --}}
                    <div class="flex items-center gap-3">
                        @auth
                            <div class="habbo-box-yellow px-4 py-2 border-2">
                                <div class="text-sm font-semibold text-white">
                                    <a href="{{ url('settings') }}">
                                        {{ Auth::user()->name }}
                                    </a>
                                </div>
                            </div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="habbo-btn-secondary py-2 text-sm">
                                    {{ __('Logout') }}
                                </button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="habbo-btn-secondary py-2 text-sm">
                                {{ __('Login') }}
                            </a>
                            <a href="{{ route('register') }}" class="habbo-btn-primary py-2 text-sm">
                                {{ __('Register') }}
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </header>

        {{-- Main Content --}}
        <main class="flex-1 container mx-auto px-4 py-8">
            {{ $slot }}
        </main>

        {{-- Footer --}}
        <footer class="bg-habbo-blue-dark/90 backdrop-blur-sm border-t-4 border-habbo-blue mt-auto">
            <div class="container mx-auto px-4 py-8">
                <div class="grid md:grid-cols-3 gap-8 text-center md:text-left">
                    <div>
                        <h3 class="text-habbo-yellow font-bold text-lg mb-3">{{ __('About') }} {{ config('app.name') }}</h3>
                        <p class="text-white/80 text-sm">
                            {{ __(':SiteName ABOUT', ['SiteName' => config('app.name')]) }}
                        </p>
                        
                        <p class="text-white/80 text-sm mt-4">
                            {{ __('PoweredBy') }}
                        </p>
                        
                    </div>
                    <div>
                        <h3 class="text-habbo-yellow font-bold text-lg mb-3">{{ __('Links') }}</h3>
                        <ul class="space-y-2 text-sm">
                            <li><a href="{{ url('terms') }}"
                                    class="text-white/80 hover:text-habbo-yellow transition-colors">{{ __('Terms of Use') }}</a>
                            </li>
                            <li><a href="{{ url('privacy_policy') }}"
                                    class="text-white/80 hover:text-habbo-yellow transition-colors">{{ __('Privacy Policy') }}</a>
                            </li>
                            <li><a href="{{ url('safety') }}"
                                    class="text-white/80 hover:text-habbo-yellow transition-colors">{{ __('Safety') }}</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-habbo-yellow font-bold text-lg mb-3">⚠️ {{ __('Online Safety') }}</h3>
                        <p class="text-white/80 text-sm">
                            {{ __('Remember: People online might not be who they say they are') }}
                            <br>
                            {{ __('Never share your password with anyone and stay safe') }}
                            @include('partials/language_switcher')
                            
                        </p>
                    </div>
                </div>
                <div class="text-center mt-8 pt-6 border-t border-habbo-blue text-white/60 text-sm">
                    © {{ date('Y') }} {{ config('app.name') }}. {{ __('All rights reserved') }}
                </div>
            </div>
        </footer>
    </div>

    @stack('scripts')
</body>

</html>
