@props([
    'number',
    'title',
    'description',
])

{{-- pt-12 dégage la place du cercle, qui déborde à cheval sur le bord supérieur.
     min-h maintient le format portrait même quand le texte est court. --}}
<div {{ $attributes->merge(['class' => 'relative flex min-h-88 flex-col rounded-2xl border border-slate-200 bg-white px-6 pt-12 pb-8 text-center shadow-sm']) }}>
    <span class="absolute -top-6 left-1/2 flex h-12 w-12 -translate-x-1/2 items-center justify-center rounded-full bg-brand-700 text-base font-bold text-white">
        {{ $number }}
    </span>

    <h3 class="text-base font-bold leading-snug text-brand-900">
        {{ $title }}
    </h3>

    <span class="mx-auto my-4 block h-px w-6 bg-slate-300"></span>

    <p class="text-xs leading-relaxed text-slate-400">
        {{ $description }}
    </p>
</div>
