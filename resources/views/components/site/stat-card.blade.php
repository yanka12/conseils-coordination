{{-- Icône au-dessus du texte tant qu'on n'est pas en desktop : en trois colonnes, la
     cellule est trop étroite pour les mettre côte à côte sans écraser le libellé. --}}
<div {{ $attributes->merge(['class' => 'flex flex-col gap-3 rounded-xl px-5 py-6 shadow-lg backdrop-blur-sm lg:flex-row lg:items-center lg:gap-4 lg:px-6 lg:py-8 ' . $variantClasses]) }}>
    <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-lg {{ $iconBox }}">
        <x-ui.icon :name="$icon" class="h-6 w-6" />
    </span>

    <div>
        <p class="text-2xl font-bold leading-none">{{ $value }}</p>
        <p class="mt-1 text-sm {{ $labelColor }}">{{ $label }}</p>
    </div>
</div>
