<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Menampilkan daftar buku
     */
    public function index()
    {
        $buku = Buku::all();

        return view('buku.index', compact('buku'));
    }

    /**
     * Menampilkan form tambah buku
     */
    public function create()
    {
        return view('buku.create');
    }

    /**
     * Menyimpan data buku baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|max:255',
            'penulis' => 'required|max:255',
            'penerbit' => 'required|max:255',
            'tahun' => 'required|numeric'
        ], [
            'judul.required' => 'Judul buku wajib diisi.',
            'penulis.required' => 'Penulis wajib diisi.',
            'penerbit.required' => 'Penerbit wajib diisi.',
            'tahun.required' => 'Tahun terbit wajib diisi.',
            'tahun.numeric' => 'Tahun terbit harus berupa angka.'
        ]);

        Buku::create($validated);

        return redirect('/buku')
            ->with('success', 'Data buku berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit buku
     */
    public function edit($id)
    {
        $buku = Buku::findOrFail($id);

        return view('buku.edit', compact('buku'));
    }

    /**
     * Memperbarui data buku
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'judul' => 'required|max:255',
            'penulis' => 'required|max:255',
            'penerbit' => 'required|max:255',
            'tahun' => 'required|numeric'
        ], [
            'judul.required' => 'Judul buku wajib diisi.',
            'penulis.required' => 'Penulis wajib diisi.',
            'penerbit.required' => 'Penerbit wajib diisi.',
            'tahun.required' => 'Tahun terbit wajib diisi.',
            'tahun.numeric' => 'Tahun terbit harus berupa angka.'
        ]);

        $buku = Buku::findOrFail($id);

        $buku->update($validated);

        return redirect('/buku')
            ->with('success', 'Data buku berhasil diperbarui.');
    }

    /**
     * Menghapus data buku
     */
    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);

        $buku->delete();

        return redirect('/buku')
            ->with('success', 'Data buku berhasil dihapus.');
    }
}