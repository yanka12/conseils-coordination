@props([
    'number',
    'title',
    'description',
])

<div {{ $attributes->merge(['class' => 'rounded-lg border border-slate-200 bg-white p-6 shadow-sm']) }}>
    <span class="flex h-10 w-10 items-center justify-center rounded-full bg-brand-700 text-sm font-bold text-white">
        {{ $number }}
    </span>
    <h3 class="mt-4 text-base font-semibold text-brand-900">{{ $title }}</h3>
    <p class="mt-2 text-sm text-slate-600">{{ $description }}</p>
</div>
