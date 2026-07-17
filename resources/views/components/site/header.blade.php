@php
    // « Contactez-nous » est une action, pas une section : il est traité à part pour
    // apparaître en bouton, et non comme un lien de navigation.
    $links = [
        '#exigence' => 'Notre exigence',
        '#methodologie' => 'Notre méthodologie',
        '#missions' => 'Nos missions',
        '#experts' => 'Nos experts',
    ];
@endphp

{{-- Le header s'escamote au défilement vers le bas et revient au défilement vers le haut. --}}
<header
    data-site-header
    class="sticky top-0 z-40 transition-transform duration-300 ease-out"
>
    {{-- Barre supérieure : logo, contact, et le bouton du menu sur mobile --}}
    <div class="bg-white">
        <div class="mx-auto flex max-w-7xl items-center justify-between gap-3 px-4 py-3 sm:gap-6 sm:px-6 lg:px-8">
            {{-- La marque est 1,7 fois plus large que haute : à h-9 elle prend ~62 px. Avec le nom
                 en 16 px, la barre débordait des petits écrans (375 px). D'où la réduction. --}}
            {{-- L'adresse vient de APP_URL : le site est servi depuis un sous-dossier sur GitHub
                 Pages, où « / » renverrait à la racine du domaine, hors du site. Une seule ligne
                 à changer le jour de la mise en production. --}}
            <a href="{{ config('app.url') }}" class="flex min-w-0 items-center gap-2 sm:gap-3">
                {{-- alt vide : le nom de la société est déjà écrit à côté. Le répéter ferait
                     lire deux fois la même chose à un lecteur d'écran. --}}
                <x-ui.img
                    src="images/logos/Logo-CC-mark.png"
                    alt=""
                    class="h-7 w-auto shrink-0 sm:h-9"
                />
                <span class="truncate text-sm font-bold text-brand-900 lg:text-base">
                    Conseils Coordination
                </span>
            </a>

            <div class="flex shrink-0 items-center gap-5">
                {{-- Bouton hamburger : les deux barres pivotent en croix à l'ouverture. --}}
                <button
                    type="button"
                    data-nav-toggle
                    aria-expanded="false"
                    aria-controls="menu-mobile"
                    aria-label="Ouvrir le menu"
                    class="-mr-2 flex h-10 w-10 items-center justify-center rounded-md text-brand-900 lg:hidden"
                >
                    <span class="relative block h-4 w-6">
                        <span data-nav-bar class="absolute left-0 top-0.5 block h-0.5 w-6 rounded-full bg-current transition-transform duration-300"></span>
                        <span data-nav-bar class="absolute bottom-0.5 left-0 block h-0.5 w-6 rounded-full bg-current transition-transform duration-300"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>

    {{-- Barre de navigation : desktop uniquement, le mobile passe par le panneau --}}
    <nav class="hidden bg-brand-800 text-white lg:block">
        <ul class="mx-auto flex max-w-7xl items-center justify-between gap-4 px-6 py-2.5 text-sm font-medium lg:px-8">
            @foreach ($links as $href => $label)
                <li>
                    <a href="{{ $href }}" class="whitespace-nowrap text-white/80 transition hover:text-white">
                        {{ $label }}
                    </a>
                </li>
            @endforeach

            <li>
                <x-ui.button href="#contact" variant="secondary" class="!px-4 !py-1.5 text-sm">
                    Contactez-nous
                </x-ui.button>
            </li>
        </ul>
    </nav>

    </header>

{{-- Panneau mobile : glisse depuis la droite, occupe tout l'écran.
     Volontairement hors du <header> : celui-ci reçoit un transform quand il s'escamote,
     et un ancêtre transformé fait qu'un descendant « fixed » se positionne par rapport à
     lui plutôt que par rapport à l'écran. Le panneau serait alors emporté avec le header. --}}
    <div
        id="menu-mobile"
        data-nav-panel
        data-open="false"
        class="nav-panel fixed inset-0 z-50 translate-x-full bg-brand-900/95 backdrop-blur-lg transition-transform duration-300 ease-out lg:hidden"
    >
        {{-- overflow-y-auto : en paysage, l'écran est trop court pour tout afficher et les
             boutons du bas deviendraient inatteignables. --}}
        <div class="flex h-full flex-col overflow-y-auto px-6 pt-5 pb-10">
            <div class="flex items-center justify-between">
                <a href="{{ config('app.url') }}">
                    <x-ui.img
                        src="images/logos/Logo-CC-mark-clair.png"
                        alt="Conseils Coordination"
                        class="h-8 w-auto"
                    />
                </a>

                <button
                    type="button"
                    data-nav-close
                    aria-label="Fermer le menu"
                    class="-mr-2 flex h-10 w-10 items-center justify-center rounded-md text-white/80 transition hover:text-white"
                >
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75">
                        <path stroke-linecap="round" d="M6 6l12 12M18 6L6 18" />
                    </svg>
                </button>
            </div>

            <nav class="mt-12 flex-1">
                <ul class="space-y-1">
                    @foreach ($links as $href => $label)
                        <li class="nav-item" style="--i: {{ $loop->index }}">
                            <a
                                href="{{ $href }}"
                                data-nav-link
                                class="block border-b border-white/10 py-4 text-2xl font-semibold text-white/90 transition hover:text-white"
                            >
                                {{ $label }}
                            </a>
                        </li>
                    @endforeach
                </ul>

                {{-- Même traitement qu'en desktop : un bouton, pas un lien de navigation. --}}
                <div class="nav-item mt-10" style="--i: {{ count($links) }}">
                    <x-ui.button href="#contact" data-nav-link variant="secondary" class="w-full">
                        Contactez-nous
                    </x-ui.button>
                </div>
            </nav>
        </div>
    </div>
