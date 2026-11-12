{{-- Sortu eta editatu formularioek partekatzen duten zatia. $erabiltzailea null denean: sortu. --}}
@php
    $editatzen = isset($erabiltzailea);
    $niDa = $editatzen && auth()->id() === $erabiltzailea->id;
    $rolaOrain = old('rola', $editatzen ? $erabiltzailea->rola->value : \App\Enums\Rola::User->value);
@endphp

<div class="row g-3 mb-3">
    <div class="col-sm-6">
        <label for="name" class="form-label small fw-semibold">Izena</label>
        <input type="text" id="name" name="name" maxlength="255" required
               class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $erabiltzailea->name ?? '') }}">
        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-sm-6">
        <label for="abizena" class="form-label small fw-semibold">Abizena</label>
        <input type="text" id="abizena" name="abizena" maxlength="255" required
               class="form-control @error('abizena') is-invalid @enderror" value="{{ old('abizena', $erabiltzailea->abizena ?? '') }}">
        @error('abizena') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>

<div class="mb-3">
    <label for="email" class="form-label small fw-semibold">Posta elektronikoa</label>
    <input type="email" id="email" name="email" required
           class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $erabiltzailea->email ?? '') }}">
    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label for="telefonoa" class="form-label small fw-semibold">Telefonoa</label>
    <input type="tel" id="telefonoa" name="telefonoa" required minlength="9" maxlength="9" pattern="[0-9]{9}"
           class="form-control @error('telefonoa') is-invalid @enderror" value="{{ old('telefonoa', $erabiltzailea->telefonoa ?? '') }}">
    @error('telefonoa') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="row g-3 mb-3">
    <div class="col-sm-6">
        <label for="password" class="form-label small fw-semibold">
            {{ $editatzen ? 'Pasahitz berria (hutsik utzi ez aldatzeko)' : 'Pasahitza' }}
        </label>
        <input type="password" id="password" name="password" minlength="8" autocomplete="new-password" @required(! $editatzen)
               class="form-control @error('password') is-invalid @enderror">
        @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-sm-6">
        <label for="password_confirmation" class="form-label small fw-semibold">Pasahitza errepikatu</label>
        <input type="password" id="password_confirmation" name="password_confirmation" minlength="8" autocomplete="new-password" @required(! $editatzen)
               class="form-control">
    </div>
</div>

<div class="mb-4">
    <label for="rola" class="form-label small fw-semibold">Rola</label>
    <select id="rola" name="rola" class="form-select @error('rola') is-invalid @enderror" @disabled($niDa)>
        <option value="{{ \App\Enums\Rola::User->value }}" @selected($rolaOrain === \App\Enums\Rola::User->value)>Erabiltzaile arrunta</option>
        <option value="{{ \App\Enums\Rola::Admin->value }}" @selected($rolaOrain === \App\Enums\Rola::Admin->value)>Administratzailea</option>
    </select>
    @if ($niDa)
        {{-- Select desgaituak ez du baliorik bidaltzen: rola bera mantendu --}}
        <input type="hidden" name="rola" value="{{ $erabiltzailea->rola->value }}">
        <div class="form-text">Ezin duzu zure rola aldatu.</div>
    @endif
    @error('rola') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="d-flex flex-wrap gap-2">
    <button type="submit" class="btn btn-gorria">Gorde</button>
    <a href="{{ route('front-end.admin.erabiltzaileak.index') }}" class="btn btn-zuria">Utzi</a>
</div>
