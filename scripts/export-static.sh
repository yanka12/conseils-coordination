#!/usr/bin/env bash
#
# Génère une version statique du site dans dist/.
#
# Le site n'a ni base de données ni formulaire : tout le contenu est rendu par
# Blade au chargement, donc capturer le HTML de la page suffit.
#
# Usage :
#   bash scripts/export-static.sh
#
# Sur cette machine Windows, le php du PATH est en 8.3 alors que Laravel 13
# exige 8.4. Il faut donc désigner l'interpréteur :
#   PHP_BIN="/c/laragon/bin/php/php-8.4.18-Win32-vs17-x64/php.exe" bash scripts/export-static.sh

set -euo pipefail

PHP="${PHP_BIN:-php}"
PORT="${PORT:-8123}"
ORIGIN="http://127.0.0.1:${PORT}"

# L'adresse publique vient de APP_URL : une seule source de vérité, partagée avec les
# balises canonical et Open Graph du gabarit.
SITE_URL=$("$PHP" -r 'require "vendor/autoload.php"; $a = require "bootstrap/app.php"; $a->make("Illuminate\Contracts\Console\Kernel")->bootstrap(); echo rtrim(config("app.url"), "/");')

echo "==> Site : ${SITE_URL}"

echo "==> Compilation des assets"
npm run build

echo "==> Démarrage du serveur Laravel"
"$PHP" artisan serve --port="$PORT" >/dev/null 2>&1 &
SERVER_PID=$!
trap 'kill $SERVER_PID 2>/dev/null || true' EXIT

# Laisse le serveur se lier au port avant de l'interroger.
until curl -s -o /dev/null "$ORIGIN"; do sleep 0.3; done

echo "==> Capture du HTML"
rm -rf dist
mkdir -p dist

# Sans ce contrôle, une page d'erreur Laravel (500) serait exportée telle quelle
# et déployée sans que rien ne le signale.
STATUS=$(curl -s -o /dev/null -w '%{http_code}' "$ORIGIN")
if [ "$STATUS" != "200" ]; then
    echo "ERREUR : la page répond $STATUS au lieu de 200." >&2
    curl -s "$ORIGIN" | grep -oE '<h1[^>]*>[^<]*' | sed 's/<[^>]*>//' >&2 || true
    exit 1
fi

# asset() produit des URL absolues vers l'hôte local. On les rend relatives :
# GitHub Pages sert le site depuis un sous-dossier (/conseils-coordination/),
# où des chemins commençant par « / » pointeraient à la racine du domaine.
curl -s "$ORIGIN" | sed "s|${ORIGIN}/||g" > dist/index.html

echo "==> Copie des fichiers publics"
cp -r public/build dist/build
cp -r public/images dist/images
cp public/favicon.ico dist/

# Sans ce fichier, GitHub Pages fait passer le dossier par Jekyll.
touch dist/.nojekyll

# Le référencement est prêt côté balises, mais reste désarmé tant que le site est une
# préversion : l'indexer créerait du contenu dupliqué le jour de la bascule sur le vrai
# domaine, et Google pénalise cela. Passer PREVIEW=0 pour ouvrir l'indexation.
PREVIEW="${PREVIEW:-1}"

if [ "$PREVIEW" = "1" ]; then
    echo "==> Préversion : indexation bloquée"
    sed -i 's|</title>|</title>\n        <meta name="robots" content="noindex, nofollow">|' dist/index.html
    printf 'User-agent: *\nDisallow: /\n' > dist/robots.txt
else
    echo "==> Production : indexation ouverte"
    printf 'User-agent: *\nAllow: /\n\nSitemap: %s/sitemap.xml\n' "$SITE_URL" > dist/robots.txt

    cat > dist/sitemap.xml <<XML
<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>${SITE_URL}/</loc>
        <lastmod>$(date +%F)</lastmod>
        <changefreq>monthly</changefreq>
        <priority>1.0</priority>
    </url>
</urlset>
XML
fi

echo "==> Terminé — dist/ prêt ($(du -sh dist | cut -f1))"
