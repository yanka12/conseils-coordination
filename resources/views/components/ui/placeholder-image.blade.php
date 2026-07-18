@props([
    'label' => 'Photo à venir',
    'icon' => 'building',
    'aspect' => 'aspect-[4/3]',
])

<div {{ $attributes->merge(['class' => "$aspect relative flex items-center justify-center overflow-hidden rounded-lg bg-gradient-to-br from-brand-300 to-brand-600"]) }}>
    <x-ui.icon :name="$icon" class="h-10 w-10 text-white/70" />
    <span class="absolute bottom-2 left-2 rounded bg-black/30 px-2 py-0.5 text-[11px] text-white">
        {{ $label }}
    </span>
</div>
