<x-admin>
    <x-slot name="title">Edit Tanaman</x-slot>

    <x-slot name="breadcrumbs">
        <li class="breadcrumb-item"><a href="{{ route('tanaman.index') }}">Tanaman</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </x-slot>

    <form action="{{ route('tanaman.update', $tanaman->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="code">Kode</label>
            
            {{-- Tampilan ke user --}}
            <div class="form-control" id="codeDisplay" readonly>{{ old('code', $tanaman->code) }}</div>

            {{-- Hidden input yang dikirim ke server --}}
            <input type="hidden" name="code" id="codeInput" value="{{ old('code', $tanaman->code) }}">
        </div>

        <div class="form-group">
            <label for="tanggal_pembibitan">Tanggal Pembibitan</label>
            <input type="date" name="tanggal_pembibitan" class="form-control" value="{{ old('tanggal_pembibitan', $tanaman->tanggal_pembibitan) }}" required>
        </div>

        <div class="form-group">
            <label for="tanggal_penanaman">Tanggal Penanaman</label>
            <input type="date" name="tanggal_penanaman" class="form-control" value="{{ old('tanggal_penanaman', $tanaman->tanggal_penanaman) }}" required>
        </div>

        <div class="form-group">
            <label for="id_klon">Klon</label>
            <select name="id_klon" class="form-control">
                <option value="">-- Pilih Klon --</option>
                @foreach($klons as $klon)
                    <option value="{{ $klon->id }}" {{ old('id_klon', $tanaman->id_klon) == $klon->id ? 'selected' : '' }}>{{ $klon->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="id_kebun">Kebun</label>
            <select name="id_kebun" class="form-control" id="kebunSelect">
                <option value="">-- Pilih Kebun --</option>
                @foreach($kebuns as $kebun)
                    <option value="{{ $kebun->id }}" {{ old('id_kebun', $tanaman->id_kebun) == $kebun->id ? 'selected' : '' }}>{{ $kebun->nama }}</option>
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
                    <option value="{{ $status->id }}" {{ old('id_status', $tanaman->id_status) == $status->id ? 'selected' : '' }}>{{ $status->nama }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3"><i class="ti-save"></i> Update</button>
    </form>

    @push('scripts')
    <script>
        @php
            $originalKebunId = old('id_kebun', $tanaman->id_kebun);
            $originalCode = old('code', $tanaman->code);
        @endphp
        document.addEventListener('DOMContentLoaded', function () {
            const kebunSelect = document.getElementById('kebunSelect');
            const blokJalurSelect = document.getElementById('blokJalurSelect');
            const codeInput = document.getElementById('codeInput');
            const codeDisplay = document.getElementById('codeDisplay');

            // Simpan kebun & kode asli dari server (saat halaman pertama dimuat)
            const originalKebunId = '{{ $originalKebunId }}';
            const originalCode = '{{ $originalCode }}';

            function loadBlokJalur(kebunId, selectedBlokId = null) {
                blokJalurSelect.innerHTML = '<option value="">-- Memuat... --</option>';
                fetch(`/get-blok-jalur/${kebunId}`)
                    .then(response => response.json())
                    .then(data => {
                        let options = '<option value="">-- Pilih Blok Jalur --</option>';
                        data.forEach(function (blok) {
                            const selected = blok.id == selectedBlokId ? 'selected' : '';
                            options += `<option value="${blok.id}" ${selected}>${blok.nama}</option>`;
                        });
                        blokJalurSelect.innerHTML = options;
                    });
            }

            const initialKebunId = '{{ $tanaman->id_kebun }}';
            const initialBlokId = '{{ $tanaman->id_blok_jalur }}';
            if (initialKebunId) {
                loadBlokJalur(initialKebunId, initialBlokId);
            }

            kebunSelect.addEventListener('change', function () {
                const kebunId = this.value;

                if (kebunId) {
                    loadBlokJalur(kebunId);

                    if (kebunId == originalKebunId) {
                        // Kembali ke kebun semula, tampilkan kembali kode asli
                        codeDisplay.textContent = originalCode;
                        codeInput.value = originalCode;
                    } else {
                        // Ambil kode baru dari server
                        fetch(`/get-next-code/${kebunId}`)
                            .then(response => response.json())
                            .then(data => {
                                const nextCode = data.nextCode ?? '';
                                codeDisplay.textContent = nextCode;
                                codeInput.value = nextCode;
                            });
                    }
                } else {
                    blokJalurSelect.innerHTML = '<option value="">-- Pilih Blok Jalur --</option>';
                    codeDisplay.textContent = '';
                    codeInput.value = '';
                }
            });
        });
    </script>
    @endpush
</x-admin>
