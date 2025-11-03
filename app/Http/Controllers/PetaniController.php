<?php

namespace App\Http\Controllers;

use App\Models\Petani;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;


class PetaniController extends Controller
{
    public function index()
    {
        $banyakPetani = Petani::all();
        return view('admin.Petani.index', compact('banyakPetani'));
    }

    public function create()
    {
        return view('admin.Petani.create');
    }

    public function store(Request $request)
    {
        $request->merge([
            'nik' => $request->nik ?: null,
        ]);

        $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20000',
            'nama' => 'required|string|max:255',
            'nik' => 'nullable|string|unique:petani,nik|max:20',
            'tgl_lahir' => 'nullable|date',
            'no_hp' => 'nullable|string|max:15',
            'alamat' => 'nullable|string',
            'jenis_kelamin' => 'required|in:L,P',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('petani_foto', 'public');
        }

        Petani::create([
            'foto' => $fotoPath,
            'nama' => $request->nama,
            'nik' => $request->nik,
            'tgl_lahir' => $request->tgl_lahir,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);

        return redirect()->route('petani.index')->with('success', 'Data petani berhasil disimpan.');
    }

    public function show($id)
    {
        $petani = Petani::findOrFail($id);
        $previous = Petani::where('id', '<', $petani->id)->orderBy('id', 'desc')->first();
        $next = Petani::where('id', '>', $petani->id)->orderBy('id', 'asc')->first();
        $banyakKebun = $petani->kebun;
        return view('admin.Petani.show', compact('petani', 'previous', 'next', 'banyakKebun'));
    }

    public function edit($id)
    {
        $petani = Petani::findOrFail($id);
        return view('admin.Petani.edit', compact('petani'));
    }

    public function update(Request $request, $id)
    {
        $petani = Petani::findOrFail($id);

        $request->merge([
            'nik' => $request->nik ?: null,
        ]);

        $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20000',
            'nama' => 'required|string|max:255',
            'tgl_lahir' => 'nullable|date',
            'nik' => ['nullable','string','max:20',Rule::unique('petani', 'nik')->ignore($petani->id),],
            'no_hp' => 'nullable|string|max:15',
            'alamat' => 'nullable|string',
            'jenis_kelamin' => 'required|in:L,P',
        ]);

        $data = $request->only([
            'nama', 'nik', 'tgl_lahir', 'no_hp', 'alamat', 'jenis_kelamin'
        ]);

        // Update foto jika ada
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($petani->foto) {
                \Storage::disk('public')->delete($petani->foto);
            }

            $data['foto'] = $request->file('foto')->store('petani_foto', 'public');
        }

        $petani->update($data);

        return redirect()->route('petani.index')->with('success', 'Data petani berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $petani = Petani::findOrFail($id);

        if ($petani->foto) {
            Storage::delete('public/foto_petani/' . $petani->foto);
        }

        $petani->delete();

        return redirect()->route('petani.index')->with('success', 'Data petani berhasil dihapus.');
    }

    public function cekNIK(Request $request)
    {
        $nik = $request->query('nik');

        if (empty($nik)) {
            return response()->json(['exists' => false]);
        }

        $exists = Petani::where('nik', $nik)->exists();

        return response()->json(['exists' => $exists]);
    }

}
