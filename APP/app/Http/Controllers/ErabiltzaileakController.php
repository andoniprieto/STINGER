<?php

namespace App\Http\Controllers;

use App\Enums\Rola;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ErabiltzaileakController extends Controller
{
    public function index()
    {
        $erabiltzaileak = User::all();

        return view('front-end.admin.erabiltzaileak.index', ['erabiltzaileak' => $erabiltzaileak]);
    }

    public function create()
    {
        return view('front-end.admin.erabiltzaileak.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'abizena' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'telefonoa' => 'required|string|unique:users,telefonoa|min:9|max:9',
            'password' => 'required|string|min:8|confirmed',
            'rola' => ['required', Rule::enum(Rola::class)],
        ]);

        User::create($request->all());

        return redirect()->route('front-end.admin.erabiltzaileak.index')->with('success', 'Erabiltzailea ongi gehitu da!');
    }

    public function show($id)
    {
        $erabiltzailea = User::findOrFail($id);
        $sarrerak = $erabiltzailea->sarrerak;

        return view('front-end.admin.erabiltzaileak.show', [
            'erabiltzailea' => $erabiltzailea,
            'sarrerak' => $sarrerak
        ]);
    }

    public function edit($id)
    {
        $erabiltzailea = User::findOrFail($id);

        return view('front-end.admin.erabiltzaileak.edit', ['erabiltzailea' => $erabiltzailea]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'abizena' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'telefonoa' => 'required|string||min:9|max:9|unique:users,telefonoa,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
            'rola' => ['required', Rule::enum(Rola::class)],
        ]);

        $erabiltzailea = User::findOrFail($id);

        $data = $request->all();
        if (!$request->filled('password')) {
            unset($data['password']);
        }

        $erabiltzailea->update($data);

        return redirect()->route('front-end.admin.erabiltzaileak.index')->with('success', 'Erabiltzailea ongi editatu da!');
    }

    public function destroy($id)
    {
        User::destroy($id);

        return redirect()->route('front-end.admin.erabiltzaileak.index')->with('success', 'Erabiltzailea ongi ezabatu da!');
    }
}
