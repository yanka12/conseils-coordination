@props([
    'title' => 'Coordonnateur SPS à Albi (81) — Conseils Coordination',
    'description' => 'Coordination SPS en Occitanie depuis 2004. Coordonnateurs certifiés niveau 1, missions réalisées en interne : PGC, DIUO, inspections communes et visites de chantier.',
])

@php
    $url = rtrim(config('app.url'), '/');
    $image = $url . '/images/hero.webp';

    // Fiche d'établissement. Google s'en sert pour le panneau de connaissance et les
    // résultats locaux : c'est le levier le plus rentable pour une entreprise de service
    // implantée sur un territoire.
    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'ProfessionalService',
        'name' => 'Conseils Coordination',
        'legalName' => 'SARL Conseils Coordination',
        'description' => $description,
        'url' => $url,
        'logo' => $url . '/images/logos/Logo-CC.png',
        'image' => $image,
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
            'latitude' => 43.9121894,
            'longitude' => 2.1524267,
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
@endphp

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $title }}</title>
        <meta name="description" content="{{ $description }}">
        <link rel="canonical" href="{{ $url }}">

        {{-- Partage sur les réseaux et messageries --}}
        <meta property="og:type" content="website">
        <meta property="og:locale" content="fr_FR">
        <meta property="og:site_name" content="Conseils Coordination">
        <meta property="og:title" content="{{ $title }}">
        <meta property="og:description" content="{{ $description }}">
        <meta property="og:url" content="{{ $url }}">
        <meta property="og:image" content="{{ $image }}">
        <meta property="og:image:width" content="1900">
        <meta property="og:image:height" content="1131">
        <meta property="og:image:alt" content="Grue et ferraillage sur un chantier de gros œuvre">
        <meta name="twitter:card" content="summary_large_image">

        <meta name="theme-color" content="#141f33">

        <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="any">

        {{-- La photo du hero est le plus gros élément affiché au chargement : la précharger
             améliore directement le LCP, l'une des trois métriques Core Web Vitals. --}}
        <link rel="preload" as="image" href="{{ asset('images/hero.webp') }}" fetchpriority="high">

        <script type="application/ld+json">
            {!! json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
        </script>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-white font-sans text-slate-900 antialiased">
        {{-- Permet d'atteindre le contenu sans parcourir toute la navigation au clavier
             ou au lecteur d'écran. Invisible tant qu'il n'a pas le focus. --}}
        <a
            href="#contenu"
            class="sr-only focus:not-sr-only focus:absolute focus:left-4 focus:top-4 focus:z-50 focus:rounded-md focus:bg-brand-800 focus:px-4 focus:py-2 focus:text-white"
        >
            Aller au contenu
        </a>

        {{ $slot }}
    </body>
</html>
