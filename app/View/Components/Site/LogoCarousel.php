<?php

namespace App\View\Components\Site;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LogoCarousel extends Component
{
    /** Logos listés depuis le disque : déposer un fichier suffit à l'ajouter. */
    public array $logos;

    public function __construct()
    {
        // Tri naturel pour que 10.png suive 9.png et non 1.png.
        $files = glob(public_path('images/logos-clients/*.png')) ?: [];
        natsort($files);
        $this->logos = array_map('basename', $files);
    }

    public function render(): View
    {
        return view('components.site.logo-carousel');
    }
}
