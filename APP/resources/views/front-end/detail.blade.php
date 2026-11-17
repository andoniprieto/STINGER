@extends('front-end.layout')
@section('content')
    @if (request()->is('admin/*'))
        <p><a href="/admin/ekitaldiak">&larr; Ekitaldi guztiak</a></p>
    @else
        <p><a href="/">&larr; Ekitaldi guztiak</a></p>
    @endif

    <h2>{{$ekitaldia->izenburua}}</h2>
    <p>{{$ekitaldia->kategoria}}</p>
    <ul>
        <li>Data: {{$ekitaldia->data->format('Y-m-d')}}</li>
        <li>Ordua: {{ $ekitaldia->ordua->format('H:i') }}</li>
        <li>Prezioa: {{ $ekitaldia->prezioa }} €</li>
    </ul>
    <p>{{ $ekitaldia->deskribapena }}</p>
    <p><a href="/erosi">Sarrerak erosi</a></p>
    <p><small>Saioa hasi gabe: <a href="/saioa-hasi">Hasi saioa erosteko</a></small></p>
@endsection