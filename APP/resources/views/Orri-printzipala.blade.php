<!DOCTYPE html>
<html lang="eu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bergarako Antzokia - Orri Printzipala</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@700;800&family=Source+Sans+3:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Source Sans 3', sans-serif; background: #f5f5f4; color: #111827; }
        h1, h2, h3, .zenbakia { font-family: 'Archivo', sans-serif; }
        .goiburua { background: #1f2937; }
        .denboraldia { color: #fca5a5; font-size: 13px; letter-spacing: .14em; }
        .izenburua { font-size: clamp(34px, 5vw, 56px); line-height: 1.02; letter-spacing: -.02em; max-width: 780px; }
        .bilatu { max-width: 520px; }
        .kategoria { border-color: #6b7280; }
        .irudia { height: 190px; color: rgba(255, 255, 255, .55); }
        .etiketa { background: rgba(17, 24, 39, .82); letter-spacing: .1em; }
        .eguna { min-width: 44px; }
        .badge-libre { background: #dcfce7; color: #166534; }
        .badge-azken { background: #fef3c7; color: #92400e; }
        .badge-agortuta { background: #e5e7eb; color: #374151; }
    </style>
</head>

<body>

    <section class="goiburua text-white py-5">
        <div class="container py-3">
            <p class="denboraldia text-uppercase fw-bold mb-3">Denboraldia 2026–27</p>
            <h1 class="izenburua fw-bold mb-4">Bizi kultura Bergaran. Aukeratu ekitaldia eta erosi zure sarrera.</h1>

            <label class="form-label small fw-semibold">Bilatu ekitaldia</label>
            <input type="search" class="form-control form-control-lg bilatu mb-3 fs-6" placeholder="Izenburua edo aretoa…">

            <button class="btn btn-light rounded-pill fw-semibold me-1 mb-2">Denak</button>
            <button class="btn btn-outline-light kategoria rounded-pill fw-semibold me-1 mb-2">Musika</button>
            <button class="btn btn-outline-light kategoria rounded-pill fw-semibold me-1 mb-2">Antzerkia</button>
            <button class="btn btn-outline-light kategoria rounded-pill fw-semibold me-1 mb-2">Bertsolaritza</button>
            <button class="btn btn-outline-light kategoria rounded-pill fw-semibold me-1 mb-2">Dantza</button>
            <button class="btn btn-outline-light kategoria rounded-pill fw-semibold me-1 mb-2">Haurrak</button>
            <button class="btn btn-outline-light kategoria rounded-pill fw-semibold me-1 mb-2">Zinema</button>
        </div>
    </section>

    <section class="container py-4">
        <div class="d-flex justify-content-between align-items-baseline mb-3">
            <h2 class="fs-3 fw-bold m-0">Hurrengo ekitaldiak</h2>
            <span class="text-secondary">6 ekitaldi</span>
        </div>

        <div class="row g-4">

            <div class="col-sm-6 col-lg-3">
                <div class="card h-100 rounded-4 overflow-hidden">
                    <div class="irudia position-relative d-flex flex-column align-items-center justify-content-center small fw-semibold" style="background: #9f1239;">
                        <svg width="56" height="56" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="4" width="18" height="16" rx="2"></rect><circle cx="9" cy="10" r="2"></circle><path d="M21 17l-5-5L5 20"></path></svg>
                        Irudia
                        <span class="etiketa badge rounded-pill text-uppercase position-absolute top-0 start-0 m-3">Bertsolaritza</span>
                        <span class="eguna bg-white text-dark rounded-3 text-center lh-1 px-2 py-1 position-absolute top-0 end-0 m-2">
                            <span class="zenbakia d-block fs-4 fw-bold">24</span><small class="fw-bold">URR</small>
                        </span>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h3 class="fs-5 fw-bold">Bertso saioa: udazkeneko jaialdia</h3>
                        <p class="text-secondary">Urriak 24, larunbata · 19:00<br>Areto nagusia</p>
                        <div class="d-flex justify-content-between align-items-center mt-auto mb-3">
                            <span class="fs-5 fw-bold">10 €</span>
                            <span class="badge rounded-pill badge-libre">88 leku libre</span>
                        </div>
                        <button class="btn btn-outline-dark fw-semibold w-100">Xehetasunak ikusi</button>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="card h-100 rounded-4 overflow-hidden">
                    <div class="irudia position-relative d-flex flex-column align-items-center justify-content-center small fw-semibold" style="background: #1e3a8a;">
                        <svg width="56" height="56" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="4" width="18" height="16" rx="2"></rect><circle cx="9" cy="10" r="2"></circle><path d="M21 17l-5-5L5 20"></path></svg>
                        Irudia
                        <span class="etiketa badge rounded-pill text-uppercase position-absolute top-0 start-0 m-3">Antzerkia</span>
                        <span class="eguna bg-white text-dark rounded-3 text-center lh-1 px-2 py-1 position-absolute top-0 end-0 m-2">
                            <span class="zenbakia d-block fs-4 fw-bold">31</span><small class="fw-bold">URR</small>
                        </span>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h3 class="fs-5 fw-bold">Antzerkia: Etxeko giltzak</h3>
                        <p class="text-secondary">Urriak 31, larunbata · 20:00<br>Areto nagusia</p>
                        <div class="d-flex justify-content-between align-items-center mt-auto mb-3">
                            <span class="fs-5 fw-bold">14 €</span>
                            <span class="badge rounded-pill badge-libre">204 leku libre</span>
                        </div>
                        <button class="btn btn-outline-dark fw-semibold w-100">Xehetasunak ikusi</button>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="card h-100 rounded-4 overflow-hidden">
                    <div class="irudia position-relative d-flex flex-column align-items-center justify-content-center small fw-semibold" style="background: #9a3412;">
                        <svg width="56" height="56" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="4" width="18" height="16" rx="2"></rect><circle cx="9" cy="10" r="2"></circle><path d="M21 17l-5-5L5 20"></path></svg>
                        Irudia
                        <span class="etiketa badge rounded-pill text-uppercase position-absolute top-0 start-0 m-3">Musika</span>
                        <span class="eguna bg-white text-dark rounded-3 text-center lh-1 px-2 py-1 position-absolute top-0 end-0 m-2">
                            <span class="zenbakia d-block fs-4 fw-bold">7</span><small class="fw-bold">AZA</small>
                        </span>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h3 class="fs-5 fw-bold">Jazz gaua: hirukote akustikoa</h3>
                        <p class="text-secondary">Azaroak 7, larunbata · 21:00<br>Areto txikia</p>
                        <div class="d-flex justify-content-between align-items-center mt-auto mb-3">
                            <span class="fs-5 fw-bold">12 €</span>
                            <span class="badge rounded-pill badge-azken">Azken sarrerak</span>
                        </div>
                        <button class="btn btn-outline-dark fw-semibold w-100">Xehetasunak ikusi</button>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="card h-100 rounded-4 overflow-hidden">
                    <div class="irudia position-relative d-flex flex-column align-items-center justify-content-center small fw-semibold" style="background: #166534;">
                        <svg width="56" height="56" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="4" width="18" height="16" rx="2"></rect><circle cx="9" cy="10" r="2"></circle><path d="M21 17l-5-5L5 20"></path></svg>
                        Irudia
                        <span class="etiketa badge rounded-pill text-uppercase position-absolute top-0 start-0 m-3">Haurrak</span>
                        <span class="eguna bg-white text-dark rounded-3 text-center lh-1 px-2 py-1 position-absolute top-0 end-0 m-2">
                            <span class="zenbakia d-block fs-4 fw-bold">15</span><small class="fw-bold">AZA</small>
                        </span>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h3 class="fs-5 fw-bold">Haurrentzako antzerkia: Ilargiaren bidaia</h3>
                        <p class="text-secondary">Azaroak 15, igandea · 17:00<br>Areto nagusia</p>
                        <div class="d-flex justify-content-between align-items-center mt-auto mb-3">
                            <span class="fs-5 fw-bold">6 €</span>
                            <span class="badge rounded-pill badge-libre">160 leku libre</span>
                        </div>
                        <button class="btn btn-outline-dark fw-semibold w-100">Xehetasunak ikusi</button>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="card h-100 rounded-4 overflow-hidden">
                    <div class="irudia position-relative d-flex flex-column align-items-center justify-content-center small fw-semibold" style="background: #6b21a8;">
                        <svg width="56" height="56" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="4" width="18" height="16" rx="2"></rect><circle cx="9" cy="10" r="2"></circle><path d="M21 17l-5-5L5 20"></path></svg>
                        Irudia
                        <span class="etiketa badge rounded-pill text-uppercase position-absolute top-0 start-0 m-3">Dantza</span>
                        <span class="eguna bg-white text-dark rounded-3 text-center lh-1 px-2 py-1 position-absolute top-0 end-0 m-2">
                            <span class="zenbakia d-block fs-4 fw-bold">21</span><small class="fw-bold">AZA</small>
                        </span>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h3 class="fs-5 fw-bold">Dantza garaikidea: Arnasa</h3>
                        <p class="text-secondary">Azaroak 21, larunbata · 20:00<br>Areto nagusia</p>
                        <div class="d-flex justify-content-between align-items-center mt-auto mb-3">
                            <span class="fs-5 fw-bold">15 €</span>
                            <span class="badge rounded-pill badge-libre">242 leku libre</span>
                        </div>
                        <button class="btn btn-outline-dark fw-semibold w-100">Xehetasunak ikusi</button>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="card h-100 rounded-4 overflow-hidden">
                    <div class="irudia position-relative d-flex flex-column align-items-center justify-content-center small fw-semibold" style="background: #334155;">
                        <svg width="56" height="56" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="4" width="18" height="16" rx="2"></rect><circle cx="9" cy="10" r="2"></circle><path d="M21 17l-5-5L5 20"></path></svg>
                        Irudia
                        <span class="etiketa badge rounded-pill text-uppercase position-absolute top-0 start-0 m-3">Zinema</span>
                        <span class="eguna bg-white text-dark rounded-3 text-center lh-1 px-2 py-1 position-absolute top-0 end-0 m-2">
                            <span class="zenbakia d-block fs-4 fw-bold">28</span><small class="fw-bold">AZA</small>
                        </span>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h3 class="fs-5 fw-bold">Zinema forum: euskal film laburrak</h3>
                        <p class="text-secondary">Azaroak 28, larunbata · 19:30<br>Areto txikia</p>
                        <div class="d-flex justify-content-between align-items-center mt-auto mb-3">
                            <span class="fs-5 fw-bold">5 €</span>
                            <span class="badge rounded-pill badge-agortuta">Agortuta</span>
                        </div>
                        <button class="btn btn-outline-dark fw-semibold w-100">Xehetasunak ikusi</button>
                    </div>
                </div>
            </div>

        </div>
    </section>

</body>

</html>
