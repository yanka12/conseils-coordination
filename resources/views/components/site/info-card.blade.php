<div {{ $attributes->merge(['class' => "rounded-xl border $cardClasses px-5 py-4"]) }}>
    <div class="flex gap-3">
        <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-white/15 text-white">
            <x-ui.icon :name="$icon" class="h-4 w-4" />
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
