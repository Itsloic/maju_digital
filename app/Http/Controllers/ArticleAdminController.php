<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ArticleAdminController extends Controller
{
    public function index()
    {
        $articles = Article::with('category')
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('admin.artikel.index', compact('articles'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('admin.artikel.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category_id' => ['nullable', 'exists:categories,id'],
            'excerpt' => ['nullable', 'string'],
            'content' => ['required', 'string'],
            'image' => ['nullable', 'image', 'max:5120'],
            'status' => ['required', Rule::in(['draft', 'published'])],
        ]);

        $article = new Article();

        $article->title = $validated['title'];
        $article->slug = $this->generateSlug($validated['title']);
        $article->category_id = $validated['category_id'] ?? null;
        $article->user_id = auth()->id();
        $article->excerpt = $validated['excerpt'] ?? null;
        $article->content = $validated['content'];
        $article->status = $validated['status'];
        $article->is_featured = $request->boolean('is_featured');
        $article->published_at = $article->status === 'published'
            ? now()
            : null;

        if ($request->hasFile('image')) {
            $article->image = $request->file('image')
                ->store('articles', 'public');
        }

        $article->save();

        return redirect()
            ->route('admin.artikel.index')
            ->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function edit(string $id)
    {
        $article = Article::findOrFail($id);
        $categories = Category::orderBy('name')->get();

        return view(
            'admin.artikel.edit',
            compact('article', 'categories')
        );
    }

    public function update(Request $request, string $id)
    {
        $article = Article::findOrFail($id);

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category_id' => ['nullable', 'exists:categories,id'],
            'excerpt' => ['nullable', 'string'],
            'content' => ['required', 'string'],
            'image' => ['nullable', 'image', 'max:5120'],
            'status' => ['required', Rule::in(['draft', 'published'])],
        ]);

        $article->title = $validated['title'];
        $article->slug = $this->generateSlug(
            $validated['title'],
            (int) $article->id_artikel
        );
        $article->category_id = $validated['category_id'] ?? null;
        $article->excerpt = $validated['excerpt'] ?? null;
        $article->content = $validated['content'];
        $article->is_featured = $request->boolean('is_featured');

        if ($request->hasFile('image')) {
            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }

            $article->image = $request->file('image')
                ->store('articles', 'public');
        }

        $wasPublished = $article->published_at;

        $article->status = $validated['status'];
        $article->published_at = $article->status === 'published'
            ? ($wasPublished ?? now())
            : null;

        $article->save();

        return redirect()
            ->route('admin.artikel.index')
            ->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $article = Article::findOrFail($id);

        if ($article->image) {
            Storage::disk('public')->delete($article->image);
        }

        $article->delete();

        return redirect()
            ->route('admin.artikel.index')
            ->with('success', 'Artikel berhasil dihapus.');
    }

    private function generateSlug(
        string $title,
        ?int $ignoreId = null
    ): string {
        $baseSlug = Str::slug($title) ?: 'artikel';
        $slug = $baseSlug;
        $counter = 2;

        while (
            Article::where('slug', $slug)
                ->when(
                    $ignoreId !== null,
                    fn ($query) => $query->where(
                        'id_artikel',
                        '!=',
                        $ignoreId
                    )
                )
                ->exists()
        ) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }
}
