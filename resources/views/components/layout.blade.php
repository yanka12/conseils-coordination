<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $title }}</title>
        <meta name="description" content="{{ $description }}">
        <link rel="canonical" href="{{ $canonical }}">

        {{-- Indexation par défaut, mais max-image-preview:large est nécessaire pour que
             Google affiche la grande vignette dans les résultats et dans Discover. --}}
        <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">

        {{-- Partage sur les réseaux et messageries --}}
        <meta property="og:type" content="website">
        <meta property="og:locale" content="fr_FR">
        <meta property="og:site_name" content="Conseils Coordination">
        <meta property="og:title" content="{{ $title }}">
        <meta property="og:description" content="{{ $description }}">
        <meta property="og:url" content="{{ $canonical }}">
        <meta property="og:image" content="{{ $image }}">
        <meta property="og:image:width" content="1900">
        <meta property="og:image:height" content="1131">
        <meta property="og:image:alt" content="Grue et ferraillage sur un chantier de gros œuvre">
        <meta name="twitter:card" content="summary_large_image">

        <meta name="theme-color" content="#141f33">

        {{-- Icône d'onglet (favicon). Le .ico embarque les tailles 16 et 32 pour les
             navigateurs anciens ; les PNG explicites servent les navigateurs récents,
             et apple-touch-icon l'écran d'accueil iOS. --}}
        <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="any">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
        <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">

        {{-- La photo du hero est le plus gros élément affiché au chargement : la précharger
             améliore directement le LCP, l'une des trois métriques Core Web Vitals.
             imagesrcset/imagesizes reprennent à l'identique le srcset du <img> (hero.blade.php) :
             sans cela le préchargement viserait une autre variante que celle finalement
             affichée, et le navigateur téléchargerait les deux. --}}
        <link
            rel="preload"
            as="image"
            href="{{ asset('images/hero.webp') }}"
            imagesrcset="{{ asset('images/hero-960.webp') }} 960w, {{ asset('images/hero-1400.webp') }} 1400w, {{ asset('images/hero.webp') }} 1900w"
            imagesizes="100vw"
            fetchpriority="high"
        >

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
