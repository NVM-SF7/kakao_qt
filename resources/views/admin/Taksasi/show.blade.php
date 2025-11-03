<x-admin>
    <x-slot name="title">Detail Taksasi</x-slot>

    <x-slot name="breadcrumbs">
        <li class="breadcrumb-item"><a href="{{ route('taksasi.index') }}">Taksasi</a></li>
        <li class="breadcrumb-item active">Detail</li>
    </x-slot>

    <table class="table table-bordered">
        <tr><th>Tanggal</th><td>{{ $taksasi->tanggal }}</td></tr>
        <tr><th>Tanaman</th><td>{{ $taksasi->tanaman->id ?? '-' }}</td></tr>
        <tr><th>Pentil</th><td>{{ $taksasi->pentil }}</td></tr>
        <tr><th>Buah Muda</th><td>{{ $taksasi->buah_muda }}</td></tr>
        <tr><th>Buah Mengkal</th><td>{{ $taksasi->buah_mengkal }}</td></tr>
        <tr><th>Buah Masak</th><td>{{ $taksasi->buah_masak }}</td></tr>
    </table>

    <a href="{{ route('taksasi.edit', $taksasi->id) }}" class="btn btn-warning"><i class="ti-pencil"></i> Edit</a>
</x-admin>
