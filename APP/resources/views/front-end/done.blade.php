@extends('front-end.layout')
@section('content')
{{-- Erosketa eginda (91-12562-sarrerak-erosita-front-end adarretik) --}}
<div class="container erosita-orria py-4 py-md-5" style="max-width: 672px;">
    <div class="eginda-txartela card rounded-4 p-3 p-md-5 text-center text-md-start" style="border-color: #e7e5e4;">

        <div class="ikonoa rounded-circle d-flex align-items-center justify-content-center mx-auto mx-md-0 mb-3">
            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12l5 5L20 7"></path></svg>
        </div>

        <h1 class="fw-bolder mb-3" style="font-size: clamp(28px, 4vw, 34px);">Erosketa eginda!</h1>

        <p class="testua mb-3">
            <span class="kop">1</span> sarrera<span class="d-none d-md-inline"> erosi dituzu</span>: <strong>Bertso saioa: udazkeneko jaialdia</strong>.
            Baieztapena zure posta elektronikora bidali da.
        </p>

        <div class="sarrera rounded-4 bg-white p-3 px-md-3 mb-3">
            {{-- Mobila --}}
            <div class="d-md-none py-2">
                <p class="datu-etiketa fw-bold text-uppercase mb-1">Sarrera kodea</p>
                <p class="kodea fw-bolder fs-3 mb-1">BA-01-0XQNM</p>
                <p class="testua m-0">Urriak 24, larunbata · 19:00 · <span class="guztira">10 €</span></p>
            </div>

            {{-- Ordenagailua --}}
            <div class="d-none d-md-flex justify-content-between align-items-end gap-3">
                <div>
                    <p class="datu-etiketa fw-bold text-uppercase mb-0">Kodea</p>
                    <p class="kodea fw-bolder fs-4 m-0">BA-01-0XQNM</p>
                </div>
                <div>
                    <p class="datu-etiketa fw-bold text-uppercase mb-0">Data</p>
                    <p class="fw-bold m-0">Urriak 24, larunbata · 19:00</p>
                </div>
                <div>
                    <p class="datu-etiketa fw-bold text-uppercase mb-0">Guztira</p>
                    <p class="guztira fw-bold m-0">10 €</p>
                </div>
            </div>
        </div>

        <div class="d-flex flex-column flex-md-row gap-3">
            <a href="{{ url('/sarrerak') }}" class="btn btn-gorria fw-bold d-flex align-items-center justify-content-center px-3">Nire sarrerak ikusi</a>
            <a href="{{ url('/') }}" class="btn btn-zuria fw-semibold d-flex align-items-center justify-content-center px-3">Ekitaldi gehiago</a>
        </div>

    </div>
</div>

<script>
    // Sarrerak erosi pantailatik datorren kopurua (1–8)
    const kopurua = Math.min(8, Math.max(1, parseInt(new URLSearchParams(location.search).get('kopurua')) || 1));
    document.querySelectorAll('.kop').forEach(e => e.textContent = kopurua);
    document.querySelectorAll('.guztira').forEach(e => e.textContent = kopurua * 10 + ' €');
</script>
@endsection
