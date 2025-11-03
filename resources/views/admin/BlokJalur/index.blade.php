<x-admin>
    <x-slot name="title">Blok Jalur</x-slot>

    <x-slot name="breadcrumbs">
        <li class="breadcrumb-item active">Blok Jalur</li>
    </x-slot>

    <a href="{{ route('blok-jalur.create') }}" class="btn btn-success mb-3"><i class="ti-plus"></i> Tambah Blok Jalur</a>

    <x-table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Blok Jalur</th>
                <th>Kebun</th>
                <th>Jumlah Tanaman</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($blokjalurs as $index => $blokjalur)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $blokjalur->nama }}</td>
                    <td>{{ $blokjalur->kebun->nama ?? '-' }}</td>
                    <td>{{ $blokjalur->tanaman_count ?? '-' }}</td>
                    <td>
                        <a href="{{ route('blok-jalur.show', $blokjalur->id) }}" class="btn btn-info btn-sm"><i class="ti-eye"></i></a>
                        <a href="{{ route('blok-jalur.edit', $blokjalur->id) }}" class="btn btn-warning btn-sm"><i class="ti-pencil"></i></a>
                        <form action="{{ route('blok-jalur.destroy', $blokjalur->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data ini?')">
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
