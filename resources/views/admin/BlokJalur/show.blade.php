<x-admin>
    <x-slot name="title">Detail Blok Jalur</x-slot>

    <x-slot name="breadcrumbs">
        <li class="breadcrumb-item"><a href="{{ route('blok-jalur.index') }}">Blok Jalur</a></li>
        <li class="breadcrumb-item active">Detail</li>
    </x-slot>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Nama Blok Jalur</th>
                    <td>{{ $blokjalur->nama }}</td>
                </tr>
                <tr>
                    <th>Kebun</th>
                    <td>{{ $blokjalur->kebun->nama ?? '-' }}</td>
                </tr>
            </table>

            <a href="{{ route('blok-jalur.index') }}" class="btn btn-secondary mt-3"><i class="ti-arrow-left"></i> Kembali</a>
            <a href="{{ route('blok-jalur.edit', $blokjalur->id) }}" class="btn btn-warning mt-3"><i class="ti-pencil"></i> Edit</a>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">
                Tanaman
            </h5>
        </div>
        <div class="card-body">
            <x-table>
                <thead>
                    <th>No</th>
                    <th>Tanggal Pembibitan</th>
                    <th>Tanggal Penanaman</th>
                    <th>Kebun</th>
                    <th>Klon</th>
                    <th>Status</th>
                </thead>
                <tbody>
                    @foreach ($banyakTanaman as  $tanaman)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$tanaman->tanggal_pembibitan}}</td>
                        <td>{{$tanaman->tanggal_penanaman}}</td>
                        <td>{{$tanaman->kebun->nama}}</td>
                        <td>{{$tanaman->klon->nama}}</td>
                        <td>{{$tanaman->status->nama}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </x-table>
        </div>
    </div>
</x-admin>
