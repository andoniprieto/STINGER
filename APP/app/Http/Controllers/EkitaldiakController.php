<?php

namespace App\Http\Controllers;

use App\Models\Ekitaldia;
use App\Models\Sarrera;
use Illuminate\Http\Request;

class EkitaldiakController extends Controller
{
    public function index()
    {
        $ekitaldiak = Ekitaldia::all();
        $sarrerak = Sarrera::all();

        return view('front-end.admin.ekitaldiak.index', [
            'ekitaldiak' => $ekitaldiak,
            'sarrerak' => $sarrerak
        ]);
    }

    public function create()
    {
        return view('front-end.admin.ekitaldiak.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'izenburua' => 'required|string|max:70',
            'deskribapena' => 'required|string|max:500',
            'kategoria' => 'required|string|max:20',
            'data' => 'required|date|after_or_equal:today',
            'ordua' => 'required|date_format:H:i',
            'prezioa' => 'required|numeric|min:0'
        ]);

        Ekitaldia::create($request->all());

        return redirect()->route('front-end.admin.ekitaldiak.index')->with('success', 'Ekitaldia ongi gehitu da!');
    }

    public function show($id)
    {
        $ekitaldia = Ekitaldia::findOrFail($id);

        return view('front-end.detail', [
            'ekitaldia' => $ekitaldia
        ]);
    }

    public function edit($id)
    {
        $ekitaldia = Ekitaldia::findOrFail($id);

        return view('front-end.admin.ekitaldiak.edit', [
            'ekitaldia' => $ekitaldia
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'izenburua' => 'required|string|max:70',
            'deskribapena' => 'required|string|max:500',
            'kategoria' => 'required|string|max:20',
            'data' => 'required|date|after_or_equal:today',
            'ordua' => 'required|date_format:H:i',
            'prezioa' => 'required|numeric|min:0'
        ]);

        $ekitaldia = Ekitaldia::findOrFail($id);
        $ekitaldia->update($request->all());

        return redirect()->route('front-end.admin.ekitaldiak.index')->with('success', 'Ekitaldia ongi editatu da!');
    }

    public function destroy($id)
    {
        $ekitaldia = Ekitaldia::findOrFail($id);
        $ekitaldia->delete();

        return redirect()->route('front-end.admin.ekitaldiak.index')->with('success', 'Ekitaldia ongi ezabatu da!');


    }
}
