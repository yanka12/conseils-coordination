@php
    $links = [
        '#exigence' => 'Notre exigence',
        '#methodologie' => 'Notre méthodologie',
        '#missions' => 'Nos missions',
        '#experts' => 'Nos experts',
        '#clients' => 'Nos clients',
        '#contact' => 'Contactez-nous',
    ];
@endphp

<header class="sticky top-0 z-30">
    {{-- Barre supérieure : logo + contact --}}
    <div class="bg-white">
        <div class="mx-auto flex max-w-7xl items-center justify-between gap-6 px-6 py-3 lg:px-8">
            {{-- Le logo contient déjà le nom de la société : pas de texte à côté. --}}
            <a href="/" class="shrink-0">
                <img
                    src="{{ asset('images/logos/Logo-CC.png') }}"
                    alt="Conseils Coordination"
                    class="h-14 w-auto"
                >
            </a>

            <div class="flex items-center gap-5">
                <a href="tel:0677762824" class="hidden text-sm font-semibold text-brand-900 sm:inline">
                    06.77.76.28.24
                </a>
                <x-ui.button href="#contact" variant="primary" class="!px-4 !py-2 text-sm">
                    Nous contacter
                </x-ui.button>
            </div>
        </div>
    </div>

    {{-- Barre de navigation --}}
    <nav class="bg-brand-800 text-white">
        <ul class="mx-auto flex max-w-7xl items-center justify-between gap-4 overflow-x-auto px-6 py-3 text-sm font-medium lg:px-8">
            @foreach ($links as $href => $label)
                <li>
                    <a href="{{ $href }}" class="whitespace-nowrap text-white/80 transition hover:text-white">
                        {{ $label }}
                    </a>
                </li>
            @endforeach
        </ul>
    </nav>
</header>
