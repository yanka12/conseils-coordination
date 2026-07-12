@props([
    'label' => 'Photo à venir',
    'icon' => 'building',
    'aspect' => 'aspect-[4/3]',
])

@php
    $icons = [
        'building' => '<path stroke-linecap="round" stroke-linejoin="round" d="M3 21h18M5 21V7l7-4 7 4v14M9 9h1m-1 4h1m4-4h1m-1 4h1M9 21v-4h6v4" />',
        'crane' => '<path stroke-linecap="round" stroke-linejoin="round" d="M4 21h16M6 21V9M6 9L4 6m2 3l10-3m0 0v15m0-15l4 1M10 21v-6h4v6" />',
        'aerial' => '<path stroke-linecap="round" stroke-linejoin="round" d="M3 9l9-6 9 6-9 6-9-6Zm0 6l9 6 9-6M3 12l9 6 9-6" />',
        'portrait' => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8Zm-7 9a7 7 0 0 1 14 0" />',
        'helmet' => '<path stroke-linecap="round" stroke-linejoin="round" d="M4 18a8 8 0 1 1 16 0H4ZM10 18v-3m4 3v-3M4 21h16" />',
    ];

    $path = $icons[$icon] ?? $icons['building'];
@endphp

<div {{ $attributes->merge(['class' => "$aspect relative flex items-center justify-center overflow-hidden rounded-lg bg-gradient-to-br from-brand-300 to-brand-600"]) }}>
    <svg class="h-10 w-10 text-white/70" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
        {!! $path !!}
    </svg>
    <span class="absolute bottom-2 left-2 rounded bg-black/30 px-2 py-0.5 text-[11px] text-white">
        {{ $label }}
    </span>
</div>
