@extends('front-end.layout')
@section('content')
    <p><a href="/admin/ekitaldiak">&larr; Ekitaldiak</a></p>
    <h2>Ekitaldi berria</h2>
    <form action="{{  url('/admin/ekitaldiak')}}" method="post">
        <p><label>Izenburua<br><input name="izenburua" required></label></p>
        <p><label>Kategoria<br><select name="kategoria">
                    <option>Musika</option>
                    <option>Antzerkia</option>
                    <option>Bertsolaritza</option>
                    <option>Dantza</option>
                    <option>Haurrak</option>
                    <option>Zinema</option>
                </select></label></p>
        <p><label>Data<br><input type="date" name="data" required></label></p>
        <p><label>Ordua<br><input type="time" name="ordua" value="20:00"></label></p>
        <p><label>Prezioa (€)<br><input type="number" name="prezioa" min="0" step="0.5" value="10"></label></p>
        <p><label>Deskribapena<br><textarea name="deskribapena" rows="4" cols="50"></textarea></label></p>
        <p><label>Irudia<br><input type="file" accept="image/*"></label></p>
        <button>Gorde</button> <a href="/admin/ekitaldiak">Utzi</a>
    </form>
@endsection