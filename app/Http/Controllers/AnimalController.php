<?php

namespace App\Http\Controllers;

use App\Models\Models\Animal;
use App\Models\Models\Farm;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function index(Farm $farm)
    {
        return $farm->animais;
    }

    public function store(Request $request, Farm $farm)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'numero' => 'required|string|unique:animals,numero',
            'data_nascimento' => 'required|date',
        ]);

        $animal = $farm->animais()->create($request->all());

        return response()->json($animal, 201);
    }

    public function show(Farm $farm, Animal $animal)
    {
        return $animal;
    }

    public function update(Request $request, Farm $farm, Animal $animal)
    {
        $request->validate([
            'nome' => 'string|max:255',
            'numero' => 'string|unique:animals,numero,' . $animal->id,
            'data_nascimento' => 'date',
        ]);

        $animal->update($request->all());

        return response()->json($animal, 200);
    }

    public function destroy(Farm $farm, Animal $animal)
    {
        $animal->delete();

        return response()->json(null, 204);
    }
}
