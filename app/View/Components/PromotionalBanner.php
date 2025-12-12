<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use App\Models\PromotionalMessage;
use Illuminate\Contracts\View\View;

class PromotionalBanner extends Component
{
    public PromotionalMessage $banner;

    // Constructeur pour initialiser un message promotionnel à partir d'un autre
    public function _construct(PromotionalMessage $banner)
    {
        $this->banner = $banner;
    }

    // Méthode pour rendre la vue du composant
    public function render(): View|Closure|string
    {
        return view('components.promotional-banner');
    }
}
