<x-admin>
    <x-slot name="title">Tambah Blok Jalur</x-slot>

    <x-slot name="breadcrumbs">
        <li class="breadcrumb-item"><a href="{{ route('blok-jalur.index') }}">Blok Jalur</a></li>
        <li class="breadcrumb-item active">Tambah</li>
    </x-slot>

    <form action="{{ route('blok-jalur.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nama">Nama Blok Jalur</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
        </div>

        <div class="form-group">
            <label for="id_kebun">Pilih Kebun</label>
            <select name="id_kebun" class="form-control" required>
                <option value="">-- Pilih Kebun --</option>
                @foreach ($kebuns as $kebun)
                    <option value="{{ $kebun->id }}" {{ old('id_kebun') == $kebun->id ? 'selected' : '' }}>
                        {{ $kebun->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success mt-3"><i class="ti-save"></i> Simpan</button>
    </form>
</x-admin>
