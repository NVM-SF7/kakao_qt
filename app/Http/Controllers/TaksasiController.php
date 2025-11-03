<?php

namespace App\Http\Controllers;

use App\Models\Taksasi;
use App\Models\Tanaman;
use Illuminate\Http\Request;

class TaksasiController extends Controller
{
    public function index()
    {
        $taksasis = Taksasi::with('tanaman')->get();
        return view('admin.Taksasi.index', compact('taksasis'));
    }

    public function create(Request $request)
    {
        $tanamans = Tanaman::with(['klon', 'blokjalur', 'kebun'])->get();

        // Tangkap parameter jika ada
        $idTanaman = $request->input('id_tanaman');
        $tanamanTerpilih = null;

        if ($idTanaman) {
            $tanamanTerpilih = Tanaman::with(['klon', 'blokjalur', 'kebun'])->find($idTanaman);
        }

        return view('admin.Taksasi.create', compact('tanamans', 'tanamanTerpilih'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'pentil' => 'nullable|integer|min:0',
            'buah_muda' => 'nullable|integer|min:0',
            'buah_mengkal' => 'nullable|integer|min:0',
            'buah_masak' => 'nullable|integer|min:0',
            'id_tanaman' => 'required|exists:tanaman,id',
        ]);

        Taksasi::create([
            'tanggal' => $request->tanggal,
            'pentil' => $request->pentil ?? 0,
            'buah_muda' => $request->buah_muda ?? 0,
            'buah_mengkal' => $request->buah_mengkal ?? 0,
            'buah_masak' => $request->buah_masak ?? 0,
            'id_tanaman' => $request->id_tanaman,
        ]);

        return redirect()->route('taksasi.index')->with('success', 'Data taksasi berhasil ditambahkan.');
    }

    public function show($id)
    {
        $taksasi = Taksasi::with('tanaman')->findOrFail($id);
        return view('admin.Taksasi.show', compact('taksasi'));
    }

    public function edit($id)
    {
        $taksasi = Taksasi::findOrFail($id);
        $tanamans = Tanaman::all();
        return view('admin.Taksasi.edit', compact('taksasi', 'tanamans'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'pentil' => 'nullable|integer|min:0',
            'buah_muda' => 'nullable|integer|min:0',
            'buah_mengkal' => 'nullable|integer|min:0',
            'buah_masak' => 'nullable|integer|min:0',
            'id_tanaman' => 'required|exists:tanaman,id',
        ]);

        $taksasi = Taksasi::findOrFail($id);
        $taksasi->update([
            'tanggal' => $request->tanggal,
            'pentil' => $request->pentil ?? 0,
            'buah_muda' => $request->buah_muda ?? 0,
            'buah_mengkal' => $request->buah_mengkal ?? 0,
            'buah_masak' => $request->buah_masak ?? 0,
            'id_tanaman' => $request->id_tanaman,
        ]);

        return redirect()->route('taksasi.index')->with('success', 'Data taksasi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $taksasi = Taksasi::findOrFail($id);
        $taksasi->delete();

        return redirect()->route('taksasi.index')->with('success', 'Data taksasi berhasil dihapus.');
    }
}
