<?php

namespace App\View\Components\Site;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InfoCard extends Component
{
    public string $cardClasses;

    public function __construct(
        public string $title,
        public string $icon = 'pin',
        public string $variant = 'light',
        // « inline » aligne le contenu sous le titre, à droite de l'icône (cartes
        // courtes) ; « stacked » le fait courir sur toute la largeur (contenu long).
        public string $layout = 'inline',
    ) {
        // « plain » : sans fond ni bordure. La bordure reste, transparente, et le
        // rembourrage est conservé, pour que la carte occupe la même place.
        $this->cardClasses = match ($variant) {
            'dark' => 'border-brand-900/60 bg-brand-900/80 backdrop-blur-sm',
            'plain' => 'border-transparent',
            default => 'border-white/15 bg-white/10 backdrop-blur-sm',
        };
    }

    public function render(): View
    {
        return view('components.site.info-card');
    }
}
