<x-admin>
    <x-slot name="title">Tambah Tanaman</x-slot>

    <x-slot name="breadcrumbs">
        <li class="breadcrumb-item"><a href="{{ route('tanaman.index') }}">Tanaman</a></li>
        <li class="breadcrumb-item active">Tambah</li>
    </x-slot>

    <form action="{{ route('tanaman.store') }}" method="POST">
        @csrf

    <div class="form-group">
        <label for="code">Kode</label>
        
        {{-- Tampilan ke user --}}
        <div class="form-control" id="codeDisplay" readonly></div>

        {{-- Hidden input yang dikirim ke server --}}
        <input type="hidden" name="code" id="codeInput">
    </div>


        <div class="form-group">
            <label for="tanggal_pembibitan">Tanggal Pembibitan</label>
            <input type="date" name="tanggal_pembibitan" class="form-control" value="{{ old('tanggal_pembibitan') }}" required>
        </div>

        <div class="form-group">
            <label for="tanggal_penanaman">Tanggal Penanaman</label>
            <input type="date" name="tanggal_penanaman" class="form-control" value="{{ old('tanggal_penanaman') }}" required>
        </div>

        <div class="form-group">
            <label for="id_klon">Klon</label>
            <select name="id_klon" class="form-control">
                <option value="">-- Pilih Klon --</option>
                @foreach($klons as $klon)
                    <option value="{{ $klon->id }}" {{ old('id_klon') == $klon->id ? 'selected' : '' }}>{{ $klon->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="id_kebun">Kebun</label>
            <select name="id_kebun" class="form-control" id="kebunSelect">
                <option value="">-- Pilih Kebun --</option>
                @foreach($kebuns as $kebun)
                    <option value="{{ $kebun->id }}" {{ old('id_kebun') == $kebun->id ? 'selected' : '' }}>{{ $kebun->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="id_blok_jalur">Blok Jalur</label>
            <select name="id_blok_jalur" class="form-control" id="blokJalurSelect">
                <option value="">-- Pilih Blok Jalur --</option>
            </select>
        </div>

        <div class="form-group">
            <label for="id_status">Status</label>
            <select name="id_status" class="form-control">
                <option value="">-- Pilih Status --</option>
                @foreach($statuses as $status)
                    <option value="{{ $status->id }}" {{ old('id_status') == $status->id ? 'selected' : '' }}>{{ $status->nama }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success mt-3"><i class="ti-save"></i> Simpan</button>
    </form>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const kebunSelect = document.getElementById('kebunSelect');
            const blokJalurSelect = document.getElementById('blokJalurSelect');

            kebunSelect.addEventListener('change', function () {
                const kebunId = this.value;

                blokJalurSelect.innerHTML = '<option value="">-- Memuat... --</option>';

                if (kebunId) {
                    fetch(`/get-blok-jalur/${kebunId}`)
                        .then(response => response.json())
                        .then(data => {
                            let options = '<option value="">-- Pilih Blok Jalur --</option>';
                            data.forEach(function (blok) {
                                options += `<option value="${blok.id}">${blok.nama}</option>`;
                            });
                            blokJalurSelect.innerHTML = options;
                        });
                } else {
                    blokJalurSelect.innerHTML = '<option value="">-- Pilih Blok Jalur --</option>';
                }
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const kebunSelect = document.getElementById('kebunSelect');
            const codeDisplay = document.getElementById('codeDisplay');
            const codeInput = document.getElementById('codeInput');

            kebunSelect.addEventListener('change', function () {
                const kebunId = this.value;

                if (kebunId) {
                    fetch(`/get-next-code/${kebunId}`)
                        .then(response => response.json())
                        .then(data => {
                            const nextCode = data.nextCode;

                            // Tampilkan ke user
                            codeDisplay.textContent = nextCode;

                            // Simpan ke input hidden
                            codeInput.value = nextCode;
                        });
                } else {
                    codeDisplay.textContent = '';
                    codeInput.value = '';
                }
            });
        });
    </script>

    @endpush

</x-admin>
