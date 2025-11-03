<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index()
    {
        $statuses = Status::all();
        return view('admin.Status.index', compact('statuses'));
    }

    public function create()
    {
        return view('admin.Status.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        Status::create($request->only('nama'));

        return redirect()->route('status.index')->with('success', 'Data status berhasil ditambahkan.');
    }


    public function edit($id)
    {
        $status = Status::findOrFail($id);
        return view('admin.Status.edit', compact('status'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $status = Status::findOrFail($id);
        $status->update($request->only('nama'));

        return redirect()->route('status.index')->with('success', 'Data status berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $status = Status::findOrFail($id);
        $status->delete();

        return redirect()->route('status.index')->with('success', 'Data status berhasil dihapus.');
    }
}
