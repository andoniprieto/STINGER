<!DOCTYPE html>
<html lang="eu">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bertso saioa: udazkeneko jaialdia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@800&family=Source+Sans+3:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/ekitaldiak.css') }}" rel="stylesheet">
</head>
<body>

<main class="container orria py-4">
    <a href="{{ url('/') }}" class="d-inline-flex align-items-center gap-1 gorria fw-bold text-decoration-none mb-3">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M15 18l-6-6 6-6"></path></svg>
        Ekitaldi guztiak
    </a>

    <div class="row g-4">
        <div class="col-lg-5">
            <div class="irudia position-relative d-flex flex-column align-items-center justify-content-center gap-2 fw-semibold">
                <span class="badge rounded-pill text-uppercase position-absolute top-0 start-0 m-3 px-3 py-2">Bertsolaritza</span>
                <svg width="88" height="88" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="4" width="18" height="16" rx="2"></rect><circle cx="9" cy="10" r="2"></circle><path d="M21 17l-5-5L5 20"></path></svg>
                Ekitaldiaren irudia
            </div>
        </div>

        <div class="col-lg-7 d-flex flex-column gap-3">
            <h1 class="display-5 mb-0">Bertso saioa: udazkeneko jaialdia</h1>
            <p class="fs-5 text-secondary mb-0">Bertsolari gazte eta beteranoak oholtza berean, gai-jartzailearen erronkei bat-batean erantzuten. Arratsalde bat hitzaren eta doinuaren inguruan.</p>

            <dl class="txartela row g-3 p-3 m-0">
                <div class="col-6"><dt class="etiketa">Data</dt><dd class="fw-bold mb-0">Urriak 24, larunbata</dd></div>
                <div class="col-6"><dt class="etiketa">Ordua</dt><dd class="fw-bold mb-0">19:00</dd></div>
                <div class="col-6"><dt class="etiketa">Aretoa</dt><dd class="fw-bold mb-0">Areto nagusia</dd></div>
                <div class="col-6"><dt class="etiketa">Prezioa</dt><dd class="fw-bold mb-0">10 €</dd></div>
            </dl>

            <div>
                <div class="d-flex justify-content-between text-secondary mb-2"><span>Salmenta</span><span class="fw-bold">212 / 300</span></div>
                <div class="progress barra rounded-pill mb-2"><div class="progress-bar" style="width: 71%"></div></div>
                <span class="badge rounded-pill libre">88 leku libre</span>
            </div>

            <div class="abisua d-flex flex-wrap align-items-center gap-3 p-3">
                <span class="flex-grow-1 fw-semibold">Sarrerak erosteko saioa hasi behar duzu.</span>
                <a href="{{ route('login') }}" class="btn btn-gorria">Saioa hasi eta erosi</a>
            </div>
        </div>
    </div>
</main>

</body>
</html>
