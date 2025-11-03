<x-admin>
    <x-slot name="title">Detail Tanaman</x-slot>

    <x-slot name="breadcrumbs">
        <li class="breadcrumb-item"><a href="{{ route('tanaman.index') }}">Tanaman</a></li>
        <li class="breadcrumb-item active">Detail</li>
    </x-slot>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Code Tanaman</th>
                    <td>{{ $tanaman->code }}</td>
                </tr>
                <tr>
                    <th>Tanggal Pembibitan</th>
                    <td>{{ $tanaman->tanggal_pembibitan }}</td>
                </tr>
                <tr>
                    <th>Tanggal Penanaman</th>
                    <td>{{ $tanaman->tanggal_penanaman }}</td>
                </tr>
                <tr>
                    <th>Klon</th>
                    <td>{{ $tanaman->klon->nama ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Blok Jalur</th>
                    <td>{{ $tanaman->blokjalur->nama ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{ $tanaman->status->nama ?? '-' }}</td>
                </tr>
                @if ($tanaman->qr_code)
                    <tr>
                        <th>QR Code</th>
                        <td><img src="{{ asset('storage/qrcodes/' . $tanaman->qr_code) }}" alt="QR Code"></td>
                    </tr>
                @endif

            </table>

            <a href="{{ route('tanaman.index') }}" class="btn btn-secondary mt-3"><i class="ti-arrow-left"></i>
                Kembali</a>
            <a href="{{ route('tanaman.edit', $tanaman->id) }}" class="btn btn-warning mt-3"><i class="ti-pencil"></i>
                Edit</a>
            <a href="{{ route('tanaman.qr', $tanaman->id) }}" class="btn btn-info mt-3">
                <i class="ti-qrcode"></i> Lihat QR Tanaman
            </a>

        </div>
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Taksasi</h5>
            </div>
            <div class="card-body">
                <x-table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Pentil</th>
                            <th>Buah Muda</th>
                            <th>Buah Mengkal</th>
                            <th>Buah Masak</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($banyakTaksasi as $taksasi)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $taksasi->pentil }}</td>
                                <td>{{ $taksasi->buah_mengkal }}</td>
                                <td>{{ $taksasi->buah_muda }}</td>
                                <td>{{ $taksasi->buah_masak }}</td>
                                <td>
                                    <a href="{{ route('taksasi.show', $taksasi->id) }}" class="btn btn-info btn-sm"><i
                                            class="ti-eye"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </x-table>
            </div>
        </div>
    </div>
</x-admin>
