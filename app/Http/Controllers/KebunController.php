<?php

namespace App\Http\Controllers;

use App\Models\Kebun;
use App\Models\Petani;
use App\Models\BlokJalur;
use App\Models\Tanaman;
use Illuminate\Http\Request;

class KebunController extends Controller
{
    public function index()
    {
        $kebuns = Kebun::with('petani')->get();
        return view('admin.Kebun.index', compact('kebuns'));
    }

    public function create()
    {
        $petanis = Petani::all();
        return view('admin.Kebun.create', compact('petanis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'luas_lahan' => 'nullable|numeric|min:0',
            'id_petani' => 'required|exists:petani,id',
        ]);

        Kebun::create($request->only('nama', 'luas_lahan', 'id_petani'));

        return redirect()->route('kebun.index')->with('success', 'Data kebun berhasil disimpan.');
    }

    public function show($id)
    {
        $kebun = Kebun::with('petani')->findOrFail($id);
        $banyakBlokJalur = BlokJalur::where('id_kebun', $id)->get();
        $banyakTanaman = Tanaman::where('id_kebun', $id)->get();
        return view('admin.Kebun.show', compact('kebun', 'banyakBlokJalur', 'banyakTanaman'));
    }

    public function edit($id)
    {
        $kebun = Kebun::findOrFail($id);
        $petanis = Petani::all();
        return view('admin.Kebun.edit', compact('kebun', 'petanis'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'luas_lahan' => 'nullable|numeric|min:0',
            'id_petani' => 'required|exists:petani,id',
        ]);

        $kebun = Kebun::findOrFail($id);
        $kebun->update($request->only('nama', 'luas_lahan', 'id_petani'));

        return redirect()->route('kebun.index')->with('success', 'Data kebun berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kebun = Kebun::findOrFail($id);
        $kebun->delete();

        return redirect()->route('kebun.index')->with('success', 'Data kebun berhasil dihapus.');
    }
}
