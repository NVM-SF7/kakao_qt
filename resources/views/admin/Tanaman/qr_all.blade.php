<!DOCTYPE html>
<html>
<head>
    <title>QR Code Tanaman</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .qr-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .qr-item {
            width: 200px;
            text-align: center;
            page-break-inside: avoid;
        }
        .qr-item img {
            width: 200px;
            height: 200px;
        }
    </style>
</head>
<body>
    <h1>Daftar QR Tanaman</h1>
    <div class="qr-container">
        @foreach($tanamans as $tanaman)
            <div class="qr-item">
                {!! QrCode::size(200)->generate(route('tanaman.view', $tanaman->id)) !!}
                <div>
                    {{ $tanaman->blokJalur->nama ?? '-' }}/{{ $tanaman->code }}
                </div>
            </div>
        @endforeach
    </div>

    <script>
        window.print();
    </script>
</body>
</html>
