<x-admin>
    <x-slot name="title">Tanaman</x-slot>

    <x-slot name="breadcrumbs">
        <li class="breadcrumb-item active">Tanaman</li>
    </x-slot>

    <a href="{{ route('tanaman.create') }}" class="btn btn-success mb-3"><i class="ti-plus"></i> Tambah Tanaman</a>

    <x-table>
        <thead>
            <tr>
                <th>No</th>
                <th>Code</th>
                <th>Tanggal Pembibitan</th>
                <th>Tanggal Penanaman</th>
                <th>Klon</th>
                <th>Kebun</th>
                <th>Blok Jalur</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tanamans as $index => $tanaman)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $tanaman->code ?? 'N/A' }}</td>
                <td>{{ $tanaman->tanggal_pembibitan }}</td>
                <td>{{ $tanaman->tanggal_penanaman }}</td>
                <td>{{ $tanaman->klon->nama ?? '-' }}</td>
                <td>{{ $tanaman->kebun->nama ?? '-' }}</td>
                <td>{{ $tanaman->blokjalur->nama ?? '-' }}</td>
                <td>{{ $tanaman->status->nama ?? '-' }}</td>
                <td>
                    <a href="{{ route('tanaman.show', $tanaman->id) }}" class="btn btn-info btn-sm"><i class="ti-eye"></i></a>
                    <a href="{{ route('tanaman.edit', $tanaman->id) }}" class="btn btn-warning btn-sm"><i class="ti-pencil"></i></a>
                    <form action="{{ route('tanaman.destroy', $tanaman->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"><i class="ti-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </x-table>
</x-admin>
