<section class="relative flex min-h-screen items-center overflow-hidden text-white">
    {{-- Photo de fond. Elle est plus haute que la section et remonte d'autant : cette réserve
         est ce que la parallaxe révèle en la faisant redescendre au fil du scroll. --}}
    <img
        data-parallax
        src="{{ asset('images/hero.webp') }}"
        alt="Grue et ferraillage sur un chantier de gros œuvre"
        class="absolute -top-[30%] left-0 h-[130%] w-full object-cover will-change-transform"
    >

    {{-- Calque de marque : opaque à gauche pour la lisibilité du texte, transparent à droite pour laisser voir la photo --}}
    <div class="absolute inset-0 bg-gradient-to-r from-brand-900 via-brand-900/85 to-transparent"></div>

    {{-- Colonne de gauche élargie : à parts égales, « chantiers » basculait sur une 3e ligne. --}}
    <div class="relative mx-auto grid w-full max-w-7xl gap-12 px-6 py-20 lg:grid-cols-[1.6fr_1fr] lg:items-center lg:px-8">
        <div>
            <p class="text-xs font-semibold tracking-[0.2em] text-white/70 uppercase">
                Coordonnateur SPS en région Occitanie
            </p>

            <h1 class="mt-5 text-4xl font-bold leading-tight sm:text-5xl">
                Sécurité &amp; Protection<br>de la santé sur vos chantiers
            </h1>

            <div class="mt-6 max-w-2xl space-y-4 text-xs leading-relaxed text-white/85 sm:text-sm">
                <p>
                    La SARL Conseils Coordination est une société spécialisée en
                    <strong class="font-semibold text-white">coordination SPS</strong>,
                    créée en 2004 et basée à Albi.
                </p>
                <p>
                    L'équipe est composée de
                    <strong class="font-semibold text-white">coordonnateurs SPS certifiés niveau 1</strong>
                    (Conception et Coordination), avec une organisation permettant la continuité
                    de mission en cas d'absence.
                </p>
                <p>
                    Toutes les missions sont réalisées en interne, sans aucune sous-traitance,
                    avec un engagement de forte réactivité.
                </p>
            </div>

            <div class="mt-8 flex flex-wrap gap-4">
                <x-ui.button href="#contact" variant="primary">
                    Demander un devis
                </x-ui.button>
                <x-ui.button href="#exigence" variant="outline">
                    Nos réalisations
                </x-ui.button>
            </div>
        </div>

        {{-- mr décolle les cartes du bord droit sans rompre leur alignement entre elles. --}}
        <div class="flex flex-col gap-10 lg:items-end lg:mr-10">
            <x-site.stat-card
                value="17+"
                label="Années d'expérience"
                icon="shield"
                variant="dark"
                class="w-full sm:w-64"
            />
            <x-site.stat-card
                value="2"
                label="Coordonnateurs CSPS"
                icon="helmet"
                variant="medium"
                class="w-full sm:w-64"
            />
            <x-site.stat-card
                value="28M€+"
                label="Projets coordonnés"
                icon="document"
                variant="light"
                class="w-full sm:w-64"
            />
        </div>
    </div>
</section>
