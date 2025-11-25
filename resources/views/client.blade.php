<x-layouts.app :title="__('Client')">
    <div class="space-y-8">

        <div class="grid gap-4 md:grid-cols-2">

            <div class="habbo-card">
                <h2 class="text-2xl font-bold text-habbo-blue-dark mb-4 flex items-center gap-2">
                    🎮 {{ config('app.name') }} ~ {{ __('Client') }}
                </h2>

                <div class="text-sm text-habbo-blue-dark/80">
                    {{ __('Get the best experience by downloading our dedicated client application. Enjoy enhanced performance, exclusive features, and a seamless connection to our virtual world.') }}
                </div>

                Display Chatroom Client Here

            </div>
            
        </div>
</x-layouts.app>
