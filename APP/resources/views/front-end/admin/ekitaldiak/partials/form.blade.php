{{-- Sortu eta editatu formularioek partekatzen duten zatia (prototipoa: ez du daturik gordetzen). $ekitaldia null denean: sortu. --}}
@php
    $e = $ekitaldia ?? [];
    $kategoriak = ['Musika', 'Antzerkia', 'Bertsolaritza', 'Dantza', 'Haurrak', 'Zinema'];
    $aretoak = ['Areto nagusia', 'Areto txikia'];
@endphp

<div class="mb-3">
    <label for="izenburua" class="form-label small fw-semibold">Izenburua</label>
    <input type="text" id="izenburua" name="izenburua" maxlength="70" required class="form-control" value="{{ $e['izenburua'] ?? '' }}">
</div>

<div class="row g-3 mb-3">
    <div class="col-sm-6">
        <label for="kategoria" class="form-label small fw-semibold">Kategoria</label>
        <select id="kategoria" name="kategoria" class="form-select">
            @foreach ($kategoriak as $kategoria)
                <option @selected(($e['kategoria'] ?? '') === $kategoria)>{{ $kategoria }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-sm-6">
        <label for="aretoa" class="form-label small fw-semibold">Aretoa</label>
        <select id="aretoa" name="aretoa" class="form-select">
            @foreach ($aretoak as $aretoa)
                <option @selected(($e['aretoa'] ?? '') === $aretoa)>{{ $aretoa }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-6">
        <label for="data" class="form-label small fw-semibold">Data</label>
        <input type="date" id="data" name="data" required class="form-control" value="{{ $e['data'] ?? '' }}">
    </div>
    <div class="col-6">
        <label for="ordua" class="form-label small fw-semibold">Ordua</label>
        <input type="time" id="ordua" name="ordua" required class="form-control" value="{{ $e['ordua'] ?? '20:00' }}">
    </div>
    <div class="col-6">
        <label for="prezioa" class="form-label small fw-semibold">Prezioa (€)</label>
        <input type="number" id="prezioa" name="prezioa" min="0" step="0.5" required class="form-control" value="{{ $e['prezioa'] ?? 10 }}">
    </div>
    <div class="col-6">
        <label for="edukiera" class="form-label small fw-semibold">Edukiera</label>
        <input type="number" id="edukiera" name="edukiera" min="1" class="form-control" value="{{ $e['edukiera'] ?? 300 }}">
    </div>
</div>

<div class="mb-3">
    <label for="deskribapena" class="form-label small fw-semibold">Deskribapena</label>
    <textarea id="deskribapena" name="deskribapena" rows="4" maxlength="500" class="form-control">{{ $e['deskribapena'] ?? '' }}</textarea>
</div>

<div class="mb-4">
    <label for="irudia" class="form-label small fw-semibold">Irudia</label>
    <input type="file" id="irudia" name="irudia" accept="image/*" class="form-control">
</div>

<div class="formulario-botoiak">
    <button type="submit" class="btn btn-gorria">Gorde</button>
    <a href="{{ url('/admin/ekitaldiak') }}" class="btn btn-zuria">Utzi</a>
</div>
