@props(['email'])

{{-- Adresse cliquable (mailto) doublée d'un bouton « copier » : selon les postes, le
     visiteur préfère ouvrir son client mail ou coller l'adresse ailleurs. La copie est
     gérée par app.js (initCopyToClipboard), avec repli si l'API Clipboard est absente. --}}
<div {{ $attributes->merge(['class' => 'flex items-center gap-2']) }}>
    <a href="mailto:{{ $email }}" class="text-sm break-all text-white/90 hover:underline">{{ $email }}</a>

    <button
        type="button"
        data-copy="{{ $email }}"
        aria-label="Copier l'adresse e-mail"
        class="relative flex h-7 w-7 shrink-0 items-center justify-center rounded-md bg-white/10 text-white/70 transition hover:bg-white/20 hover:text-white"
    >
        {{-- Icône « copier » (deux feuillets), masquée le temps de la coche après copie. --}}
        <svg data-copy-icon class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
            <rect x="9" y="9" width="11" height="11" rx="2" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 15V5a2 2 0 0 1 2-2h8" />
        </svg>
        <svg data-copy-done class="hidden h-4 w-4 text-emerald-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
        </svg>

        {{-- Bulle de confirmation : annoncée aux lecteurs d'écran (role=status) et visible
             au-dessus du bouton pendant deux secondes. --}}
        <span
            data-copy-toast
            role="status"
            class="pointer-events-none absolute -top-8 left-1/2 -translate-x-1/2 rounded bg-brand-900 px-2 py-1 text-xs whitespace-nowrap text-white opacity-0 transition-opacity duration-200"
        >Copié !</span>
    </button>
</div>
