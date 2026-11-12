@extends('front-end.layout')
@section('content')
<h2>Kontua sortu</h2>
<form action="/" method="get">
    <p><label>Izena<br><input required></label></p>
    <p><label>Posta elektronikoa<br><input type="email" required></label></p>
    <p><label>Pasahitza (gutxienez 4 karaktere)<br><input type="password" minlength="4" required></label></p>
    <button>Erregistratu</button>
</form>
<p>Kontua baduzu? <a href="/saioa-hasi">Hasi saioa</a></p>
@endsection
