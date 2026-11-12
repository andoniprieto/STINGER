@php
    $ekitaldiak = [
        ['izena' => 'Bertso saioa: udazkeneko jaialdia', 'aretoa' => 'Areto nagusia', 'data' => '2026/10/24 · 19:00', 'kategoria' => 'Bertsolaritza', 'kolorea' => '#9f1239', 'prezioa' => 10, 'salduta' => 212, 'edukiera' => 300],
        ['izena' => 'Antzerkia: Etxeko giltzak', 'aretoa' => 'Areto nagusia', 'data' => '2026/10/31 · 20:00', 'kategoria' => 'Antzerkia', 'kolorea' => '#1e3a8a', 'prezioa' => 14, 'salduta' => 96, 'edukiera' => 300],
        ['izena' => 'Jazz gaua: hirukote akustikoa', 'aretoa' => 'Areto txikia', 'data' => '2026/11/07 · 21:00', 'kategoria' => 'Musika', 'kolorea' => '#9a3412', 'prezioa' => 12, 'salduta' => 104, 'edukiera' => 120],
        ['izena' => 'Haurrentzako antzerkia: Ilargiaren bidaia', 'aretoa' => 'Areto nagusia', 'data' => '2026/11/15 · 17:00', 'kategoria' => 'Haurrak', 'kolorea' => '#166534', 'prezioa' => 6, 'salduta' => 140, 'edukiera' => 300],
        ['izena' => 'Dantza garaikidea: Arnasa', 'aretoa' => 'Areto nagusia', 'data' => '2026/11/21 · 20:00', 'kategoria' => 'Dantza', 'kolorea' => '#6b21a8', 'prezioa' => 15, 'salduta' => 58, 'edukiera' => 300],
        ['izena' => 'Zinema forum: euskal film laburrak', 'aretoa' => 'Areto txikia', 'data' => '2026/11/28 · 19:30', 'kategoria' => 'Zinema', 'kolorea' => '#334155', 'prezioa' => 5, 'salduta' => 120, 'edukiera' => 120],
    ];
@endphp
<!DOCTYPE html>
<html lang="eu">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ekitaldien kudeaketa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@800&family=Source+Sans+3:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/ekitaldiak.css') }}" rel="stylesheet">
</head>
<body>

<main class="container orria py-4 d-flex flex-column">
    <div class="row g-2 mb-3 d-md-none order-0">
        <div class="col-6"><a href="#" class="btn fitxa aktiboa w-100">Ekitaldiak</a></div>
        <div class="col-6"><a href="#" class="btn fitxa w-100">Erabiltzaileak</a></div>
    </div>

    <div class="d-flex flex-wrap justify-content-between align-items-start gap-3 mb-3 mb-md-4 order-2 order-md-1">
        <div class="d-none d-md-block">
            <div class="goiburua gorria text-uppercase">Administrazioa</div>
            <h1 class="mb-0">Ekitaldien kudeaketa</h1>
        </div>
        <a href="#" class="btn btn-gorria btn-berria d-inline-flex align-items-center justify-content-center gap-2">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" aria-hidden="true"><path d="M12 5v14M5 12h14"></path></svg>
            Ekitaldi berria
        </a>
    </div>

    <div class="row g-2 g-md-3 mb-3 mb-md-4 order-1 order-md-2">
        <div class="col-4"><div class="txartela estatistika p-3"><div class="small fw-semibold text-secondary">Ekitaldiak</div><div class="zenbakia">6</div></div></div>
        <div class="col-4"><div class="txartela estatistika p-3"><div class="small fw-semibold text-secondary"><span class="d-none d-md-inline">Saldutako sarrerak</span><span class="d-md-none">Salduta</span></div><div class="zenbakia">730</div></div></div>
        <div class="col-4"><div class="txartela estatistika p-3"><div class="small fw-semibold text-secondary">Diru-sarrerak</div><div class="zenbakia">7022 €</div></div></div>
    </div>

    <div class="txartela taula table-responsive d-none d-md-block order-3">
        <table class="table align-middle mb-0">
            <thead>
                <tr><th>Ekitaldia</th><th>Data</th><th>Kategoria</th><th></th></tr>
            </thead>
            <tbody>
            @foreach ($ekitaldiak as $e)
                <tr>
                    <td><div class="fw-bold">{{ $e['izena'] }}</div><small>{{ $e['aretoa'] }}</small></td>
                    <td class="text-nowrap">{{ $e['data'] }}</td>
                    <td class="text-nowrap"><span class="puntua" style="background: {{ $e['kolorea'] }}"></span>{{ $e['kategoria'] }}</td>
                    <td class="text-end text-nowrap">
                        <a href="{{ route('ekitaldia') }}" class="btn btn-zuria">Ikusi</a>
                        <a href="#" class="btn btn-zuria">Editatu</a>
                        <button type="button" class="btn btn-ezabatu">Ezabatu</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-md-none d-flex flex-column gap-3 order-3">
    @foreach ($ekitaldiak as $e)
        <div class="txartela ekitaldi-txartela p-3">
            <div class="d-flex align-items-baseline mb-3">
                <span class="puntua flex-shrink-0" style="background: {{ $e['kolorea'] }}"></span>
                <div>
                    <div class="fw-bold">{{ $e['izena'] }}</div>
                    <small class="d-block">{{ substr($e['data'], 8, 2) }}/{{ substr($e['data'], 5, 2) }} · {{ substr($e['data'], -5) }} · {{ $e['prezioa'] }} €</small>
                    <small class="d-block">{{ $e['salduta'] }} / {{ $e['edukiera'] }} salduta</small>
                </div>
            </div>
            <div class="row g-2">
                <div class="col-4"><a href="{{ route('ekitaldia') }}" class="btn btn-zuria w-100">Ikusi</a></div>
                <div class="col-4"><a href="#" class="btn btn-zuria w-100">Editatu</a></div>
                <div class="col-4"><button type="button" class="btn btn-ezabatu w-100">Ezabatu</button></div>
            </div>
        </div>
    @endforeach
    </div>
</main>

</body>
</html>
