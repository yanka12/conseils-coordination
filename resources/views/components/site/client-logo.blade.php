@props([
    'name',
])

<div {{ $attributes->merge(['class' => 'flex h-12 items-center justify-center rounded-md bg-slate-100 px-4 text-sm font-semibold tracking-wide text-slate-400']) }}>
    {{ $name }}
</div>
