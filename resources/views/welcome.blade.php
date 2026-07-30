<x-layout>
    <x-site.header />

    <main id="contenu">
        <x-site.hero />

        {{-- Notre exigence --}}
        <section id="exigence" class="mx-auto max-w-7xl px-6 py-10 sm:py-14 lg:px-8">
            <x-ui.section-heading title="Notre exigence" align="center">
                {{-- Titre centré, mais paragraphe laissé au fer à gauche : le drapeau
                     gauche reste plus lisible sur un texte de plusieurs lignes. --}}
                <p class="text-left">
                    C-C propose une
                    <strong class="font-semibold text-brand-900">prestation CSPS complète, rigoureuse et conforme à la réglementation</strong>,
                    avec une forte expérience terrain, une organisation fiable et une méthodologie très structurée,
                    adaptée à des opérations complexes de bâtiment et de génie civil.
                </p>
            </x-ui.section-heading>

            @php
                // Tableau de correspondance des chantiers : à chaque image du dossier
                // images/chantiers/ on associe son texte alternatif (alt, pour
                // l'accessibilité et le référencement) et sa légende affichée (caption).
                // Source unique alimentant le carrousel ci-dessous ; les trois photos
                // affichées en fixe (stade Paul-Lignon, silos, vieux pont d'Albi) n'y
                // figurent pas, pour ne pas apparaître deux fois. Les composants lisent
                // eux-mêmes les dimensions sur les fichiers.
                $chantiers = [
                    ['src' => 'images/chantiers/barrage-saint-geraud.webp', 'alt' => 'Travaux de coordination sur le barrage de Saint-Géraud', 'caption' => 'Barrage de Saint-Géraud'],
                    ['src' => 'images/chantiers/renov-pont-abli.webp', 'alt' => 'Rénovation d\'un pont à Albi', 'caption' => 'Rénovation d\'un pont, Albi'],
                    ['src' => 'images/chantiers/palais-berbie-albi.webp', 'alt' => 'Chantier au palais de la Berbie à Albi', 'caption' => 'Palais de la Berbie, Albi'],
                    ['src' => 'images/chantiers/reservoir-eau-potable-ambialet.webp', 'alt' => 'Réservoir d\'eau potable à Ambialet', 'caption' => 'Réservoir d\'eau potable, Ambialet'],
                    ['src' => 'images/chantiers/terrassement-centre-enfouissement.webp', 'alt' => 'Terrassement d\'un centre d\'enfouissement', 'caption' => 'Terrassement, centre d\'enfouissement'],
                    ['src' => 'images/chantiers/batiment-indus.webp', 'alt' => 'Construction d\'un bâtiment industriel', 'caption' => 'Bâtiment industriel'],
                    ['src' => 'images/chantiers/bardage-bat-indus.webp', 'alt' => 'Pose du bardage d\'un bâtiment industriel', 'caption' => 'Bardage d\'un bâtiment industriel'],
                    ['src' => 'images/chantiers/renforcement-chapente-bat-indus.webp', 'alt' => 'Renforcement de la charpente d\'un bâtiment industriel', 'caption' => 'Renforcement de charpente'],
                    ['src' => 'images/chantiers/desamiantage-bat-indus.webp', 'alt' => 'Désamiantage d\'un bâtiment industriel', 'caption' => 'Désamiantage industriel'],
                    ['src' => 'images/chantiers/construction-voile-beton-immeuble.webp', 'alt' => 'Coulage d\'un voile en béton d\'un immeuble', 'caption' => 'Voile béton d\'immeuble'],
                    ['src' => 'images/chantiers/immeuble-logements.webp', 'alt' => 'Construction d\'un immeuble de logements', 'caption' => 'Immeuble de logements'],
                    ['src' => 'images/chantiers/immeubles-pavillons-laprimaube.webp', 'alt' => 'Immeubles et pavillons à La Primaube', 'caption' => 'Logements, La Primaube'],
                    ['src' => 'images/chantiers/collège-couffouleux.webp', 'alt' => 'Chantier du collège de Couffouleux', 'caption' => 'Collège de Couffouleux'],
                    ['src' => 'images/chantiers/renovation-chateau.webp', 'alt' => 'Rénovation d\'un château', 'caption' => 'Rénovation d\'un château'],
                    ['src' => 'images/chantiers/refection-plafond-eglise.webp', 'alt' => 'Réfection du plafond d\'une église', 'caption' => 'Réfection d\'un plafond d\'église'],
                    ['src' => 'images/chantiers/mise-ensecurite-tourelle-eglise.webp', 'alt' => 'Mise en sécurité de la tourelle d\'une église', 'caption' => 'Tourelle d\'église sécurisée'],
                    ['src' => 'images/chantiers/mise-en-secu-passerelle.webp', 'alt' => 'Mise en sécurité d\'une passerelle', 'caption' => 'Mise en sécurité d\'une passerelle'],
                ];
            @endphp

            {{-- mt-10 : écart titre → contenu commun à toutes les sections. --}}
            <div class="mt-10 grid gap-6 sm:grid-cols-2">
                <div class="space-y-6">
                    <x-ui.photo
                        src="images/chantiers/stade-paul-lignon-rodez.webp"
                        alt="Chantier du stade Paul-Lignon à Rodez"
                        caption="Stade Paul-Lignon, Rodez"
                        class="shadow-lg"
                    />

                    <div>
                        <x-ui.photo
                            src="images/chantiers/renov-vieux-pont-albi.webp"
                            alt="Rénovation du vieux pont d'Albi"
                            caption="Le vieux pont d'Albi"
                            class="shadow-lg"
                        />
                        <div class="mt-4">
                            <p class="text-base font-bold text-brand-900">Des projets d'envergure en Occitanie</p>
                            <p class="mt-1 text-sm text-slate-500">
                                Le vieux pont d'Albi, le palais de la Berbie, le stade Paul-Lignon de Rodez, barrages et sites industriels…
                            </p>
                        </div>
                    </div>
                </div>

                <div class="space-y-6 sm:pt-16">
                    <x-ui.photo
                        src="images/chantiers/construction-silos.webp"
                        alt="Construction de silos"
                        caption="Construction de silos"
                        class="shadow-lg"
                    />
                    {{-- Carrousel : même cadre qu'une photo, mais les vues défilent.
                         Alimenté par le tableau de correspondance $chantiers ci-dessus. --}}
                    <x-ui.photo-carousel
                        class="shadow-lg"
                        :photos="$chantiers"
                    />
                </div>
            </div>
        </section>

        {{-- Méthodologie --}}
        <section id="methodologie" class="bg-slate-50 py-10 sm:py-14">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <x-ui.section-heading
                    title="Une méthodologie éprouvée<br>pour votre sécurité"
                    align="center"
                />

                {{-- Grille resserrée : à pleine largeur, les cartes seraient plus larges que hautes.
                     Les cercles numérotés débordant en haut, gap-y est généreux pour qu'ils ne
                     chevauchent pas la rangée précédente.
                     mt-16 = l'écart commun mt-10 (2,5 rem) + le débord du cercle (-top-6, 1,5 rem) :
                     l'écart perçu sous le titre est donc le même que dans les autres sections. --}}
                <div class="mx-auto mt-16 grid max-w-4xl grid-cols-1 gap-x-6 gap-y-16 sm:grid-cols-2 lg:grid-cols-3">
                    <x-site.methodology-step
                        number="1"
                        title="Analyse approfondie du site et de son environnement"
                        description="Comprendre le site pour anticiper chaque contrainte. Réseaux, circulation, établissements sensibles…"
                    />
                    <x-site.methodology-step
                        number="2"
                        title="Anticipation des risques importés/exportés, et de la coactivité"
                        description="Identifier les risques avant qu'ils ne deviennent des problèmes."
                    />
                    <x-site.methodology-step
                        number="3"
                        title="Coordination étroite avec le maître d'ouvrage, le maître d'œuvre et les entreprises."
                        description="Faciliter les échanges entre tous les intervenants."
                    />
                    <x-site.methodology-step
                        number="4"
                        title="Mesures de prévention collectives et individuelles"
                        description="Des mesures adaptées à chaque phase pour garantir la sécurité de tous."
                    />
                    <x-site.methodology-step
                        number="5"
                        title="Documentation structurée, normalisée et conforme au Code du travail"
                        description="Garantir une conformité réglementaire sans compromis."
                    />

                    {{-- Sixième case : l'illustration remplace une carte, comme sur la maquette. --}}
                    <div class="flex items-center justify-center">
                        <x-ui.img
                            src="images/casqueCC.png"
                            alt="Casque de chantier aux couleurs de Conseils Coordination"
                            loading="lazy"
                            class="w-full max-w-xs"
                        />
                    </div>
                </div>
            </div>
        </section>

        {{-- Missions principales --}}
        <x-site.missions />

        {{-- Experts --}}
        <section id="experts" class="bg-slate-50 py-10 sm:py-14">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <x-ui.section-heading
                    eyebrow="L'équipe"
                    title="Des experts à votre service"
                    description="Coordinateurs SPS certifiés, à vos côtés du premier échange à la réception du chantier."
                    align="center"
                />

                <div class="mt-10 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:max-w-3xl lg:mx-auto">
                    <x-site.expert-card
                        name="Didier Zieba"
                        role="Gérant, CC Conseils Coordination"
                        phone="06.77.76.28.24"
                        email="contact@conseils-coordination.fr"
                        photo="images/experts/didier.webp"
                    />
                    <x-site.expert-card
                        name="Pascale Perez"
                        role="Coordinatrice SPS, CC Conseils Coordination"
                        phone="07.69.60.89.59"
                        email="contact@conseils-coordination.fr"
                        photo="images/experts/pascale.webp"
                    />
                </div>
            </div>
        </section>

        {{-- CTA. Le carrousel de clients a rejoint le hero (preuve sociale dès le premier
             écran) ; cette section reste l'invitation finale à prendre contact. --}}
        <section id="clients" class="mx-auto max-w-7xl px-6 py-10 sm:py-14 text-center lg:px-8">
            <x-ui.section-heading
                eyebrow="Votre projet"
                title="Parlons de votre projet"
                description="Faites le choix d'un accompagnement expert et réactif. Contactez-nous dès aujourd'hui."
                align="center"
            />
        </section>
    </main>

    <x-site.footer />
</x-layout>
