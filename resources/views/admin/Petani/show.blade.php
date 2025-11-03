<x-admin>
    <x-slot name="title">Detail Petani</x-slot>

    <x-slot name="breadcrumbs">
        <li class="breadcrumb-item"><a href="{{ route('petani.index') }}">Petani</a></li>
        <li class="breadcrumb-item active">Detail</li>
    </x-slot>

    <div class="card">
        <div class="card-body row">
            <div class="col-md-4 text-center">
                @if ($petani->foto)
                    <img src="{{ asset('storage/' . $petani->foto) }}" alt="Foto Petani" class="img-fluid rounded mb-3"
                        style="max-height: 250px;">
                @else
                    <img src="https://via.placeholder.com/200x250?text=No+Image" alt="No Foto"
                        class="img-fluid rounded mb-3">
                @endif
            </div>
            <div class="col-md-8">
                <table class="table table-bordered">
                    <tr>
                        <th>Nama</th>
                        <td>{{ $petani->nama }}</td>
                    </tr>
                    <tr>
                        <th>NIK</th>
                        <td>{{ $petani->nik }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Lahir</th>
                        <td>{{ $petani->tgl_lahir }}</td>
                    </tr>
                    <tr>
                        <th>No HP</th>
                        <td>{{ $petani->no_hp }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>{{ $petani->alamat }}</td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td>
                            {{ $petani->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                        </td>
                    </tr>
                </table>

                <a href="{{ route('petani.index') }}" class="btn btn-secondary mt-3"><i class="ti-arrow-left"></i>
                    Kembali</a>
                <a href="{{ route('petani.edit', $petani->id) }}" class="btn btn-warning mt-3"><i class="ti-pencil"></i>
                    Edit</a>
            </div>

        </div>
        <div class="card-body row">
            <div class="col-md-12">
                <x-table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Luas Lahan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($banyakKebun as $kebun)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <img src="{{ $kebun->foto ? Storage::url($kebun->foto) : asset('images/no-photo.png') }}"
                                        alt="Foto Kebun" width="50"
                                        onerror="this.onerror=null;this.src='{{ asset('images/no-photo.png') }}';">
                                </td>
                                <td>{{ $kebun->luas_lahan . ' Ha' ?? 'N/A' }}</td>
                                <td>
                                    <!-- Tombol Detail -->
                                    <a href="{{ route('kebun.show', $kebun->id) }}" class="btn btn-info btn-sm">
                                        <i class="ti-eye"></i> Detail
                                    </a>
                                    <!-- Tombol Edit -->
                                    <a href="{{ route('kebun.edit', $kebun->id) }}" class="btn btn-warning btn-sm">
                                        <i class="ti-pencil"></i> Edit
                                    </a>
                                    <!-- Tombol Hapus dengan Konfirmasi -->
                                    <form action="{{ route('kebun.destroy', $kebun->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin ingin menghapus?')">
                                            <i class="ti-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Luas Lahan</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </x-table>
                <div class="row mt-4">
                    <div class="col-3 d-flex">
                        @if ($previous)
                            <a href="{{ route('petani.show', $previous->id) }}" class="btn btn-secondary ms-0 me-auto">
                                &larr; Sebelumnya
                            </a>
                        @endif
                    </div>
                    <div class="col-6 text-center align-self-center">
                        <!-- Kosong untuk spasi tengah -->
                    </div>
                    <div class="col-3 d-flex justify-content-end">
                        @if ($next)
                            <a href="{{ route('petani.show', $next->id) }}" class="btn btn-secondary ms-auto me-0">
                                Selanjutnya &rarr;
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin>
