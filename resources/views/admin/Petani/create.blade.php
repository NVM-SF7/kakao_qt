<x-admin>
    <x-slot name="title">Tambah Petani</x-slot>

    <x-slot name="breadcrumbs">
        <li class="breadcrumb-item"><a href="{{ route('petani.index') }}">Petani</a></li>
        <li class="breadcrumb-item active">Tambah</li>
    </x-slot>

    <form action="{{ route('petani.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="foto">Foto</label>
            <input type="file" name="foto" id="foto" class="form-control" accept="image/*">
            <img id="preview-foto" class="mt-2" src="#" alt="Preview Foto"
                style="display: none; max-height: 200px;">
        </div>

        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
        </div>

        <div class="form-group">
            <label for="nik">NIK</label>
            <input type="text" name="nik" id="nik" class="form-control" value="{{ old('nik') }}">
            <small id="nik-feedback" class="text-danger"></small>
        </div>

        <div class="form-group">
            <label for="tgl_lahir">Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" class="form-control" value="{{ old('tgl_lahir') }}">
        </div>

        <div class="form-group">
            <label for="no_hp">No HP</label>
            <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp') }}">
        </div>

        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" class="form-control">{{ old('alamat') }}</textarea>
        </div>

        <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control" required>
                <option value="">-- Pilih --</option>
                <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success mt-3"><i class="ti-save"></i> Simpan</button>
    </form>

    {{-- Tambahkan jQuery dan script pengecekan NIK --}}
    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $('#nik').on('input', function() {
                const nik = $(this).val();
                const inputField = $(this);

                if (nik.length >= 5) {
                    $.ajax({
                        url: '{{ route('cek.nik') }}',
                        type: 'GET',
                        data: {
                            nik: nik
                        },
                        success: function(response) {
                            if (response.exists) {
                                $('#nik-feedback').text('NIK sudah terdaftar.');
                                inputField.addClass('is-invalid');
                            } else {
                                $('#nik-feedback').text('');
                                inputField.removeClass('is-invalid');
                            }
                        }
                    });
                } else {
                    $('#nik-feedback').text('');
                    inputField.removeClass('is-invalid');
                }
            });
        </script>
        <script>
            document.getElementById('foto').addEventListener('change', function(e) {
                const preview = document.getElementById('preview-foto');
                const file = e.target.files[0];
                if (file) {
                    preview.src = URL.createObjectURL(file);
                    preview.style.display = 'block';
                } else {
                    preview.src = '#';
                    preview.style.display = 'none';
                }
            });
        </script>
    @endpush
</x-admin>
