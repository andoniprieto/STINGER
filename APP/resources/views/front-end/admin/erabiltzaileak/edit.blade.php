@extends('front-end.layout')
@section('content')
<div class="container orria py-5" style="max-width: 640px;">

    <p class="mb-3"><a href="{{ route('front-end.admin.erabiltzaileak.index') }}" class="itzuli">&larr; Erabiltzaileen zerrenda</a></p>
    <h1 class="mb-4">Erabiltzailea editatu</h1>

    <div class="txartela p-4">
        <form action="{{ route('front-end.admin.erabiltzaileak.update', $erabiltzailea->id) }}" method="POST">
            @csrf
            @method('PUT')
            @include('front-end.admin.erabiltzaileak.partials.form', ['erabiltzailea' => $erabiltzailea])
        </form>
    </div>

</div>
@endsection
