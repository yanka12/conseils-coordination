<section class="relative flex min-h-screen items-center overflow-hidden text-white">
    {{-- Photo de fond. Le scale compense la parallaxe : sans lui, le décalage découvrirait les bords. --}}
    <img
        data-parallax
        src="{{ asset('images/hero.webp') }}"
        alt="Grue et ferraillage sur un chantier de gros œuvre"
        class="absolute inset-0 h-full w-full scale-108 object-cover will-change-transform"
    >

    {{-- Calque de marque : opaque à gauche pour la lisibilité du texte, transparent à droite pour laisser voir la photo --}}
    <div class="absolute inset-0 bg-gradient-to-r from-brand-900 via-brand-900/85 to-transparent"></div>

    <div class="relative mx-auto grid w-full max-w-7xl gap-12 px-6 py-20 lg:grid-cols-2 lg:items-center lg:px-8">
        <div>
            <p class="text-xs font-semibold tracking-[0.2em] text-white/70 uppercase">
                Coordonnateur SPS en région Occitanie
            </p>

            <h1 class="mt-5 text-4xl font-bold leading-tight sm:text-5xl">
                Sécurité &amp; Protection de la santé sur vos chantiers
            </h1>

            <p class="mt-6 max-w-xl text-base leading-relaxed text-white/85">
                Depuis 2008, Conseils Coordination accompagne les maîtres d'ouvrage et maîtres d'œuvre
                dans la coordination de la sécurité de leurs opérations de construction.
            </p>

            <div class="mt-8 flex flex-wrap gap-4">
                <x-ui.button href="#contact" variant="primary">
                    Demander un devis
                </x-ui.button>
                <x-ui.button href="#exigence" variant="outline">
                    Nos réalisations
                </x-ui.button>
            </div>
        </div>

        <div class="flex flex-col gap-10 lg:items-end">
            <x-site.stat-card
                value="17+"
                label="Années d'expérience"
                icon="shield"
                variant="dark"
                class="w-full sm:w-64"
            />
            <x-site.stat-card
                value="3"
                label="Coordonnateurs CSPS"
                icon="helmet"
                variant="medium"
                class="w-full sm:w-64 lg:mr-16"
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
