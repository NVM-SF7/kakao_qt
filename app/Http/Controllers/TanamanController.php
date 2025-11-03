<?php

namespace App\Http\Controllers;

use App\Models\Tanaman;
use App\Models\Klon;
use App\Models\BlokJalur;
use App\Models\Taksasi;
use App\Models\Status;
use App\Models\Kebun;
use Illuminate\Http\Request;

class TanamanController extends Controller
{
    public function index()
    {
        $tanamans = Tanaman::with(['klon', 'blokjalur', 'status'])->get();
        return view('admin.Tanaman.index', compact('tanamans'));
    }

    public function create()
    {
        $klons = Klon::all();
        $blokjalurs = null;
        $statuses = Status::all();
        $kebuns = Kebun::all();

        return view('admin.Tanaman.create', compact('klons', 'blokjalurs', 'statuses', 'kebuns'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'nullable|numeric',
            'tanggal_pembibitan' => 'required|date',
            'tanggal_penanaman' => 'required|date',
            'id_klon' => 'nullable|exists:klon,id',
            'id_blok_jalur' => 'nullable|exists:blok_jalur,id',
            'id_status' => 'nullable|exists:status,id',
            'id_kebun' => 'nullable|exists:kebun,id',
        ]);

        Tanaman::create($request->only([
            'code',
            'tanggal_pembibitan',
            'tanggal_penanaman',
            'id_klon',
            'id_blok_jalur',
            'id_kebun',
            'id_status',
        ]));

        return redirect()->route('tanaman.index')->with('success', 'Data tanaman berhasil ditambahkan.');
    }

    public function show($id)
    {
        $banyakTaksasi = Taksasi::where('id_tanaman', $id)->get();
        $tanaman = Tanaman::with(['klon', 'blokjalur', 'status'])->findOrFail($id);
        return view('admin.Tanaman.show', compact('tanaman', 'banyakTaksasi'));
    }

    public function edit($id)
    {
        $tanaman = Tanaman::findOrFail($id);
        $klons = Klon::all();
        $blokjalurs = BlokJalur::all();
        $statuses = Status::all();
        $kebuns = Kebun::all();

        return view('admin.Tanaman.edit', compact('tanaman', 'klons', 'blokjalurs', 'statuses', 'kebuns'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal_pembibitan' => 'required|date',
            'tanggal_penanaman' => 'required|date',
            'id_klon' => 'nullable|exists:klon,id',
            'id_blok_jalur' => 'nullable|exists:blok_jalur,id',
            'id_status' => 'nullable|exists:status,id',
            'id_kebun' => 'nullable|exists:kebun,id',
        ]);

        $tanaman = Tanaman::findOrFail($id);

        // Ambil input id_kebun dari request
        $newKebunId = $request->input('id_kebun');
        $oldKebunId = $tanaman->id_kebun;

        // Siapkan data untuk update
        $updateData = $request->only([
            'tanggal_pembibitan',
            'tanggal_penanaman',
            'id_klon',
            'id_blok_jalur',
            'id_status',
            'id_kebun',
        ]);

        // Jika id_kebun berubah, hitung code baru
        if ($newKebunId && $newKebunId != $oldKebunId) {
            $maxCode = Tanaman::where('id_kebun', $newKebunId)->max('code');
            $updateData['code'] = $maxCode ? $maxCode + 1 : 1;
        }

        $tanaman->update($updateData);

        return redirect()->route('tanaman.index')->with('success', 'Data tanaman berhasil diperbarui.');
    }


    public function destroy($id)
    {
        $tanaman = Tanaman::findOrFail($id);
        $tanaman->delete();

        return redirect()->route('tanaman.index')->with('success', 'Data tanaman berhasil dihapus.');
    }

    public function publicShow($id)
    {
        $tanaman = Tanaman::with(['klon', 'blokjalur', 'status', 'kebun'])->findOrFail($id);

        if (auth()->check()) {
            // Langsung redirect ke halaman tambah taksasi (create)
            return redirect()->route('taksasi.create', ['id_tanaman' => $id]);
        } else {
            // Jika belum login, tampilkan halaman publik
            $taksasiTerbaru = \App\Models\Taksasi::where('id_tanaman', $id)->latest('tanggal')->first();
            return view('public.Tanaman.show', compact('tanaman', 'taksasiTerbaru'));
        }
    }

    public function qr($id)
    {
        $url = route('tanaman.view', $id);
        $qr = \QrCode::size(300)->generate($url);
        return view('admin.Tanaman.qr', compact('qr'));
    }

    public function printAllQr($id)

    {
        // Ambil semua tanaman berdasarkan kebun
        $tanamans = Tanaman::with('blokJalur') // pastikan relasi blokJalur ada
            ->where('id_kebun', $id)
            ->get();

        return view('admin.Tanaman.qr_all', compact('tanamans'));
    }

    public function selectKebunForQr()
    {
        $kebuns = Kebun::all(); // Ambil semua kebun
        return view('admin.Tanaman.qr_select_kebun', compact('kebuns'));
    }


    public function getBlokJalur($kebunId)
    {
        $blokjalurs = BlokJalur::where('id_kebun', $kebunId)->get();

        return response()->json($blokjalurs);
    }


    public function getNextCode($kebunId)
    {
        $maxCode = Tanaman::where('id_kebun', $kebunId)->max('code');

        // Jika null, berarti belum ada data
        $nextCode = $maxCode ? $maxCode + 1 : 1;

        return response()->json(['nextCode' => $nextCode]);
    }



}
