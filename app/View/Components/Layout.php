<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Layout extends Component
{
    public string $url;
    public string $image;
    /** Fiche d'établissement JSON-LD, déjà encodée pour le <script>. */
    public string $schemaJson;

    public function __construct(
        public string $title = 'Coordonnateur SPS à Albi (81) — Conseils Coordination',
        public string $description = 'Coordination SPS en Occitanie depuis 2004. Coordonnateurs certifiés niveau 1, missions réalisées en interne : PGC, DIUO, inspections communes et visites de chantier.',
    ) {
        $this->url = rtrim(config('app.url'), '/');
        $this->image = $this->url . '/images/hero.webp';

        // Fiche d'établissement. Google s'en sert pour le panneau de connaissance
        // et les résultats locaux : le levier le plus rentable pour une entreprise
        // de service implantée sur un territoire.
        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'ProfessionalService',
            'name' => 'Conseils Coordination',
            'legalName' => 'SARL Conseils Coordination',
            'description' => $this->description,
            'url' => $this->url,
            'logo' => $this->url . '/images/logos/Logo-CC.png',
            'image' => $this->image,
            'telephone' => '+33677762824',
            'email' => 'contact@conseils-coordination.fr',
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
            'areaServed' => [
                ['@type' => 'AdministrativeArea', 'name' => 'Occitanie'],
            ],
            'knowsAbout' => [
                'Coordination SPS',
                'Sécurité et Protection de la Santé',
                'Plan Général de Coordination',
                "Dossier d'Intervention Ultérieure sur l'Ouvrage",
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
