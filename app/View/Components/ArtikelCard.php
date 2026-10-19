<?php

namespace App\View\Components;

use App\Models\Artikel;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ArtikelCard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public Artikel $artikel)
    {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.artikel-card');
    }
}
