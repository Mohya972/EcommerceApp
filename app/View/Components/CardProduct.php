<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardProduct extends Component
{
    public $product ;

    // Déclaration du constructeur
    public function __construct($product)
    {
        // Déclaration de la variable produit
        $this->product = $product;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card-product');
    }
}
