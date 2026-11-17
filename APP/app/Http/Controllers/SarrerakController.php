<?php

namespace App\Http\Controllers;

use App\Models\Ekitaldia;
use App\Models\Sarrera;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SarrerakController extends Controller
{
    function index()
    {
        $sarrerak = auth()->user()->sarrerak;

        return view('front-end.tickets', ['sarrerak' => $sarrerak]);
    }

    function create($id)
    {
        $ekitaldia = Ekitaldia::findOrFail($id);

        return view('front-end.buy', ['ekitaldia' => $ekitaldia]);
    }

    function store(Request $request, $id)
    {
        $request->validate([
            'kopurua' => 'required|integer|min:1|max:8'
        ]);

        $ekitaldia = Ekitaldia::findOrFail($id);

        // Erabiltzailea, prezioa eta kodea hemen kalkulatzen dira, ez formulariotik
        $sarrera = Sarrera::create([
            'user_id' => auth()->id(),
            'ekitaldia_id' => $ekitaldia->id,
            'kopurua' => $request->kopurua,
            'prezio_totala' => $request->kopurua * $ekitaldia->prezioa,
            'kodigoa' => 'BA-' . $ekitaldia->id . '-' . strtoupper(Str::random(5)),
        ]);

        return view('front-end.done', ['sarrera' => $sarrera]);
    }
}
