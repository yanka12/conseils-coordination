<?php

namespace App\View\Components\Site;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Missions extends Component
{
    /** Chaque mission avec son délai d'animation propre (créneau exclusif). */
    public array $items = [];
    /** Durée du cycle complet, partagée par toutes les cartes. */
    public int $duration;

    public function __construct()
    {
        // Le gras cible les termes métier réellement recherchés (PGC, DIUO, PPSPS…),
        // à raison d'un ou deux par mission pour ne pas diluer le signal.
        $missions = [
            'Analyse des offres des entreprises sur demande (<strong>conformité au PGC</strong>).',
            '<strong>Déclaration préalable</strong> transmise au maître d\'ouvrage.',
            'Élaboration, mise à jour et diffusion du <strong>PGC SPS</strong> (Plan Général de Coordination).',
            'Ouverture et tenue du <strong>registre journal SPS</strong> : inspections communes, visites de chantier, courriers, comptes rendus.',
            'Organisation et animation des <strong>inspections communes</strong>, analyse des <strong>PPSPS</strong> avant autorisation de démarrage des travaux.',
            'Participation aux réunions de chantier, <strong>visites inopinées</strong>, <strong>vacations de sécurité</strong>.',
            'Gestion des <strong>situations accidentelles</strong> (analyse des causes, sécurisation, information MO/MOE).',
            'Élaboration et remise du <strong>DIUO</strong> (Dossier d\'Intervention Ultérieure sur l\'Ouvrage).',
        ];

        // Chaque carte occupe un créneau exclusif : une seule est cochée à la fois,
        // et le cycle complet reboucle une fois la dernière atteinte.
        $step = 2400;
        $this->duration = $step * count($missions);

        foreach (array_values($missions) as $index => $html) {
            $this->items[] = ['html' => $html, 'delay' => $index * $step];
        }
    }

    public function render(): View
    {
        return view('components.site.missions');
    }
}
