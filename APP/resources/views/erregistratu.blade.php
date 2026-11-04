<!DOCTYPE html>
<html lang="eu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kontua sortu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@800&family=Source+Sans+3:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/saioa.css') }}" rel="stylesheet">
</head>
<body>

<div class="px-3">
    <div class="saioa-card">
        <h1>Kontua sortu</h1>
        <p class="saioa-intro">Kontu batekin sarrerak erosi eta zure erosketak ikusi ahal izango dituzu.</p>

        @if ($errors->any())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label small fw-semibold">Izen-abizenak</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label small fw-semibold">Posta elektronikoa</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label small fw-semibold">Pasahitza (gutxienez 4 karaktere)</label>
                <input type="password" id="password" name="password" class="form-control" minlength="4" required>
            </div>

            <button type="submit" class="btn btn-danger w-100">Erregistratu</button>
        </form>

        <p class="mt-4 mb-0 d-none d-sm-block">Baduzu konturik? <a href="{{ route('login') }}">Saioa hasi</a></p>
        <a href="{{ route('login') }}" class="btn btn-outline-secondary w-100 d-sm-none saioa-btn-bigarren">Baduzu konturik? Sartu</a>
    </div>
</div>

</body>
</html>
