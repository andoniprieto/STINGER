{{--
    Header eta nabigazioa.
    Menua rolaren arabera aldatzen da:
      - Bisitaria (saioa hasi gabe): Ekitaldiak, Erregistratu, Saioa hasi
      - Erabiltzaile arrunta: Ekitaldiak, Nire sarrerak, izena + Saioa itxi
      - Administratzailea: arruntarenak + Ekitaldien kudeaketa, Erabiltzaileak
    Tableta eta ordenagailua (>= 768px): menu osoa.
    Mugikorra (< 768px): goiko menurik ez; beheko barra erabiltzen da (partials/footer)
    eta, saioa hasita, inizialen botoiak profilera eramaten du (Prototipoa_Mugikorra).
--}}
@php
    $erabiltzailea = auth()->user();
    $adminDa = $erabiltzailea && $erabiltzailea->rola === \App\Enums\Rola::Admin;
@endphp

<header class="goiburu-nagusia sticky-top">
    <nav class="navbar navbar-expand-md navbar-dark py-2" aria-label="Nabigazio nagusia">
      <div class="container">

        {{-- Logoa: hasierara eramaten du --}}
        <a class="navbar-brand d-flex align-items-center gap-2 text-white" href="{{ url('/') }}">
            <img src="{{ asset('img/logo.png') }}" alt="" width="47" height="40">
            <span class="d-flex flex-column">
                <span class="marka">Bergarako Antzokia</span>
                <span class="azpititulua text-uppercase">Ekitaldiak eta sarrerak</span>
            </span>
        </a>

        {{-- Mugikorra: inizialak profilera (prototipoa) --}}
        @auth
            <a href="{{ url('/profila') }}" class="goiburu-inizialak d-md-none" aria-label="Nire profila">
                {{ mb_strtoupper(mb_substr($erabiltzailea->name, 0, 1) . mb_substr($erabiltzailea->abizena ?? '', 0, 1)) }}
            </a>
        @endauth


        <div class="collapse navbar-collapse" id="menua">{{-- mugikorrean ezkutatuta (stinger.css) --}}
            <ul class="navbar-nav ms-auto align-items-md-center gap-1 mt-3 mt-md-0">

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
                        <a class="nav-link {{ request()->is('admin/erabiltzaileak*') ? 'active' : '' }}" href="{{ url('/admin/erabiltzaileak') }}">Erabiltzaileak</a>
                    </li>
                @endif

                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/erregistratu') }}">Erregistratu</a>
                    </li>
                    <li class="nav-item ms-md-2 mt-2 mt-md-0">
                        <a class="btn btn-gorria w-100" href="{{ url('/saioa-hasi') }}">Saioa hasi</a>
                    </li>
                @endguest

                @auth
                    <li class="nav-item erabiltzailea d-flex align-items-center justify-content-between gap-3 ms-md-2 ps-md-3 pt-3 pt-md-0 mt-2 mt-md-0">
                        {{-- Tableta (768-1199px): tokia aurrezteko, inizialak bakarrik (profilean dago Saioa itxi) --}}
                        <a href="{{ url('/profila') }}" class="goiburu-inizialak d-none d-md-flex d-xl-none" aria-label="Nire profila" title="{{ $erabiltzailea->name }}">
                            {{ mb_strtoupper(mb_substr($erabiltzailea->name, 0, 1) . mb_substr($erabiltzailea->abizena ?? '', 0, 1)) }}
                        </a>
                        <span class="d-flex d-md-none d-xl-flex flex-column lh-sm text-white">
                            <strong>{{ $erabiltzailea->name }}</strong>
                            <small>{{ $adminDa ? 'Administratzailea' : 'Erabiltzaile arrunta' }}</small>
                        </span>
                        <form method="POST" action="{{ route('logout') }}" class="m-0 d-md-none d-xl-block">
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
