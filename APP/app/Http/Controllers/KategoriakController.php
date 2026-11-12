<?php

namespace App\Http\Controllers;

use App\Models\Kategoria;
use Illuminate\Http\Request;

class KategoriakController extends Controller
{
    public function index()
    {
        // withCount: kategoria bakoitzak zenbat ekitaldi dituen ere kargatzen du
        $kategoriak = Kategoria::withCount('ekitaldiak')->orderBy('izena')->get();

        return view('front-end.admin.kategoriak.index', ['kategoriak' => $kategoriak]);
    }

    public function create()
    {
        return view('front-end.admin.kategoriak.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'izena' => 'required|string|max:50|unique:kategorias,izena',
        ]);

        Kategoria::create($request->only('izena'));

        return redirect()->route('front-end.admin.kategoriak.index')->with('success', 'Kategoria ongi gehitu da!');
    }

    public function edit($id)
    {
        $kategoria = Kategoria::findOrFail($id);

        return view('front-end.admin.kategoriak.edit', ['kategoria' => $kategoria]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'izena' => 'required|string|max:50|unique:kategorias,izena,' . $id,
        ]);

        $kategoria = Kategoria::findOrFail($id);
        $kategoria->update($request->only('izena'));

        return redirect()->route('front-end.admin.kategoriak.index')->with('success', 'Kategoria ongi editatu da!');
    }

    public function destroy($id)
    {
        Kategoria::destroy($id);

        return redirect()->route('front-end.admin.kategoriak.index')->with('success', 'Kategoria ongi ezabatu da!');
    }
}
