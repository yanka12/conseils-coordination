<div {{ $attributes->merge(['class' => "$maxWidth $alignClasses"]) }}>
    @if ($eyebrow)
        <p class="text-sm font-semibold tracking-wider text-brand-500 uppercase">{{ $eyebrow }}</p>
    @endif

    {{-- Non échappé pour autoriser un <br> de composition. Le titre est toujours écrit
         dans le gabarit, jamais issu d'une saisie.
         mt-2 sépare le titre de son sur-titre : sans sur-titre, il décalerait la section
         de 8 px par rapport à celles qui n'en ont pas. --}}
    <h2 class="@if ($eyebrow) mt-2 @endif text-3xl font-bold text-brand-900 sm:text-4xl">{!! $title !!}</h2>

    @if ($description)
        <p class="mt-4 text-base text-slate-600">{{ $description }}</p>
    @endif

    @if (trim($slot) !== '')
        <div class="mt-4 text-base text-slate-600">{{ $slot }}</div>
    @endif
</div>
