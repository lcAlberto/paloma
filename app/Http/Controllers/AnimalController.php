<?php

namespace App\Http\Controllers;

use App\Enums\AnimalClassEnum;
use App\Enums\AnimalSexEnum;
use App\Enums\AnimalStatusEnum;
use App\Http\Requests\AnimalRequest;
use App\Models\Animal;
use App\Models\Farm;
use App\Models\User;
use App\Repositories\AnimalFiltersRepository;
use App\Services\ExceptionHandler;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnimalController extends Controller
{

    protected $exceptions;
    protected $filterRepository;

    public function __construct(ExceptionHandler $exceptions, AnimalFiltersRepository $animalFiltersRepository)
    {
        $this->filterRepository = $animalFiltersRepository;
        try {
            $this->exceptions = $exceptions;
        } catch (Exception $exception) {
            return $this->exceptions->getExceptions($exception);
        }
    }

    public function index(Request $request)
    {
        try {
            $this->authorize('listAnimals', Animal::class);

            $perPage = $request->input('per_page', 3);

            $farmAnimalsQuery = Animal::where('farm_id', Auth::user()->farm_id)
                ->with(['mother', 'father']);

            $filteredQuery = $this->filterRepository->filter($farmAnimalsQuery, [
                'name' => $request->name,
                'code' => $request->code,
                'sex' => $request->sex,
                'classification' => $request->classification,
                'age' => $request->age,
                'born_date' => $request->born_date,
                'born_date_from' => $request->born_date_from,
                'born_date_to' => $request->born_date_to,
                'status' => $request->status,
                'mother_id' => $request->mother_id,
                'father_id' => $request->father_id,
            ]);

            $paginatedAnimals = $filteredQuery->paginate($perPage, ['*'], 'page', $request->input('current_page', 1));

            return response()->json([
                'data' => $paginatedAnimals->items(),
                'pagination' => [
                    'total' => $paginatedAnimals->total(),
                    'per_page' => $paginatedAnimals->perPage(),
                    'current_page' => $paginatedAnimals->currentPage(),
                    'last_page' => $paginatedAnimals->lastPage(),
                ]
            ]);
        } catch (Exception $exception) {
            return $this->exceptions->getExceptions($exception);
        }
    }

    public function store(AnimalRequest $request, Farm $farm)
    {
        try {
            // $this->authorize('createAnimal', Animal::class);

            $data = $request->validated();
            $authFarm = $farm->find(Auth::user()->farm_id);

            if ($authFarm) {
                $data['farm_id'] = $authFarm->id;

                $animal = Animal::create($data);

                return response()->json($animal, 201);
            }

            return response()->json(['message' => 'Farm not found'], 404);
        } catch (Exception $exception) {
            return $this->exceptions->getExceptions($exception);
        }
    }

    public function show(User $user, Animal $animal)
    {
        try {
            $this->authorize('viewAnimal', $animal);

            if ($animal->farm_id === Auth::user()->farm_id) {
                return response()->json($animal);
            }
            return response()->json(['message' => 'Unauthorized'], 403);

        } catch (Exception $exception) {
            return $this->exceptions->getExceptions($exception);
        }
    }

    public function update(AnimalRequest $request, Farm $farm, Animal $animal)
    {
        try {
            $this->authorize('updateAnimal', $animal);

            if ($animal->farm_id != Auth::user()->farm_id) {
                return response()->json(['message' => 'Unauthorized'], 403);
            }

            $data = $request->validated();
            $authFarm = $farm->find(Auth::user()->farm_id);

            if ($authFarm) {
                $data['farm_id'] = $authFarm->id;

                $animal->update($data);

                return response()->json($animal, 200);
            }

            return response()->json(['message' => 'Farm not found'], 404);
        } catch (Exception $exception) {
            return $this->exceptions->getExceptions($exception);
        }

    }

    public function destroy(Farm $farm, Animal $animal)
    {
        try {
            $this->authorize('deleteAnimal', $animal);

            if ($animal->farm_id != Auth::user()->farm_id) {
                return response()->json(['message' => 'Unauthorized'], 403);
            }

            $animal->delete();
            return response()->json(null, 204);
        } catch (Exception $exception) {
            return $this->exceptions->getExceptions($exception);
        }
    }


    public function getAvailableMothers(Request $request)
    {
        try {
            $this->authorize('listAnimals', Animal::class);

            $farmId = Auth::user()->farm_id;
            $mothers = Animal::where('farm_id', $farmId)
                ->where('sex', AnimalSexEnum::FEMEALE)
                ->where('classification', '!=', AnimalClassEnum::SHE_CALVES)
                ->get();

            return response()->json(['mothers' => $mothers]);
        } catch (Exception $exception) {
            return $this->exceptions->getExceptions($exception);
        }
    }

    public function getAvailableFathers(Request $request)
    {
        try {
            $this->authorize('listAnimals', Animal::class);

            $farmId = Auth::user()->farm_id;
            $mothers = Animal::where('farm_id', $farmId)
                ->where('sex', AnimalSexEnum::MALE)
                ->whereNotIn('classification', [AnimalClassEnum::HE_CALVES, AnimalClassEnum::BULL_STEER])
                ->get();

            return response()->json(['fathers' => $mothers]);
        } catch (Exception $exception) {
            return $this->exceptions->getExceptions($exception);
        }
    }

    public function getAvailableFemalesForReproduction(Request $request)
    {
        try {
            $this->authorize('listAnimals', Animal::class);

            $farmId = Auth::user()->farm_id;
            $mothers = Animal::where('farm_id', $farmId)
                ->where('sex', AnimalSexEnum::FEMEALE)
                ->where('classification', '!=', AnimalClassEnum::SHE_CALVES)
                ->where('status', '!=', AnimalStatusEnum::DEAD)
                ->whereDoesntHave('matingsAsFemale')
                ->get();

            return response()->json(['females' => $mothers]);
        } catch (Exception $exception) {
            return $this->exceptions->getExceptions($exception);
        }
    }

    public function getAvailableMalesForReproduction(Request $request)
    {
        try {
            $this->authorize('listAnimals', Animal::class);

            $farmId = Auth::user()->farm_id;
            $mothers = Animal::where('farm_id', $farmId)
                ->where('sex', AnimalSexEnum::MALE)
                ->where('classification', AnimalClassEnum::BULL_REPRODUCTIVE)
                ->where('status', '!=', AnimalStatusEnum::DEAD)
                ->get();

            return response()->json(['males' => $mothers]);
        } catch (Exception $exception) {
            return $this->exceptions->getExceptions($exception);
        }
    }
}
