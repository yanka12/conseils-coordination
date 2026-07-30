<?php

namespace App\View\Components\Ui;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SectionHeading extends Component
{
    public string $alignClasses;

    public function __construct(
        public string $title = '',
        public ?string $eyebrow = null,
        public ?string $description = null,
        public string $align = 'left',
        // Largeur de mesure commune à toutes les sections : les titres et chapeaux
        // se calent sur la même colonne d'une section à l'autre.
        // Passer « max-w-none » pour occuper toute la largeur du conteneur.
        public string $maxWidth = 'max-w-3xl',
    ) {
        $this->alignClasses = $align === 'center' ? 'mx-auto text-center' : 'text-left';
    }

    public function render(): View
    {
        return view('components.ui.section-heading');
    }
}
