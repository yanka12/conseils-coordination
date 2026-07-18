<?php

namespace App\View\Components\Ui;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Icon extends Component
{
    /** Tracé SVG correspondant au nom demandé (viewBox « 0 0 24 24 »). */
    public string $path;

    public function __construct(
        public string $name,
        public float $strokeWidth = 1.5,
    ) {
        $this->path = self::PATHS[$name] ?? '';
    }

    /**
     * Source unique des icônes du site : ces tracés étaient auparavant recopiés
     * dans stat-card, info-card et placeholder-image. « document » (fiche simple)
     * et « document-check » (fiche cochée) sont distingués car les deux servaient.
     */
    private const PATHS = [
        'shield' => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 3l7 3v5c0 4.4-3 8.2-7 10-4-1.8-7-5.6-7-10V6l7-3Z" />',
        'helmet' => '<path stroke-linecap="round" stroke-linejoin="round" d="M4 17a8 8 0 1 1 16 0H4Zm5 0V9m6 8V9M3 20h18" />',
        'document' => '<path stroke-linecap="round" stroke-linejoin="round" d="M8 3h6l5 5v13H8V3Zm6 0v5h5M10 13h8M10 17h5" />',
        'document-check' => '<path stroke-linecap="round" stroke-linejoin="round" d="M8 3h6l5 5v13H8V3Zm6 0v5h5M9.5 14l1.8 1.8 3.4-3.6" />',
        'pin' => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 21s7-5.3 7-11a7 7 0 1 0-14 0c0 5.7 7 11 7 11Z" /><circle cx="12" cy="10" r="2.5" />',
        'info' => '<circle cx="12" cy="12" r="9" /><path stroke-linecap="round" stroke-linejoin="round" d="M12 11v5m0-8h.01" />',
        'building' => '<path stroke-linecap="round" stroke-linejoin="round" d="M3 21h18M5 21V7l7-4 7 4v14M9 9h1m-1 4h1m4-4h1m-1 4h1M9 21v-4h6v4" />',
        'crane' => '<path stroke-linecap="round" stroke-linejoin="round" d="M4 21h16M6 21V9M6 9L4 6m2 3l10-3m0 0v15m0-15l4 1M10 21v-6h4v6" />',
        'aerial' => '<path stroke-linecap="round" stroke-linejoin="round" d="M3 9l9-6 9 6-9 6-9-6Zm0 6l9 6 9-6M3 12l9 6 9-6" />',
        'portrait' => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8Zm-7 9a7 7 0 0 1 14 0" />',
    ];

    public function render(): View
    {
        return view('components.ui.icon');
    }
}
