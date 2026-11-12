{{--
    Oina:
      - Ordenagailua/tableta (>= 768px): informazio-oina (marka, telefonoa, posta).
      - Mugikorra (< 768px): beheko nabigazio-barra finkoa (Prototipoa_Mugikorra).
--}}
<footer class="oina d-none d-md-block">
    <div class="container py-4 d-flex flex-wrap justify-content-center align-items-center gap-2 gap-sm-3 text-center">
        <span class="marka text-white">Bergarako Antzokia</span>
        <span aria-hidden="true">•</span>
        <span>[Telefonoa]</span>
        <span aria-hidden="true">•</span>
        <span>[posta@antzokia.eus]</span>
    </div>
</footer>

@php
    $oinErabiltzailea = auth()->user();
    $oinAdminDa = $oinErabiltzailea && $oinErabiltzailea->rola === \App\Enums\Rola::Admin;

    // Zein atal dagoen aktibo (prototipoaren "section" logika bera)
    $atala = match (true) {
        request()->is('admin*') => 'kudeaketa',
        request()->is('sarrerak*', 'erosita') => 'sarrerak',
        request()->is('profila', 'saioa-hasi', 'erregistratu') => 'profila',
        default => 'ekitaldiak',
    };

    $fitxak = [
        ['id' => 'ekitaldiak', 'izena' => 'Ekitaldiak', 'url' => url('/'),
         'ikonoa' => '<rect x="3" y="5" width="18" height="16" rx="2"></rect><path d="M3 10h18"></path><path d="M8 3v4"></path><path d="M16 3v4"></path>'],
        ['id' => 'sarrerak', 'izena' => 'Sarrerak', 'url' => url('/sarrerak'),
         'ikonoa' => '<path d="M3 8a2 2 0 0 0 2-2h14a2 2 0 0 0 2 2v2a2 2 0 0 0 0 4v2a2 2 0 0 0-2 2H5a2 2 0 0 0-2-2v-2a2 2 0 0 0 0-4z"></path><path d="M14 6v12"></path>'],
    ];
    if ($oinAdminDa) {
        $fitxak[] = ['id' => 'kudeaketa', 'izena' => 'Kudeaketa', 'url' => url('/admin/ekitaldiak'),
         'ikonoa' => '<path d="M4 21v-7"></path><path d="M4 10V3"></path><path d="M12 21v-9"></path><path d="M12 8V3"></path><path d="M20 21v-5"></path><path d="M20 12V3"></path><path d="M1 14h6"></path><path d="M9 8h6"></path><path d="M17 16h6"></path>'];
    }
    $fitxak[] = ['id' => 'profila', 'izena' => $oinErabiltzailea ? 'Profila' : 'Kontua', 'url' => url('/profila'),
         'ikonoa' => '<circle cx="12" cy="8" r="4"></circle><path d="M4 21c0-4 4-6 8-6s8 2 8 6"></path>'];
@endphp

<nav class="mugikor-nabigazioa d-md-none" aria-label="Nabigazio nagusia (mugikorra)">
    @foreach ($fitxak as $fitxa)
        @php $aktiboa = $atala === $fitxa['id']; @endphp
        <a href="{{ $fitxa['url'] }}" class="mugikor-fitxa {{ $aktiboa ? 'aktiboa' : '' }}" @if ($aktiboa) aria-current="page" @endif>
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">{!! $fitxa['ikonoa'] !!}</svg>
            <span>{{ $fitxa['izena'] }}</span>
        </a>
    @endforeach
</nav>
