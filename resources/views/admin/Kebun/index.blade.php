<x-admin>
    <x-slot name="title">Kebun</x-slot>

    <x-slot name="breadcrumbs">
        <li class="breadcrumb-item active">Kebun</li>
    </x-slot>

    <a href="{{ route('kebun.create') }}" class="btn btn-success mb-3"><i class="ti-plus"></i> Tambah Kebun</a>

    <x-table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kebun</th>
                <th>Luas Lahan (ha)</th>
                <th>Petani</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kebuns as $index => $kebun)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $kebun->nama }}</td>
                    <td>{{ $kebun->luas_lahan ?? '-' }}</td>
                    <td>{{ $kebun->petani->nama ?? '-' }}</td>
                    <td>
                        <a href="{{ route('kebun.show', $kebun->id) }}" class="btn btn-info btn-sm"><i class="ti-eye"></i></a>
                        <a href="{{ route('kebun.edit', $kebun->id) }}" class="btn btn-warning btn-sm"><i class="ti-pencil"></i></a>
                        <form action="{{ route('kebun.destroy', $kebun->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
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
