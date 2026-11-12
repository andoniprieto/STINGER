@extends('front-end.layout')

@push('estiloak')
    <link href="{{ asset('css/saioa.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="px-3">
    <div class="saioa-card">
        <h1>Kontua sortu</h1>
        <p class="saioa-intro">Kontu batekin sarrerak erosi eta zure erosketak ikusi ahal izango dituzu.</p>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="row g-3 mb-3">
                <div class="col-sm-6">
                    <label for="name" class="form-label small fw-semibold">Izena</label>
                    <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required autofocus autocomplete="given-name">
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-sm-6">
                    <label for="abizena" class="form-label small fw-semibold">Abizena</label>
                    <input type="text" id="abizena" name="abizena" class="form-control @error('abizena') is-invalid @enderror" value="{{ old('abizena') }}" required autocomplete="family-name">
                    @error('abizena') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label small fw-semibold">Posta elektronikoa</label>
                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email">
                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="telefonoa" class="form-label small fw-semibold">Telefonoa</label>
                <input type="tel" id="telefonoa" name="telefonoa" class="form-control @error('telefonoa') is-invalid @enderror" value="{{ old('telefonoa') }}" required minlength="9" maxlength="9" pattern="[0-9]{9}" autocomplete="tel">
                @error('telefonoa') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label small fw-semibold">Pasahitza (gutxienez 4 karaktere)</label>
                <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" minlength="4" required autocomplete="new-password">
                @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <button type="submit" class="btn btn-danger w-100">Erregistratu</button>
        </form>

        <p class="mt-4 mb-0 d-none d-sm-block">Baduzu konturik? <a href="{{ route('login') }}">Saioa hasi</a></p>
        <a href="{{ route('login') }}" class="btn btn-outline-secondary w-100 d-sm-none saioa-btn-bigarren">Baduzu konturik? Sartu</a>
    </div>
</div>
@endsection
