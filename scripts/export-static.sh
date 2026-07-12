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

# asset() produit des URL absolues vers l'hôte local. On les rend relatives :
# GitHub Pages sert le site depuis un sous-dossier (/conseils-coordination/),
# où des chemins commençant par « / » pointeraient à la racine du domaine.
curl -s "$ORIGIN" | sed "s|${ORIGIN}/||g" > dist/index.html

# Préversion : on ne veut pas que le site remonte dans les moteurs de recherche.
sed -i 's|</title>|</title>\n        <meta name="robots" content="noindex, nofollow">|' dist/index.html

echo "==> Copie des fichiers publics"
cp -r public/build dist/build
cp -r public/images dist/images
cp public/favicon.ico dist/

printf 'User-agent: *\nDisallow: /\n' > dist/robots.txt

# Sans ce fichier, GitHub Pages fait passer le dossier par Jekyll.
touch dist/.nojekyll

echo "==> Terminé — dist/ prêt ($(du -sh dist | cut -f1))"
