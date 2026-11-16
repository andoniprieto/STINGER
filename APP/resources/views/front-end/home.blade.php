@extends('front-end.layout')
@section('content')
{{-- Orri printzipala (87-1258-zeregina---orri-printzipala adarretik) --}}
@php
$events = [
    ['id' => 1, 'title' => 'Bertso saioa: udazkeneko jaialdia', 'category' => 'Bertsolaritza', 'color' => '#9f1239', 'day' => '24', 'mon' => 'URR', 'longDate' => 'Urriak 24, larunbata', 'time' => '19:00', 'hall' => 'Areto nagusia', 'price' => 10, 'status' => '88 leku libre', 'badge' => 'badge-libre'],
    ['id' => 2, 'title' => 'Antzerkia: Etxeko giltzak', 'category' => 'Antzerkia', 'color' => '#1e3a8a', 'day' => '31', 'mon' => 'URR', 'longDate' => 'Urriak 31, larunbata', 'time' => '20:00', 'hall' => 'Areto nagusia', 'price' => 14, 'status' => '204 leku libre', 'badge' => 'badge-libre'],
    ['id' => 3, 'title' => 'Jazz gaua: hirukote akustikoa', 'category' => 'Musika', 'color' => '#9a3412', 'day' => '7', 'mon' => 'AZA', 'longDate' => 'Azaroak 7, larunbata', 'time' => '21:00', 'hall' => 'Areto txikia', 'price' => 12, 'status' => 'Azken sarrerak', 'badge' => 'badge-azken'],
    ['id' => 4, 'title' => 'Haurrentzako antzerkia: Ilargiaren bidaia', 'category' => 'Haurrak', 'color' => '#166534', 'day' => '15', 'mon' => 'AZA', 'longDate' => 'Azaroak 15, igandea', 'time' => '17:00', 'hall' => 'Areto nagusia', 'price' => 6, 'status' => '160 leku libre', 'badge' => 'badge-libre'],
    ['id' => 5, 'title' => 'Dantza garaikidea: Arnasa', 'category' => 'Dantza', 'color' => '#6b21a8', 'day' => '21', 'mon' => 'AZA', 'longDate' => 'Azaroak 21, larunbata', 'time' => '20:00', 'hall' => 'Areto nagusia', 'price' => 15, 'status' => '242 leku libre', 'badge' => 'badge-libre'],
    ['id' => 6, 'title' => 'Zinema forum: euskal film laburrak', 'category' => 'Zinema', 'color' => '#334155', 'day' => '28', 'mon' => 'AZA', 'longDate' => 'Azaroak 28, larunbata', 'time' => '19:30', 'hall' => 'Areto txikia', 'price' => 5, 'status' => 'Agortuta', 'badge' => 'badge-agortuta'],
];
@endphp

<section class="hasiera-goiburua text-white py-4 py-md-5">
    <div class="container py-md-3">
        <p class="denboraldia text-uppercase fw-bold mb-2 mb-md-3">Denboraldia 2026–27</p>
        {{-- Mugikorrean izenburu laburra (prototipoa) --}}
        <h1 class="izenburua fw-bold mb-3 mb-md-4">Bizi kultura Bergaran<span class="d-none d-md-inline">. Aukeratu ekitaldia eta erosi zure sarrera.</span></h1>

        <label for="bilatu" class="form-label small fw-semibold d-none d-md-block">Bilatu ekitaldia</label>
        <div class="position-relative mb-3">
            <svg class="bilatu-ikonoa d-md-none" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#6b7280" stroke-width="2.5"><circle cx="11" cy="11" r="7"></circle><path d="M20 20l-4-4"></path></svg>
            <input type="search" id="bilatu" class="form-control form-control-lg bilatu fs-6" placeholder="Izenburua edo aretoa…">
        </div>

        {{-- Mugikorrean lerro bakarrean, alboetara mugitzeko --}}
        <div class="kategoriak">
            <button class="btn btn-light rounded-pill fw-semibold me-1 mb-2">Denak</button>
            <button class="btn btn-outline-light kategoria rounded-pill fw-semibold me-1 mb-2">Musika</button>
            <button class="btn btn-outline-light kategoria rounded-pill fw-semibold me-1 mb-2">Antzerkia</button>
            <button class="btn btn-outline-light kategoria rounded-pill fw-semibold me-1 mb-2">Bertsolaritza</button>
            <button class="btn btn-outline-light kategoria rounded-pill fw-semibold me-1 mb-2">Dantza</button>
            <button class="btn btn-outline-light kategoria rounded-pill fw-semibold me-1 mb-2">Haurrak</button>
            <button class="btn btn-outline-light kategoria rounded-pill fw-semibold me-1 mb-2">Zinema</button>
        </div>
    </div>
</section>

<section class="container py-4">
    <div class="d-flex justify-content-between align-items-baseline mb-3">
        <h2 class="hurrengoak fw-bold m-0">Hurrengo ekitaldiak</h2>
        <span class="text-secondary small">{{ count($events) }} ekitaldi</span>
    </div>

    <div class="row g-3 g-md-4">
        @foreach ($events as $e)
            <div class="col-md-6 col-lg-3">
                {{-- Mugikorra: txartel horizontala, data kategoriaren kolorean (prototipoa) --}}
                <a href="{{ url('/ekitaldiak/' . $e['id']) }}" class="txartel-mugikorra d-flex d-md-none">
                    <span class="txartel-data d-flex flex-column align-items-center justify-content-center text-white" style="background: {{ $e['color'] }};">
                        <span class="zenbakia">{{ $e['day'] }}</span>
                        <span class="hilabetea">{{ $e['mon'] }}</span>
                        <span class="ordua">{{ $e['time'] }}</span>
                    </span>
                    <span class="d-flex flex-column flex-grow-1 gap-1 p-3">
                        <span class="txartel-kategoria text-uppercase">{{ $e['category'] }} · {{ $e['hall'] }}</span>
                        <span class="txartel-izenburua">{{ $e['title'] }}</span>
                        <span class="d-flex justify-content-between align-items-center mt-auto">
                            <span class="fw-bold">{{ $e['price'] }} €</span>
                            <span class="badge rounded-pill {{ $e['badge'] }}">{{ $e['status'] }}</span>
                        </span>
                    </span>
                </a>

                {{-- Tableta eta ordenagailua --}}
                <div class="card h-100 rounded-4 overflow-hidden d-none d-md-flex">
                    <div class="txartel-irudia position-relative d-flex flex-column align-items-center justify-content-center small fw-semibold" style="background: {{ $e['color'] }};">
                        <svg width="56" height="56" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="4" width="18" height="16" rx="2"></rect><circle cx="9" cy="10" r="2"></circle><path d="M21 17l-5-5L5 20"></path></svg>
                        Irudia
                        <span class="kategoria-etiketa badge rounded-pill text-uppercase position-absolute top-0 start-0 m-3">{{ $e['category'] }}</span>
                        <span class="eguna bg-white text-dark rounded-3 text-center lh-1 px-2 py-1 position-absolute top-0 end-0 m-2">
                            <span class="zenbakia d-block fs-4 fw-bold">{{ $e['day'] }}</span><small class="fw-bold">{{ $e['mon'] }}</small>
                        </span>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h3 class="fs-5 fw-bold">{{ $e['title'] }}</h3>
                        <p class="text-secondary">{{ $e['longDate'] }} · {{ $e['time'] }}<br>{{ $e['hall'] }}</p>
                        <div class="d-flex justify-content-between align-items-center mt-auto mb-3">
                            <span class="fs-5 fw-bold">{{ $e['price'] }} €</span>
                            <span class="badge rounded-pill {{ $e['badge'] }}">{{ $e['status'] }}</span>
                        </div>
                        <a href="{{ url('/ekitaldiak/' . $e['id']) }}" class="btn btn-outline-dark fw-semibold w-100">Xehetasunak ikusi</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
@endsection
