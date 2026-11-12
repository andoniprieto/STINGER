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
            <th>Kopurua</th>
            <th>Prezioa</th>
            <th>Kodigoa</th>
        </tr>
        @foreach ($sarrerak as $s)
            <tr>
                <td>{{ $s->ekitaldia->izenburua}}</td>
                <td>{{ $s->ekitaldia->data->format('Y-m-d') }} · {{$s->ekitaldia->ordua->format('H:i')}}</td>
                <td>{{ $s->kopurua}}</td>
                <td>{{ $s->prezio_totala}} €</td>
                <td>{{ $s->kodigoa}}</td>
            </tr>
        @endforeach
    </table>
@endsection