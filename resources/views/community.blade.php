<x-layouts.app :title="__('Community')">
    <div class="space-y-8">

        <div class="grid gap-4 md:grid-cols-2">

            <div class="habbo-card">
                <h2 class="text-2xl font-bold text-habbo-blue-dark mb-4 flex items-center gap-2">
                    📰 {{ config('app.name') }} ~ {{ __('Community') }}
                </h2>

                <button class="habbo-btn-primary w-full mt-6">
                    {{ __('Explore Community') }} 🌐
                </button>
            </div>
        </div>
    </div>
</x-layouts.app>
