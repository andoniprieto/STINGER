@extends('front-end.layout')
@section('content')
<h2>Saioa hasi</h2>
<form action="/" method="get">
    <p><label>Posta elektronikoa<br><input type="email" required></label></p>
    <p><label>Pasahitza<br><input type="password" required></label></p>
    <button>Sartu</button>
</form>
<p>Konturik ez? <a href="/erregistratu">Erregistratu</a></p>
@endsection
