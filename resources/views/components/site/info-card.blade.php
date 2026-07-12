@props([
    'title',
    'icon' => 'pin',
    'variant' => 'light',
])

@php
    $icons = [
        'pin' => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 21s7-5.3 7-11a7 7 0 1 0-14 0c0 5.7 7 11 7 11Z" /><circle cx="12" cy="10" r="2.5" />',
        'document' => '<path stroke-linecap="round" stroke-linejoin="round" d="M8 3h6l5 5v13H8V3Zm6 0v5h5M10 13h8M10 17h5" />',
        'info' => '<circle cx="12" cy="12" r="9" /><path stroke-linecap="round" stroke-linejoin="round" d="M12 11v5m0-8h.01" />',
    ];

    $card = $variant === 'dark'
        ? 'border-brand-900/60 bg-brand-900/80'
        : 'border-white/15 bg-white/10';
@endphp

<div {{ $attributes->merge(['class' => "rounded-xl border $card p-5 backdrop-blur-sm"]) }}>
    <div class="flex items-center gap-3">
        <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-white/15 text-white">
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                {!! $icons[$icon] ?? $icons['pin'] !!}
            </svg>
        </span>

        <h3 class="text-sm font-semibold text-white">{{ $title }}</h3>
    </div>

    <div class="mt-4 text-sm leading-relaxed text-white/75">
        {{ $slot }}
    </div>
</div>
