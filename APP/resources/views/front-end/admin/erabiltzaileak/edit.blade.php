@extends('front-end.layout')
@section('content')
    <p><a href="/admin/erabiltzaileak">&larr; Erabiltzaileak</a></p>
    <h2>Erabiltzailea editatu</h2>
    <form action="{{ url('/admin/erabiltzaileak/' . $erabiltzailea->id) }} " method="POST">
        @csrf
        @method('PUT')

        <p><label>Izena<br><input type="text" name="name" value="{{ old('name', $erabiltzailea->name) }}" required></label>
        </p>
        <p><label>Abizena<br><input type="text" name="abizena" value="{{ old('abizena', $erabiltzailea->abizena) }}" required></label></p>
        <p><label>Posta elektronikoa<br><input type="email" name="email" value="{{ old('email', $erabiltzailea->email) }}" required></label></p>
        <p><label>Telefonoa<br><input type="string" name="telefonoa" value="{{ old('telefonoa', $erabiltzailea->telefonoa) }}" required></label></p>
        <p><label>Pasahitza<br><input type="password" name="password" minlength="4"></label></p>
        <p><label>Pasahitza errepikatu<br><input type="password" name="password_confirmation" minlength="4"></label></p>
        <p><label>Rola<br>
                <select name="rola">
                    <option value="user">Arrunta</option>
                    <option value="admin">Administratzailea</option>
                </select></label></p>
        <button type="submit">Gorde</button> <a href="/admin/erabiltzaileak">Utzi</a>
    </form>
@endsection