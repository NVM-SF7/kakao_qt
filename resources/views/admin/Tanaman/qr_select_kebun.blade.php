<x-admin>

    <x-slot name="title">Kebun Cetak QR</x-slot>

    <x-slot name="breadcrumbs">
        <li class="breadcrumb-item active">Cetak QR</li>
    </x-slot>

    <div class="container  d-flex justify-content-center align-items-center">
        <div class="w-100" style="max-width: 600px;">
            <h2 class="mb-4 text-center">Pilih Kebun untuk Cetak QR Tanaman</h2>

            <form action="{{ route('tanaman.qr.print', ['id' => 0]) }}" method="GET" id="kebunForm">
                <div class="form-group">
                    <label for="kebunSelect">Kebun</label>
                    <select class="form-control" id="kebunSelect" name="kebun_id" required>
                        <option value="">-- Pilih Kebun --</option>
                        @foreach ($kebuns as $kebun)
                            <option value="{{ $kebun->id }}">{{ $kebun->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary mt-3 w-100">Lihat & Cetak QR</button>
            </form>
        </div>
    </div>


    <script>
        document.getElementById('kebunSelect').addEventListener('change', function() {
            const kebunId = this.value;
            const form = document.getElementById('kebunForm');
            form.action = `/kebun/${kebunId}/tanaman/qr`;
        });
    </script>
</x-admin>
