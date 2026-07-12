@props([
    'value',
    'label',
    'icon' => 'shield',
    'variant' => 'dark',
])

@php
    $icons = [
        'shield' => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 3l7 3v5c0 4.4-3 8.2-7 10-4-1.8-7-5.6-7-10V6l7-3Z" />',
        'helmet' => '<path stroke-linecap="round" stroke-linejoin="round" d="M4 17a8 8 0 1 1 16 0H4Zm5 0V9m6 8V9M3 20h18" />',
        'document' => '<path stroke-linecap="round" stroke-linejoin="round" d="M8 3h6l5 5v13H8V3Zm6 0v5h5M9.5 14l1.8 1.8 3.4-3.6" />',
    ];

    $variants = [
        'dark' => 'bg-brand-800 text-white',
        'medium' => 'bg-brand-400/90 text-white',
        'light' => 'bg-white text-brand-900',
    ];

    $iconBox = $variant === 'light' ? 'bg-brand-700 text-white' : 'bg-white/15 text-white';
    $labelColor = $variant === 'light' ? 'text-slate-500' : 'text-white/75';
@endphp

{{-- Icône au-dessus du texte tant qu'on n'est pas en desktop : en trois colonnes, la
     cellule est trop étroite pour les mettre côte à côte sans écraser le libellé. --}}
<div {{ $attributes->merge(['class' => 'flex flex-col gap-3 rounded-xl px-5 py-6 shadow-lg backdrop-blur-sm lg:flex-row lg:items-center lg:gap-4 lg:px-6 lg:py-8 ' . ($variants[$variant] ?? $variants['dark'])]) }}>
    <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-lg {{ $iconBox }}">
        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
            {!! $icons[$icon] ?? $icons['shield'] !!}
        </svg>
    </span>

    <div>
        <p class="text-2xl font-bold leading-none">{{ $value }}</p>
        <p class="mt-1 text-sm {{ $labelColor }}">{{ $label }}</p>
    </div>
</div>
