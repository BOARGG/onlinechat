<x-layouts.app.sidebar :title="$title ?? null">
    <main class="flex-1 flex items-center justify-center px-4 py-8">
        <div class="w-full max-w-md">
            {{ $slot }}
        </div>
    </main>
</x-layouts.app.sidebar>
