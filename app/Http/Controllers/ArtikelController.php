<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Category;
use Illuminate\View\View;

class ArtikelController extends Controller
{
    /**
     * Tampilkan halaman beranda.
     */
    public function beranda(): View
    {
        $artikels = Artikel::orderByDesc('tanggal_publikasi')->take(6)->get();
        $kategoris = Category::withCount('artikel')
            ->orderBy('name')
            ->get()
            ->map(function ($kategori) {
                $warna = match (strtolower($kategori->name)) {
                    'pemerintahan' => ['bg' => '#dbeafe', 'teks' => '#1e40af', 'ikon' => 'bi-building'],
                    'pendidikan' => ['bg' => '#dcfce7', 'teks' => '#166534', 'ikon' => 'bi-book'],
                    'pelayanan publik' => ['bg' => '#ccfbf1', 'teks' => '#115e59', 'ikon' => 'bi-people'],
                    'kesehatan' => ['bg' => '#fee2e2', 'teks' => '#991b1b', 'ikon' => 'bi-heart-pulse'],
                    'infrastruktur' => ['bg' => '#ffedd5', 'teks' => '#9a3412', 'ikon' => 'bi-bricks'],
                    default => ['bg' => '#f3f4f6', 'teks' => '#374151', 'ikon' => 'bi-tag'],
                };
                $kategori->warna_bg = $warna['bg'];
                $kategori->warna_teks = $warna['teks'];
                $kategori->ikon = $warna['ikon'];

                return $kategori;
            });

        return view('beranda', compact('artikels', 'kategoris'));
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
