<?php

namespace App\View\Components\Ui;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PhotoCarousel extends Component
{
    /** Part du créneau passée en pause sur une photo (le reste sert au glissement). */
    private const HOLD = 0.8;

    /** Vues de la piste (photos + doublon de la première), enrichies des dimensions. */
    public array $slides = [];
    public string $name = '';
    public float $duration = 0;
    /** Règle @keyframes complète, injectée telle quelle dans un <style>. */
    public string $keyframes = '';

    public function __construct(
        public array $photos = [],
        public string $aspect = 'aspect-[4/3]',
        // Durée d'affichage d'une photo (pause + glissement), en secondes.
        public float $interval = 3.5,
    ) {
        $this->photos = array_values(array_filter($photos));

        if ($this->photos === []) {
            return;
        }

        $this->slides = $this->buildSlides();
        $this->duration = round(count($this->photos) * $this->interval, 2);
        $this->name = 'pc' . substr(md5(json_encode($this->photos)), 0, 8);
        $this->keyframes = $this->buildKeyframes();
    }

    /**
     * Les vues de la piste : les photos, plus un doublon de la première en fin de
     * piste. Arrivé sur ce doublon, le retour au début est invisible (même astuce
     * que le marquee des logos). Le doublon est masqué aux lecteurs d'écran.
     */
    private function buildSlides(): array
    {
        $slides = array_map($this->withDimensions(...), $this->photos);
        $slides[] = ['hidden' => true, 'alt' => ''] + $this->withDimensions($this->photos[0]);

        return $slides;
    }

    /**
     * Règle @keyframes du défilement. Pour chaque photo : on maintient sa position
     * pendant l'essentiel du créneau (HOLD), puis on glisse vers la suivante. Les
     * pourcentages dépendent du nombre de photos, d'où cette génération.
     */
    private function buildKeyframes(): string
    {
        $count = count($this->photos);
        $step = 100 / ($count + 1); // décalage vertical d'une photo, en % de la piste

        $frames = ['0% { transform: translateY(0) }'];

        foreach ($this->photos as $i => $photo) {
            $holdUntil = ($i + self::HOLD) / $count * 100; // instant de fin de la pause
            $slideUntil = ($i + 1) / $count * 100;         // instant de fin du glissement

            $frames[] = sprintf('%.3f%% { transform: translateY(-%.3f%%) }', $holdUntil, $i * $step);
            $frames[] = sprintf('%.3f%% { transform: translateY(-%.3f%%) }', $slideUntil, ($i + 1) * $step);
        }

        return "@keyframes {$this->name} { " . implode(' ', $frames) . ' }';
    }

    /** Ajoute width/height (lus sur le fichier) et le drapeau « hidden » à une photo. */
    private function withDimensions(array $photo): array
    {
        [$width, $height] = @getimagesize(public_path($photo['src'])) ?: [null, null];

        return $photo + ['width' => $width, 'height' => $height, 'hidden' => false];
    }

    public function render(): View
    {
        return view('components.ui.photo-carousel');
    }
}
