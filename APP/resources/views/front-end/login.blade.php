@extends('front-end.layout')

@push('estiloak')
    <link href="{{ asset('css/saioa.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="px-3">
    <div class="saioa-card">
        <h1>Saioa hasi</h1>

        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger" role="alert">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label small fw-semibold">Posta elektronikoa</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus autocomplete="username">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label small fw-semibold">Pasahitza</label>
                <input type="password" id="password" name="password" class="form-control" required autocomplete="current-password">
            </div>

            <div class="form-check mb-3">
                <input type="checkbox" id="remember" name="remember" class="form-check-input">
                <label for="remember" class="form-check-label">Gogoratu nazazu</label>
            </div>

            <button type="submit" class="btn btn-danger w-100">Sartu</button>
        </form>

        <p class="mt-4 mb-0 d-none d-sm-block">Ez duzu konturik? <a href="{{ url('/erregistratu') }}">Erregistratu</a></p>
        <a href="{{ url('/erregistratu') }}" class="btn btn-outline-secondary w-100 d-sm-none saioa-btn-bigarren">Kontu berria sortu</a>
    </div>
</div>
@endsection
