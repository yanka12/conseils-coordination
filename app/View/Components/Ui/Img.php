<?php

namespace App\View\Components\Ui;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Img extends Component
{
    public ?int $width = null;
    public ?int $height = null;

    public function __construct(
        public string $src,
        public string $alt = '',
    ) {
        // Dimensions lues sur le fichier : elles restent justes le jour où l'image
        // est remplacée, là où des valeurs recopiées finiraient par mentir.
        [$this->width, $this->height] = @getimagesize(public_path($src)) ?: [null, null];
    }

    public function render(): View
    {
        return view('components.ui.img');
    }
}
