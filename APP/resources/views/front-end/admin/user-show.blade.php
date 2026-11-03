@extends('front-end.layout')
@section('content')
<p><a href="/admin/erabiltzaileak">&larr; Erabiltzaileak</a></p>
<h2>Ane Etxeberria</h2>
<ul>
    <li>Posta: ane@adibidea.eus</li>
    <li>Rola: Erabiltzaile arrunta</li>
    <li>Noiztik: 2026-09-12</li>
    <li>Sarrerak: 2 | Gastatuta: 28 €</li>
</ul>
<p><a href="/admin/erabiltzaileak/1/editatu">Editatu</a></p>
<h3>Sarrerak</h3>
<table border="1">
    <tr><th>Ekitaldia</th><th>Noiz</th><th>Kopurua</th><th>Guztira</th><th>Kodea</th></tr>
    <tr><td>Antzerkia: Etxeko giltzak</td><td>Urriak 31 · 20:00</td><td>2</td><td>28 €</td><td>BA-02-K7Q4M</td></tr>
</table>
@endsection
