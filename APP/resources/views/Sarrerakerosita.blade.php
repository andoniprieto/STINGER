<!DOCTYPE html>
<html lang="eu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erosketa eginda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@700;800&family=Source+Sans+3:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Source Sans 3', sans-serif; background: #f5f5f4; color: #111827; }
        h1, .kodea { font-family: 'Archivo', sans-serif; }
        .testua { color: #374151; }
        .ikonoa { width: 56px; height: 56px; background: #dcfce7; color: #166534; }
        .sarrera { border: 2px dashed #9ca3af; }
        .etiketa { font-size: 12px; letter-spacing: .08em; color: #4b5563; }
        .kodea { letter-spacing: .08em; }
        .btn-gorria { background: #b91c1c; color: #fff; border-radius: 8px; }
        .btn-gorria:hover { background: #991b1b; color: #fff; }
        .btn-zuria { background: #fff; border: 1px solid #9ca3af; border-radius: 8px; color: #111827; }
        .btn-zuria:hover { background: #f3f4f6; }

        /* Mobilean: txartelik gabe, dena erdian eta botoiak zabalera osoan */
        @media (max-width: 767.98px) {
            .txartela { background: transparent !important; border: 0 !important; }
            .btn-gorria, .btn-zuria { width: 100%; border-radius: 12px; }
            .btn-gorria { min-height: 52px; font-size: 18px; }
            .btn-zuria { min-height: 48px; }
        }
    </style>
</head>

<body>
    <main class="container py-4 py-md-5" style="max-width: 672px;">
        <div class="txartela card rounded-4 p-3 p-md-5 text-center text-md-start" style="border-color: #e7e5e4;">

            <div class="ikonoa rounded-circle d-flex align-items-center justify-content-center mx-auto mx-md-0 mb-3">
                <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12l5 5L20 7"></path></svg>
            </div>

            <h1 class="fw-bolder mb-3" style="font-size: clamp(28px, 4vw, 34px);">Erosketa eginda!</h1>

            <p class="testua mb-3">
                <span class="kop">1</span> sarrera<span class="d-none d-md-inline"> erosi dituzu</span>: <strong>Bertso saioa: udazkeneko jaialdia</strong>.
                Baieztapena zure posta elektronikora bidali da.
            </p>

            <div class="sarrera rounded-4 bg-white p-3 px-md-3 mb-3">
                {{-- Mobila --}}
                <div class="d-md-none py-2">
                    <p class="etiketa fw-bold text-uppercase mb-1">Sarrera kodea</p>
                    <p class="kodea fw-bolder fs-3 mb-1">BA-01-0XQNM</p>
                    <p class="testua m-0">Urriak 24, larunbata · 19:00 · <span class="guztira">10 €</span></p>
                </div>

                {{-- Ordenagailua --}}
                <div class="d-none d-md-flex justify-content-between align-items-end gap-3">
                    <div>
                        <p class="etiketa fw-bold text-uppercase mb-0">Kodea</p>
                        <p class="kodea fw-bolder fs-4 m-0">BA-01-0XQNM</p>
                    </div>
                    <div>
                        <p class="etiketa fw-bold text-uppercase mb-0">Data</p>
                        <p class="fw-bold m-0">Urriak 24, larunbata · 19:00</p>
                    </div>
                    <div>
                        <p class="etiketa fw-bold text-uppercase mb-0">Guztira</p>
                        <p class="guztira fw-bold m-0">10 €</p>
                    </div>
                </div>
            </div>

            <div class="d-flex flex-column flex-md-row gap-3">
                <a href="#" class="btn btn-gorria fw-bold d-flex align-items-center justify-content-center px-3">Nire sarrerak ikusi</a>
                <a href="{{ url('/') }}" class="btn btn-zuria fw-semibold d-flex align-items-center justify-content-center px-3">Ekitaldi gehiago</a>
            </div>

        </div>
    </main>

    <script>
        // Sarrerak erosi pantailatik datorren kopurua (1–8)
        const kopurua = Math.min(8, Math.max(1, parseInt(new URLSearchParams(location.search).get('kopurua')) || 1));
        document.querySelectorAll('.kop').forEach(e => e.textContent = kopurua);
        document.querySelectorAll('.guztira').forEach(e => e.textContent = kopurua * 10 + ' €');
    </script>
</body>

</html>
