<x-layouts.app :title="__('Help')">
    <div class="space-y-8">

        <div class="habbo-card mb-6">
            <div class="flex items-center gap-4 mb-6">
                <div
                    class="w-16 h-16 bg-habbo-yellow rounded-xl flex items-center justify-center text-3xl pixel-corners">
                    ❓
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-habbo-blue-dark">{{ __('Are you looking for help') }}</h1>
                    <p class="text-gray-600 text-sm">{{ __('Maybe these quick stats and tips can assist you') }}</p>
                </div>
            </div>
        </div>


        {{-- @include('components.hxbbx-help-topics') --}}

        {{-- Main Content Grid --}}
        {{-- <div class="grid gap-6 md:grid-cols-2"> --}}
            {{-- @include('components.hxbbx-first-steps') --}}

            {{-- @include('components.hxbbx-safety-rules') --}}
        {{-- </div> --}}


        <div class="habbo-card">
            <h2 class="text-2xl font-bold text-habbo-blue-dark mb-4 flex items-center gap-2">
                💡 {{ __('Frequently Asked Questions') }}
            </h2>
            <div class="space-y-3">
                <details class="group">
                    <summary class="cursor-pointer p-4 bg-habbo-cream rounded-lg border-2 border-habbo-yellow font-bold text-gray-800 hover:bg-yellow-50 transition-colors flex items-center justify-between">
                        <span>{{ __('How do I earn credits?') }}</span>
                        <span class="text-xl group-open:rotate-180 transition-transform">▼</span>
                    </summary>
                    <div class="p-4 bg-white border-2 border-t-0 border-habbo-yellow rounded-b-lg text-gray-700">
                        {{ __('You can earn credits by participating in events, completing daily challenges, trading items, or purchasing them in our shop!') }}
                    </div>
                </details>

                <details class="group">
                    <summary class="cursor-pointer p-4 bg-habbo-cream rounded-lg border-2 border-habbo-yellow font-bold text-gray-800 hover:bg-yellow-50 transition-colors flex items-center justify-between">
                        <span>{{ __('How do I create my own room?') }}</span>
                        <span class="text-xl group-open:rotate-180 transition-transform">▼</span>
                    </summary>
                    <div class="p-4 bg-white border-2 border-t-0 border-habbo-yellow rounded-b-lg text-gray-700">
                        {{ __('Click on "Navigator" → "Create Room" → Choose a layout and name, then start decorating with furniture!') }}
                    </div>
                </details>

                <details class="group">
                    <summary class="cursor-pointer p-4 bg-habbo-cream rounded-lg border-2 border-habbo-yellow font-bold text-gray-800 hover:bg-yellow-50 transition-colors flex items-center justify-between">
                        <span>{{ __('What should I do if someone is being mean?') }}</span>
                        <span class="text-xl group-open:rotate-180 transition-transform">▼</span>
                    </summary>
                    <div class="p-4 bg-white border-2 border-t-0 border-habbo-yellow rounded-b-lg text-gray-700">
                        {{ __('Use the "Report" button on their profile or contact a moderator immediately. We take bullying very seriously!') }}
                    </div>
                </details>

                <details class="group">
                    <summary class="cursor-pointer p-4 bg-habbo-cream rounded-lg border-2 border-habbo-yellow font-bold text-gray-800 hover:bg-yellow-50 transition-colors flex items-center justify-between">
                        <span>{{ __('How do I change my avatar look?') }}</span>
                        <span class="text-xl group-open:rotate-180 transition-transform">▼</span>
                    </summary>
                    <div class="p-4 bg-white border-2 border-t-0 border-habbo-yellow rounded-b-lg text-gray-700">
                        {{ __('Go to "My Profile" → "Edit Avatar" → Choose from hundreds of clothes, hairstyles, and accessories!') }}
                    </div>
                </details>
            </div>
        </div>

        {{-- Contact Support --}}
        {{-- <div class="grid gap-6 md:grid-cols-3">
            <div class="habbo-box-blue p-6 text-center">
                <div class="text-5xl mb-3">📧</div>
                <h3 class="text-xl font-bold text-white mb-2">{{ __('Email Support') }}</h3>
                <p class="text-white/80 text-sm mb-4">{{ __('Get help via email') }}</p>
                <a href="mailto:support@boar.gg" class="habbo-btn-secondary w-full inline-block">
                    {{ __('Send Email') }}
                </a>
            </div>

            <div class="habbo-box-yellow p-6 text-center">
                <div class="text-5xl mb-3">💬</div>
                <h3 class="text-xl font-bold text-white mb-2">{{ __('Live Chat') }}</h3>
                <p class="text-white/80 text-sm mb-4">{{ __('Chat with our team') }}</p>
                <button class="habbo-btn-secondary w-full">
                    {{ __('Start Chat') }}
                </button>
            </div>

            <div class="habbo-box-green p-6 text-center">
                <div class="text-5xl mb-3">📚</div>
                <h3 class="text-xl font-bold text-white mb-2">{{ __('Knowledge Base') }}</h3>
                <p class="text-white/80 text-sm mb-4">{{ __('Browse all guides') }}</p>
                <button class="habbo-btn-secondary w-full">
                    {{ __('View Guides') }}
                </button>
            </div>
        </div>--}}

        {{-- Still Need Help? --}}
        <div class="habbo-card bg-gradient-to-r from-habbo-blue to-habbo-blue-dark text-white text-center p-8">
            <h2 class="text-3xl font-bold mb-3">{{ __('Still Need Help') }}</h2>
            <p class="text-white/90 mb-6 max-w-2xl mx-auto">
                {{ __('Still Need Help Text') }}
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button class="habbo-btn-primary text-lg">
                    🎫 {{ __('Create Support Ticket') }} 🌐
                </button>
            </div>
        </div>

    </div>
</x-layouts.app>