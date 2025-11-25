@props([
    'title',
    'description',
])
        <div class="habbo-box-cream border-4">
            <div class="bg-gradient-to-r from-habbo-yellow to-habbo-yellow-light p-1">
                <div class="bg-habbo-cream px-6 py-4">
                    <h1 class="text-3xl font-bold text-habbo-blue-dark">
                        {{ $title }}
                    </h1>
                    <p class="text-gray-700 mt-2">
                        {{ $description }}
                    </p>
                </div>
            </div>
        </div>
