{{-- svh et non vh : sur mobile, 100vh compte la zone masquée par la barre d'adresse,
     ce qui pousse une partie du hero hors de l'écran au chargement. --}}
{{-- En desktop, la hauteur est calée sur la fenêtre moins le header collant : tout le
     hero, carrousel compris, tient alors sans avoir à défiler. --header-height est posé
     par app.js d'après la hauteur réelle du header ; la valeur de repli (7rem) couvre le
     header desktop (barre + navigation) le temps que le script s'exécute. --}}
<section class="relative flex min-h-svh flex-col overflow-hidden text-white lg:h-[calc(100svh-var(--header-height,7rem))] lg:min-h-0">
    {{-- Photo de fond. Elle est plus haute que la section et remonte d'autant : cette réserve
         est ce que la parallaxe révèle en la faisant redescendre au fil du scroll. --}}
    {{-- fetchpriority : c'est l'image la plus grande de la page au chargement, donc celle que
         Google mesure pour le LCP. Elle doit partir en premier. Jamais en lazy : elle est
         visible d'emblée. --}}
    <img
        data-parallax
        src="{{ asset('images/hero.webp') }}"
        alt="Grue et ferraillage sur un chantier de gros œuvre"
        width="1900"
        height="1131"
        fetchpriority="high"
        class="absolute -top-[30%] left-0 h-[130%] w-full object-cover will-change-transform"
    >

    {{-- Calque de marque. En desktop le texte tient dans la colonne de gauche : un dégradé
         horizontal suffit, et la photo reste visible à droite. En mobile le texte occupe toute
         la largeur, où ce même dégradé le laisserait sur la photo nue : le calque devient donc
         uniforme. --}}
    <div class="absolute inset-0 bg-brand-900/80 lg:bg-transparent lg:bg-gradient-to-r lg:from-brand-900 lg:via-brand-900/85 lg:to-transparent"></div>

    {{-- Colonne verticale occupant toute la hauteur du hero : le bloc principal se centre dans
         l'espace disponible, le bandeau clients reste ancré tout en bas. --}}
    <div class="relative flex flex-1 flex-col">
        {{-- flex-1 + items-center : ce cadre absorbe la hauteur restante et centre le bloc
             principal verticalement, sans jamais déborder sur le bandeau du bas. --}}
        <div class="flex flex-1 items-center">
            {{-- Colonne de gauche élargie : à parts égales, « chantiers » basculait sur une 3e ligne. --}}
            <div class="mx-auto grid w-full max-w-7xl gap-10 px-6 py-12 sm:py-16 lg:grid-cols-[1.6fr_1fr] lg:items-center lg:gap-12 lg:py-8 lg:px-8">
                <div>
                    <p class="text-xs font-semibold tracking-[0.2em] text-white/70 uppercase">
                        Coordonnateur SPS en région Occitanie
                    </p>

                    {{-- La coupure n'est forcée qu'en desktop : sur mobile le texte se replie déjà tout
                         seul, et le <br> ajouterait une rupture au mauvais endroit. --}}
                    <h1 class="mt-5 text-3xl font-bold leading-tight sm:text-4xl lg:text-5xl">
                        Sécurité &amp; Protection<br class="hidden lg:inline">
                        de la santé sur vos chantiers
                    </h1>

                    <div class="mt-6 max-w-2xl space-y-4 text-sm leading-relaxed text-white/90">
                        <p>
                            La SARL Conseils Coordination est une société spécialisée en
                            <strong class="font-semibold text-white">coordination SPS</strong>,
                            créée en 2004 et basée à Albi.
                        </p>
                        <p>
                            L'équipe est composée de
                            <strong class="font-semibold text-white">coordonnateurs SPS certifiés niveau 1</strong>
                            (Conception et Coordination), avec une organisation permettant la continuité
                            de mission.
                        </p>
                    </div>

                    <div class="mt-8 flex flex-wrap gap-4">
                        <x-ui.button href="#contact" variant="primary">
                            Demander un devis
                        </x-ui.button>
                        <x-ui.button href="#exigence" variant="outline">
                            Nos ouvrages
                        </x-ui.button>
                    </div>
                </div>

                {{-- Trois dispositions selon la largeur :
                     - petit écran : empilées (une colonne), faute de place ;
                     - tablette : en ligne sur trois colonnes, sinon le hero devient interminable ;
                     - desktop : de nouveau empilées, mais dans la colonne de droite, à côté du texte.
                     mr décolle les cartes du bord droit sans rompre leur alignement entre elles. --}}
                <div class="grid grid-cols-1 gap-6 md:grid-cols-3 lg:grid-cols-1 lg:justify-items-end lg:gap-8 lg:mr-10">
                    <x-site.stat-card
                        value="17+"
                        label="Années d'expérience"
                        icon="shield"
                        variant="dark"
                        class="w-full lg:w-64"
                    />
                    <x-site.stat-card
                        value="600+"
                        label="Missions réalisées"
                        icon="document-check"
                        variant="medium"
                        class="w-full lg:w-64"
                    />
                    <x-site.stat-card
                        value="100K€/50M€"
                        label="Chantiers de niv. 3 à 1"
                        icon="helmet"
                        variant="light"
                        class="w-full lg:w-64"
                    />
                </div>
            </div>
        </div>

        {{-- Bandeau clients, ancré en bas du hero : la preuve sociale est visible dès le premier
             écran. Fond clair car les logos (colorés) seraient illisibles sur le bleu du hero ;
             la bande va de bord à bord, son libellé et le carrousel restant centrés. --}}
        <div class="relative border-t border-white/10 bg-white/95 py-4 backdrop-blur-sm">
            <p class="mx-auto max-w-7xl px-6 text-center text-[0.7rem] font-semibold tracking-[0.18em] text-slate-400 uppercase lg:px-8">
                Ils nous font confiance
            </p>
            <div class="mt-3">
                <x-site.logo-carousel />
            </div>
        </div>
    </div>
</section>
