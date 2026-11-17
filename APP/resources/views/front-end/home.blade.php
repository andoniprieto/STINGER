@extends('front-end.layout')
@section('content')
{{-- Orri printzipala --}}
@php
    // Ekitaldiak datu-basetik, data hurbilenak lehenengo
    $ekitaldiak = \App\Models\Ekitaldia::orderBy('data')->get();
@endphp

<section class="hasiera-goiburua text-white py-4 py-md-5">
    <div class="container py-md-3">
        <p class="denboraldia text-uppercase fw-bold mb-2 mb-md-3">Denboraldia 2026–27</p>
        {{-- Mugikorrean izenburu laburra (prototipoa) --}}
        <h1 class="izenburua fw-bold mb-3 mb-md-4">Bizi kultura Bergaran<span class="d-none d-md-inline">. Aukeratu ekitaldia eta erosi zure sarrera.</span></h1>

        <label for="bilatu" class="form-label small fw-semibold d-none d-md-block">Bilatu ekitaldia</label>
        <div class="position-relative mb-3">
            <svg class="bilatu-ikonoa d-md-none" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#6b7280" stroke-width="2.5"><circle cx="11" cy="11" r="7"></circle><path d="M20 20l-4-4"></path></svg>
            <input type="search" id="bilatu" class="form-control form-control-lg bilatu fs-6" placeholder="Izenburua edo aretoa…">
        </div>

        {{-- Mugikorrean lerro bakarrean, alboetara mugitzeko --}}
        <div class="kategoriak">
            <button class="btn btn-light rounded-pill fw-semibold me-1 mb-2">Denak</button>
            <button class="btn btn-outline-light kategoria rounded-pill fw-semibold me-1 mb-2">Musika</button>
            <button class="btn btn-outline-light kategoria rounded-pill fw-semibold me-1 mb-2">Antzerkia</button>
            <button class="btn btn-outline-light kategoria rounded-pill fw-semibold me-1 mb-2">Bertsolaritza</button>
            <button class="btn btn-outline-light kategoria rounded-pill fw-semibold me-1 mb-2">Dantza</button>
            <button class="btn btn-outline-light kategoria rounded-pill fw-semibold me-1 mb-2">Haurrak</button>
            <button class="btn btn-outline-light kategoria rounded-pill fw-semibold me-1 mb-2">Zinema</button>
        </div>
    </div>
</section>

<section class="container py-4">
    <div class="d-flex justify-content-between align-items-baseline mb-3">
        <h2 class="hurrengoak fw-bold m-0">Hurrengo ekitaldiak</h2>
        <span id="kopurua" class="text-secondary small">{{ $ekitaldiak->count() }} ekitaldi</span>
    </div>

    <div class="row g-3 g-md-4">
        @foreach ($ekitaldiak as $e)
            @php
                // Lekuen etiketa
                if ($e->libre() <= 0) {
                    $egoera = 'Agortuta';
                    $klasea = 'badge-agortuta';
                } elseif ($e->libre() < $e->edukiera * 0.2) {
                    $egoera = 'Azken sarrerak';
                    $klasea = 'badge-azken';
                } else {
                    $egoera = $e->libre() . ' leku libre';
                    $klasea = 'badge-libre';
                }
            @endphp
            <div class="col-md-6 col-lg-4 col-xl-3 ekitaldia" data-izenburua="{{ strtolower($e->izenburua) }}" data-kategoria="{{ $e->kategoria }}">
                {{-- Mugikorra: txartel horizontala, data kategoriaren kolorean (prototipoa) --}}
                <a href="{{ url('/ekitaldiak/' . $e->id) }}" class="txartel-mugikorra d-flex d-md-none">
                    <span class="txartel-data d-flex flex-column align-items-center justify-content-center text-white" style="background: {{ $e->kolorea() }};">
                        <span class="zenbakia">{{ $e->data->day }}</span>
                        <span class="hilabetea">{{ $e->hilabeteLaburra() }}</span>
                        <span class="ordua">{{ $e->ordua->format('H:i') }}</span>
                    </span>
                    <span class="d-flex flex-column flex-grow-1 gap-1 p-3">
                        <span class="txartel-kategoria text-uppercase">{{ $e->kategoria }} · {{ $e->aretoa }}</span>
                        <span class="txartel-izenburua">{{ $e->izenburua }}</span>
                        <span class="d-flex justify-content-between align-items-center mt-auto">
                            <span class="fw-bold">{{ (float) $e->prezioa }} €</span>
                            <span class="badge rounded-pill {{ $klasea }}">{{ $egoera }}</span>
                        </span>
                    </span>
                </a>

                {{-- Tableta eta ordenagailua --}}
                <div class="card h-100 rounded-4 overflow-hidden d-none d-md-flex">
                    <div class="txartel-irudia position-relative d-flex flex-column align-items-center justify-content-center small fw-semibold" style="background: {{ $e->kolorea() }};">
                        @if ($e->irudia)
                            <img src="{{ asset('storage/' . $e->irudia) }}" alt="" class="position-absolute top-0 start-0 w-100 h-100" style="object-fit: cover;">
                        @else
                        <svg width="56" height="56" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="4" width="18" height="16" rx="2"></rect><circle cx="9" cy="10" r="2"></circle><path d="M21 17l-5-5L5 20"></path></svg>
                        Irudia
                        @endif
                        <span class="kategoria-etiketa badge rounded-pill text-uppercase position-absolute top-0 start-0 m-3">{{ $e->kategoria }}</span>
                        <span class="eguna bg-white text-dark rounded-3 text-center lh-1 px-2 py-1 position-absolute top-0 end-0 m-2">
                            <span class="zenbakia d-block fs-4 fw-bold">{{ $e->data->day }}</span><small class="fw-bold">{{ $e->hilabeteLaburra() }}</small>
                        </span>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h3 class="fs-5 fw-bold">{{ $e->izenburua }}</h3>
                        <p class="text-secondary">{{ $e->dataLuzea() }} · {{ $e->ordua->format('H:i') }}<br>{{ $e->aretoa }}</p>
                        <div class="d-flex justify-content-between align-items-center mt-auto mb-3">
                            <span class="fs-5 fw-bold">{{ (float) $e->prezioa }} €</span>
                            <span class="badge rounded-pill {{ $klasea }}">{{ $egoera }}</span>
                        </div>
                        <a href="{{ url('/ekitaldiak/' . $e->id) }}" class="btn btn-outline-dark fw-semibold w-100">Xehetasunak ikusi</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <p id="emaitzarik-ez" class="text-center text-secondary py-4" style="display: none;">Ez dago bat datorren ekitaldirik.</p>
</section>

<script>
    // Bilatzailea eta kategorien botoiak
    const bilatu = document.getElementById('bilatu');
    const botoiak = document.querySelectorAll('.kategoriak .btn');
    let aukeratutakoKategoria = 'Denak';

    function iragazi() {
        const testua = bilatu.value.toLowerCase();
        let ikusgai = 0;

        document.querySelectorAll('.ekitaldia').forEach(function (ekitaldia) {
            const izenaBadago = ekitaldia.dataset.izenburua.includes(testua);
            const kategoriaOndo = aukeratutakoKategoria === 'Denak' || ekitaldia.dataset.kategoria === aukeratutakoKategoria;

            if (izenaBadago && kategoriaOndo) {
                ekitaldia.style.display = '';
                ikusgai++;
            } else {
                ekitaldia.style.display = 'none';
            }
        });

        document.getElementById('kopurua').textContent = ikusgai + ' ekitaldi';
        document.getElementById('emaitzarik-ez').style.display = ikusgai === 0 ? 'block' : 'none';
    }

    bilatu.addEventListener('input', iragazi);

    botoiak.forEach(function (botoia) {
        botoia.addEventListener('click', function () {
            aukeratutakoKategoria = botoia.textContent.trim();

            // Aukeratutako botoia zuria, besteak gardenak
            botoiak.forEach(function (b) {
                b.classList.remove('btn-light');
                b.classList.add('btn-outline-light', 'kategoria');
            });
            botoia.classList.remove('btn-outline-light', 'kategoria');
            botoia.classList.add('btn-light');

            iragazi();
        });
    });
</script>
@endsection
