@if (count($slides))
    <div {{ $attributes->merge(['class' => "photo-carousel relative $aspect overflow-hidden rounded-lg"]) }} role="group" aria-label="Photos de chantiers">
        {{-- Règle générée par le composant : ses paliers dépendent du nombre de photos. --}}
        <style>{!! $keyframes !!}</style>

        <div class="photo-carousel__track" style="--pc-name: {{ $name }}; --pc-duration: {{ $duration }}s">
            @foreach ($slides as $photo)
                {{-- La dernière vue est le doublon de la première : masquée aux lecteurs
                     d'écran et sans texte alternatif, pour ne pas être annoncée deux fois. --}}
                <figure class="relative {{ $aspect }} w-full shrink-0 overflow-hidden" @if ($photo['hidden']) aria-hidden="true" @endif>
                    <img
                        src="{{ asset($photo['src']) }}"
                        alt="{{ $photo['alt'] ?? '' }}"
                        @if ($photo['width']) width="{{ $photo['width'] }}" height="{{ $photo['height'] }}" @endif
                        loading="lazy"
                        class="h-full w-full object-cover"
                    >

                    @if (!empty($photo['caption']))
                        {{-- Même masque que x-ui.photo : dégradé montant, opaque sous le texte. --}}
                        <figcaption class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-brand-900 via-brand-900/70 to-transparent px-4 pt-10 pb-3 text-[10px] font-semibold text-white">
                            {{ $photo['caption'] }}
                        </figcaption>
                    @endif
                </figure>
            @endforeach
        </div>
    </div>
@endif
