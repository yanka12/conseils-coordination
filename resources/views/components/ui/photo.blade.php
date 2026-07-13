@props([
    'src',
    'alt',
    'caption' => null,
    'aspect' => 'aspect-[4/3]',
])

@php
    // Dimensions lues sur le fichier : elles restent justes le jour où la photo est
    // remplacée, là où des valeurs recopiées à la main finiraient par mentir.
    [$width, $height] = @getimagesize(public_path($src)) ?: [null, null];
@endphp

<figure {{ $attributes->merge(['class' => "relative $aspect overflow-hidden rounded-lg"]) }}>
    <img
        src="{{ asset($src) }}"
        alt="{{ $alt }}"
        @if ($width) width="{{ $width }}" height="{{ $height }}" @endif
        loading="lazy"
        class="h-full w-full object-cover"
    >

    @if ($caption)
        {{-- Dégradé montant du bas : opaque sous le texte, il s'efface vers le haut.
             Le texte reste lisible sans que la photo soit tranchée par une bande. --}}
        <figcaption class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-brand-900 via-brand-900/70 to-transparent px-4 pt-10 pb-3 text-[10px] font-semibold text-white">
            {{ $caption }}
        </figcaption>
    @endif
</figure>
