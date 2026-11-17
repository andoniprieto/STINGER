@extends('front-end.layout')
@section('content')
<div class="container orria py-5" style="max-width: 720px;">

    <p class="mb-3"><a href="{{ url('/admin/ekitaldiak') }}" class="itzuli">&larr; Ekitaldien zerrenda</a></p>
    <h1 class="mb-4">Ekitaldia editatu</h1>

    <div class="txartela p-4">
        <form action="{{ url('/admin/ekitaldiak/'.$ekitaldia->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('front-end.admin.ekitaldiak.partials.form', ['ekitaldia' => $ekitaldia])
        </form>
    </div>

</div>
@endsection
