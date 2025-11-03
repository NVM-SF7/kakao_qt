<x-admin>
    <x-slot name="title">Status</x-slot>

    <x-slot name="breadcrumbs">
        <li class="breadcrumb-item active">Status</li>
    </x-slot>

    <a href="{{ route('status.create') }}" class="btn btn-success mb-3"><i class="ti-plus"></i> Tambah Status</a>

    <x-table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($statuses as $index => $status)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $status->nama }}</td>
                    <td>
                        <a href="{{ route('status.edit', $status->id) }}" class="btn btn-warning btn-sm"><i class="ti-pencil"></i></a>
                        <form action="{{ route('status.destroy', $status->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
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
