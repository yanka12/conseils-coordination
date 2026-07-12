@props([
    'delay' => 0,
    'duration' => 8000,
])

<li
    {{ $attributes->merge(['class' => 'mission-item flex gap-4 rounded-xl border p-5 shadow-sm']) }}
    style="animation-delay: {{ $delay }}ms; animation-duration: {{ $duration }}ms"
>
    <span class="mission-item__badge flex h-9 w-9 shrink-0 items-center justify-center rounded-lg">
        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="m5 13 4 4L19 7" />
        </svg>
    </span>

    <p class="mission-item__text self-center text-sm leading-relaxed [&_strong]:font-semibold">
        {{ $slot }}
    </p>
</li>
