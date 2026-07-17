@props([
    'name',
    'role',
    'phone',
    'email',
    'photo' => null,
])

<div {{ $attributes->merge(['class' => 'overflow-hidden rounded-lg bg-brand-700 text-white shadow-sm']) }}>
    @if ($photo)
        {{-- Portrait cadré en 4/3 comme le placeholder qu'il remplace : la carte garde
             la même hauteur, qu'il y ait une photo ou non. --}}
        <x-ui.img
            :src="$photo"
            :alt="$name"
            loading="lazy"
            class="aspect-[4/3] w-full object-cover"
        />
    @else
        <x-ui.placeholder-image :label="$name" icon="portrait" aspect="aspect-[4/3]" class="rounded-none" />
    @endif

    <div class="p-6">
        <h3 class="text-lg font-bold">{{ $name }}</h3>
        <p class="mt-1 text-sm text-white/75">{{ $role }}</p>

        <dl class="mt-4 space-y-1 text-sm text-white/90">
            <div class="flex items-center gap-2">
                <dt class="sr-only">Téléphone</dt>
                <dd><a href="tel:{{ $phone }}" class="font-bold hover:underline">{{ $phone }}</a></dd>
            </div>
            <div class="flex items-center gap-2">
                <dt class="sr-only">Email</dt>
                <dd><a href="mailto:{{ $email }}" class="hover:underline">{{ $email }}</a></dd>
            </div>
        </dl>
    </div>
</div>
