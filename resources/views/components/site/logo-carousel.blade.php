@php
    // Les logos sont listés depuis le disque : déposer un fichier suffit à l'ajouter.
    // Tri naturel pour que 10.png suive 9.png et non 1.png.
    $files = glob(public_path('images/logos-clients/*.png')) ?: [];
    natsort($files);
    $logos = array_map('basename', $files);
@endphp

@if ($logos)
    <div class="marquee overflow-hidden">
        {{-- La piste est dupliquée : voir l'explication du -50 % dans app.css. --}}
        <ul class="marquee__track flex w-max items-center">
            @foreach (array_merge($logos, $logos) as $index => $logo)
                <li class="shrink-0 px-8">
                    <img
                        src="{{ asset('images/logos-clients/' . $logo) }}"
                        alt=""
                        loading="lazy"
                        {{-- La seconde copie ne sert qu'au rebouclage : la masquer aux lecteurs d'écran. --}}
                        aria-hidden="true"
                        class="h-16 w-auto opacity-60 transition duration-300 hover:opacity-100"
                    >
                </li>
            @endforeach
        </ul>
    </div>
@endif
