<?php

namespace App\View\Components\Site;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Header extends Component
{
    /**
     * Liens de navigation. « Contactez-nous » est traité à part dans la vue :
     * c'est une action (bouton), pas une section.
     */
    public array $links = [
        '#exigence' => 'Notre exigence',
        '#methodologie' => 'Notre méthodologie',
        '#missions' => 'Nos missions',
        '#experts' => 'Nos experts',
    ];

    public function render(): View
    {
        return view('components.site.header');
    }
}
