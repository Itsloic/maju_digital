<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\View\View;

class ArtikelController extends Controller
{
    /**
     * Tampilkan halaman beranda.
     */
    public function beranda(): View
    {
        $artikels = Artikel::orderByDesc('tanggal_publikasi')->take(6)->get();
        return view('beranda', compact('artikels'));
    }

    /**
     * Tampilkan daftar artikel.
     */
    public function index(): View
    {
        $artikels = Artikel::orderByDesc('tanggal_publikasi')->paginate(9);
        return view('artikel.index', compact('artikels'));
    }

    /**
     * Tampilkan detail artikel.
     */
    public function show(Artikel $artikel): View
    {
        return view('artikel.show', compact('artikel'));
    }
}
