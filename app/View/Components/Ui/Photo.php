<?php

namespace App\View\Components\Ui;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Photo extends Component
{
    public ?int $width = null;
    public ?int $height = null;

    public function __construct(
        public string $src,
        public string $alt = '',
        public ?string $caption = null,
        public string $aspect = 'aspect-[4/3]',
    ) {
        [$this->width, $this->height] = @getimagesize(public_path($src)) ?: [null, null];
    }

    public function render(): View
    {
        return view('components.ui.photo');
    }
}
