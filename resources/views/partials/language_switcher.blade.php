<div class="habbo-box-cream border-4 p-4 inline-block">
    <div class="flex items-center gap-3">
        <span class="text-2xl">🌍</span>
        <div class="flex items-center gap-2">
            @foreach($available_locales as $locale_name => $available_locale)
                @if($available_locale === $current_locale)
                    <span class="habbo-btn-primary px-4 py-2 cursor-default">
                        {{ $locale_name }}
                    </span>
                @else
                    <a href="{{ route('language.switch', $available_locale) }}" 
                       class="habbo-btn-secondary px-4 py-2 hover:scale-105 transition-transform">
                        {{ $locale_name }}
                    </a>
                @endif
            @endforeach
        </div>
    </div>
</div>