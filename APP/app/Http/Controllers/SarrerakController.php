<?php

namespace App\Http\Controllers;

use App\Models\Ekitaldia;
use App\Models\Sarrera;
use Illuminate\Http\Request;

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

    function store(Request $request)
    {
        $request->validate([
            'kopurua' => 'required|numeric',
            'prezio_totala' => 'required|numeric',
            'user_id' => 'required|exists:users,id',
            'ekitaldia_id' => 'required|exists:ekitaldiak,id'
        ]);

        $sarrera = Sarrera::create($request->all());

        return view('front-end.done', ['sarrera' => $sarrera])->with('success', 'Sarrera ondo sortu da!');
    }

    // function show($id){
    //     return view()->w
    // }
}
