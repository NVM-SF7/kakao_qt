<x-admin>
    <x-slot name="title">QR Code Tanaman</x-slot>

    <x-slot name="breadcrumbs">
        <li class="breadcrumb-item"><a href="{{ route('tanaman.index') }}">Tanaman</a></li>
        <li class="breadcrumb-item active">QR Code</li>
    </x-slot>

    <div class="row justify-content-center mt-4">
        <div class="col-md-6 text-center">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="card-title mb-3">Scan QR Code</h4>
                    <div class="mb-3">
                        {!! $qr !!}
                    </div>
                    <p class="card-text">Scan kode di atas untuk melihat detail tanaman atau menambahkan data taksasi secara langsung.</p>
                    <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3"><i class="ti-arrow-left"></i> Kembali</a>
                </div>
            </div>
        </div>
    </div>
</x-admin>
