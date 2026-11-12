@extends('front-end.layout')
@section('content')
<div class="container orria py-5" style="max-width: 640px;">

    <p class="mb-3"><a href="{{ route('front-end.admin.erabiltzaileak.index') }}" class="itzuli">&larr; Erabiltzaileen zerrenda</a></p>
    <h1 class="mb-4">Erabiltzaile berria</h1>

    <div class="txartela p-4">
        <form action="{{ route('front-end.admin.erabiltzaileak.store') }}" method="POST">
            @csrf
            @include('front-end.admin.erabiltzaileak.partials.form')
        </form>
    </div>

</div>
@endsection
