<x-admin>
    <x-slot name="title">Edit Klon</x-slot>

    <x-slot name="breadcrumbs">
        <li class="breadcrumb-item"><a href="{{ route('klon.index') }}">Klon</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </x-slot>

    <form action="{{ route('klon.update', $klon->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama">Nama Klon</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama', $klon->nama) }}" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3"><i class="ti-save"></i> Update</button>
    </form>
</x-admin>
