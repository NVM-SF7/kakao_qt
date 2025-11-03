<x-admin>
    <x-slot name="title">Detail Kebun</x-slot>

    <x-slot name="breadcrumbs">
        <li class="breadcrumb-item"><a href="{{ route('kebun.index') }}">Kebun</a></li>
        <li class="breadcrumb-item active">Detail</li>
    </x-slot>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Nama Kebun</th>
                    <td>{{ $kebun->nama }}</td>
                </tr>
                <tr>
                    <th>Luas Lahan</th>
                    <td>{{ $kebun->luas_lahan ?? '-' }} ha</td>
                </tr>
                <tr>
                    <th>Petani</th>
                    <td>{{ $kebun->petani->nama ?? '-' }}</td>
                </tr>
            </table>

            <a href="{{ route('kebun.index') }}" class="btn btn-secondary mt-3"><i class="ti-arrow-left"></i> Kembali</a>
            <a href="{{ route('kebun.edit', $kebun->id) }}" class="btn btn-warning mt-3"><i class="ti-pencil"></i>
                Edit</a>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">
                Blok/Jalur
            </h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">

                    <x-table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jumlah Tanaman</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($banyakBlokJalur as $blokJalur)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $blokJalur->nama }}</td>
                                    <td>{{ $blokJalur->tanaman->count() }}</td>
                                    <td><a href="{{ route('blok-jalur.show', $blokJalur->id) }}"
                                            class="btn btn-info btn-sm"><i class="ti-eye"></i></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </x-table>
                </div>
            </div>
        </div>
        <div class="card-header">
            <h5 class="card-title">
                Tanaman
            </h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">

                    <x-table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Pembibitan</th>
                                <th>Tanggal Penanaman</th>
                                <th>Klon</th>
                                <th>Blok Jalur</th>
                                <th>Status</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($banyakTanaman as $tanaman)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $tanaman->tanggal_pembibitan ?? 'N/A'}}</td>
                                    <td>{{ $tanaman->tanggal_penanaman ?? 'N/A'}}</td>
                                    <td>{{ $tanaman->klon->nama ?? 'N/A' }}</td>
                                    <td>{{ $tanaman->blokJalur->nama ?? 'N/A' }}</td>
                                    <td>{{ $tanaman->status->nama ?? 'N/A'}}</td>
                                    <td><a href="{{ route('tanaman.show', $tanaman->id) }}"
                                            class="btn btn-info btn-sm"><i class="ti-eye"></i></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </x-table>
                </div>
            </div>
        </div>

</x-admin>
