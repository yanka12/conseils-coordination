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
            {!! $schemaJson !!}
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
