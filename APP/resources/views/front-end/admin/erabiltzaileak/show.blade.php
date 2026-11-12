@extends('front-end.layout')
@section('content')
@php
    $inizialak = mb_strtoupper(mb_substr($erabiltzailea->name, 0, 1) . mb_substr($erabiltzailea->abizena ?? '', 0, 1));
    $sarreraKopurua = $sarrerak->sum('kopurua');
    $gastatutakoa = $sarrerak->sum('prezio_totala');
@endphp
<div class="container orria py-5" style="max-width: 900px;">

    <p class="mb-3"><a href="{{ route('front-end.admin.erabiltzaileak.index') }}" class="itzuli">&larr; Erabiltzaileen zerrenda</a></p>

    <div class="txartela p-4 d-flex flex-wrap align-items-center gap-4 mb-3">
        <span class="abatarra" aria-hidden="true">{{ $inizialak }}</span>
        <div class="flex-grow-1 d-flex flex-column gap-1">
            <h1 class="mb-0">{{ $erabiltzailea->name }} {{ $erabiltzailea->abizena }}</h1>
            <span class="text-secondary fs-5">{{ $erabiltzailea->email }} · {{ $erabiltzailea->telefonoa }}</span>
            <span>@include('front-end.admin.erabiltzaileak.partials.rola', ['rola' => $erabiltzailea->rola])</span>
        </div>
        <a href="{{ route('front-end.admin.erabiltzaileak.edit', $erabiltzailea->id) }}" class="btn btn-zuria">Editatu</a>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-sm-4">
            <div class="txartela p-3 h-100">
                <div class="datua-izena">Alta data</div>
                <div class="datua-balioa">{{ $erabiltzailea->created_at?->format('Y-m-d') ?? '—' }}</div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="txartela p-3 h-100">
                <div class="datua-izena">Erositako sarrerak</div>
                <div class="datua-balioa">{{ $sarreraKopurua }}</div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="txartela p-3 h-100">
                <div class="datua-izena">Gastatutakoa</div>
                <div class="datua-balioa">{{ number_format((float) $gastatutakoa, 2, ',', '.') }} €</div>
            </div>
        </div>
    </div>

    <h2 class="h4 mb-3">Erosketak</h2>

    @if ($sarrerak->isEmpty())
        <div class="hutsik p-4 text-center">Erabiltzaile honek ez du sarrerarik erosi oraindik.</div>
    @else
        <div class="txartela taula table-responsive">
            <table class="table align-middle mb-0">
                <thead>
                    <tr>
                        <th>Ekitaldia</th>
                        <th>Data</th>
                        <th>Kopurua</th>
                        <th>Guztira</th>
                        <th>Kodea</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sarrerak as $s)
                        <tr>
                            <td class="fw-bold">{{ $s->ekitaldia?->izenburua ?? '—' }}</td>
                            <td>
                                @if ($s->ekitaldia)
                                    {{ $s->ekitaldia->data?->format('Y-m-d') }} · {{ $s->ekitaldia->ordua?->format('H:i') }}
                                @endif
                            </td>
                            <td>{{ $s->kopurua }}</td>
                            <td>{{ number_format((float) $s->prezio_totala, 2, ',', '.') }} €</td>
                            <td class="marka">{{ $s->kodigoa }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

</div>
@endsection
