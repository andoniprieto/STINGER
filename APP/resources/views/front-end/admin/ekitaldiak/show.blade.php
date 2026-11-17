@extends('front-end.layout')
@section('content')
@php
    // Prototipoa: adibide-datu finkoak
    $adibideak = require resource_path('views/front-end/admin/ekitaldiak/partials/adibideak.php');
    $e = $adibideak[(int) ($id ?? 0)] ?? reset($adibideak);
    $libre = $e['edukiera'] - $e['salduta'];
    $prezioa = fn ($balioa) => number_format((float) $balioa, 2, ',', '.') . ' €';
@endphp
<div class="container orria py-5" style="max-width: 900px;">

    <p class="mb-3"><a href="{{ url('/admin/ekitaldiak') }}" class="itzuli">&larr; Ekitaldien zerrenda</a></p>

    <div class="txartela p-4 d-flex flex-wrap align-items-start gap-4 mb-3">
        <div class="flex-grow-1 d-flex flex-column gap-1">
            <div class="goiburua gorria text-uppercase">{{ $e['kategoria'] }}</div>
            <h1 class="mb-0">{{ $e['izenburua'] }}</h1>
            <span class="text-secondary fs-5">{{ $e['data'] }} · {{ $e['ordua'] }} · {{ $e['aretoa'] }}</span>
            <p class="mb-0 mt-2">{{ $e['deskribapena'] }}</p>
        </div>
        <a href="{{ url('/admin/ekitaldiak/'.$e['id'].'/edit') }}" class="btn btn-zuria botoi-nagusia">Editatu</a>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-6 col-md-3">
            <div class="txartela p-3 h-100">
                <div class="datua-izena">Prezioa</div>
                <div class="datua-balioa">{{ $prezioa($e['prezioa']) }}</div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="txartela p-3 h-100">
                <div class="datua-izena">Salduta</div>
                <div class="datua-balioa">{{ $e['salduta'] }}/{{ $e['edukiera'] }}</div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="txartela p-3 h-100">
                <div class="datua-izena">Leku libreak</div>
                <div class="datua-balioa">{{ $libre > 0 ? $libre : 'Agortuta' }}</div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="txartela p-3 h-100">
                <div class="datua-izena">Diru-sarrerak</div>
                <div class="datua-balioa">{{ $prezioa($e['salduta'] * $e['prezioa']) }}</div>
            </div>
        </div>
    </div>

</div>
@endsection
