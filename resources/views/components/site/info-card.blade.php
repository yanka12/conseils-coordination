@props([
    'title',
    'icon' => 'pin',
    'variant' => 'light',
    // « inline » aligne le contenu sous le titre, à droite de l'icône (cartes courtes).
    // « stacked » le fait courir sur toute la largeur, sous l'en-tête (contenu long).
    'layout' => 'inline',
])

@php
    $icons = [
        'pin' => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 21s7-5.3 7-11a7 7 0 1 0-14 0c0 5.7 7 11 7 11Z" /><circle cx="12" cy="10" r="2.5" />',
        'document' => '<path stroke-linecap="round" stroke-linejoin="round" d="M8 3h6l5 5v13H8V3Zm6 0v5h5M10 13h8M10 17h5" />',
        'info' => '<circle cx="12" cy="12" r="9" /><path stroke-linecap="round" stroke-linejoin="round" d="M12 11v5m0-8h.01" />',
    ];

    // « plain » : sans fond ni bordure. La bordure reste, en transparent, et le
    // rembourrage est conservé : la carte occupe ainsi exactement la même place.
    // Le flou d'arrière-plan est retiré, sinon il resterait visible sans fond.
    $card = match ($variant) {
        'dark' => 'border-brand-900/60 bg-brand-900/80 backdrop-blur-sm',
        'plain' => 'border-transparent',
        default => 'border-white/15 bg-white/10 backdrop-blur-sm',
    };
@endphp

<div {{ $attributes->merge(['class' => "rounded-xl border $card px-5 py-4"]) }}>
    <div class="flex gap-3">
        <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-white/15 text-white">
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                {!! $icons[$icon] ?? $icons['pin'] !!}
            </svg>
        </span>

        @if ($layout === 'inline')
            {{-- Titre et contenu dans la même colonne : le texte se cale sous le titre,
                 et non sous l'icône. --}}
            <div class="min-w-0 flex-1">
                <h3 class="text-sm font-semibold text-white">{{ $title }}</h3>

                <div class="mt-1 text-sm leading-snug text-white/75">
                    {{ $slot }}
                </div>
            </div>
        @else
            <h3 class="self-center text-sm font-semibold text-white">{{ $title }}</h3>
        @endif
    </div>

    @if ($layout !== 'inline')
        <div class="mt-3 text-sm leading-snug text-white/75">
            {{ $slot }}
        </div>
    @endif
</div>
