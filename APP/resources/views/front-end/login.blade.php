@extends('front-end.layout')
@section('content')
{{-- Saioa hasi (89-1259-zeregina---saioa-hasi-eta-erregistratu adarretik) --}}
<div class="px-3">
    <div class="saioa-card">
        <h1>Saioa hasi</h1>

        @if ($errors->any())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label small fw-semibold">Posta elektronikoa</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label small fw-semibold">Pasahitza</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-danger w-100">Sartu</button>
        </form>

        <p class="mt-4 mb-0 d-none d-sm-block">Ez duzu konturik? <a href="{{ url('/erregistratu') }}">Erregistratu</a></p>
        <a href="{{ url('/erregistratu') }}" class="btn btn-outline-secondary w-100 d-sm-none saioa-btn-bigarren">Kontu berria sortu</a>
    </div>
</div>
@endsection
