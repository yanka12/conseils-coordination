<img
    src="{{ asset($src) }}"
    alt="{{ $alt }}"
    @if ($width) width="{{ $width }}" height="{{ $height }}" @endif
    {{ $attributes }}
>
