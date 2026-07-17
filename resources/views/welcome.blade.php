<x-layout>
    <x-site.header />

    <main id="contenu">
        <x-site.hero />

        {{-- Notre exigence --}}
        <section id="exigence" class="mx-auto max-w-7xl px-6 py-10 sm:py-14 lg:px-8">
            <x-ui.section-heading title="Notre exigence" align="center" max-width="max-w-none">
                {{-- Titre centré, mais paragraphe laissé au fer à gauche : centré, il serait
                     illisible sur toute la largeur de la grille. --}}
                <p class="text-left">
                    C-C propose une
                    <strong class="font-semibold text-brand-900">prestation CSPS complète, rigoureuse et conforme à la réglementation</strong>,
                    avec une forte expérience terrain, une organisation fiable et une méthodologie très structurée,
                    adaptée à des opérations complexes de bâtiment et de génie civil.
                </p>
            </x-ui.section-heading>

            {{-- mt-4 : le même écart que celui qui sépare le titre de ce texte (section-heading). --}}
            <div class="mt-4 grid gap-6 sm:grid-cols-2">
                <div class="space-y-6">
                    <x-ui.photo
                        src="images/chantiers/site-seveso.png"
                        alt="Site industriel SEVESO"
                        caption="Site SEVESO Total"
                        class="shadow-lg"
                    />

                    <div>
                        <x-ui.photo
                            src="images/chantiers/pont-albi.png"
                            alt="Échafaudages sur le vieux pont d'Albi"
                            caption="Le vieux pont d'Albi"
                            class="shadow-lg"
                        />
                        <div class="mt-4">
                            <p class="text-base font-bold text-brand-900">Des projets d'envergure en Occitanie</p>
                            <p class="mt-1 text-sm text-slate-500">
                                L'aéroport de Rodez, le vieux pont d'Albi, barrages, site SEVESO Total…
                            </p>
                        </div>
                    </div>
                </div>

                <div class="space-y-6 sm:pt-16">
                    <x-ui.photo
                        src="images/chantiers/aeroport-rodez.png"
                        alt="Vue aérienne de l'aéroport de Rodez"
                        caption="Aéroport de Rodez"
                        class="shadow-lg"
                    />
                    <x-ui.photo
                        src="images/chantiers/genie-civil.png"
                        alt="Pose d'un tablier de pont par grue en vallée"
                        caption="Ouvrage de génie civil"
                        class="shadow-lg"
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
                    max-width="max-w-3xl"
                />

                {{-- Grille resserrée : à pleine largeur, les cartes seraient plus larges que hautes.
                     Les cercles numérotés débordant en haut, gap-y est généreux pour qu'ils ne
                     chevauchent pas la rangée précédente. --}}
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
        <section id="missions" class="mx-auto max-w-7xl px-6 py-10 sm:py-14 lg:px-8">
            <x-ui.section-heading
                title="Missions principales assurées"
                description="Conseils - Coordination intervient sur toutes les phases du projet, de la conception à la réalisation :"
                align="center"
                max-width="max-w-3xl"
            />

            @php
                // Le gras cible les termes métier réellement recherchés (PGC, DIUO, PPSPS…),
                // à raison d'un ou deux par mission pour ne pas diluer le signal.
                $missions = [
                    'Analyse des offres des entreprises sur demande (<strong>conformité au PGC</strong>).',
                    '<strong>Déclaration préalable</strong> transmise au maître d\'ouvrage.',
                    'Élaboration, mise à jour et diffusion du <strong>PGC SPS</strong> (Plan Général de Coordination).',
                    'Ouverture et tenue du <strong>registre journal SPS</strong> : inspections communes, visites de chantier, courriers, comptes rendus.',
                    'Organisation et animation des <strong>inspections communes</strong>, analyse des <strong>PPSPS</strong> avant autorisation de démarrage des travaux.',
                    'Participation aux réunions de chantier, <strong>visites inopinées</strong>, <strong>vacations de sécurité</strong>.',
                    'Gestion des <strong>situations accidentelles</strong> (analyse des causes, sécurisation, information MO/MOE).',
                    'Élaboration et remise du <strong>DIUO</strong> (Dossier d\'Intervention Ultérieure sur l\'Ouvrage).',
                ];
            @endphp

            @php
                // Chaque carte occupe un créneau exclusif : une seule est cochée à la fois,
                // et le cycle complet reboucle une fois la dernière atteinte.
                $slot = 2400;
                $cycle = $slot * count($missions);
            @endphp

            {{-- grid-flow-col + 4 rangées : les cartes descendent la 1re colonne avant de passer à la 2de,
                 donc la coche suit le même chemin que l'ordre de lecture. --}}
            <ul class="mt-10 grid gap-4 sm:grid-flow-col sm:grid-rows-4">
                @foreach ($missions as $mission)
                    <x-site.mission-item :delay="$loop->index * $slot" :duration="$cycle">
                        {!! $mission !!}
                    </x-site.mission-item>
                @endforeach
            </ul>
        </section>

        {{-- Experts --}}
        <section id="experts" class="bg-slate-50 py-10 sm:py-14">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <x-ui.section-heading
                    eyebrow="L'équipe"
                    title="Des experts à votre service"
                    description="Coordinateurs SPS certifiés, à vos côtés du premier échange à la réception du chantier."
                    align="center"
                    class="mx-auto"
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
                class="mx-auto"
            />
        </section>
    </main>

    <x-site.footer />
</x-layout>
