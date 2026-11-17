@extends('front-end.layout')
@section('content')
@php
    // $sarrerak SarrerakController@index-etik dator. Azken erosketa lehenengo.
    $sarrerak = auth()->check() ? $sarrerak->sortByDesc('created_at') : collect();
@endphp

{{-- ORDENAGAILUA eta TABLETA --}}
<section class="d-none d-md-flex flex-column" style="max-width: 900px; margin: 0 auto; padding: 40px clamp(16px, 4vw, 32px) 64px; gap: 20px">
    <h1 class="m-0" style="font-size: clamp(28px, 4vw, 38px)">Nire sarrerak</h1>

    @guest
        <div class="text-center" style="background: #fff; border: 1px dashed #9CA3AF; border-radius: 12px; padding: 40px 24px">
            <p class="fw-bold" style="margin: 0 0 14px; font-size: 18px">Hasi saioa zure sarrerak ikusteko.</p>
            <a href="{{ url('/saioa-hasi') }}" class="btn btn-gorria">Saioa hasi</a>
        </div>
    @elseif ($sarrerak->isEmpty())
        <div class="text-center" style="background: #fff; border: 1px dashed #9CA3AF; border-radius: 12px; padding: 40px 24px">
            <p class="fw-bold" style="margin: 0 0 14px; font-size: 18px">Oraindik ez duzu sarrerarik erosi.</p>
            <a href="{{ url('/') }}" class="btn btn-gorria">Ekitaldiak ikusi</a>
        </div>
    @endif

    @foreach ($sarrerak as $t)
        <article class="d-flex flex-wrap overflow-hidden" style="background: #fff; border: 1px solid #E7E5E4; border-radius: 14px">
            <div class="d-flex flex-column justify-content-center align-items-center" style="background: {{ $t->ekitaldia->kolorea() }}; color: #fff; flex: 0 0 120px; padding: 18px; line-height: 1">
                <span class="zenbakia" style="font-size: 40px">{{ $t->ekitaldia->data->day }}</span>
                <span style="font-size: 13px; font-weight: 700; letter-spacing: 0.16em">{{ $t->ekitaldia->hilabeteLaburra() }}</span>
            </div>
            <div class="d-flex flex-column" style="flex: 1 1 260px; padding: 18px 22px; gap: 6px">
                <h2 class="m-0" style="font-family: inherit; font-size: 20px; font-weight: 700; letter-spacing: 0">{{ $t->ekitaldia->izenburua }}</h2>
                <span style="color: #4B5563">{{ $t->ekitaldia->dataLuzea() }} · {{ $t->ekitaldia->ordua->format('H:i') }}</span>
                <span style="font-weight: 600">{{ $t->kopurua }} sarrera · {{ (float) $t->prezio_totala }} €</span>
            </div>
            <div class="d-flex flex-column justify-content-center" style="flex: 0 1 200px; padding: 18px 22px; border-left: 2px dashed #E7E5E4; gap: 4px">
                <span style="font-size: 13px; color: #4B5563; text-transform: uppercase; letter-spacing: 0.06em; font-weight: 600">Kodea</span>
                <span class="marka" style="font-size: 20px; letter-spacing: 0.06em">{{ $t->kodigoa }}</span>
            </div>
        </article>
    @endforeach
</section>

{{-- MUGIKORRA --}}
<section class="d-flex d-md-none flex-column" style="padding: 20px 16px 24px; gap: 14px">
    @guest
        <div class="d-flex flex-column text-center" style="background: #fff; border: 1px dashed #9CA3AF; border-radius: 14px; padding: 28px 18px; gap: 12px">
            <p class="m-0 fw-bold">Hasi saioa zure sarrerak ikusteko.</p>
            <a href="{{ url('/saioa-hasi') }}" class="btn btn-gorria">Saioa hasi</a>
        </div>
    @elseif ($sarrerak->isEmpty())
        <div class="d-flex flex-column text-center" style="background: #fff; border: 1px dashed #9CA3AF; border-radius: 14px; padding: 28px 18px; gap: 12px">
            <p class="m-0 fw-bold">Oraindik ez duzu sarrerarik erosi.</p>
            <a href="{{ url('/') }}" class="btn btn-gorria">Ekitaldiak ikusi</a>
        </div>
    @endif

    @foreach ($sarrerak as $t)
        <article class="overflow-hidden" style="background: #fff; border: 1px solid #E7E5E4; border-radius: 16px">
            <div class="d-flex justify-content-between align-items-center" style="background: {{ $t->ekitaldia->kolorea() }}; color: #fff; padding: 14px 16px; gap: 12px">
                <span style="font-family: 'Archivo', sans-serif; font-weight: 700; font-size: 17px; line-height: 1.2">{{ $t->ekitaldia->izenburua }}</span>
                <span class="text-center" style="line-height: 1; flex: 0 0 auto">
                    <span class="d-block zenbakia" style="font-size: 26px">{{ $t->ekitaldia->data->day }}</span>
                    <span style="font-size: 11px; font-weight: 700; letter-spacing: 0.14em">{{ $t->ekitaldia->hilabeteLaburra() }}</span>
                </span>
            </div>
            <div class="d-flex flex-column" style="padding: 14px 16px; gap: 4px; border-bottom: 2px dashed #E7E5E4">
                <span style="color: #4B5563">{{ $t->ekitaldia->dataLuzea() }} · {{ $t->ekitaldia->ordua->format('H:i') }}</span>
                <span style="font-weight: 600">{{ $t->kopurua }} sarrera · {{ (float) $t->prezio_totala }} €</span>
            </div>
            <div class="d-flex justify-content-between align-items-center" style="padding: 14px 16px">
                <span style="font-size: 12px; color: #4B5563; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 600">Kodea</span>
                <span class="marka" style="font-size: 20px; letter-spacing: 0.06em">{{ $t->kodigoa }}</span>
            </div>
        </article>
    @endforeach
</section>
@endsection
