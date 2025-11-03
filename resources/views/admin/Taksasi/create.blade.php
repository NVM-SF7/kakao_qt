<x-admin>
    <x-slot name="title">Tambah Taksasi</x-slot>

    <x-slot name="breadcrumbs">
        <li class="breadcrumb-item"><a href="{{ route('taksasi.index') }}">Taksasi</a></li>
        <li class="breadcrumb-item active">Tambah</li>
    </x-slot>

    <form action="{{ route('taksasi.store') }}" method="POST">
        @csrf

        @include('admin.Taksasi._form', [
        'taksasi' => null,
        'tanamanTerpilih' => $tanamanTerpilih ?? null,
        'tanamans' => $tanamans
    ])
        <button class="btn btn-success mt-3"><i class="ti-save"></i> Simpan</button>
    </form>
</x-admin>
