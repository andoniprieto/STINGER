@extends('front-end.layout')
@section('content')
@php $erabiltzailea = auth()->user(); @endphp
<div class="container orria py-4" style="max-width: 560px;">

    @auth
        @php
            $inizialak = mb_strtoupper(mb_substr($erabiltzailea->name, 0, 1) . mb_substr($erabiltzailea->abizena ?? '', 0, 1));
        @endphp
        <div class="txartela p-4 d-flex align-items-center gap-3 mb-3">
            <span class="abatarra abatarra-txikia" aria-hidden="true">{{ $inizialak }}</span>
            <div class="d-flex flex-column min-w-0">
                <span class="fw-bold fs-5">{{ $erabiltzailea->name }} {{ $erabiltzailea->abizena }}</span>
                <span class="text-secondary text-truncate">{{ $erabiltzailea->email }}</span>
                <span class="mt-1">@include('front-end.admin.erabiltzaileak.partials.rola', ['rola' => $erabiltzailea->rola])</span>
            </div>
        </div>

        <div class="formulario-botoiak flex-column">
            <a href="{{ url('/sarrerak') }}" class="btn btn-zuria">Nire sarrerak</a>
            @if ($erabiltzailea->rola === \App\Enums\Rola::Admin)
                <a href="{{ url('/admin/ekitaldiak') }}" class="btn btn-zuria">Ekitaldien kudeaketa</a>
                <a href="{{ route('front-end.admin.erabiltzaileak.index') }}" class="btn btn-zuria">Erabiltzaileen kudeaketa</a>
            @endif
            <form method="POST" action="{{ route('logout') }}" class="m-0">
                @csrf
                <button type="submit" class="btn btn-ezabatu w-100">Saioa itxi</button>
            </form>
        </div>
    @else
        <h1 class="mb-2">Kaixo!</h1>
        <p class="text-secondary mb-4">Bisitari gisa ekitaldiak kontsulta ditzakezu. Sarrerak erosteko, hasi saioa edo sortu kontu bat.</p>
        <div class="formulario-botoiak flex-column">
            <a href="{{ route('login') }}" class="btn btn-gorria">Saioa hasi</a>
            <a href="{{ route('register') }}" class="btn btn-zuria">Kontua sortu</a>
        </div>
    @endauth

</div>
@endsection
