@extends('front-end.layout')
@section('content')
<div class="container orria py-4" style="max-width: 560px;">

    <p><a href="{{ route('front-end.admin.kategoriak.index') }}">&larr; Kategoriak</a></p>

    <div class="txartela p-4">
        <h1 class="h3 mb-4">Kategoria berria</h1>

        <form action="{{ route('front-end.admin.kategoriak.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="izena" class="form-label small fw-semibold">Izena</label>
                <input type="text" id="izena" name="izena" maxlength="50" required
                       class="form-control @error('izena') is-invalid @enderror" value="{{ old('izena') }}">
                @error('izena')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-gorria">Gorde</button>
            <a href="{{ route('front-end.admin.kategoriak.index') }}" class="btn btn-zuria">Utzi</a>
        </form>
    </div>

</div>
@endsection
