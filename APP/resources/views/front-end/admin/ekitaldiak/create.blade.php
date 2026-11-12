@extends('front-end.layout')
@section('content')
<p><a href="/admin/ekitaldiak">&larr; Ekitaldiak</a></p>
<h2>Ekitaldi berria / editatu</h2>
<form action="/admin/ekitaldiak" method="get">
    <p><label>Izenburua<br><input required></label></p>
    <p><label>Kategoria<br><select><option>Musika</option><option>Antzerkia</option><option>Bertsolaritza</option><option>Dantza</option><option>Haurrak</option><option>Zinema</option></select></label></p>
    <p><label>Data<br><input type="date" required></label></p>
    <p><label>Ordua<br><input type="time" value="20:00"></label></p>
    <p><label>Aretoa<br><select><option>Areto nagusia</option><option>Areto txikia</option></select></label></p>
    <p><label>Prezioa (€)<br><input type="number" min="0" step="0.5" value="10"></label></p>
    <p><label>Edukiera<br><input type="number" min="1" value="300"></label></p>
    <p><label>Deskribapena<br><textarea rows="4" cols="50"></textarea></label></p>
    <p><label>Irudia<br><input type="file" accept="image/*"></label></p>
    <button>Gorde</button> <a href="/admin/ekitaldiak">Utzi</a>
</form>
@endsection
