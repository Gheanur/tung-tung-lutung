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
        // Simpan ke database
        Post::create([
            'nama_barang' => $request->nama_barang,
            'jumlah' => $request->jumlah,
            'keadaan' => $request->keadaan,
        ]);

        return redirect()->route('posts.index')->with('success', 'Barang Behasil Ditambahkan');
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
    $post->delete();

    return redirect()->route('posts.index')->with('success', 'Barang Berhasil Dihapus!');
}
public function update(Request $request, Post $post)
{
    // Update data judul dan deskripsi
    $post->nama_barang = $request->nama_barang;
    $post->jumlah = $request->jumlah;
    $post->keadaan = $request->keadaan;
    $post->save();

    return redirect()->route('posts.index')->with('success', 'Barang Berhasil Diedit!');
}

}
