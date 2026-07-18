<?php

namespace App\View\Components\Ui;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    public string $classes;

    public function __construct(
        public ?string $href = null,
        public string $variant = 'primary',
        public string $type = 'button',
    ) {
        $this->classes = 'inline-flex items-center justify-center rounded-md px-6 py-3 text-sm font-semibold transition '
            . (self::VARIANTS[$variant] ?? self::VARIANTS['primary']);
    }

    private const VARIANTS = [
        'primary' => 'bg-brand-700 text-white hover:bg-brand-600',
        'secondary' => 'bg-white text-brand-700 hover:bg-brand-50',
        'outline' => 'border border-white/70 text-white hover:bg-white/10',
        'light' => 'border border-brand-light/70 text-brand-light hover:bg-brand-light/10',
    ];

    public function render(): View
    {
        return view('components.ui.button');
    }
}
