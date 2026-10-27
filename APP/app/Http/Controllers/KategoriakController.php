<?php

namespace App\Http\Controllers;

use App\Models\Kategoria;
use Illuminate\Http\Request;

class KategoriakController extends Controller
{
    function index()
    {
        $kategoriak = Kategoria::all();

        //return view('kategoriak', ['kategoriak' => $kategoriak]);
        return response()->json($kategoriak);
    }

    function create()
    {
        return view('kategoriak.create');
    }

    function store(Request $request)
    {
        $request->validate([
            'izena' => 'required|string|max:50',
        ]);

        Kategoria::create($request->all());

        //return redirect()->route('kategoriak')->with('success', 'Kategoria ongi gehitu da!');
        return response()->json([
            'mezua' => 'Kategoria ongi gehitu da!',
            'jasotako_datuak' => $request->all()
        ], 201);
    }

    function show($id)
    {
        $kategoria = Kategoria::findOrFail($id);

        //return view('kategoriak.show', ['kategoria' => $kategoria]);
        return response()->json($kategoria);
    }

    function edit($id)
    {
        $kategoria = Kategoria::findOrFail($id);

        return view('kategoriak.edit', ['kategoria' => $kategoria]);
    }

    function update(Request $request, $id)
    {
        $request->validate([
            'izena' => 'required|string|max:50',
        ]);

        $kategoria = Kategoria::findOrFail($id);

        $kategoria->update($request->all());

        //return redirect()->route('kategoriak')->with('success', 'Kategoria ongi editatu da!');
        return response()->json([
            'status' => 'success',
            'mezua' => 'Kategoria ' . $id . ' ongi editatu da!',
            'jasotako_datuak' => $request->all()
        ], 200);
    }

    function destroy($id)
    {
        Kategoria::destroy($id);

        //return redirect()->route('kategoriak')->with('success', 'Kategoria ongi ezabatu da!');
        return response()->json([
            'status' => 'success',
            'mezua' => 'Kategoria ' . $id . ' ongi ezabatu da!'
        ], 200);
    }
}
