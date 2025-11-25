<x-layouts.app :title="__('Dashboard')">
    <div class="space-y-8">

        <div class="habbo-card mb-6">
            <div class="flex items-center gap-4 mb-6">
                <div
                    class="w-16 h-16 bg-habbo-yellow rounded-xl flex items-center justify-center text-3xl pixel-corners">
                    👋
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-habbo-blue-dark">
                        {{ __('Welcome Back, :Name', ['name' => Auth::user()->name]) }}
                    </h1>
                    <p class="text-gray-600 text-sm">
                        {{ __('Overview of your account and activities') }}
                        <br>
                        {{ __('Last login') }}: {{ Auth::user()->last_login_at ? Auth::user()->last_login_at->format('d.m.Y, H:i') : __('First login') }}
                        <br>
                        {{ __('Member since') }}: {{ Auth::user()->created_at->format('d.m.Y') }}
                    </p>
                </div>
            </div>
        </div>

        <div class="grid gap-4 md:grid-cols-3">
            <x-hxbbx-badge icon="💎" text="{{ __('User Rank') }}" color="blue" />
            <x-hxbbx-badge icon="🎉" text="{{ __('Level') }} 5" color="green" />
            <x-hxbbx-badge icon="👥" text="{{ trans_choice('messages.friends', 42, ['count' => 41]) }}" color="yellow" />
            <x-hxbbx-badge icon="👥" text="{{ trans_choice('messages.friendsonline', 21, ['count' => 21]) }}" color="green" />
            <x-hxbbx-badge icon="👥" text="{{ trans_choice('messages.friend_requests', 11, ['count' => 11]) }}" color="cream" />
            <x-hxbbx-badge icon="👥" text="{{ trans_choice('messages.notifications', 69, ['count' => 69]) }}" color="red" />
        </div>


        <div class="grid gap-4 md:grid-cols-3">
            {{-- Room Previews --}}
            <x-hxbbx-room-preview room-name="Pool Party" :user-count="42" :room-number="1" href="#room-1" />
            <x-hxbbx-room-preview room-name="Cafe Hangout" :user-count="15" :room-number="2" href="#room-2" />
            <x-hxbbx-room-preview room-name="Game Room" :user-count="0" :room-number="42" href="#room-3" />
        </div>


        {{-- First Cards --}}
        <div class="grid gap-4 md:grid-cols-2">

            <div class="habbo-card">
                <h2 class="text-2xl font-bold text-habbo-blue-dark mb-4 flex items-center gap-2">
                    📰 {{ __('Todays News') }}
                </h2>
                <div class="space-y-4">
                    <div class="border-l-4 border-habbo-yellow pl-4">
                        <h3 class="font-bold text-lg text-gray-800">Feelin' Gr8! 🎉</h3>
                        <p class="text-gray-600 text-sm mt-1">
                            Join the fun and win a golden treasure in our latest treasure hunt event!
                        </p>
                    </div>
                    <div class="border-l-4 border-habbo-blue pl-4">
                        <h3 class="font-bold text-lg text-gray-800">New Features! ✨</h3>
                        <p class="text-gray-600 text-sm mt-1">
                            Check out our cool new trading features and chatroom customization options.
                        </p>
                    </div>
                </div>
                <button class="habbo-btn-primary w-full mt-6">
                    {{ __('Read more news') }} 📝
                </button>
            </div>

            <div class="habbo-card">
                <h2 class="text-2xl font-bold text-habbo-blue-dark mb-4 flex items-center gap-2">
                    🎮 {{ __('Quick Actions') }}
                </h2>
                <div class="grid grid-cols-2 gap-3">
                    <button class="habbo-btn-secondary">
                        🏠 {{ __('My Chatrooms') }}
                    </button>
                    <button class="habbo-btn-secondary">
                        👤 {{ __('My Profile') }}
                    </button>
                    <button class="habbo-btn-secondary">
                        💬 {{ __('My Messages') }}
                    </button>
                    <button class="habbo-btn-secondary">
                        ⚙️ {{ __('My Settings') }}
                    </button>
                    <button class="habbo-btn-secondary">
                        📜 {{ __('My Clans') }}
                    </button>
                    <button class="habbo-btn-secondary">
                        ❓ {{ __('Help & Support') }}
                    </button>
                </div>

            </div>

        </div>


    </div>
</x-layouts.app>
