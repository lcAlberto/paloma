<?php

namespace App\Http\Controllers;

use App\Models\Models\Farm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FarmController extends Controller
{
    public function index()
    {
        return Farm::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        $farm = Farm::create($request->all());

        // Relacionar o usuário logado com a Farm criada
        $user = Auth::user();
        $user->fazenda_id = $farm->id;
        $user->save();

        return response()->json($farm, 201);
    }

    public function show(Farm $farm)
    {
        return $farm;
    }

    public function update(Request $request, Farm $farm)
    {
        $request->validate([
            'nome' => 'string|max:255',
        ]);

        $farm->update($request->all());

        return response()->json($farm, 200);
    }

    public function destroy(Farm $farm)
    {
        $farm->delete();

        return response()->json(null, 204);
    }
}
