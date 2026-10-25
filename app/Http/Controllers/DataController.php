<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Category;
use Illuminate\View\View;

class DataController extends Controller
{
    public function index(): View
    {
        $artikel = Artikel::with(['kategoriRelasi', 'penulisAkun.level'])
            ->orderBy('id_artikel')
            ->get();

        $kategori = Category::withCount('artikel')
            ->orderBy('id')
            ->get();

        return view('data.index', compact('artikel', 'kategori'));
    }
}