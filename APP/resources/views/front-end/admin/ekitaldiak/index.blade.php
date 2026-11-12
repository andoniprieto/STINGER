@extends('front-end.layout')
@section('content')
@php
$events = [
    ['id' => 1, 'title' => 'Bertso saioa: udazkeneko jaialdia', 'category' => 'Bertsolaritza', 'date' => '2026/10/24', 'time' => '19:00', 'hall' => 'Areto nagusia', 'price' => 10, 'capacity' => 300, 'sold' => 212, 'status' => '88 leku libre'],
    ['id' => 2, 'title' => 'Antzerkia: Etxeko giltzak', 'category' => 'Antzerkia', 'date' => '2026/10/31', 'time' => '20:00', 'hall' => 'Areto nagusia', 'price' => 14, 'capacity' => 300, 'sold' => 96, 'status' => '204 leku libre'],
    ['id' => 3, 'title' => 'Jazz gaua: hirukote akustikoa', 'category' => 'Musika', 'date' => '2026/11/07', 'time' => '21:00', 'hall' => 'Areto txikia', 'price' => 12, 'capacity' => 120, 'sold' => 104, 'status' => 'Azken sarrerak'],
    ['id' => 4, 'title' => 'Haurrentzako antzerkia: Ilargiaren bidaia', 'category' => 'Haurrak', 'date' => '2026/11/15', 'time' => '17:00', 'hall' => 'Areto nagusia', 'price' => 6, 'capacity' => 300, 'sold' => 140, 'status' => '160 leku libre'],
    ['id' => 5, 'title' => 'Dantza garaikidea: Arnasa', 'category' => 'Dantza', 'date' => '2026/11/21', 'time' => '20:00', 'hall' => 'Areto nagusia', 'price' => 15, 'capacity' => 300, 'sold' => 58, 'status' => '242 leku libre'],
    ['id' => 6, 'title' => 'Zinema forum: euskal film laburrak', 'category' => 'Zinema', 'date' => '2026/11/28', 'time' => '19:30', 'hall' => 'Areto txikia', 'price' => 5, 'capacity' => 120, 'sold' => 120, 'status' => 'Agortuta'],
];
@endphp
<h2>Ekitaldiak kudeatu</h2>
<p>Ekitaldiak: 6 | Saldutako sarrerak: 730 | Diru-sarrerak: 8.296 €</p>
<p><a href="/admin/ekitaldiak/sortu">+ Ekitaldi berria</a></p>
<table border="1">
    <tr><th>Data</th><th>Izenburua</th><th>Kategoria</th><th>Aretoa</th><th>Prezioa</th><th>Salduta</th><th></th></tr>
@foreach ($events as $e)
    <tr>
        <td>{{ $e['date'] }} {{ $e['time'] }}</td>
        <td>{{ $e['title'] }}</td>
        <td>{{ $e['category'] }}</td>
        <td>{{ $e['hall'] }}</td>
        <td>{{ $e['price'] }} €</td>
        <td>{{ $e['sold'] }}/{{ $e['capacity'] }}</td>
        <td>
            <a href="/ekitaldiak/{{ $e['id'] }}">Ikusi</a>
            <a href="/admin/ekitaldiak/{{ $e['id'] }}/editatu">Editatu</a>
            <button onclick="return confirm('Ezabatu?')">Ezabatu</button>
        </td>
    </tr>
@endforeach
</table>
@endsection
