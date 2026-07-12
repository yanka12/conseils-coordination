@props([
    'href' => null,
    'variant' => 'primary',
    'type' => 'button',
])

@php
    $variants = [
        'primary' => 'bg-brand-700 text-white hover:bg-brand-600',
        'secondary' => 'bg-white text-brand-700 hover:bg-brand-50',
        'outline' => 'border border-white/70 text-white hover:bg-white/10',
    ];

    $classes = 'inline-flex items-center justify-center rounded-md px-6 py-3 text-sm font-semibold transition '
        . ($variants[$variant] ?? $variants['primary']);
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif
