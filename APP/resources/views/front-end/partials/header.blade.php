{{--
    Header eta nabigazioa.
    Menua rolaren arabera aldatzen da:
      - Bisitaria (saioa hasi gabe): Ekitaldiak, Erregistratu, Saioa hasi
      - Erabiltzaile arrunta: Ekitaldiak, Nire sarrerak, izena + Saioa itxi
      - Administratzailea: arruntarenak + Ekitaldien kudeaketa, Kategoriak, Erabiltzaileak
    Mugikorrean menua botoi baten atzean ezkutatzen da (Bootstrap navbar).
--}}
@php
    $erabiltzailea = auth()->user();
    $adminDa = $erabiltzailea && $erabiltzailea->rola === 'admin';
@endphp

<header class="goiburu-nagusia sticky-top">
    <nav class="navbar navbar-expand-lg navbar-dark py-2" aria-label="Nabigazio nagusia">
      <div class="container">

        {{-- Logoa: hasierara eramaten du --}}
        <a class="navbar-brand d-flex align-items-center gap-2 text-white" href="{{ url('/') }}">
            <img src="{{ asset('img/logo.png') }}" alt="" width="47" height="40">
            <span class="d-flex flex-column">
                <span class="marka">Bergarako Antzokia</span>
                <span class="azpititulua text-uppercase">Ekitaldiak eta sarrerak</span>
            </span>
        </a>

        {{-- Mugikorreko botoia (☰) --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menua"
                aria-controls="menua" aria-expanded="false" aria-label="Menua ireki">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menua">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-1 mt-3 mt-lg-0">

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Ekitaldiak</a>
                </li>

                @auth
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('sarrerak*') ? 'active' : '' }}" href="{{ url('/sarrerak') }}">Nire sarrerak</a>
                    </li>
                @endauth

                @if ($adminDa)
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/ekitaldiak*') ? 'active' : '' }}" href="{{ url('/admin/ekitaldiak') }}">Ekitaldien kudeaketa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/kategoriak*') ? 'active' : '' }}" href="{{ url('/admin/kategoriak') }}">Kategoriak</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/erabiltzaileak*') ? 'active' : '' }}" href="{{ url('/admin/erabiltzaileak') }}">Erabiltzaileak</a>
                    </li>
                @endif

                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/erregistratu') }}">Erregistratu</a>
                    </li>
                    <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
                        <a class="btn btn-gorria w-100" href="{{ url('/saioa-hasi') }}">Saioa hasi</a>
                    </li>
                @endguest

                @auth
                    <li class="nav-item erabiltzailea d-flex align-items-center justify-content-between gap-3 ms-lg-2 ps-lg-3 pt-3 pt-lg-0 mt-2 mt-lg-0">
                        <span class="d-flex flex-column lh-sm text-white">
                            <strong>{{ $erabiltzailea->name }}</strong>
                            <small>{{ $adminDa ? 'Administratzailea' : 'Erabiltzaile arrunta' }}</small>
                        </span>
                        <form method="POST" action="{{ route('logout') }}" class="m-0">
                            @csrf
                            <button type="submit" class="btn btn-outline-light btn-sm">Saioa itxi</button>
                        </form>
                    </li>
                @endauth

            </ul>
        </div>
      </div>
    </nav>
</header>
