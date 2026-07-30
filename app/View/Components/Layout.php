<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Layout extends Component
{
    /** Racine du site, sans barre oblique finale : sert à composer les URL absolues. */
    public string $url;
    /** URL réellement servie, barre oblique comprise : c'est elle qu'on déclare à Google. */
    public string $canonical;
    public string $image;
    /** Fiche d'établissement JSON-LD, déjà encodée pour le <script>. */
    public string $schemaJson;

    public function __construct(
        public string $title = 'Coordonnateur SPS à Albi (81) — Conseils Coordination',
        // 155 caractères au maximum : au-delà, Google tronque la description dans ses
        // résultats et la phrase se termine par des points de suspension.
        public string $description = 'Coordonnateur SPS certifié niveau 1 à Albi (Tarn) depuis 2004 : PGC, DIUO, inspections communes et visites de chantier, réalisés en interne.',
    ) {
        $this->url = rtrim(config('app.url'), '/');
        $this->canonical = $this->url . '/';
        $this->image = $this->url . '/images/hero.webp';

        // Fiche d'établissement. Google s'en sert pour le panneau de connaissance
        // et les résultats locaux : le levier le plus rentable pour une entreprise
        // de service implantée sur un territoire.
        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'ProfessionalService',
            // Identifiant stable de l'établissement : il permet à Google de rattacher
            // au même acteur les mentions trouvées ailleurs (annuaires, fiche locale).
            '@id' => $this->url . '/#organisation',
            'name' => 'Conseils Coordination',
            'legalName' => 'SARL Conseils Coordination',
            'description' => $this->description,
            'url' => $this->url,
            'logo' => $this->url . '/images/logos/Logo-CC.png',
            'image' => $this->image,
            'telephone' => '+33677762824',
            'email' => 'didier.zieba@conseils-coordination.com',
            'foundingDate' => '2004',
            'vatID' => 'FR60479345886',
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => '20 rue Jean Rieux',
                'postalCode' => '81000',
                'addressLocality' => 'Albi',
                'addressRegion' => 'Occitanie',
                'addressCountry' => 'FR',
            ],
            'geo' => [
                '@type' => 'GeoCoordinates',
                'latitude' => 43.9100726,
                'longitude' => 2.1602874,
            ],
            // Zone d'intervention déclarée : le Tarn, où l'établissement est implanté.
            // Un périmètre resserré et cohérent avec l'adresse est mieux exploité par
            // les résultats locaux qu'une région entière revendiquée sans point d'ancrage.
            'areaServed' => [
                ['@type' => 'AdministrativeArea', 'name' => 'Tarn'],
                ['@type' => 'City', 'name' => 'Albi'],
            ],
            'knowsAbout' => [
                'Coordination SPS',
                'Sécurité et Protection de la Santé',
                'Plan Général de Coordination',
                "Dossier d'Intervention Ultérieure sur l'Ouvrage",
            ],
            // Catalogue des prestations : reprend les missions listées sur la page, pour
            // que le service décrit dans le texte et celui déclaré à Google coïncident.
            'hasOfferCatalog' => [
                '@type' => 'OfferCatalog',
                'name' => 'Missions de coordination SPS',
                'itemListElement' => array_map(
                    fn (string $service) => [
                        '@type' => 'Offer',
                        'itemOffered' => ['@type' => 'Service', 'name' => $service],
                    ],
                    [
                        'Coordination SPS en phase conception',
                        'Coordination SPS en phase réalisation',
                        'Rédaction du Plan Général de Coordination (PGC SPS)',
                        "Élaboration du Dossier d'Intervention Ultérieure sur l'Ouvrage (DIUO)",
                        'Inspections communes et analyse des PPSPS',
                        'Visites de chantier et vacations de sécurité',
                        'Tenue du registre journal SPS',
                    ],
                ),
            ],
            'founder' => ['@type' => 'Person', 'name' => 'Didier Zieba'],
        ];

        $this->schemaJson = json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }

    public function render(): View
    {
        return view('components.layout');
    }
}
