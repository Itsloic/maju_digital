<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Gate;

class ArtikelController extends Controller
{
    public function index(): JsonResponse
    {
        $artikels = Artikel::with(['kategoriRelasi', 'penulisAkun'])
            ->latest()
            ->paginate(15);

        return response()->json([
            'data' => $artikels->getCollection()->map(function ($artikel) {
                return [
                    'id' => $artikel->id_artikel,
                    'judul' => $artikel->judul,
                    'slug' => $artikel->slug,
                    'ringkasan' => $artikel->ringkasan,
                    'kategori' => $artikel->kategoriRelasi?->name,
                    'penulis' => $artikel->penulisAkun?->name,
                    'tanggal_publikasi' => $artikel->tanggal_publikasi?->toIso8601String(),
                    'gambar' => $artikel->gambar ? asset('storage/'.$artikel->gambar) : null,
                ];
            }),
            'pagination' => [
                'current_page' => $artikels->currentPage(),
                'last_page' => $artikels->lastPage(),
                'per_page' => $artikels->perPage(),
                'total' => $artikels->total(),
            ],
        ]);
    }

    public function destroy(Artikel $artikel): JsonResponse
    {
        Gate::authorize('hapus-artikel', $artikel);

        $artikel->delete();

        return response()->json([
            'message' => 'Artikel berhasil dihapus.',
        ]);
    }
}
