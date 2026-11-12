<!DOCTYPE html>
<html lang="eu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sarrerak erosi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@700;800&family=Source+Sans+3:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Source Sans 3', sans-serif; background: #f5f5f4; color: #111827; }
        h1, .ekitaldia { font-family: 'Archivo', sans-serif; }
        h2 { font-size: 20px; }
        .gorria { color: #b91c1c; }
        .arrosa { color: #fca5a5; letter-spacing: .12em; font-size: 13px; }
        .gris { color: #d1d5db; }
        .txartela { border-color: #e7e5e4; }
        .laburpena { background: #111827; }
        .kopurua { border: 1px solid #9ca3af; border-radius: 10px; overflow: hidden; }
        .kopurua button { width: 48px; height: 48px; border: 0; background: #f3f4f6; font-size: 22px; font-weight: 700; }
        .kopurua span { width: 56px; text-align: center; font-size: 22px; font-weight: 700; }
        .form-label { font-size: 14px; font-weight: 600; color: #374151; }
        .form-control { height: 44px; border-color: #9ca3af; border-radius: 8px; }
        .form-control:focus { border-color: #b91c1c; box-shadow: 0 0 0 .2rem #fecaca; }
        .btn-ordaindu { background: #b91c1c; color: #fff; min-height: 52px; border-radius: 8px; font-size: 17px; }
        .btn-ordaindu:hover { background: #991b1b; color: #fff; }
    </style>
</head>

<body>
    <main class="container py-4" style="max-width: 1100px;">
        <a class="gorria fw-bold text-decoration-none d-inline-flex align-items-center gap-2" href="{{ url('/') }}">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M15 18l-6-6 6-6"></path></svg>
            Ekitaldira itzuli
        </a>

        <h1 class="fw-bolder my-4" style="font-size: clamp(28px, 4vw, 38px);">Sarrerak erosi</h1>

        <div class="row g-4 align-items-start">
            <div class="col-md-8">

                <div class="card txartela rounded-4 p-4 mb-4">
                    <h2 class="fw-bold mb-3">1. Sarrera kopurua</h2>
                    <div class="d-flex align-items-center gap-3">
                        <div class="kopurua d-flex align-items-center bg-white">
                            <button id="gutxiago" type="button" disabled>−</button>
                            <span id="kopurua">1</span>
                            <button id="gehiago" type="button">+</button>
                        </div>
                        <span class="text-secondary">10 € sarrera bakoitza · gehienez 8</span>
                    </div>
                </div>

                <div class="card txartela rounded-4 p-4">
                    <h2 class="fw-bold mb-3">2. Ordainketa</h2>

                    <label class="form-label">Txartelaren titularra</label>
                    <input type="text" class="form-control mb-3">

                    <label class="form-label">Txartel zenbakia</label>
                    <input type="text" class="form-control mb-3" placeholder="0000 0000 0000 0000">

                    <div class="row">
                        <div class="col">
                            <label class="form-label">Iraungitze data</label>
                            <input type="text" class="form-control" placeholder="HH/UU">
                        </div>
                        <div class="col">
                            <label class="form-label">CVV</label>
                            <input type="text" class="form-control" placeholder="123">
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md-4">
                <div class="laburpena text-white rounded-4 p-4">
                    <p class="arrosa fw-bold text-uppercase mb-2">Laburpena</p>
                    <p class="ekitaldia fs-4 fw-bold lh-sm mb-3">Bertso saioa: udazkeneko jaialdia</p>
                    <p class="gris mb-3">Urriak 24, larunbata · 19:00</p>
                    <p class="gris">Areto nagusia</p>

                    <div class="d-flex justify-content-between border-top pt-3 mb-3" style="border-color: #374151 !important">
                        <span><span id="laburpen-kopurua">1</span> × 10 €</span>
                        <span class="guztira">10 €</span>
                    </div>
                    <div class="d-flex justify-content-between fw-bolder mb-3" style="font-size: 22px;">
                        <span>Guztira</span>
                        <span class="guztira">10 €</span>
                    </div>

                    <button class="btn btn-ordaindu w-100 fw-bold mb-3" type="button">Ordaindu <span class="guztira">10 €</span></button>
                    <p class="gris small m-0">Prototipoa: ez da benetako ordainketarik egiten.</p>
                </div>
            </div>
        </div>
    </main>

    <script>
        let kopurua = 1;

        function eguneratu() {
            document.getElementById('kopurua').textContent = kopurua;
            document.getElementById('laburpen-kopurua').textContent = kopurua;
            document.querySelectorAll('.guztira').forEach(e => e.textContent = kopurua * 10 + ' €');
            document.getElementById('gutxiago').disabled = kopurua === 1;
            document.getElementById('gehiago').disabled = kopurua === 8;
        }

        document.getElementById('gutxiago').onclick = () => { kopurua--; eguneratu(); };
        document.getElementById('gehiago').onclick = () => { kopurua++; eguneratu(); };
    </script>
</body>

</html>
