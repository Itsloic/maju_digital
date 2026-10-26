<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ArtikelManageController extends Controller
{
    public function index(): View
    {
        $artikels = auth()->user()->isAdministrator() || auth()->user()->isEditor()
            ? Artikel::with(['kategoriRelasi', 'penulisAkun'])->latest()->paginate(15)
            : Artikel::with(['kategoriRelasi', 'penulisAkun'])->where('penulis_id', auth()->id())->latest()->paginate(15);

        return view('kelola.artikel.index', compact('artikels'));
    }

    public function create(): View
    {
        Gate::authorize('tambah-artikel');
        $kategoris = Category::where('status_aktif', true)->orderBy('name')->get();
        return view('kelola.artikel.create', compact('kategoris'));
    }

    public function store(Request $request): RedirectResponse
    {
        Gate::authorize('tambah-artikel');

        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'ringkasan' => 'required|string',
            'isi' => 'required|string',
            'kategori_id' => 'required|exists:categories,id',
            'tanggal_publikasi' => 'required|date',
            'gambar' => 'nullable|image|max:2048',
        ]);

        $slug = Str::slug($validated['judul']);
        $originalSlug = $slug;
        $counter = 1;
        while (Artikel::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter++;
        }

        $kategori = Category::find($validated['kategori_id']);
        $penulis = auth()->user();

        $artikel = Artikel::create([
            'judul' => $validated['judul'],
            'slug' => $slug,
            'ringkasan' => $validated['ringkasan'],
            'isi' => $validated['isi'],
            'kategori' => $kategori->name,
            'penulis' => $penulis->name,
            'kategori_id' => $validated['kategori_id'],
            'penulis_id' => $penulis->id,
            'tanggal_publikasi' => $validated['tanggal_publikasi'],
            'gambar' => $validated['gambar'] ?? null,
        ]);

        return redirect()->route('kelola.artikel.index')->with('success', 'Artikel berhasil dibuat.');
    }

    public function edit(Artikel $artikel): View
    {
        Gate::authorize('ubah-artikel', $artikel);
        $kategoris = Category::where('status_aktif', true)->orderBy('name')->get();
        return view('kelola.artikel.edit', compact('artikel', 'kategoris'));
    }

    public function update(Request $request, Artikel $artikel): RedirectResponse
    {
        Gate::authorize('ubah-artikel', $artikel);

        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'ringkasan' => 'required|string',
            'isi' => 'required|string',
            'kategori_id' => 'required|exists:categories,id',
            'tanggal_publikasi' => 'required|date',
            'gambar' => 'nullable|image|max:2048',
        ]);

        $slug = Str::slug($validated['judul']);
        $originalSlug = $slug;
        $counter = 1;
        while (Artikel::where('slug', $slug)->where('id_artikel', '!=', $artikel->id_artikel)->exists()) {
            $slug = $originalSlug . '-' . $counter++;
        }

        $kategori = Category::find($validated['kategori_id']);
        $penulisId = auth()->user()->isPenulis() ? $artikel->penulis_id : $validated['penulis_id'] ?? $artikel->penulis_id;
        $penulis = User::find($penulisId);

        $artikel->update([
            'judul' => $validated['judul'],
            'slug' => $slug,
            'ringkasan' => $validated['ringkasan'],
            'isi' => $validated['isi'],
            'kategori' => $kategori->name,
            'penulis' => $penulis->name,
            'kategori_id' => $validated['kategori_id'],
            'penulis_id' => $penulisId,
            'tanggal_publikasi' => $validated['tanggal_publikasi'],
            'gambar' => $validated['gambar'] ?? $artikel->gambar,
        ]);

        return redirect()->route('kelola.artikel.index')->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy(Artikel $artikel): RedirectResponse
    {
        Gate::authorize('hapus-artikel', $artikel);
        $artikel->delete();
        return redirect()->route('kelola.artikel.index')->with('success', 'Artikel berhasil dihapus.');
    }
}