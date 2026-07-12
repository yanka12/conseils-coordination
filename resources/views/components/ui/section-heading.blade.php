@props([
    'eyebrow' => null,
    'title',
    'description' => null,
    'align' => 'left',
])

@php
    $alignClasses = $align === 'center' ? 'mx-auto text-center' : 'text-left';
@endphp

<div {{ $attributes->merge(['class' => "max-w-2xl $alignClasses"]) }}>
    @if ($eyebrow)
        <p class="text-sm font-semibold tracking-wider text-brand-500 uppercase">{{ $eyebrow }}</p>
    @endif

    <h2 class="mt-2 text-3xl font-bold text-brand-900 sm:text-4xl">{{ $title }}</h2>

    @if ($description)
        <p class="mt-4 text-base text-slate-600">{{ $description }}</p>
    @endif

    @if (trim($slot) !== '')
        <div class="mt-4 text-base text-slate-600">{{ $slot }}</div>
    @endif
</div>
