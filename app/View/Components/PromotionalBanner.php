<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use App\Models\PromotionalMessage;
use Illuminate\Contracts\View\View;

class PromotionalBanner extends Component
{
    public $banners;



    // Constructeur pour initialiser un message promotionnel à partir d'un autre
    public function _construct()
    {
        
    }

    // Méthode pour rendre la vue du composant
    public function render(): View|Closure|string
    {
        $this->banners = PromotionalMessage::activenow()->latest()->get();
        //$this->banners = PromotionalMessage::activenow()->first()->get();
        return view('components.promotional-banner');
    }
}
