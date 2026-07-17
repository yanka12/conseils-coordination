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
                <x-ui.img
                    src="images/logos/Logo-CC-mark-clair.png"
                    alt="Conseils Coordination"
                    loading="lazy"
                    class="mx-auto w-40"
                />

                <div class="flex flex-col gap-3">
                    <x-ui.button href="tel:0677762824" variant="light">
                        Appelez-nous
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
                <x-ui.copy-email email="didier.zieba@conseils-coordination.com" class="mt-2" />
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

            <x-site.info-card title="Informations sur le site internet" icon="info" variant="plain" layout="stacked">
                <ul class="space-y-0.5 text-center text-xs">
                    <li>Directeur de publication : <span class="text-white/90">Didier Zieba</span></li>
                    <li>Hébergeur du site : <span class="text-white/90">GitHub Pages</span></li>
                    <li>Site réalisé par l'agence AG@, 12500 Espalion</li>
                </ul>
            </x-site.info-card>
        </div>

        {{-- Colonne 3 : localisation. Image de carte auto-hébergée (aucun appel externe,
             donc rien à charger chez Google au runtime) qui ouvre Google Maps au clic.
             h-full remplit la hauteur imposée par la colonne du milieu ; min-h évite que la
             carte ne s'écrase sur mobile, où il n'y a plus rien à égaler. --}}
        <a
            href="https://www.google.com/maps/place/Conseils+Coordination/@43.910196,2.159858,14z/data=!4m6!3m5!1s0x12ade7e9156f5fa3:0x125839d94275a712!8m2!3d43.9100726!4d2.1602874!16s%2Fg%2F1vntxqhd?hl=fr"
            target="_blank"
            rel="noopener noreferrer"
            class="group relative block overflow-hidden rounded-3xl shadow-xl ring-1 ring-white/10"
        >
            <x-ui.img
                src="images/carte-albi2.png"
                alt="Localisation de Conseils Coordination, 20 rue Jean Rieux à Albi"
                loading="lazy"
                class="h-full min-h-96 w-full object-cover transition duration-500 group-hover:scale-105"
            />

            {{-- Dégradé sombre en bas : ancre le bouton et fond la carte dans le footer. --}}
            <div class="pointer-events-none absolute inset-x-0 bottom-0 h-28 bg-gradient-to-t from-brand-900/85 to-transparent"></div>

            <span class="pointer-events-none absolute bottom-4 left-1/2 inline-flex -translate-x-1/2 items-center gap-1.5 rounded-full bg-white px-4 py-2 text-xs font-semibold whitespace-nowrap text-brand-900 shadow-lg transition group-hover:bg-brand-light">
                Ouvrir dans Google Maps
                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14 5h5v5m0-5L10 14M9 6H6a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-3" />
                </svg>
            </span>
        </a>
    </div>

    {{-- Bandeau de copyright, dans le bleu marine de la barre de navigation. --}}
    <div class="relative bg-brand-800">
        <p class="mx-auto max-w-7xl px-6 py-4 text-center text-xs text-white/60 lg:px-8">
            &copy; {{ date('Y') }} SARL Conseils Coordination. Tous droits réservés.
        </p>
    </div>
</footer>
