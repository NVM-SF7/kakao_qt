<x-admin>
    <x-slot name="title">Klon</x-slot>

    <x-slot name="breadcrumbs">
        <li class="breadcrumb-item active">Klon</li>
    </x-slot>

    <a href="{{ route('klon.create') }}" class="btn btn-success mb-3"><i class="ti-plus"></i> Tambah Klon</a>

    <x-table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Klon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($klons as $index => $klon)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $klon->nama }}</td>
                    <td>
                        <a href="{{ route('klon.edit', $klon->id) }}" class="btn btn-warning btn-sm"><i class="ti-pencil"></i></a>
                        <form action="{{ route('klon.destroy', $klon->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
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
