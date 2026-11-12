@extends('front-end.layout')
@section('content')
<div class="container orria py-4">

    <div class="d-flex flex-wrap justify-content-between align-items-end gap-3 mb-4">
        <div>
            <div class="goiburua gorria text-uppercase">Administrazioa</div>
            <h1 class="mb-0">Kategoriak</h1>
        </div>
        <a href="{{ route('front-end.admin.kategoriak.create') }}" class="btn btn-gorria">+ Kategoria berria</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($kategoriak->isEmpty())
        <div class="txartela p-4 text-center text-secondary">Oraindik ez dago kategoriarik.</div>
    @else
        <div class="txartela taula table-responsive">
            <table class="table align-middle mb-0">
                <thead>
                    <tr>
                        <th>Izena</th>
                        <th>Ekitaldiak</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kategoriak as $k)
                        <tr>
                            <td class="fw-bold">{{ $k->izena }}</td>
                            <td>{{ $k->ekitaldiak_count }}</td>
                            <td>
                                <div class="d-flex flex-wrap justify-content-end gap-2">
                                    <a href="{{ route('front-end.admin.kategoriak.edit', $k->id) }}" class="btn btn-zuria">Editatu</a>
                                    <form action="{{ route('front-end.admin.kategoriak.destroy', $k->id) }}" method="POST" class="m-0">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-ezabatu" onclick="return confirm('Ezabatu {{ $k->izena }} kategoria?')">Ezabatu</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

</div>
@endsection
