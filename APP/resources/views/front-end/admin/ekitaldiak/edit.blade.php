@extends('front-end.layout')
@section('content')
    <p><a href="/admin/ekitaldiak">&larr; Ekitaldiak</a></p>
    <h2>Ekitaldia editatu</h2>
    <form action="/admin/ekitaldiak/{{ $ekitaldia->id }}" method="post">
        @csrf
        @method('PUT')
        <p><label>Izenburua<br><input name="izenburua" value="{{ old('izenburua', $ekitaldia->izenburua) }}"
                    required></label></p>
        <p><label>Kategoria<br><select name="kategoria">
                    <option value="Musika" @selected(old('kategoria', $ekitaldia->kategoria) == 'Musika')>Musika</option>
                    <option value="Antzerkia" @selected(old('kategoria', $ekitaldia->kategoria) == 'Antzerkia')>Antzerkia
                    </option>
                    <option value="Bertsolaritza" @selected(old('kategoria', $ekitaldia->kategoria) == 'Bertsolaritza')>
                        Bertsolaritza</option>
                    <option value="Dantza" @selected(old('kategoria', $ekitaldia->kategoria) == 'Dantza')>Dantza</option>
                    <option value="Haurrak" @selected(old('kategoria', $ekitaldia->kategoria) == 'Haurrak')>Haurrak</option>
                    <option value="Zinema" @selected(old('kategoria', $ekitaldia->kategoria) == 'Zinema')>Zinema</option>
                </select>
            </label></p>
        <p><label>Data<br><input type="date" value="{{ old('data', $ekitaldia->data->format('Y-m-d')) }}" name="data"
                    required></label></p>
        <p><label>Ordua<br><input type="time" name="ordua"
                    value="{{ old('data', $ekitaldia->ordua->format('H:i')) }}"></label></p>
        <p><label>Prezioa (€)<br><input type="number" name="prezioa" min="0" step="0.5"
                    value="{{ old('prezioa', $ekitaldia->prezioa) }}"></label></p>
        <p><label>Deskribapena<br><textarea name="deskribapena" rows="4"
                    cols="50">{{ old('deskribapena', $ekitaldia->deskribapena) }}</textarea></label></p>
        <p><label>Irudia<br><input type="file" accept="image/*"></label></p>
        <button>Gorde</button> <a href="/admin/ekitaldiak">Utzi</a>
    </form>
@endsection