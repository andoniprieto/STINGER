@extends('front-end.layout')
@section('content')
@php
    // Prototipoa: adibide-datu finkoak (Prototipoa_Ordenagailua / Prototipoa_Mugikorra)
    $ekitaldiak = [
        2 => ['izenburua' => 'Antzerkia: Etxeko giltzak', 'kategoria' => 'Antzerkia', 'data' => '2026-10-31', 'ordua' => '20:00', 'aretoa' => 'Areto nagusia'],
        3 => ['izenburua' => 'Jazz gaua: hirukote akustikoa', 'kategoria' => 'Musika', 'data' => '2026-11-07', 'ordua' => '21:00', 'aretoa' => 'Areto txikia'],
    ];
    $erositakoak = [
        ['kodea' => 'BA-02-K7Q4M', 'ekitaldia_id' => 2, 'kopurua' => 2, 'guztira' => 28],
        ['kodea' => 'BA-03-R2X8P', 'ekitaldia_id' => 3, 'kopurua' => 3, 'guztira' => 36],
    ];

    $koloreak = ['Musika' => '#9A3412', 'Antzerkia' => '#1E3A8A', 'Bertsolaritza' => '#9F1239', 'Dantza' => '#6B21A8', 'Haurrak' => '#166534', 'Zinema' => '#334155'];
    $hilabeteak = ['URT', 'OTS', 'MAR', 'API', 'MAI', 'EKA', 'UZT', 'ABU', 'IRA', 'URR', 'AZA', 'ABE'];
    $hilabeteLuzeak = ['urtarrila', 'otsaila', 'martxoa', 'apirila', 'maiatza', 'ekaina', 'uztaila', 'abuztua', 'iraila', 'urria', 'azaroa', 'abendua'];
    $asteEgunak = ['igandea', 'astelehena', 'asteartea', 'asteazkena', 'osteguna', 'ostirala', 'larunbata'];
    $dirua = fn ($n) => ((float) $n == (int) $n ? (string) (int) $n : number_format((float) $n, 2, ',', '')) . ' €';

    // Azken erosketa lehenengo, prototipoan bezala
    $sarrerak = array_map(function ($t) use ($ekitaldiak, $koloreak, $hilabeteak, $hilabeteLuzeak, $asteEgunak, $dirua) {
        $e = $ekitaldiak[$t['ekitaldia_id']] ?? null;
        $data = $e ? \Illuminate\Support\Carbon::parse($e['data']) : null;
        $hilabetea = $data ? $hilabeteLuzeak[$data->month - 1] : '';

        return [
            'kodea' => $t['kodea'],
            'izenburua' => $e['izenburua'] ?? '—',
            'kolorea' => $koloreak[$e['kategoria'] ?? ''] ?? '#334155',
            'eguna' => $data ? $data->day : '–',
            'hila' => $data ? $hilabeteak[$data->month - 1] : '',
            'noiz' => $data ? ucfirst($hilabetea).'k '.$data->day.', '.$asteEgunak[$data->dayOfWeek].' · '.$e['ordua'] : '',
            'aretoa' => $e['aretoa'] ?? '',
            'kopurua' => $t['kopurua'],
            'guztira' => $dirua($t['guztira']),
        ];
    }, array_reverse($erositakoak));
@endphp

{{-- ORDENAGAILUA eta TABLETA --}}
<section class="d-none d-md-flex flex-column" style="max-width: 900px; margin: 0 auto; padding: 40px clamp(16px, 4vw, 32px) 64px; gap: 20px">
    <h1 class="m-0" style="font-size: clamp(28px, 4vw, 38px)">Nire sarrerak</h1>

    @if (empty($sarrerak))
        <div class="text-center" style="background: #fff; border: 1px dashed #9CA3AF; border-radius: 12px; padding: 40px 24px">
            <p class="fw-bold" style="margin: 0 0 14px; font-size: 18px">Oraindik ez duzu sarrerarik erosi.</p>
            <a href="{{ url('/') }}" class="btn btn-gorria">Ekitaldiak ikusi</a>
        </div>
    @endif

    @foreach ($sarrerak as $t)
        <article class="d-flex flex-wrap overflow-hidden" style="background: #fff; border: 1px solid #E7E5E4; border-radius: 14px">
            <div class="d-flex flex-column justify-content-center align-items-center" style="background: {{ $t['kolorea'] }}; color: #fff; flex: 0 0 120px; padding: 18px; line-height: 1">
                <span class="zenbakia" style="font-size: 40px">{{ $t['eguna'] }}</span>
                <span style="font-size: 13px; font-weight: 700; letter-spacing: 0.16em">{{ $t['hila'] }}</span>
            </div>
            <div class="d-flex flex-column" style="flex: 1 1 260px; padding: 18px 22px; gap: 6px">
                <h2 class="m-0" style="font-family: inherit; font-size: 20px; font-weight: 700; letter-spacing: 0">{{ $t['izenburua'] }}</h2>
                <span style="color: #4B5563">{{ $t['noiz'] }} · {{ $t['aretoa'] }}</span>
                <span style="font-weight: 600">{{ $t['kopurua'] }} sarrera · {{ $t['guztira'] }}</span>
            </div>
            <div class="d-flex flex-column justify-content-center" style="flex: 0 1 200px; padding: 18px 22px; border-left: 2px dashed #E7E5E4; gap: 4px">
                <span style="font-size: 13px; color: #4B5563; text-transform: uppercase; letter-spacing: 0.06em; font-weight: 600">Kodea</span>
                <span class="marka" style="font-size: 20px; letter-spacing: 0.06em">{{ $t['kodea'] }}</span>
            </div>
        </article>
    @endforeach
</section>

{{-- MUGIKORRA --}}
<section class="d-flex d-md-none flex-column" style="padding: 20px 16px 24px; gap: 14px">
    @if (empty($sarrerak))
        <div class="d-flex flex-column text-center" style="background: #fff; border: 1px dashed #9CA3AF; border-radius: 14px; padding: 28px 18px; gap: 12px">
            <p class="m-0 fw-bold">Oraindik ez duzu sarrerarik erosi.</p>
            <a href="{{ url('/') }}" class="btn btn-gorria">Ekitaldiak ikusi</a>
        </div>
    @endif

    @foreach ($sarrerak as $t)
        <article class="overflow-hidden" style="background: #fff; border: 1px solid #E7E5E4; border-radius: 16px">
            <div class="d-flex justify-content-between align-items-center" style="background: {{ $t['kolorea'] }}; color: #fff; padding: 14px 16px; gap: 12px">
                <span style="font-family: 'Archivo', sans-serif; font-weight: 700; font-size: 17px; line-height: 1.2">{{ $t['izenburua'] }}</span>
                <span class="text-center" style="line-height: 1; flex: 0 0 auto">
                    <span class="d-block zenbakia" style="font-size: 26px">{{ $t['eguna'] }}</span>
                    <span style="font-size: 11px; font-weight: 700; letter-spacing: 0.14em">{{ $t['hila'] }}</span>
                </span>
            </div>
            <div class="d-flex flex-column" style="padding: 14px 16px; gap: 4px; border-bottom: 2px dashed #E7E5E4">
                <span style="color: #4B5563">{{ $t['noiz'] }} · {{ $t['aretoa'] }}</span>
                <span style="font-weight: 600">{{ $t['kopurua'] }} sarrera · {{ $t['guztira'] }}</span>
            </div>
            <div class="d-flex justify-content-between align-items-center" style="padding: 14px 16px">
                <span style="font-size: 12px; color: #4B5563; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 600">Kodea</span>
                <span class="marka" style="font-size: 20px; letter-spacing: 0.06em">{{ $t['kodea'] }}</span>
            </div>
        </article>
    @endforeach
</section>
@endsection
