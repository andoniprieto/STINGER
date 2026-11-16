@extends('front-end.layout')
@section('content')
<div class="container orria py-5" style="max-width: 720px;">

    <p class="mb-3"><a href="{{ url('/admin/ekitaldiak') }}" class="itzuli">&larr; Ekitaldiak</a></p>
    <h1 class="mb-4">Ekitaldi berria</h1>

    {{-- Prototipoa: oraindik ez du daturik gordetzen --}}
    <div class="txartela p-4">
        <form action="{{ url('/admin/ekitaldiak') }}" method="get">
            @include('front-end.admin.ekitaldiak.partials.form')
        </form>
    </div>

</div>
@endsection
