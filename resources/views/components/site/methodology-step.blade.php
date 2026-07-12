@props([
    'number',
    'title',
    'description',
])

{{-- justify-center centre le bloc de texte dans la hauteur de la carte.
     min-h maintient le format portrait même quand le texte est court.
     Le cercle numéroté est en position absolue : il chevauche le bord supérieur
     sans intervenir dans ce centrage. --}}
{{-- max-w borne la largeur sur la carte, pas sur la grille : sans cela, en 2 colonnes
     (écrans < 1024 px) la cellule s'élargit et la carte redevient horizontale. --}}
<div {{ $attributes->merge(['class' => 'relative mx-auto flex min-h-88 w-full max-w-72 flex-col justify-center rounded-2xl border border-slate-200 bg-white px-6 py-10 text-center shadow-sm']) }}>
    <span class="absolute -top-6 left-1/2 flex h-12 w-12 -translate-x-1/2 items-center justify-center rounded-full bg-brand-700 text-base font-bold text-white">
        {{ $number }}
    </span>

    <h3 class="text-base font-bold leading-snug text-brand-900">
        {{ $title }}
    </h3>

    <span class="mx-auto my-4 block h-px w-6 bg-slate-300"></span>

    <p class="text-xs leading-relaxed text-slate-400">
        {{ $description }}
    </p>
</div>
