<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('category')
            ->where('status', 'published')
            ->orderByDesc('published_at')
            ->get();

        return view('berita', compact('articles'));
        
    }
    public function show(string $slug)
{
    $article = \App\Models\Article::with(['category', 'author'])
        ->where('slug', $slug)
        ->where('status', 'published')
        ->firstOrFail();

    $relatedArticles = \App\Models\Article::with('category')
        ->where('status', 'published')
        ->where('id_artikel', '!=', $article->id_artikel)
        ->orderByDesc('published_at')
        ->take(3)
        ->get();

    return view('detail-berita', compact(
        'article',
        'relatedArticles'
    ));
}
}

