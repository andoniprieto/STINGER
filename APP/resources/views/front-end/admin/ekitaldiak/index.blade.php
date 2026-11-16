@extends('front-end.layout')
@section('content')
@php
    // Prototipoa: adibide-datu finkoak
    $ekitaldiak = require resource_path('views/front-end/admin/ekitaldiak/partials/adibideak.php');
    $prezioa = fn ($balioa) => number_format((float) $balioa, 2, ',', '.') . ' €';
@endphp
<div class="container orria py-5">

    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <div class="goiburua gorria text-uppercase">Administrazioa</div>
            <h1 class="mb-0">Ekitaldien kudeaketa</h1>
        </div>
        <a href="{{ url('/admin/ekitaldiak/sortu') }}" class="btn btn-gorria botoi-nagusia">+ Ekitaldi berria</a>
    </div>

    {{-- Mugikorra: txartelak --}}
    <div class="d-flex flex-column gap-3 d-md-none">
        @foreach ($ekitaldiak as $e)
            <article class="txartela p-3 d-flex flex-column gap-3" data-ekitaldia="{{ $e['id'] }}">
                <div class="d-flex justify-content-between align-items-start gap-2">
                    <div class="d-flex flex-column min-w-0">
                        <span class="fw-bold">{{ $e['izenburua'] }}</span>
                        <span class="small text-secondary">{{ $e['data'] }} · {{ $e['ordua'] }} · {{ $e['aretoa'] }}</span>
                        <span class="small text-secondary">{{ $e['kategoria'] }} · {{ $e['salduta'] }}/{{ $e['edukiera'] }} salduta</span>
                    </div>
                    <span class="fw-bold flex-shrink-0">{{ $prezioa($e['prezioa']) }}</span>
                </div>
                <div class="mugikor-botoiak">
                    <a href="{{ url('/admin/ekitaldiak/'.$e['id']) }}" class="btn btn-zuria">Ikusi</a>
                    <a href="{{ url('/admin/ekitaldiak/'.$e['id'].'/editatu') }}" class="btn btn-zuria">Editatu</a>
                    <button type="button" class="btn btn-ezabatu"
                            data-bs-toggle="modal" data-bs-target="#ezabatuModala"
                            data-id="{{ $e['id'] }}" data-izena="{{ $e['izenburua'] }}">Ezabatu</button>
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
                        <td>{{ $e['data'] }} {{ $e['ordua'] }}</td>
                        <td class="fw-bold">{{ $e['izenburua'] }}</td>
                        <td>{{ $e['kategoria'] }}</td>
                        <td>{{ $e['aretoa'] }}</td>
                        <td>{{ $prezioa($e['prezioa']) }}</td>
                        <td>{{ $e['salduta'] }}/{{ $e['edukiera'] }}</td>
                        <td>
                            <div class="d-flex flex-wrap justify-content-end gap-2">
                                <a href="{{ url('/admin/ekitaldiak/'.$e['id']) }}" class="btn btn-zuria">Ikusi</a>
                                <a href="{{ url('/admin/ekitaldiak/'.$e['id'].'/editatu') }}" class="btn btn-zuria">Editatu</a>
                                <button type="button" class="btn btn-ezabatu"
                                        data-bs-toggle="modal" data-bs-target="#ezabatuModala"
                                        data-id="{{ $e['id'] }}" data-izena="{{ $e['izenburua'] }}">Ezabatu</button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div id="hutsik" class="hutsik p-4 text-center d-none">Oraindik ez dago ekitaldirik.</div>

</div>

{{-- Ezabatzeko berrespen-leihoa (erabiltzaileen kudeaketaren estilo bera). Prototipoa: errenkada pantailatik kentzen du soilik. --}}
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
                <button type="button" id="ezabatuBerretsi" class="btn btn-gorria" data-bs-dismiss="modal">Bai, ezabatu</button>
            </div>
        </div>
    </div>
</div>

<script>
    let ezabatzekoId = null;

    document.getElementById('ezabatuModala').addEventListener('show.bs.modal', function (gertaera) {
        const botoia = gertaera.relatedTarget;
        ezabatzekoId = botoia.dataset.id;
        document.getElementById('ezabatuIzena').textContent = botoia.dataset.izena;
    });

    document.getElementById('ezabatuBerretsi').addEventListener('click', function () {
        document.querySelectorAll('[data-ekitaldia="' + ezabatzekoId + '"]').forEach(function (elementua) {
            elementua.remove();
        });
        if (!document.querySelector('[data-ekitaldia]')) {
            document.getElementById('hutsik').classList.remove('d-none');
            document.querySelector('.taula')?.classList.add('d-none');
        }
    });
</script>
@endsection
