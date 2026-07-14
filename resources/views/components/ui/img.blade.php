@props([
    'src',
    'alt' => '',
])

@php
    // Les dimensions sont lues sur le fichier plutôt que recopiées dans le gabarit :
    // recopiées, elles mentent dès qu'on remplace ou redimensionne l'image, et le
    // navigateur réserve alors une place fausse — la page saute au chargement.
    [$width, $height] = @getimagesize(public_path($src)) ?: [null, null];
@endphp

<img
    src="{{ asset($src) }}"
    alt="{{ $alt }}"
    @if ($width) width="{{ $width }}" height="{{ $height }}" @endif
    {{ $attributes }}
>
