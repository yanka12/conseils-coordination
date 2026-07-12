@php
    $links = [
        '#exigence' => 'Notre exigence',
        '#methodologie' => 'Notre méthodologie',
        '#missions' => 'Nos missions',
        '#experts' => 'Nos experts',
        '#clients' => 'Nos clients',
        '#contact' => 'Contactez-nous',
    ];

    $phone = '06.77.76.28.24';
@endphp

<header class="sticky top-0 z-40">
    {{-- Barre supérieure : logo, contact, et le bouton du menu sur mobile --}}
    <div class="bg-white">
        <div class="mx-auto flex max-w-7xl items-center justify-between gap-3 px-4 py-3 sm:gap-6 sm:px-6 lg:px-8">
            {{-- La marque est 1,7 fois plus large que haute : à h-9 elle prend ~62 px. Avec le nom
                 en 16 px, la barre débordait des petits écrans (375 px). D'où la réduction. --}}
            {{-- « ./ » et non « / » : le site est servi depuis un sous-dossier sur GitHub Pages,
                 où « / » renverrait à la racine du domaine, hors du site. --}}
            <a href="./" class="flex min-w-0 items-center gap-2 sm:gap-3">
                <img
                    src="{{ asset('images/logos/Logo-CC-mark.png') }}"
                    alt=""
                    class="h-7 w-auto shrink-0 sm:h-9"
                >
                <span class="truncate text-sm font-bold text-brand-900 sm:text-base lg:text-lg">
                    Conseils Coordination
                </span>
            </a>

            <div class="flex shrink-0 items-center gap-5">
                <a href="tel:{{ str_replace('.', '', $phone) }}" class="hidden text-sm font-semibold text-brand-900 sm:inline">
                    {{ $phone }}
                </a>

                <x-ui.button href="#contact" variant="primary" class="hidden !px-4 !py-2 text-sm lg:inline-flex">
                    Nous contacter
                </x-ui.button>

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
        <ul class="mx-auto flex max-w-7xl items-center justify-between gap-4 px-6 py-3 text-sm font-medium lg:px-8">
            @foreach ($links as $href => $label)
                <li>
                    <a href="{{ $href }}" class="whitespace-nowrap text-white/80 transition hover:text-white">
                        {{ $label }}
                    </a>
                </li>
            @endforeach
        </ul>
    </nav>

    {{-- Panneau mobile : glisse depuis la droite, occupe tout l'écran --}}
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
                <img
                    src="{{ asset('images/logos/Logo-CC-mark-clair.png') }}"
                    alt="Conseils Coordination"
                    class="h-8 w-auto"
                >

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
            </nav>

            <div class="nav-item space-y-4" style="--i: {{ count($links) }}">
                <a href="tel:{{ str_replace('.', '', $phone) }}" class="block text-lg font-bold text-white">
                    {{ $phone }}
                </a>

                <x-ui.button href="#contact" data-nav-link variant="secondary" class="w-full">
                    Nous contacter
                </x-ui.button>
            </div>
        </div>
    </div>
</header>
