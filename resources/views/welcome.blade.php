<x-layouts.app :title="__('Welcome')">
    <div class="max-w-6xl mx-auto space-y-8">

        <div class="habbo-box-cream border-4 overflow-hidden">
            <div class="bg-gradient-to-r from-habbo-yellow via-habbo-yellow-light to-habbo-orange p-8 text-center">
                <h1 class="text-5xl md:text-6xl font-bold text-white drop-shadow-2xl mb-4">
                    🏨 {{ __("Welcome to") }} {{ config('app.name') }}!
                </h1>
                <p class="text-xl text-white/90 mb-6 max-w-2xl mx-auto">
                    {{ __("A virtual hang-out") }} <br>
                    {{ __("Meet friends, design chatrooms, and join the fun") }}
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('register') }}" class="habbo-btn-primary text-xl">
                        🎉 {{ __("Join now") }}
                    </a>
                    <a href="{{ route('login') }}" class="habbo-btn-secondary text-xl">
                        🔑 {{ __("Already a member? Login now") }}
                    </a>
                </div>
            </div>
        </div>


        <div class="habbo-box-blue p-8 text-center">
            <div class="text-5xl font-bold text-white mb-2">3,478</div>
            <div class="text-habbo-yellow text-xl font-semibold">{{ __("Users online") }}</div>
            <p class="text-white/80 mt-3">{{ __("Join them and start your adventure") }}</p>
        </div>


        <div class="grid md:grid-cols-3 gap-6">
            <div class="habbo-card text-center">
                <div class="text-5xl mb-4">👥</div>
                <h3 class="text-xl font-bold text-habbo-blue-dark mb-2">{{ __("Meet new friends") }}</h3>
                <p class="text-gray-600">
                    {{ __("Chat with people from around the world and make lasting friendships") }}
                </p>
            </div>
            <div class="habbo-card text-center">
                <div class="text-5xl mb-4">🏠</div>
                <h3 class="text-xl font-bold text-habbo-blue-dark mb-2">{{ __("Design your chatroom") }}</h3>
                <p class="text-gray-600">
                    {{ __("Create your perfect space with tons of decorations") }}
                </p>
            </div>
            <div class="habbo-card text-center">
                <div class="text-5xl mb-4">🎮</div>
                <h3 class="text-xl font-bold text-habbo-blue-dark mb-2">{{ __("Play Games") }}</h3>
                <p class="text-gray-600">
                    {{ __("Enjoy various games, competitions, and even events") }}
                </p>
            </div>
        </div>

        <div class="habbo-box-yellow p-6 border-4">
            <div class="flex items-start gap-4">
                <div class="text-4xl">⚠️</div>
                <div class="flex-1">
                    <h3 class="text-2xl font-bold text-white mb-3">{{ __("Online Safety") }}</h3>
                    <ul class="space-y-2 text-white/90">
                        <li>✓ {{ __("We moderate the") }} {{ config('app.name') }} 24/7</li>
                        <li>✓ {{ __("Never give your password to anyone") }}</li>
                        <li>✓ {{ __("Don't share personal details") }}</li>
                        <li>✓ {{ __("People online might not be who they say they are") }}</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="text-center py-12">
            <h2 class="text-3xl font-bold text-white mb-6">{{ __("Ready to Check-In?") }}</h2>
            <a href="{{ route('register') }}" class="habbo-btn-primary text-2xl">
                🚀 {{ __("Start your adventure now!") }}
            </a>
        </div>
    </div>
</x-layouts.app>