<?php

namespace App\View\Components\Site;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StatCard extends Component
{
    public string $variantClasses;
    public string $iconBox;
    public string $labelColor;

    public function __construct(
        public string $value,
        public string $label,
        public string $icon = 'shield',
        public string $variant = 'dark',
    ) {
        $variants = [
            'dark' => 'bg-brand-800 text-white',
            'medium' => 'bg-brand-400/90 text-white',
            'light' => 'bg-white text-brand-900',
        ];

        $this->variantClasses = $variants[$variant] ?? $variants['dark'];
        $this->iconBox = $variant === 'light' ? 'bg-brand-700 text-white' : 'bg-white/15 text-white';
        $this->labelColor = $variant === 'light' ? 'text-slate-500' : 'text-white/75';
    }

    public function render(): View
    {
        return view('components.site.stat-card');
    }
}
