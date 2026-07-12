<x-layout>
    <x-site.header />

    <main>
        <x-site.hero />

        {{-- Notre exigence --}}
        <section id="exigence" class="mx-auto max-w-7xl px-6 py-20 lg:px-8">
            <x-ui.section-heading title="Notre exigence" class="max-w-3xl">
                <p>
                    C-C propose une
                    <strong class="font-semibold text-brand-900">prestation CSPS complète, rigoureuse et conforme à la réglementation</strong>,
                    avec une forte expérience terrain, une organisation fiable et une méthodologie très structurée,
                    adaptée à des opérations complexes de bâtiment et de génie civil.
                </p>
            </x-ui.section-heading>

            <div class="mt-14 grid gap-6 sm:grid-cols-2">
                <div class="space-y-6">
                    <x-ui.photo
                        src="images/chantiers/site-seveso.png"
                        alt="Site industriel SEVESO"
                        class="shadow-lg"
                    />

                    <figure>
                        <x-ui.photo
                            src="images/chantiers/pont-albi.png"
                            alt="Échafaudages sur le vieux pont d'Albi"
                            class="shadow-lg"
                        />
                        <figcaption class="mt-4">
                            <p class="text-base font-bold text-brand-900">Des projets d'envergure en Occitanie</p>
                            <p class="mt-1 text-sm text-slate-500">
                                L'aéroport de Rodez, le vieux pont d'Albi, barrages, site SEVESO Total…
                            </p>
                        </figcaption>
                    </figure>
                </div>

                <div class="space-y-6 sm:pt-16">
                    <x-ui.photo
                        src="images/chantiers/aeroport-rodez.png"
                        alt="Vue aérienne de l'aéroport de Rodez"
                        class="shadow-lg"
                    />
                    <x-ui.photo
                        src="images/chantiers/genie-civil.png"
                        alt="Pose d'un tablier de pont par grue en vallée"
                        class="shadow-lg"
                    />
                </div>
            </div>
        </section>

        {{-- Méthodologie --}}
        <section id="methodologie" class="bg-slate-50 py-20">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <x-ui.section-heading
                    eyebrow="Notre méthode"
                    title="Une méthodologie éprouvée pour votre sécurité"
                    align="center"
                    class="mx-auto"
                />

                <div class="mt-12 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    <x-site.methodology-step
                        number="1"
                        title="Analyse approfondie du site"
                        description="Étude du site et de son environnement pour identifier les contraintes spécifiques du chantier."
                    />
                    <x-site.methodology-step
                        number="2"
                        title="Anticipation des risques"
                        description="Identification des risques d'interférence et de coactivité entre les entreprises intervenantes."
                    />
                    <x-site.methodology-step
                        number="3"
                        title="Coordination des acteurs"
                        description="Coordination continue avec la maîtrise d'ouvrage et l'ensemble des entreprises."
                    />
                    <x-site.methodology-step
                        number="4"
                        title="Mesures de prévention"
                        description="Définition et suivi des mesures de prévention adaptées à chaque phase du chantier."
                    />
                    <x-site.methodology-step
                        number="5"
                        title="Documentation réglementaire"
                        description="Rédaction et mise à jour des documents normalisés (PGC, DIUO, registre journal)."
                    />
                    <x-site.methodology-step
                        number="6"
                        title="Conformité au Code du travail"
                        description="Vérification continue de la conformité des installations et pratiques du chantier."
                    />
                </div>
            </div>
        </section>

        {{-- Missions principales --}}
        <section id="missions" class="mx-auto max-w-7xl px-6 py-20 lg:px-8">
            <x-ui.section-heading
                title="Missions principales assurées"
                description="Conseils - Coordination intervient sur toutes les phases du projet, de la conception à la réalisation :"
                class="max-w-3xl"
            />

            @php
                // Le gras cible les termes métier réellement recherchés (PGC, DIUO, PPSPS…),
                // à raison d'un ou deux par mission pour ne pas diluer le signal.
                $missions = [
                    'Analyse des offres des entreprises (<strong>conformité au PGC</strong>).',
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
            <ul class="mt-12 grid gap-4 sm:grid-flow-col sm:grid-rows-4">
                @foreach ($missions as $mission)
                    <x-site.mission-item :delay="$loop->index * $slot" :duration="$cycle">
                        {!! $mission !!}
                    </x-site.mission-item>
                @endforeach
            </ul>
        </section>

        {{-- Experts --}}
        <section id="experts" class="bg-slate-50 py-20">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <x-ui.section-heading
                    eyebrow="L'équipe"
                    title="Des experts à votre service"
                    description="Coordinateurs SPS certifiés, à vos côtés du premier échange à la réception du chantier."
                    align="center"
                    class="mx-auto"
                />

                <div class="mt-12 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:max-w-3xl lg:mx-auto">
                    <x-site.expert-card
                        name="Didier Ziera"
                        role="Gérant, CC Conseils Coordination"
                        phone="06.77.76.28.24"
                        email="contact@conseils-coordination.fr"
                    />
                    <x-site.expert-card
                        name="Pascale Perez"
                        role="Coordinatrice SPS, CC Conseils Coordination"
                        phone="07.69.60.89.59"
                        email="contact@conseils-coordination.fr"
                    />
                </div>
            </div>
        </section>

        {{-- CTA --}}
        <section class="mx-auto max-w-7xl px-6 py-20 text-center lg:px-8">
            <x-ui.section-heading
                eyebrow="Votre projet"
                title="Parlons de votre projet"
                description="Faites le choix d'un accompagnement expert et réactif. Contactez-nous dès aujourd'hui."
                align="center"
                class="mx-auto"
            />

            <div class="mt-8">
                <x-ui.button href="tel:0677762824" variant="primary">
                    Contactez-nous
                </x-ui.button>
            </div>
        </section>

        {{-- Clients --}}
        <section id="clients" class="border-t border-slate-100 py-14">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="grid grid-cols-2 gap-4 sm:grid-cols-5">
                    <x-site.client-logo name="Client 1" />
                    <x-site.client-logo name="Client 2" />
                    <x-site.client-logo name="Client 3" />
                    <x-site.client-logo name="Client 4" />
                    <x-site.client-logo name="Client 5" />
                </div>
            </div>
        </section>
    </main>

    <x-site.footer />
</x-layout>
