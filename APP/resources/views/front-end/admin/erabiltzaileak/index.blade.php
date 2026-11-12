@extends('front-end.layout')
@section('content')
<div class="container orria py-5">

    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <div class="goiburua gorria text-uppercase">Administrazioa</div>
            <h1 class="mb-0">Erabiltzaileen kudeaketa</h1>
        </div>
        <a href="{{ route('front-end.admin.erabiltzaileak.create') }}" class="btn btn-gorria">+ Erabiltzaile berria</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success" role="status">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
    @endif

    @if ($erabiltzaileak->isEmpty())
        <div class="hutsik p-4 text-center">Oraindik ez dago erabiltzailerik.</div>
    @else
        <div class="txartela taula table-responsive">
            <table class="table align-middle mb-0">
                <thead>
                    <tr>
                        <th>Izena</th>
                        <th>Posta elektronikoa</th>
                        <th>Telefonoa</th>
                        <th>Rola</th>
                        <th><span class="visually-hidden">Ekintzak</span></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($erabiltzaileak as $u)
                        @php $niDa = auth()->id() === $u->id; @endphp
                        <tr>
                            <td class="fw-bold">
                                {{ $u->name }} {{ $u->abizena }}
                                @if ($niDa)
                                    <span class="etiketa etiketa-zu">Zu</span>
                                @endif
                            </td>
                            <td>{{ $u->email }}</td>
                            <td>{{ $u->telefonoa }}</td>
                            <td>@include('front-end.admin.erabiltzaileak.partials.rola', ['rola' => $u->rola])</td>
                            <td>
                                <div class="d-flex flex-wrap justify-content-end gap-2">
                                    <a href="{{ route('front-end.admin.erabiltzaileak.show', $u->id) }}" class="btn btn-zuria">Ikusi</a>
                                    <a href="{{ route('front-end.admin.erabiltzaileak.edit', $u->id) }}" class="btn btn-zuria">Editatu</a>
                                    <button type="button" class="btn btn-ezabatu" @disabled($niDa)
                                            data-bs-toggle="modal" data-bs-target="#ezabatuModala"
                                            data-ekintza="{{ route('front-end.admin.erabiltzaileak.destroy', $u->id) }}"
                                            data-izena="{{ $u->name }} {{ $u->abizena }}"
                                            data-posta="{{ $u->email }}">Ezabatu</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

</div>

{{-- Ezabatzeko berrespen-leihoa (prototipoaren estiloa) --}}
<div class="modal fade" id="ezabatuModala" tabindex="-1" aria-labelledby="ezabatuIzenburua" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content ezabatu-leihoa">
            <div class="modal-body p-4">
                <div class="d-flex align-items-start gap-3">
                    <span class="ezabatu-ikonoa" aria-hidden="true">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 6h18"></path><path d="M8 6V4h8v2"></path><path d="M19 6l-1 14H6L5 6"></path><path d="M10 11v6"></path><path d="M14 11v6"></path>
                        </svg>
                    </span>
                    <div class="flex-grow-1">
                        <div class="goiburua gorria text-uppercase">Administrazioa</div>
                        <h2 id="ezabatuIzenburua" class="h4 mb-2">Erabiltzailea ezabatu?</h2>
                        <p class="mb-0 text-secondary">
                            <strong class="text-dark" id="ezabatuIzena"></strong>
                            (<span id="ezabatuPosta"></span>) eta bere sarrera guztiak betiko ezabatuko dira.
                            Ekintza hau ezin da desegin.
                        </p>
                    </div>
                </div>
            </div>
            <div class="modal-footer ezabatu-oina px-4 py-3">
                <button type="button" class="btn btn-zuria px-3" data-bs-dismiss="modal">Utzi</button>
                <form id="ezabatuFormularioa" method="POST" class="m-0">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-gorria">Bai, ezabatu</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('ezabatuModala').addEventListener('show.bs.modal', function (gertaera) {
        const botoia = gertaera.relatedTarget;
        document.getElementById('ezabatuFormularioa').action = botoia.dataset.ekintza;
        document.getElementById('ezabatuIzena').textContent = botoia.dataset.izena;
        document.getElementById('ezabatuPosta').textContent = botoia.dataset.posta;
    });
</script>
@endsection
