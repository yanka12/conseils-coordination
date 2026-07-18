@if ($logos)
    <div class="marquee overflow-hidden">
        {{-- La piste est dupliquée : voir l'explication du -50 % dans app.css. --}}
        <ul class="marquee__track flex w-max items-center">
            @foreach (array_merge($logos, $logos) as $index => $logo)
                <li class="shrink-0 px-8">
                    <x-ui.img
                        src="images/logos-clients/{{ $logo }}"
                        alt=""
                        loading="lazy"
                        {{-- Logos décoratifs, et la piste est dupliquée pour la boucle : les
                             annoncer reviendrait à réciter deux fois la même liste. --}}
                        aria-hidden="true"
                        class="h-16 w-auto opacity-60 transition duration-300 hover:opacity-100"
                    />
                </li>
            @endforeach
        </ul>
    </div>
@endif
