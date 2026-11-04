@extends('front-end.layout')
@section('content')
<p><a href="/admin/erabiltzaileak">&larr; Erabiltzaileak</a></p>
<h2>Erabiltzaile berria / editatu</h2>
<form action="/admin/erabiltzaileak" method="get">
    <p><label>Izena<br><input required></label></p>
    <p><label>Posta elektronikoa<br><input type="email" required></label></p>
    <p><label>Pasahitza (editatzean hutsik utzi ez aldatzeko)<br><input type="password" minlength="4"></label></p>
    <p><label>Rola<br><select><option value="arrunta">Arrunta</option><option value="admin">Administratzailea</option></select></label></p>
    <button>Gorde</button> <a href="/admin/erabiltzaileak">Utzi</a>
</form>
@endsection
