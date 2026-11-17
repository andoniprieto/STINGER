@extends('front-end.layout')
@section('content')
{{-- Ekitaldien kudeaketa (83-1257-zeregina---ekitaldeen-kudeaketa-front-end adarretik) --}}
@php
    // $ekitaldiak eta $sarrerak EkitaldiakController@index-etik datoz
    $prezioa = fn ($balioa) => number_format((float) $balioa, 2, ',', '.') . ' €';
    $salduta = $sarrerak->sum('kopurua');
    $diruSarrerak = $sarrerak->sum('prezio_totala');
@endphp
<div class="container orria py-4 py-md-5">

    <div class="row g-2 mb-3 d-md-none">
        <div class="col-6"><a href="{{ url('/admin/ekitaldiak') }}" class="btn fitxa aktiboa w-100">Ekitaldiak</a></div>
        <div class="col-6"><a href="{{ url('/admin/erabiltzaileak') }}" class="btn fitxa w-100">Erabiltzaileak</a></div>
    </div>

    {{-- Mugikorrean ez da izenburua erakusten (prototipoa) --}}
    <div class="d-none d-md-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <div class="goiburua gorria text-uppercase">Administrazioa</div>
            <h1 class="mb-0">Ekitaldien kudeaketa</h1>
        </div>
        <a href="{{ url('/admin/ekitaldiak/create') }}" class="btn btn-gorria botoi-nagusia">+ Ekitaldi berria</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success" role="status">{{ session('success') }}</div>
    @endif

    <div class="row g-2 g-md-3 mb-3 mb-md-4">
        <div class="col-4"><div class="txartela estatistika p-3"><div class="small fw-semibold text-secondary">Ekitaldiak</div><div class="zenbakia">{{ count($ekitaldiak) }}</div></div></div>
        <div class="col-4"><div class="txartela estatistika p-3"><div class="small fw-semibold text-secondary"><span class="d-none d-md-inline">Saldutako sarrerak</span><span class="d-md-none">Salduta</span></div><div class="zenbakia">{{ $salduta }}</div></div></div>
        <div class="col-4"><div class="txartela estatistika p-3"><div class="small fw-semibold text-secondary">Diru-sarrerak</div><div class="zenbakia">{{ $diruSarrerak }} €</div></div></div>
    </div>

    {{-- Mugikorra: botoia estatistiken azpian --}}
    <a href="{{ url('/admin/ekitaldiak/create') }}" class="btn btn-gorria w-100 berria-mugikorra d-flex d-md-none mb-3">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M12 5v14"></path><path d="M5 12h14"></path></svg>
        Ekitaldi berria
    </a>

    {{-- Mugikorra: txartelak --}}
    <div class="d-flex flex-column gap-3 d-md-none">
        @foreach ($ekitaldiak as $e)
            <article class="txartela p-3 d-flex flex-column gap-3" data-ekitaldia="{{ $e['id'] }}">
                <div class="d-flex align-items-start gap-2">
                    <span class="kolore-puntua" style="background: {{ $e->kolorea() }};"></span>
                    <div class="d-flex flex-column">
                        <span class="fw-bold">{{ $e['izenburua'] }}</span>
                        <span class="small text-secondary">{{ $e->data->format('d/m') }} · {{ $e->ordua->format('H:i') }} · {{ $prezioa($e['prezioa']) }}</span>
                        <span class="small text-secondary">{{ $e->salduta() }} / {{ $e->edukiera }} salduta</span>
                    </div>
                </div>
                <div class="mugikor-botoiak">
                    <a href="{{ url('/admin/ekitaldiak/'.$e['id']) }}" class="btn btn-zuria">Ikusi</a>
                    <a href="{{ url('/admin/ekitaldiak/'.$e['id'].'/edit') }}" class="btn btn-zuria">Editatu</a>
                    <button type="button" class="btn btn-ezabatu"
                            data-bs-toggle="modal" data-bs-target="#ezabatuModala"
                            data-ekintza="{{ url('/admin/ekitaldiak/'.$e['id']) }}" data-izena="{{ $e['izenburua'] }}">Ezabatu</button>
                </div>
            </article>
        @endforeach
    </div>

    {{-- Ordenagailua eta tableta: taula --}}
    <div class="txartela taula table-responsive d-none d-md-block">
        <table class="table align-middle mb-0">
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Izenburua</th>
                    <th>Kategoria</th>
                    <th>Aretoa</th>
                    <th>Prezioa</th>
                    <th>Salduta</th>
                    <th><span class="visually-hidden">Ekintzak</span></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ekitaldiak as $e)
                    <tr data-ekitaldia="{{ $e['id'] }}">
                        <td>{{ $e->data->format('Y-m-d') }} {{ $e->ordua->format('H:i') }}</td>
                        <td class="fw-bold">{{ $e['izenburua'] }}</td>
                        <td>{{ $e['kategoria'] }}</td>
                        <td>{{ $e->aretoa }}</td>
                        <td>{{ $prezioa($e['prezioa']) }}</td>
                        <td>{{ $e->salduta() }}/{{ $e->edukiera }}</td>
                        <td>
                            <div class="d-flex flex-wrap justify-content-end gap-2">
                                <a href="{{ url('/admin/ekitaldiak/'.$e['id']) }}" class="btn btn-zuria">Ikusi</a>
                                <a href="{{ url('/admin/ekitaldiak/'.$e['id'].'/edit') }}" class="btn btn-zuria">Editatu</a>
                                <button type="button" class="btn btn-ezabatu"
                                        data-bs-toggle="modal" data-bs-target="#ezabatuModala"
                                        data-ekintza="{{ url('/admin/ekitaldiak/'.$e['id']) }}" data-izena="{{ $e['izenburua'] }}">Ezabatu</button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div id="hutsik" class="hutsik p-4 text-center {{ $ekitaldiak->isEmpty() ? '' : 'd-none' }}">Oraindik ez dago ekitaldirik.</div>

</div>

{{-- Ezabatzeko berrespen-leihoa (erabiltzaileen kudeaketaren estilo bera). Prototipoa: ez du benetan ezabatzen, zerrendara itzultzen da. --}}
<div class="modal fade" id="ezabatuModala" tabindex="-1" aria-labelledby="ezabatuIzenburua" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content ezabatu-leihoa">
            <div class="modal-body p-4">
                <div class="d-flex align-items-start gap-3">
                    <span class="ezabatu-ikonoa" aria-hidden="true">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 6h18"></path><path d="M8 6V4h8v2"></path><path d="M19 6l-1 14H6L5 6"></path><path d="M10 11v6"></path><path d="M14 11v6"></path>
                        </svg>
                    </span>
                    <div class="flex-grow-1">
                        <div class="goiburua gorria text-uppercase">Administrazioa</div>
                        <h2 id="ezabatuIzenburua" class="h4 mb-2">Ekitaldia ezabatu?</h2>
                        <p class="mb-0 text-secondary">
                            <strong class="text-dark" id="ezabatuIzena"></strong>
                            eta bere sarrera guztiak betiko ezabatuko dira.
                            Ekintza hau ezin da desegin.
                        </p>
                    </div>
                </div>
            </div>
            <div class="modal-footer ezabatu-oina px-4 py-3">
                <button type="button" class="btn btn-zuria px-3" data-bs-dismiss="modal">Utzi</button>
                <form id="ezabatuFormularioa" method="POST" class="m-0">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-gorria w-100">Bai, ezabatu</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('ezabatuModala').addEventListener('show.bs.modal', function (gertaera) {
        const botoia = gertaera.relatedTarget;
        document.getElementById('ezabatuFormularioa').action = botoia.dataset.ekintza;
        document.getElementById('ezabatuIzena').textContent = botoia.dataset.izena;
    });
</script>
@endsection
