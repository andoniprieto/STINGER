<?php

namespace App\Http\Controllers;

use App\Enums\Rola;
use App\Models\Ekitaldia;
use App\Models\Sarrera;
use Illuminate\Http\Request;

class EkitaldiakController extends Controller
{
    public function index()
    {
        $this->checkAdmin();

        $ekitaldiak = Ekitaldia::all();
        $sarrerak = Sarrera::all();

        return view('front-end.admin.ekitaldiak.index', [
            'ekitaldiak' => $ekitaldiak,
            'sarrerak' => $sarrerak
        ]);
    }

    public function create()
    {
        $this->checkAdmin();

        return view('front-end.admin.ekitaldiak.create');
    }

    public function store(Request $request)
    {
        $this->checkAdmin();

        Ekitaldia::create($this->datuak($request));

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
        $this->checkAdmin();

        $ekitaldia = Ekitaldia::findOrFail($id);

        return view('front-end.admin.ekitaldiak.edit', [
            'ekitaldia' => $ekitaldia
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->checkAdmin();

        $ekitaldia = Ekitaldia::findOrFail($id);
        $ekitaldia->update($this->datuak($request));

        return redirect()->route('front-end.admin.ekitaldiak.index')->with('success', 'Ekitaldia ongi editatu da!');
    }

    public function destroy($id)
    {
        $this->checkAdmin();

        $ekitaldia = Ekitaldia::findOrFail($id);
        $ekitaldia->delete();

        return redirect()->route('front-end.admin.ekitaldiak.index')->with('success', 'Ekitaldia ongi ezabatu da!');
    }

    // Sortu eta editatu: formularioa balidatu eta irudia gorde
    private function datuak(Request $request)
    {
        $datuak = $request->validate([
            'izenburua' => 'required|string|max:70',
            'deskribapena' => 'required|string|max:500',
            'kategoria' => 'required|string|max:20',
            'data' => 'required|date|after_or_equal:today',
            'ordua' => 'required|date_format:H:i',
            'prezioa' => 'required|numeric|min:0',
            'irudia' => 'nullable|image',
            'edukiera' => 'required|integer|min:1',
            'aretoa' => 'required|string'
        ]);

        // Irudi berria igo bada, gorde. Bestela, lehengoa mantendu
        if ($request->hasFile('irudia')) {
            $datuak['irudia'] = $request->file('irudia')->store('ekitaldiak', 'public');
        } else {
            unset($datuak['irudia']);
        }

        return $datuak;
    }

    private function checkAdmin(): void
    {
        abort_unless(auth()->user()?->rola === Rola::Admin, 403, 'Ez duzu baimenik.');
    }
}
