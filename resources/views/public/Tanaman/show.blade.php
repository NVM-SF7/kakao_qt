<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Data Tanaman</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" sizes="16x16" href='{{ asset('/images/favicon.png') }}'>
    <link rel="stylesheet" href='{{ asset('vendor/owl-carousel/css/owl.carousel.min.css') }}'>
    <link rel="stylesheet" href='{{ asset('vendor/datatables/css/jquery.dataTables.min.css') }}'>
    <link rel="stylesheet" href='{{ asset('vendor/sweetalert2/dist/sweetalert2.min.css') }}'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;
        }

        body {
            background-color: #f8fafc;
            font-family: 'Segoe UI', sans-serif;
        }

        header,
        footer {
            background-color: #ffffff;
            padding: 1rem 0;
            text-align: center;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.05);
        }

        .section-title {
            font-size: 24px;
            font-weight: 600;
            color: #4a4a4a;
        }

        .card {
            border-radius: 12px;
            border: none;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .btn-purple {
            background-color: #6f42c1;
            color: #fff;
        }

        .btn-purple:hover {
            background-color: #5936a6;
        }
    </style>

</head>

<body>

    <header>
        <h1 class="section-title">Informasi Tanaman</h1>
    </header>

    <main class="container my-4">

        <div class="card p-4 mb-4">
            <h4 class="mb-3">Detail Tanaman</h4>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Klon:</strong> {{ $tanaman->klon->nama ?? '-' }}</li>
                <li class="list-group-item"><strong>Kebun:</strong> {{ $tanaman->kebun->nama ?? '-' }}</li>
                <li class="list-group-item"><strong>Blok Jalur:</strong> {{ $tanaman->blokjalur->nama ?? '-' }}</li>
                <li class="list-group-item"><strong>Status:</strong> {{ $tanaman->status->nama ?? '-' }}</li>
                <li class="list-group-item"><strong>Tanggal Penanaman:</strong> {{ $tanaman->tanggal_penanaman }}</li>
            </ul>
        </div>

        @if ($taksasiTerbaru)
            <div class="card p-4">
                <h4 class="mb-3">Taksasi Terbaru</h4>
                <x-table>
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Pentil</th>
                            <th>Buah Muda</th>
                            <th>Buah Mengkal</th>
                            <th>Buah Masak</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $taksasiTerbaru->tanggal }}</td>
                            <td>{{ $taksasiTerbaru->pentil }}</td>
                            <td>{{ $taksasiTerbaru->buah_muda }}</td>
                            <td>{{ $taksasiTerbaru->buah_mengkal }}</td>
                            <td>{{ $taksasiTerbaru->buah_masak }}</td>
                        </tr>
                    </tbody>
                </x-table>
            </div>
        @else
            <div class="alert alert-info text-center mt-4">
                Belum ada data taksasi untuk tanaman ini.
            </div>
        @endif

        <div class="text-center mt-4">
            <a href="{{ route('welcome') }}" class="btn btn-purple"><i class="ti-arrow-left"></i> Kembali</a>
        </div>

    </main>

    <footer class="mt-5">
        <small>&copy; {{ date('Y') }} Sistem Informasi Perkebunan Kakao - Kawasan Integrasi Kakao</small>
    </footer>

    <!-- Required vendors -->
    <script src="{{ asset('vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('js/quixnav-init.js') }}"></script>
    <script src="{{ asset('js/custom.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/sweetalert/sweetalert.min.js') }}""></script>
    @isset($scripts)
        {{ $scripts }}
    @endisset
    @stack('scripts')
</body>

</html>
