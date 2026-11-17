@extends('front-end.layout')
@section('content')
{{-- Ekitaldiaren xehetasuna. $ekitaldia EkitaldiakController@show-etik dator --}}
@php
    // Administraziotik etorrita, zerrendara itzuli
    $itzuli = request()->is('admin/*') ? url('/admin/ekitaldiak') : url('/');
@endphp
<div class="container orria py-4">
    {{-- Mugikorrean goiburuko geziarekin itzultzen da --}}
    <a href="{{ $itzuli }}" class="d-none d-md-inline-flex align-items-center gap-1 gorria fw-bold text-decoration-none mb-3">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M15 18l-6-6 6-6"></path></svg>
        Ekitaldi guztiak
    </a>

    {{-- Mugikorra: kategoria koloretan eta data (prototipoa) --}}
    <div class="d-flex d-md-none justify-content-between align-items-center mb-3">
        <span class="kategoria-pilula text-uppercase" style="background: {{ $ekitaldia->kolorea() }};">{{ $ekitaldia->kategoria }}</span>
        <span class="fw-bold text-secondary">{{ $ekitaldia->dataLuzea() }}</span>
    </div>

    <div class="row g-4">
        <div class="col-lg-5">
            <div style="background: {{ $ekitaldia->kolorea() }};" class="ekitaldi-irudia position-relative overflow-hidden d-flex flex-column align-items-center justify-content-center gap-2 fw-semibold">
                @if ($ekitaldia->irudia)
                    <img src="{{ asset('storage/' . $ekitaldia->irudia) }}" alt="" class="position-absolute top-0 start-0 w-100 h-100" style="object-fit: cover;">
                @else
                    <svg width="88" height="88" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="4" width="18" height="16" rx="2"></rect><circle cx="9" cy="10" r="2"></circle><path d="M21 17l-5-5L5 20"></path></svg>
                    Ekitaldiaren irudia
                @endif
                <span class="badge rounded-pill text-uppercase position-absolute top-0 start-0 m-3 px-3 py-2 d-none d-md-inline-block">{{ $ekitaldia->kategoria }}</span>
            </div>
        </div>

        <div class="col-lg-7 d-flex flex-column gap-3">
            <h1 class="display-5 mb-0">{{ $ekitaldia->izenburua }}</h1>
            <p class="fs-5 text-secondary mb-0">{{ $ekitaldia->deskribapena }}</p>

            <dl class="txartela row g-3 p-3 m-0">
                <div class="col-6"><dt class="datu-etiketa">Data</dt><dd class="fw-bold mb-0">{{ $ekitaldia->dataLuzea() }}</dd></div>
                <div class="col-6"><dt class="datu-etiketa">Ordua</dt><dd class="fw-bold mb-0">{{ $ekitaldia->ordua->format('H:i') }}</dd></div>
                <div class="col-6"><dt class="datu-etiketa">Aretoa</dt><dd class="fw-bold mb-0">{{ $ekitaldia->aretoa }}</dd></div>
                <div class="col-6"><dt class="datu-etiketa">Prezioa</dt><dd class="fw-bold mb-0">{{ number_format($ekitaldia->prezioa, 2, ',', '.') }} €</dd></div>
            </dl>

            <div>
                <div class="d-flex justify-content-between text-secondary mb-2"><span>Salmenta</span><span class="fw-bold">{{ $ekitaldia->salduta() }} / {{ $ekitaldia->edukiera }}</span></div>
                <div class="progress barra rounded-pill mb-2"><div class="progress-bar" style="width: {{ $ekitaldia->salduta() * 100 / $ekitaldia->edukiera }}%"></div></div>
                <span class="badge rounded-pill libre">{{ $ekitaldia->libre() }} leku libre</span>
            </div>

            @auth
                <a href="{{ url('/erosi/'.$ekitaldia->id) }}" class="btn btn-gorria align-self-start erosi-botoia">Sarrerak erosi</a>
            @else
                <div class="abisua d-flex flex-wrap align-items-center gap-3 p-3">
                    <span class="flex-grow-1 fw-semibold">Sarrerak erosteko saioa hasi behar duzu.</span>
                    <a href="{{ url('/saioa-hasi') }}" class="btn btn-gorria">Saioa hasi eta erosi</a>
                </div>
            @endauth
        </div>
    </div>
</div>
@endsection
