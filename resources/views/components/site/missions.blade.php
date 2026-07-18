<section id="missions" class="mx-auto max-w-7xl px-6 py-10 sm:py-14 lg:px-8">
    <x-ui.section-heading
        title="Missions principales assurées"
        description="Conseils - Coordination intervient sur toutes les phases du projet, de la conception à la réalisation :"
        align="center"
        max-width="max-w-3xl"
    />

    {{-- grid-flow-col + 4 rangées : les cartes descendent la 1re colonne avant de passer à la 2de,
         donc la coche suit le même chemin que l'ordre de lecture. --}}
    <ul class="mt-10 grid gap-4 sm:grid-flow-col sm:grid-rows-4">
        @foreach ($items as $item)
            <x-site.mission-item :delay="$item['delay']" :duration="$duration">
                {!! $item['html'] !!}
            </x-site.mission-item>
        @endforeach
    </ul>
</section>
