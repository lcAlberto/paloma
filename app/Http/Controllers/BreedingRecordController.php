<?php

namespace App\Http\Controllers;

use App\Enums\AnimalHeatStatusEnum;
use App\Http\Requests\BreedingRequest;
use App\Models\Animal;
use App\Models\BreedingRecord;
use App\Models\User;
use App\Repositories\BreedingFiltersRepository;
use App\Services\ExceptionHandler;
use App\Services\PredictBirthService;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BreedingRecordController extends Controller
{
    protected $predictBirthService;
    protected $exceptions;
    protected $filterRepository;

    public function __construct(PredictBirthService $predictBirthService, ExceptionHandler $exceptions, BreedingFiltersRepository $breedingFiltersRepository)
    {
        $this->predictBirthService = $predictBirthService;
        $this->exceptions = $exceptions;
        $this->filterRepository = $breedingFiltersRepository;
    }

    public function index(BreedingRecord $breedingRecord, Request $request)
    {
        try {
            $this->authorize('viewAny', BreedingRecord::class);

            $perPage = $request->input('per_page', 3);

            $farmId = Auth::user()->farm_id;
            $farmBreedings = BreedingRecord::whereHas('female', function ($query) use ($farmId) {
                $query->where('farm_id', $farmId);
            })->with(['female', 'male']);

            $breedingsFiltered = $this->filterRepository->filter($farmBreedings, [
                'occurrence_date' => $request->occurrence_date,
                'coverage_date' => $request->coverage_date,
                'date_birth_prediction' => $request->date_birth_prediction,
                'date_birth' => $request->date_birth,
                'status' => $request->status,
                'cover_method' => $request->cover_method,
                'female_id' => $request->female_id,
                'male_id' => $request->male_id,
            ]);

            $paginatedBreedings = $breedingsFiltered->paginate($perPage, ['*'], 'page', $request->input('current_page', 1));

            return response()->json([
                'data' => $paginatedBreedings->items(),
                'pagination' => [
                    'total' => $paginatedBreedings->total(),
                    'per_page' => $paginatedBreedings->perPage(),
                    'current_page' => $paginatedBreedings->currentPage(),
                    'last_page' => $paginatedBreedings->lastPage(),
                ]
            ]);
        } catch (Exception $exception) {
            return $this->exceptions->getExceptions($exception);
        }
    }

    public function store(BreedingRequest $request)
    {
        $this->authorize('create', BreedingRecord::class);

        $data = $request->validated();
        if (!array_key_exists('date_birth', $data) || ($data['status'] === AnimalHeatStatusEnum::PENDING)) {
            $data = $this->predictBirthService->birthPrediction($data);
        }
        $data = $this->predictBirthService->dateHandling($data);

        $breedingRecord = BreedingRecord::create($data);
        return response()->json(['breeding' => $breedingRecord], 201);
    }

    public function show(BreedingRecord $model, $id)
    {
        try {
            $breedingRecord = $model->find($id);
            $this->authorize('view', $breedingRecord);

            if (Auth::user()->farm_id === $breedingRecord->female->farm_id) {
                return response()->json(['breeding' => $breedingRecord]);
            }
            return response()->json(['message' => 'Unauthorized'], 403);

        } catch (Exception $exception) {
            return $this->exceptions->getExceptions($exception);
        }
    }

    public function update(BreedingRequest $request, BreedingRecord $model, $id)
    {
        try {
            $breedingRecord = $model->find($id);
            $this->authorize('update', $breedingRecord);

            $data = $request->validated();

            if (!array_key_exists('date_birth', $data) || ($data['status'] === AnimalHeatStatusEnum::PENDING)) {
                $data = $this->predictBirthService->birthPrediction($data);
            }
            $data = $this->predictBirthService->dateHandling($data);
            if (array_key_exists('date_birth', $data) && !array_key_exists('status', $data)) {
                $data['status'] = AnimalHeatStatusEnum::SUCCESS;
            }

            $breedingRecord->update($data);

            $female = Animal::find($data['female_id']);
            $breedingRecord->female()->associate($female);

            if ($data['male_id']) {
                $male = Animal::find($data['male_id']);
                $breedingRecord->male()->associate($male);
            }

            return response()->json(['success' => true, 'breeding' => $breedingRecord->get()->first()], 200);
        } catch (Exception $exception) {
            return $this->exceptions->getExceptions($exception);
        }
    }

    public function destroy(BreedingRecord $breedingRecord)
    {
        try {
            $this->authorize('delete', $breedingRecord);

            $breedingRecord->delete();
            return response()->json(null, 204);
        } catch (Exception $exception) {
            return $this->exceptions->getExceptions($exception);
        }
    }
}
