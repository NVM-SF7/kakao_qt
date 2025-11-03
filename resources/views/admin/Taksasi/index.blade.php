<x-admin>
    <x-slot name="title">Taksasi</x-slot>

    <x-slot name="breadcrumbs">
        <li class="breadcrumb-item">Taksasi</li>
    </x-slot>

    <a href="{{ route('taksasi.create') }}" class="btn btn-success mb-3"><i class="ti-plus"></i> Tambah Taksasi</a>

    <x-table>
        <thead>
            <tr>
                <th>#</th>
                <th>Tanggal</th>
                <th>Tanaman</th>
                <th>Pentil</th>
                <th>Buah Muda</th>
                <th>Buah Mengkal</th>
                <th>Buah Masak</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($taksasis as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->tanggal }}</td>
                    <td>{{ $item->tanaman->id ?? '-' }}</td>
                    <td>{{ $item->pentil }}</td>
                    <td>{{ $item->buah_muda }}</td>
                    <td>{{ $item->buah_mengkal }}</td>
                    <td>{{ $item->buah_masak }}</td>
                    <td>
                        <a href="{{ route('taksasi.show', $item->id) }}" class="btn btn-info btn-sm">Detail</a>
                        <a href="{{ route('taksasi.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('taksasi.destroy', $item->id) }}" method="POST" style="display:inline-block">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </x-table>
</x-admin>
