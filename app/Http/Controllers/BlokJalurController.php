<?php

namespace App\Http\Controllers;

use App\Models\BlokJalur;
use App\Models\Kebun;
use App\Models\Tanaman;
use Illuminate\Http\Request;

class BlokJalurController extends Controller
{
    public function index()
    {
        $blokjalurs = BlokJalur::withCount('tanaman')->with('kebun')->get();
        return view('admin.BlokJalur.index', compact('blokjalurs'));
    }

    public function create()
    {
        $kebuns = Kebun::all();
        return view('admin.BlokJalur.create', compact('kebuns'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'id_kebun' => 'required|exists:kebun,id',
        ]);

        BlokJalur::create($request->only('nama', 'id_kebun'));

        return redirect()->route('blok-jalur.index')->with('success', 'Data blok jalur berhasil ditambahkan.');
    }

    public function show($id)
    {
        $blokjalur = BlokJalur::with('kebun')->findOrFail($id);
        $banyakTanaman = Tanaman::where('id_blok_jalur', $id)->get();
        return view('admin.BlokJalur.show', compact('blokjalur', 'banyakTanaman'));
    }

    public function edit($id)
    {
        $blokjalur = BlokJalur::findOrFail($id);
        $kebuns = Kebun::all();
        return view('admin.BlokJalur.edit', compact('blokjalur', 'kebuns'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'id_kebun' => 'required|exists:kebun,id',
        ]);

        $blokjalur = BlokJalur::findOrFail($id);
        $blokjalur->update($request->only('nama', 'id_kebun'));

        return redirect()->route('blok-jalur.index')->with('success', 'Data blok jalur berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $blokjalur = BlokJalur::findOrFail($id);
        $blokjalur->delete();

        return redirect()->route('blok-jalur.index')->with('success', 'Data blok jalur berhasil dihapus.');
    }
}
