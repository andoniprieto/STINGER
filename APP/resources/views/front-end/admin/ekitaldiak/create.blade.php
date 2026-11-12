@extends('front-end.layout')
@section('content')
<div class="container orria py-5" style="max-width: 720px;">

    <p class="mb-3"><a href="/admin/ekitaldiak" class="itzuli">&larr; Ekitaldiak</a></p>
    <h1 class="mb-4">Ekitaldi berria</h1>

    {{-- Prototipoa: oraindik ez du daturik gordetzen --}}
    <div class="txartela p-4">
        <form action="/admin/ekitaldiak" method="get">
            <div class="mb-3">
                <label for="izenburua" class="form-label small fw-semibold">Izenburua</label>
                <input id="izenburua" class="form-control" required>
            </div>
            <div class="row g-3 mb-3">
                <div class="col-sm-6">
                    <label for="kategoria" class="form-label small fw-semibold">Kategoria</label>
                    <select id="kategoria" class="form-select"><option>Musika</option><option>Antzerkia</option><option>Bertsolaritza</option><option>Dantza</option><option>Haurrak</option><option>Zinema</option></select>
                </div>
                <div class="col-sm-6">
                    <label for="aretoa" class="form-label small fw-semibold">Aretoa</label>
                    <select id="aretoa" class="form-select"><option>Areto nagusia</option><option>Areto txikia</option></select>
                </div>
                <div class="col-6">
                    <label for="data" class="form-label small fw-semibold">Data</label>
                    <input id="data" type="date" class="form-control" required>
                </div>
                <div class="col-6">
                    <label for="ordua" class="form-label small fw-semibold">Ordua</label>
                    <input id="ordua" type="time" class="form-control" value="20:00">
                </div>
                <div class="col-6">
                    <label for="prezioa" class="form-label small fw-semibold">Prezioa (€)</label>
                    <input id="prezioa" type="number" min="0" step="0.5" class="form-control" value="10">
                </div>
                <div class="col-6">
                    <label for="edukiera" class="form-label small fw-semibold">Edukiera</label>
                    <input id="edukiera" type="number" min="1" class="form-control" value="300">
                </div>
            </div>
            <div class="mb-3">
                <label for="deskribapena" class="form-label small fw-semibold">Deskribapena</label>
                <textarea id="deskribapena" rows="4" class="form-control"></textarea>
            </div>
            <div class="mb-4">
                <label for="irudia" class="form-label small fw-semibold">Irudia</label>
                <input id="irudia" type="file" accept="image/*" class="form-control">
            </div>
            <div class="formulario-botoiak">
                <button type="submit" class="btn btn-gorria">Gorde</button>
                <a href="/admin/ekitaldiak" class="btn btn-zuria">Utzi</a>
            </div>
        </form>
    </div>

</div>
@endsection
