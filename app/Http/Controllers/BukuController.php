<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    // Menampilkan semua data buku
    public function index()
    {
        $buku = Buku::all();
        return view('buku.index', compact('buku'));
    }

    // Menampilkan form tambah data buku
    public function create()
    {
        return view('buku.create');
    }

    // Menyimpan data buku baru
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'tahun_terbit' => 'required|digits:4',
        ]);

        Buku::create($request->all());

        return redirect()->route('buku.index');
    }

    // Menampilkan form edit data buku
    public function edit(Buku $buku)
    {
        return view('buku.edit', compact('buku'));
    }

    // Update data buku
    public function update(Request $request, Buku $buku)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'tahun_terbit' => 'required|digits:4',
        ]);

        $buku->update($request->all());

        return redirect()->route('buku.index');
    }

    // Hapus data buku
    public function destroy(Buku $buku)
    {
        $buku->delete();
        return redirect()->route('buku.index');
    }
}

