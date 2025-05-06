<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;



class PostController extends Controller
{
    public function store(Request $request)
    {
        // Validasi inputan
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Upload gambar
        $imagePath = $request->file('image')->store('posts', 'public');

        // Simpan ke database
        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post berhasil ditambahkan!');
    }
    public function index()
{
    // Ambil semua post dari database (urutan terbaru duluan)
    $posts = Post::latest()->get();

    // Kirim ke view
    return view('home', compact('posts'));
}
public function destroy(Post $post)
{
    // Hapus file gambar dari storage
    if ($post->image && Storage::exists('public/' . $post->image)) {
        Storage::delete('public/' . $post->image);
    }

    // Hapus data post dari database
    $post->delete();

    return redirect()->route('posts.index')->with('success', 'Post berhasil dihapus!');
}
public function update(Request $request, Post $post)
{
    // Validasi inputan
    $request->validate([
        'title' => 'required',
        'description' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Cek apakah ada gambar baru di-upload
    if ($request->hasFile('image')) {
        // Hapus gambar lama
        if ($post->image && Storage::exists('public/' . $post->image)) {
            Storage::delete('public/' . $post->image);
        }

        // Upload gambar baru
        $imagePath = $request->file('image')->store('posts', 'public');
        $post->image = $imagePath;
    }

    // Update data judul dan deskripsi
    $post->title = $request->title;
    $post->description = $request->description;
    $post->save();

    return redirect()->route('posts.index')->with('success', 'Post berhasil diupdate!');
}

public function like(Post $post)
{
    // Cek apakah sudah like, kalau iya hapus (toggle)
    $existingLike = Like::where('post_id', $post->id)->first();
    if ($existingLike) {
        $existingLike->delete();
    } else {
        Like::create(['post_id' => $post->id]);
    }
    return back();
}


}
