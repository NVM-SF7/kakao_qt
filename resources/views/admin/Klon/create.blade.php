<x-admin>
    <x-slot name="title">Tambah Klon</x-slot>

    <x-slot name="breadcrumbs">
        <li class="breadcrumb-item"><a href="{{ route('klon.index') }}">Klon</a></li>
        <li class="breadcrumb-item active">Tambah</li>
    </x-slot>

    <form action="{{ route('klon.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nama">Nama Klon</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
        </div>

        <button type="submit" class="btn btn-success mt-3"><i class="ti-save"></i> Simpan</button>
    </form>
</x-admin>
