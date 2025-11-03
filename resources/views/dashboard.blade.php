<x-admin>
    <x-slot name="title">Dashboard</x-slot>

    <x-slot name="breadcrumbs">
        <li class="breadcrumb-item active">Dashboard</li>
    </x-slot>

    <div class="container mt-4">
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card border-primary">
                    <div class="card-body">
                        <h5 class="card-title">Total Kebun</h5>
                        <p class="card-text h3">{{ $totalKebun }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-success">
                    <div class="card-body">
                        <h5 class="card-title">Total Blok Jalur</h5>
                        <p class="card-text h3">{{ $totalBlokJalur }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-info">
                    <div class="card-body">
                        <h5 class="card-title">Total Tanaman</h5>
                        <p class="card-text h3">{{ $totalTanaman }}</p>
                    </div>
                </div>
            </div>
        </div>

        <h4>Detail Kebun</h4>
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Kebun</th>
                    <th>Luas Lahan</th>
                    <th>Jumlah Blok Jalur</th>
                    <th>Jumlah Tanaman</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kebuns as $index => $kebun)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $kebun->nama }}</td>
                        <td>{{ $kebun->luas_lahan }} m²</td>
                        <td>{{ $kebun->blok_jalur_count }}</td>
                        <td>{{ $kebun->tanaman_count }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h4 class="mt-5">Analisa Taksasi</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Parameter</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr><td>Pentil</td><td>{{ $totalPentil }}</td></tr>
                <tr><td>Buah Muda</td><td>{{ $totalBuahMuda }}</td></tr>
                <tr><td>Buah Mengkal</td><td>{{ $totalBuahMengkal }}</td></tr>
                <tr><td>Buah Masak</td><td>{{ $totalBuahMasak }}</td></tr>
            </tbody>
        </table>

        <h4 class="mt-5">Grafik Taksasi</h4>
        <canvas id="taksasiChart" height="100"></canvas>
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('taksasiChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Pentil', 'Buah Muda', 'Buah Mengkal', 'Buah Masak'],
                    datasets: [{
                        label: 'Jumlah Buah',
                        data: [
                            {{ $totalPentil }},
                            {{ $totalBuahMuda }},
                            {{ $totalBuahMengkal }},
                            {{ $totalBuahMasak }}
                        ],
                        backgroundColor: [
                            '#42a5f5',
                            '#66bb6a',
                            '#ffa726',
                            '#ef5350'
                        ],
                        borderRadius: 8
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false
                        },
                        title: {
                            display: true,
                            text: 'Distribusi Buah Berdasarkan Tahapan'
                        }
                    }
                }
            });
        </script>
    @endpush
</x-admin>
