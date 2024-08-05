<?php

namespace App\Http\Controllers;

use App\Enums\AnimalHeatStatusEnum;
use App\Http\Requests\BreedingRequest;
use App\Models\Models\Animal;
use App\Models\Models\BreedingRecord;
use App\Services\ExceptionHandler;
use App\Services\PredictBirthService;
use Illuminate\Support\Facades\Auth;

class BreedingRecordController extends Controller
{
    protected $predictBirthService;
    protected $exceptions;

    public function __construct(PredictBirthService $predictBirthService, ExceptionHandler $exceptions)
    {
        $this->predictBirthService = $predictBirthService;
        $this->exceptions = $exceptions;
    }

    public function index()
    {
        try {
            $matings = BreedingRecord::with(['female', 'male'])->get();
            return response()->json($matings);
        } catch (\Exception $exception) {
            return $this->exceptions->getExceptions($exception);
        }
    }

    public function store(BreedingRequest $request)
    {
        $data = $request->validated();
        if (!array_key_exists('date_birth', $data) || ($data['status'] === AnimalHeatStatusEnum::PENDING)) {
            $data = $this->predictBirthService->birthPrediction($data);
        }
        $data = $this->predictBirthService->dateHandling($data);

        $breedingRecord = BreedingRecord::create($data);
        return response()->json($breedingRecord, 201);
    }

    public function show(BreedingRecord $breedingRecord)
    {
        try {
            return response()->json($breedingRecord);
        } catch (\Exception $exception) {
            return $this->exceptions->getExceptions($exception);
        }
    }

    public function update(BreedingRequest $request, BreedingRecord $BreedingRecord)
    {
        try {
            $data = $request->validated();

            if (!array_key_exists('date_birth', $data) || ($data['status'] === AnimalHeatStatusEnum::PENDING)) {
                $data = $this->predictBirthService->birthPrediction($data);
            }
            $data = $this->predictBirthService->dateHandling($data);
            if (array_key_exists('date_birth', $data) && !array_key_exists('status', $data)) {
                $data['status'] = AnimalHeatStatusEnum::SUCCESS;
            }

            $BreedingRecord->update($data);

            $female = Animal::find($data['female_id']);
            $BreedingRecord->female()->associate($female);

            if ($data['male_id']) {
                $male = Animal::find($data['male_id']);
                $BreedingRecord->male()->associate($male);
            }

            return response()->json(['success' => true, 'data' => $BreedingRecord->get()->first()], 200);
        } catch (\Exception $exception) {
            return $this->exceptions->getExceptions($exception);
        }
    }

    public function destroy(BreedingRecord $breedingRecord)
    {
        try {
            $breedingRecord->delete();
            return response()->json(null, 204);
        } catch (\Exception $exception) {
            return $this->exceptions->getExceptions($exception);
        }
    }
}
