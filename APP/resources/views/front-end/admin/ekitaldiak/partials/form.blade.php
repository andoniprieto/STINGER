{{-- Sortu eta editatu formularioek partekatzen duten zatia. $ekitaldia null denean: sortu. --}}
@php
    $ekitaldia = $ekitaldia ?? null;
    $koloreak = \App\Models\Ekitaldia::KOLOREAK;
    $kategoriaHau = old('kategoria', $ekitaldia?->kategoria ?? 'Musika');
    $irudia = $ekitaldia?->irudia ? asset('storage/' . $ekitaldia->irudia) : '';
@endphp

@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $errorea)
            <div>{{ $errorea }}</div>
        @endforeach
    </div>
@endif

<div class="mb-3">
    <label for="izenburua" class="form-label small fw-semibold">Izenburua</label>
    <input type="text" id="izenburua" name="izenburua" maxlength="70" required class="form-control" value="{{ old('izenburua', $ekitaldia?->izenburua) }}">
</div>

<div class="row g-3 mb-3">
    <div class="col-sm-4">
        <label for="kategoria" class="form-label small fw-semibold">Kategoria</label>
        <select id="kategoria" name="kategoria" class="form-select">
            @foreach (array_keys($koloreak) as $kategoria)
                <option @selected($kategoriaHau === $kategoria)>{{ $kategoria }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-sm-4">
        <label for="aretoa" class="form-label small fw-semibold">Aretoa</label>
        <select id="aretoa" name="aretoa" class="form-select">
            @foreach (['Areto nagusia', 'Areto txikia'] as $aretoa)
                <option @selected($ekitaldia?->aretoa === $aretoa)>{{ $aretoa }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-sm-4">
        <label for="data" class="form-label small fw-semibold">Data</label>
        <input type="date" id="data" name="data" required class="form-control" value="{{ old('data', $ekitaldia?->data->format('Y-m-d')) }}">
    </div>
    <div class="col-sm-4">
        <label for="ordua" class="form-label small fw-semibold">Ordua</label>
        <input type="time" id="ordua" name="ordua" required class="form-control" value="{{ old('ordua', $ekitaldia?->ordua->format('H:i') ?? '20:00') }}">
    </div>
    <div class="col-sm-4">
        <label for="prezioa" class="form-label small fw-semibold">Prezioa (€)</label>
        <input type="number" id="prezioa" name="prezioa" min="0" step="0.5" required class="form-control" value="{{ old('prezioa', $ekitaldia?->prezioa ?? 10) }}">
    </div>
    <div class="col-sm-4">
        <label for="edukiera" class="form-label small fw-semibold">Edukiera (lekuak)</label>
        <input type="number" id="edukiera" name="edukiera" min="1" required class="form-control" value="{{ old('edukiera', $ekitaldia?->edukiera ?? 300) }}">
    </div>
</div>

<div class="mb-3">
    <label for="irudia" class="form-label small fw-semibold">Irudia</label>
    <div class="d-flex flex-wrap align-items-center gap-3">
        {{-- Aurrebista: irudirik ez badago, kategoriaren kolorea --}}
        <div id="aurrebista" class="txartel-irudia d-flex flex-column align-items-center justify-content-center small fw-semibold" style="width: 200px; height: 120px; border-radius: 10px; overflow: hidden; background: {{ $koloreak[$kategoriaHau] }};">
            {{-- Hasierako orriko txartelak irudirik ez duenean bezala --}}
            <div id="irudirik-gabe" class="text-center" @if ($irudia) style="display: none;" @endif>
                <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="4" width="18" height="16" rx="2"></rect><circle cx="9" cy="10" r="2"></circle><path d="M21 17l-5-5L5 20"></path></svg>
                <div>Irudia</div>
            </div>
            <img id="aurrebista-img" src="{{ $irudia }}" alt="Aurrebista" style="width: 100%; height: 100%; object-fit: cover; display: {{ $irudia ? 'block' : 'none' }};">
        </div>
        <div class="d-flex flex-column gap-2">
            <input type="file" id="irudia" name="irudia" accept="image/*" class="form-control">
            <span class="small text-secondary">JPG edo PNG. Irudirik gabe, kategoriaren kolorea erakutsiko da.</span>
            <button type="button" id="irudia-kendu" class="btn btn-zuria btn-sm align-self-start" style="display: none;">Irudia kendu</button>
        </div>
    </div>
</div>

<div class="mb-4">
    <label for="deskribapena" class="form-label small fw-semibold">Deskribapena</label>
    <textarea id="deskribapena" name="deskribapena" rows="4" maxlength="500" required class="form-control">{{ old('deskribapena', $ekitaldia?->deskribapena) }}</textarea>
</div>

<div class="formulario-botoiak">
    <button type="submit" class="btn btn-gorria">Gorde</button>
    <a href="{{ url('/admin/ekitaldiak') }}" class="btn btn-zuria">Utzi</a>
</div>

<script>
    const koloreak = @json($koloreak);
    const irudia = document.getElementById('irudia');
    const aurrebista = document.getElementById('aurrebista');
    const aurrebistaImg = document.getElementById('aurrebista-img');
    const kenduBotoia = document.getElementById('irudia-kendu');

    // Irudia aukeratzean, aurrebistan erakutsi
    irudia.addEventListener('change', function () {
        if (irudia.files.length > 0) {
            aurrebistaImg.src = URL.createObjectURL(irudia.files[0]);
            aurrebistaImg.style.display = 'block';
            kenduBotoia.style.display = 'block';
            document.getElementById('irudirik-gabe').style.display = 'none';
        }
    });

    // Irudia kendu
    kenduBotoia.addEventListener('click', function () {
        irudia.value = '';
        aurrebistaImg.src = '';
        aurrebistaImg.style.display = 'none';
        kenduBotoia.style.display = 'none';
        document.getElementById('irudirik-gabe').style.display = '';
    });

    // Kategoria aldatzean, aurrebistaren kolorea aldatu
    document.getElementById('kategoria').addEventListener('change', function () {
        aurrebista.style.background = koloreak[this.value];
    });
</script>
