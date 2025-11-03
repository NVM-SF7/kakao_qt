<x-admin>
    <x-slot name="title">Tambah Status</x-slot>

    <x-slot name="breadcrumbs">
        <li class="breadcrumb-item"><a href="{{ route('status.index') }}">Status</a></li>
        <li class="breadcrumb-item active">Tambah</li>
    </x-slot>

    <form action="{{ route('status.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nama">Nama Status</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
        </div>

        <button type="submit" class="btn btn-success mt-3"><i class="ti-save"></i> Simpan</button>
    </form>
</x-admin>
