@extends('front-end.layout')
@section('content')
    {{-- Sarrerak erosi. $ekitaldia SarrerakController@create-etik dator --}}
    <div class="container erosi-orria py-4" style="max-width: 1100px;">
        <a class="gorria fw-bold text-decoration-none d-inline-flex align-items-center gap-2"
            href="{{ url('/ekitaldiak/' . $ekitaldia->id) }}">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                <path d="M15 18l-6-6 6-6"></path>
            </svg>
            Ekitaldira itzuli
        </a>

        <h1 class="fw-bolder my-4" style="font-size: clamp(28px, 4vw, 38px);">Sarrerak erosi</h1>

        <form action="{{ url('/erosi/' . $ekitaldia->id) }}" method="POST">
            @csrf
            <input type="hidden" name="kopurua" id="kopurua-input" value="1">

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
                            <span class="text-secondary">{{ (float) $ekitaldia->prezioa }} € sarrera bakoitza · gehienez
                                8</span>
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
                        <p class="ekitaldia fs-4 fw-bold lh-sm mb-3">{{ $ekitaldia->izenburua }}</p>
                        <p class="gris mb-3">{{ $ekitaldia->dataLuzea() }} · {{ $ekitaldia->ordua->format('H:i') }}</p>
                        <p class="gris">{{ $ekitaldia->aretoa }}</p>

                        <div class="d-flex justify-content-between border-top pt-3 mb-3"
                            style="border-color: #374151 !important">
                            <span><span id="laburpen-kopurua">1</span> × {{ (float) $ekitaldia->prezioa }} €</span>
                            <span class="guztira">{{ (float) $ekitaldia->prezioa }} €</span>
                        </div>
                        <div class="d-flex justify-content-between fw-bolder mb-3" style="font-size: 22px;">
                            <span>Guztira</span>
                            <span class="guztira">{{ (float) $ekitaldia->prezioa }} €</span>
                        </div>

                        <button type="submit"
                            class="btn btn-ordaindu w-100 fw-bold mb-3 d-flex align-items-center justify-content-center">Ordaindu&nbsp;<span
                                class="guztira">{{ (float) $ekitaldia->prezioa }} €</span></button>
                        <p class="gris small m-0">Ez da benetako ordainketarik egiten.</p>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        let kopurua = 1;
        const prezioa = {{ (float) $ekitaldia->prezioa }};

        function eguneratu() {
            document.getElementById('kopurua').textContent = kopurua;
            document.getElementById('laburpen-kopurua').textContent = kopurua;
            document.querySelectorAll('.guztira').forEach(e => e.textContent = kopurua * prezioa + ' €');
            document.getElementById('gutxiago').disabled = kopurua === 1;
            document.getElementById('gehiago').disabled = kopurua === 8;
            document.getElementById('kopurua-input').value = kopurua;
        }

        document.getElementById('gutxiago').onclick = () => { kopurua--; eguneratu(); };
        document.getElementById('gehiago').onclick = () => { kopurua++; eguneratu(); };
    </script>
@endsection