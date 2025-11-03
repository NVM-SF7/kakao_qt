<?php

namespace App\Http\Controllers;

use App\Models\Klon;
use Illuminate\Http\Request;

class KlonController extends Controller
{
    // Tampilkan daftar klon
    public function index()
    {
        $klons = Klon::all();
        return view('admin.Klon.index', compact('klons'));
    }

    // Tampilkan form buat klon baru
    public function create()
    {
        return view('admin.Klon.create');
    }

    // Simpan klon baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        Klon::create($request->only('nama'));

        return redirect()->route('klon.index')->with('success', 'Data klon berhasil ditambahkan.');
    }

    // Tampilkan detail klon

    // Tampilkan form edit klon
    public function edit($id)
    {
        $klon = Klon::findOrFail($id);
        return view('admin.Klon.edit', compact('klon'));
    }

    // Update data klon
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $klon = Klon::findOrFail($id);
        $klon->update($request->only('nama'));

        return redirect()->route('klon.index')->with('success', 'Data klon berhasil diperbarui.');
    }

    // Hapus klon
    public function destroy($id)
    {
        $klon = Klon::findOrFail($id);
        $klon->delete();

        return redirect()->route('klon.index')->with('success', 'Data klon berhasil dihapus.');
    }
}
