@extends('front-end.layout')
@section('content')
<p><a href="/ekitaldiak/1">&larr; Itzuli ekitaldira</a></p>
<h2>Sarrerak erosi</h2>
<p><b>Bertso saioa: udazkeneko jaialdia</b> — Urriak 24, 19:00, Areto nagusia</p>
<form action="/erosita" method="get">
    <p><label>Kopurua (gehienez 8)<br><input type="number" min="1" max="8" value="1" required></label> × 10 €</p>
    <h3>Ordainketa</h3>
    <p><label>Titularra<br><input required></label></p>
    <p><label>Txartel zenbakia<br><input inputmode="numeric" required></label></p>
    <p><label>Iraungitzea (HH/UU)<br><input placeholder="HH/UU" pattern="\d{2}/\d{2}" required></label></p>
    <p><label>CVV<br><input pattern="\d{3,4}" required></label></p>
    <button>Ordaindu</button>
</form>
@endsection
