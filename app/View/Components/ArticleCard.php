<?php

namespace App\View\Components;

use App\Models\Article;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ArticleCard extends Component
{
    public function __construct(
        public Article $article
    ) {
    }

    public function render(): View|Closure|string
    {
        return view('components.article-card');
    }
}