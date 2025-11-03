<x-admin>
    <x-slot name="title">Petani</x-slot>

    <x-slot name="breadcrumbs">
        <li class="breadcrumb-item active">Petani</li>
    </x-slot>

    <div class="mb-3">
        <a href="{{ route('petani.create') }}" class="btn btn-primary">
            <i class="ti-plus"></i> Tambah Petani
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <x-table>
        <thead class="thead-dark">
            <tr>
                <th>Foto</th>
                <th>Nama</th>
                <th>NIK</th>
                <th>Tanggal Lahir</th>
                <th>No HP</th>
                <th>Jenis Kelamin</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($banyakPetani as $petani)
                <tr>
                    <td>
                        @if ($petani->foto)
                            <img src="{{ asset('storage/' . $petani->foto) }}" width="50" height="50" class="rounded">
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                    <td>{{ $petani->nama }}</td>
                    <td>{{ $petani->nik ?? '-' }}</td>
                    <td>{{ $petani->tgl_lahir ?? '-' }}</td>
                    <td>{{ $petani->no_hp ?? '-' }}</td>
                    <td>{{ $petani->jenis_kelamin }}</td>
                    <td>
                        <a href="{{ route('petani.show', $petani->id) }}" class="btn btn-info btn-sm"><i class="ti-eye"></i></a>
                        <a href="{{ route('petani.edit', $petani->id) }}" class="btn btn-warning btn-sm"><i class="ti-pencil"></i></a>
                        <form action="{{ route('petani.destroy', $petani->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm"><i class="ti-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </x-table>
</x-admin>
