<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ErabiltzaileakController extends Controller
{
    public function index()
    {
        $erabiltzaileak = User::all();

        //return view('erabiltzaileak', ['erabiltzaileak' => $erabiltzaileak]);
        return response()->json($erabiltzaileak);
    }

    public function create()
    {
        return view('erabiltzaileak.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'abizena' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'telefonoa' => 'required|string|unique:users,telefonoa|min:9|max:9',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create($request->all());

        //return redirect()->route('erabiltzaileak')->with('success', 'Erabiltzailea ongi gehitu da!');
        return response()->json([
            'mezua' => 'Erabiltzailea ongi gehitu da!',
            'jasotako_datuak' => $request->all()
        ], 201);
    }

    public function show($id)
    {
        $erabiltzailea = User::findOrFail($id);

        //return view('erabiltzaileak.show', ['erabiltzailea' => $erabiltzailea]);
        return response()->json($erabiltzailea);
    }

    public function edit($id)
    {
        $erabiltzailea = User::findOrFail($id);

        return view('erabiltzaileak.edit', ['erabiltzailea' => $erabiltzailea]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'abizena' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'telefonoa' => 'required|string||min:9|max:9|unique:users,telefonoa,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $erabiltzailea = User::findOrFail($id);

        $data = $request->all();
        if (!$request->filled('password')) {
            unset($data['password']);
        }

        $erabiltzailea->update($data);

        //return redirect()->route('erabiltzaileak')->with('success', 'Erabiltzailea ongi editatu da!');
        return response()->json([
            'status' => 'success',
            'mezua' => 'Erabiltzailea ' . $id . ' ongi editatu da!',
            'jasotako_datuak' => $request->all()
        ], 200);
    }

    public function destroy($id)
    {
        User::destroy($id);

        //return redirect()->route('erabiltzaileak')->with('success', 'Erabiltzailea ongi ezabatu da!');
        return response()->json([
            'status' => 'success',
            'mezua' => 'Erabiltzailea ' . $id . ' ongi ezabatu da!'
        ], 200);
    }
}
