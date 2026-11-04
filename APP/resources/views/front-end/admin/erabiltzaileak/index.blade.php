@extends('front-end.layout')
@section('content')
    <h2>Erabiltzaileak</h2>
    <p><a href="/admin/erabiltzaileak/create">+ Erabiltzaile berria</a></p>
    <table border="1">
        <tr>
            <th>Izena</th>
            <th>Abizena</th>
            <th>Posta</th>
            <th>Telefonoa</th>
            <th>Rola</th>
            <th></th>
        </tr>
        @foreach ($erabiltzaileak as $u)
            <tr>
                <td>{{ $u['name'] }}</td>
                <td>{{ $u['abizena'] }}</td>
                <td>{{ $u['email'] }}</td>
                <td>{{ $u['telefonoa'] }}</td>
                <td>{{ $u['rola'] }}</td>
                <td>
                    <a href="/admin/erabiltzaileak/{{ $u['id'] }}">Ikusi</a>
                    <a href="/admin/erabiltzaileak/{{ $u['id'] }}/edit">Editatu</a>
                    <form action="{{ url('/admin/erabiltzaileak/' . $u->id) }} " method="POST">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Ezabatu?')">Ezabatu</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection