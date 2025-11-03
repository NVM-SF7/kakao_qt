<div class="form-group">
    <label for="tanggal">Tanggal</label>
    <input type="date" name="tanggal" class="form-control"
           value="{{ old('tanggal', $taksasi->tanggal ?? now()->toDateString()) }}" required>
</div>

<div class="form-group">
    <label for="id_tanaman">Tanaman</label>
    <select name="id_tanaman" class="form-control" required>
        <option value="">-- Pilih Tanaman --</option>
        @foreach ($tanamans as $tanaman)
            <option value="{{ $tanaman->id }}"
                {{ old('id_tanaman', $taksasi->id_tanaman ?? $tanamanTerpilih->id ?? '') == $tanaman->id ? 'selected' : '' }}>
                {{ $tanaman->id }} - Klon: {{ $tanaman->klon->nama ?? '-' }} - Blok: {{ $tanaman->blokjalur->nama ?? '-' }}
            </option>
        @endforeach
    </select>
</div>

@foreach (['pentil', 'buah_muda', 'buah_mengkal', 'buah_masak'] as $field)
    <div class="form-group">
        <label for="{{ $field }}">{{ ucwords(str_replace('_', ' ', $field)) }}</label>
        <input type="number" min="0" name="{{ $field }}" class="form-control"
               value="{{ old($field, $taksasi->$field ?? 0) }}">
    </div>
@endforeach
