<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnimalRequest;
use App\Models\Models\Animal;
use App\Models\Models\Farm;
use App\Services\ExceptionHandler;
use Illuminate\Support\Facades\Auth;

class AnimalController extends Controller
{

    protected $exceptions;

    public function __construct(ExceptionHandler $exceptions)
    {
        try {
            $this->exceptions = $exceptions;
        } catch (\Exception $exception) {
            return $this->exceptions->getExceptions($exception);
        }
    }

    public function index(Farm $farm)
    {
        return $farm->animals;
    }

    public function store(AnimalRequest $request, Farm $farm)
    {
        try {
            $data = $request->validated();
            $authFarm = $farm->find(Auth::user()->farm_id);

            if ($authFarm) {
                $data['farm_id'] = $authFarm->id;

                $animal = Animal::create($data);

                return response()->json($animal, 201);
            }

            return response()->json(['message' => 'Farm not found'], 404);
        } catch (\Exception $exception) {
            return $this->exceptions->getExceptions($exception);
        }
    }

    public function show(Farm $farm, Animal $animal)
    {
        try {
            return $animal;
        } catch (\Exception $exception) {
            return $this->exceptions->getExceptions($exception);
        }
    }

    public function update(AnimalRequest $request, Farm $farm, Animal $animal)
    {
        try {
            $data = $request->validated();
            $authFarm = $farm->find(Auth::user()->farm_id);

            if ($authFarm) {
                $data['farm_id'] = $authFarm->id;

                $animal->update($data);

                return response()->json($animal, 200);
            }

            return response()->json(['message' => 'Farm not found'], 404);
        } catch (\Exception $exception) {
            return $this->exceptions->getExceptions($exception);
        }

    }

    public function destroy(Farm $farm, Animal $animal)
    {
        try {
            $animal->delete();
            return response()->json(null, 204);
        } catch (\Exception $exception) {
            return $this->exceptions->getExceptions($exception);
        }
    }
}
