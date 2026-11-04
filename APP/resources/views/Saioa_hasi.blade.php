<!DOCTYPE html>
<html lang="eu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Saioa hasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@800&family=Source+Sans+3:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/saioa.css') }}" rel="stylesheet">
</head>
<body>

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

        <p class="mt-4 mb-0 d-none d-sm-block">Ez duzu konturik? <a href="{{ route('register') }}">Erregistratu</a></p>
        <a href="{{ route('register') }}" class="btn btn-outline-secondary w-100 d-sm-none saioa-btn-bigarren">Kontu berria sortu</a>
    </div>
</div>

</body>
</html>
