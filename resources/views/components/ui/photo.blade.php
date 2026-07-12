@props([
    'src',
    'alt',
    'aspect' => 'aspect-[4/3]',
])

<img
    src="{{ asset($src) }}"
    alt="{{ $alt }}"
    loading="lazy"
    {{ $attributes->merge(['class' => "$aspect w-full rounded-lg object-cover"]) }}
>
