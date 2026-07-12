@props([
    'src',
    'alt',
    'caption' => null,
    'aspect' => 'aspect-[4/3]',
])

<figure {{ $attributes->merge(['class' => "relative $aspect overflow-hidden rounded-lg"]) }}>
    <img
        src="{{ asset($src) }}"
        alt="{{ $alt }}"
        loading="lazy"
        class="h-full w-full object-cover"
    >

    @if ($caption)
        {{-- Bande posée un peu au-dessus du bord bas, pas collée à lui. --}}
        <figcaption class="absolute inset-x-0 bottom-4 bg-brand-900/70 px-4 py-2 text-[10px] font-semibold text-white backdrop-blur-sm">
            {{ $caption }}
        </figcaption>
    @endif
</figure>
