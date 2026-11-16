@extends('front-end.layout')
@section('content')
@php
    $adibideak = require resource_path('views/front-end/admin/ekitaldiak/partials/adibideak.php');
    $ekitaldia = $adibideak[(int) ($id ?? 0)] ?? reset($adibideak);
@endphp
<div class="container orria py-5" style="max-width: 720px;">

    <p class="mb-3"><a href="{{ url('/admin/ekitaldiak') }}" class="itzuli">&larr; Ekitaldien zerrenda</a></p>
    <h1 class="mb-4">Ekitaldia editatu</h1>

    {{-- Prototipoa: oraindik ez du daturik gordetzen --}}
    <div class="txartela p-4">
        <form action="{{ url('/admin/ekitaldiak/'.$ekitaldia['id']) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('front-end.admin.ekitaldiak.partials.form', ['ekitaldia' => $ekitaldia])
        </form>
    </div>

</div>
@endsection
