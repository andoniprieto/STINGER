@extends('front-end.layout')
@section('content')
    <p><a href="/admin/erabiltzaileak">&larr; Erabiltzaileak</a></p>
    <h2>{{ $erabiltzailea->name }}</h2>
    <h4>{{ $erabiltzailea->abizena }}</h4>
    <ul>
        <li>Posta: {{$erabiltzailea->email}}</li>
        <li>Telefonoa: {{$erabiltzailea->telefonoa}}</li>
        <li>Rola: {{$erabiltzailea->rola}}</li>
    </ul>
    <p><a href="/admin/erabiltzaileak/{{ $erabiltzailea->id }}/edit">Editatu</a></p>
    <h3>Sarrerak</h3>
    <table border="1">
        <tr>
            <th>Ekitaldia</th>
            <th>Noiz</th>
            <th>Prezioa</th>
        </tr>
        @foreach ($sarrerak as $s)
            <tr>
                <td>{{ $s->saioa->ekitaldia->izenburua}}</td>
                <td>{{ $s->saioa->data->format('Y-m-d') }} · {{$s->saioa->ordua->format('H:i')}}</td>
                <td>{{ $s->saioa->ekitaldia->prezioa}} €</td>
            </tr>
        @endforeach
    </table>
@endsection