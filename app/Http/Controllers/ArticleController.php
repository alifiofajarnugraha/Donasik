<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Article::query();
    
        if ($request->has('search')) {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('content', 'like', '%' . $request->search . '%');
        }
    
        $articles = $query->latest()->paginate(10);
        return view('FiturArtikel.index', compact('articles'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Menampilkan form untuk membuat artikel baru
        return view('FiturArtikel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validasi input
    $request->validate([
        'title' => 'required|max:255',
        'content' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'author' => 'nullable|max:255',
        'media' => 'nullable|max:255',
    ]);

    // Membuat instance baru dari model Article
    $article = new Article();
    $article->title = $request->title;
    $article->content = $request->content;
    $article->author = $request->author;
    $article->media = $request->media;

    // Upload gambar jika ada
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('articles', 'public'); // Simpan di folder storage/app/public/articles
        $article->image = $imagePath;
    }

    // Simpan artikel ke database
    $article->save();

    // Redirect ke halaman index dengan pesan sukses
    return redirect()->route('articles.index')->with('success', 'Artikel berhasil ditambahkan!');
}

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        // Menampilkan detail artikel
        return view('FiturArtikel.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        // Menampilkan form edit artikel
        return view('FiturArtikel.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
{
    // Validasi input
    $request->validate([
        'title' => 'required|max:255',
        'content' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'author' => 'nullable|max:255',
        'media' => 'nullable|max:255',
    ]);

    // Update data artikel
    $article->title = $request->title;
    $article->content = $request->content;
    $article->author = $request->author;
    $article->media = $request->media;

    // Update gambar jika ada
    if ($request->hasFile('image')) {
        // Hapus gambar lama jika ada
        if ($article->image) {
            Storage::disk('public')->delete($article->image);
        }

        // Simpan gambar baru
        $imagePath = $request->file('image')->store('articles', 'public');
        $article->image = $imagePath;
    }

    // Simpan perubahan ke database
    $article->save();

    // Redirect ke halaman index dengan pesan sukses
    return redirect()->route('articles.index')->with('success', 'Artikel berhasil diperbarui!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        // Hapus gambar jika ada
        if ($article->image) {
            Storage::disk('public')->delete($article->image);
        }

        // Hapus artikel
        $article->delete();

        return redirect()->route('articles.index')->with('success', 'Artikel berhasil dihapus!');
    }
// tes doang bang
}