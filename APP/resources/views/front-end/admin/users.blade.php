@extends('front-end.layout')
@section('content')
@php
$users = [
    ['id' => 1, 'name' => 'Ane Etxeberria', 'email' => 'ane@adibidea.eus', 'role' => 'Arrunta', 'since' => '2026-09-12'],
    ['id' => 2, 'name' => 'Antzokiko administrazioa', 'email' => 'admin@antzokia.eus', 'role' => 'Administratzailea', 'since' => '2026-09-01'],
    ['id' => 3, 'name' => 'Jon Agirre', 'email' => 'jon@adibidea.eus', 'role' => 'Arrunta', 'since' => '2026-09-20'],
    ['id' => 4, 'name' => 'Maite Larrañaga', 'email' => 'maite@adibidea.eus', 'role' => 'Arrunta', 'since' => '2026-09-28'],
];
@endphp
<h2>Erabiltzaileak</h2>
<p><a href="/admin/erabiltzaileak/sortu">+ Erabiltzaile berria</a></p>
<table border="1">
    <tr><th>Izena</th><th>Posta</th><th>Rola</th><th>Noiztik</th><th></th></tr>
@foreach ($users as $u)
    <tr>
        <td>{{ $u['name'] }}</td>
        <td>{{ $u['email'] }}</td>
        <td>{{ $u['role'] }}</td>
        <td>{{ $u['since'] }}</td>
        <td>
            <a href="/admin/erabiltzaileak/{{ $u['id'] }}">Ikusi</a>
            <a href="/admin/erabiltzaileak/{{ $u['id'] }}/editatu">Editatu</a>
            <button onclick="return confirm('Ezabatu?')">Ezabatu</button>
        </td>
    </tr>
@endforeach
</table>
@endsection
