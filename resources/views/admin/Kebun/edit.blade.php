<x-admin>
    <x-slot name="title">Edit Kebun</x-slot>

    <x-slot name="breadcrumbs">
        <li class="breadcrumb-item"><a href="{{ route('kebun.index') }}">Kebun</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </x-slot>

    <form action="{{ route('kebun.update', $kebun->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama">Nama Kebun</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama', $kebun->nama) }}" required>
        </div>

        <div class="form-group">
            <label for="luas_lahan">Luas Lahan (hektar)</label>
            <input type="number" step="0.01" name="luas_lahan" class="form-control" value="{{ old('luas_lahan', $kebun->luas_lahan) }}">
        </div>

        <div class="form-group">
            <label for="id_petani">Pemilik (Petani)</label>
            <select name="id_petani" class="form-control" required>
                <option value="">-- Pilih Petani --</option>
                @foreach($petanis as $petani)
                    <option value="{{ $petani->id }}" {{ old('id_petani', $kebun->id_petani) == $petani->id ? 'selected' : '' }}>{{ $petani->nama }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3"><i class="ti-save"></i> Update</button>
    </form>
</x-admin>
