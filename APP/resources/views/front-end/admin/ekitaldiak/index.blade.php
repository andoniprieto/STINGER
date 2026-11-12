@extends('front-end.layout')
@section('content')
    @php
        $ekitaldiKopurua = $ekitaldiak->count();
        $sarreraKopurua = $sarrerak->sum('kopurua');
        $gastatutakoa = $sarrerak->sum('prezio_totala');
    @endphp
    <h2>Ekitaldiak kudeatu</h2>
    <p>Ekitaldiak: {{ $ekitaldiKopurua }} | Saldutako sarrerak: {{ $sarreraKopurua }} | Diru-sarrerak: {{ $gastatutakoa }} €
    </p>
    <p><a href="/admin/ekitaldiak/create">+ Ekitaldi berria</a></p>
    <table border="1">
        <tr>
            <th>Data</th>
            <th>Izenburua</th>
            <th>Deskribapena</th>
            <th>Kategoria</th>
            <th>Prezioa</th>
            <th>
            <th></th>
        </tr>
        @foreach ($ekitaldiak as $e)
            <tr>
                <td>{{ $e->data->format('Y-m-d') }} {{ $e->ordua->format('H:i') }}</td>
                <td>{{ $e['izenburua'] }}</td>
                <td>{{ $e['deskribapena'] }}</td>
                <td>{{ $e['kategoria'] }}</td>
                <td>{{ $e['prezioa'] }} €</td>
                <td>
                    <a href="/admin/ekitaldiak/{{ $e['id'] }}">Ikusi</a>
                    <a href="/admin/ekitaldiak/{{ $e['id'] }}/edit">Editatu</a>
                    <form action="/admin/ekitaldiak/{{ $e->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Ezabatu?')">Ezabatu</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection