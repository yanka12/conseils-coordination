<footer id="contact" class="relative overflow-hidden bg-gradient-to-r from-brand-600 via-brand-500 to-brand-400 text-white">
    {{-- Halo lumineux à droite, comme sur la maquette. --}}
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_88%_55%,_rgba(147,197,253,0.35),_transparent_55%)]"></div>

    {{-- items-stretch (défaut) : les colonnes s'alignent sur la plus haute, celle du milieu.
         C'est ce qui permet à la carte de remplir toute la hauteur. --}}
    <div class="relative mx-auto grid max-w-7xl gap-10 px-6 py-16 lg:grid-cols-[1fr_1.5fr_1fr] lg:px-8">

        {{-- Colonne 1 : logo et contact, dans la déclinaison gris / bleu clair.
             Logo et boutons partagent la même largeur : le mx-auto centre donc le logo
             sur les boutons, et non sur la colonne entière. --}}
        <div class="flex flex-col items-center justify-center lg:items-start">
            <div class="flex w-full max-w-56 flex-col gap-8">
                <img
                    src="{{ asset('images/logos/Logo-CC-mark-clair.png') }}"
                    alt="Conseils Coordination"
                    width="2076"
                    height="1199"
                    loading="lazy"
                    class="mx-auto w-40"
                >

                <div class="flex flex-col gap-3">
                    <x-ui.button href="tel:0677762824" variant="light">
                        Contactez-nous
                    </x-ui.button>
                    <x-ui.button href="mailto:contact@conseils-coordination.fr" variant="light">
                        Envoyer un e-mail
                    </x-ui.button>
                </div>
            </div>
        </div>

        {{-- Colonne 2 : coordonnées et mentions légales --}}
        <div class="space-y-3">
            <x-site.info-card title="Siège social" icon="pin" variant="plain">
                <p class="font-semibold text-white">20 rue Jean Rieux - 81000 Albi</p>
            </x-site.info-card>

            <x-site.info-card title="Mentions légales" icon="document" variant="dark" layout="stacked">
                <dl class="grid gap-x-6 gap-y-1.5 text-xs sm:grid-cols-2">
                    <div>
                        <dt class="text-white/50">SIRET</dt>
                        <dd class="text-white/90">47934588600036</dd>
                    </div>
                    <div>
                        <dt class="text-white/50">APE</dt>
                        <dd class="text-white/90">71.12B</dd>
                    </div>
                    <div>
                        <dt class="text-white/50">RCS</dt>
                        <dd class="text-white/90">Albi 479 345 886</dd>
                    </div>
                    <div>
                        <dt class="text-white/50">TVA intracommunautaire</dt>
                        <dd class="text-white/90">FR60479345886</dd>
                    </div>
                    <div>
                        <dt class="text-white/50">Capital social</dt>
                        <dd class="text-white/90">SARL au capital de 1 000 euros</dd>
                    </div>
                    <div>
                        <dt class="text-white/50">Gérant</dt>
                        <dd class="text-white/90">Didier Zieba</dd>
                    </div>
                </dl>
            </x-site.info-card>

            <x-site.info-card title="Informations sur le site internet" icon="info" layout="stacked">
                <ul class="space-y-0.5 text-center text-xs">
                    <li>Directeur de publication : <span class="text-white/90">Didier Zieba</span></li>
                    <li>Hébergeur du site : <span class="text-white/90">GitHub Pages</span></li>
                    <li>Site réalisé par l'agence AG@, 12500 Espalion</li>
                </ul>
            </x-site.info-card>
        </div>

        {{-- Colonne 3 : localisation. h-full remplit la hauteur imposée par la colonne du milieu ;
             min-h évite que la carte ne s'écrase sur mobile, où il n'y a plus rien à égaler. --}}
        <div class="overflow-hidden rounded-3xl shadow-xl">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12281.557923978451!2d2.1524267074757986!3d43.91218943197617!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12ade7e9156f5fa3%3A0x125839d94275a712!2sConseils%20Coordination!5e0!3m2!1sfr!2sfr!4v1783848701347!5m2!1sfr!2sfr"
                title="Localisation de Conseils Coordination, 20 rue Jean Rieux à Albi"
                class="h-full min-h-96 w-full border-0"
                allowfullscreen
                loading="lazy"
                referrerpolicy="strict-origin-when-cross-origin"
            ></iframe>
        </div>
    </div>

    {{-- Bandeau de copyright, dans le bleu marine de la barre de navigation. --}}
    <div class="relative bg-brand-800">
        <p class="mx-auto max-w-7xl px-6 py-4 text-center text-xs text-white/60 lg:px-8">
            &copy; {{ date('Y') }} SARL Conseils Coordination. Tous droits réservés.
        </p>
    </div>
</footer>
