<x-admin>
    <x-slot name="title">Tambah Kebun</x-slot>

    <x-slot name="breadcrumbs">
        <li class="breadcrumb-item"><a href="{{ route('kebun.index') }}">Kebun</a></li>
        <li class="breadcrumb-item active">Tambah</li>
    </x-slot>

    <form action="{{ route('kebun.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nama">Nama Kebun</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
        </div>

        <div class="form-group">
            <label for="luas_lahan">Luas Lahan (hektar)</label>
            <input type="number" step="0.01" name="luas_lahan" class="form-control" value="{{ old('luas_lahan') }}">
        </div>

        <div class="form-group">
            <label for="id_petani">Pemilik (Petani)</label>
            <select name="id_petani" class="form-control" required>
                <option value="">-- Pilih Petani --</option>
                @foreach($petanis as $petani)
                    <option value="{{ $petani->id }}" {{ old('id_petani') == $petani->id ? 'selected' : '' }}>{{ $petani->nama }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success mt-3"><i class="ti-save"></i> Simpan</button>
    </form>
</x-admin>
