<?php

namespace App\Rules;

use App\Enums\AnimalClassEnum;
use App\Enums\AnimalSexEnum;
use App\Enums\AnimalStatusEnum;
use App\Models\Animal;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class AnimalSuitableForReproductionInToTheFarm implements Rule
{
    protected $farmId;

    public function __construct()
    {
        $this->farmId = Auth::user()->farm_id;
    }

    public function passes($attribute, $value)
    {
        $productiveClassifications = [
            AnimalClassEnum::BULL_REPRODUCTIVE,
            AnimalClassEnum::COW_LACTATING,
            AnimalClassEnum::COW_NON_LACTATING
        ];

        return Animal::where('farm_id', $this->farmId)
        ->whereIn('classification', $productiveClassifications)
        ->where('status', '<>', AnimalStatusEnum::DEAD)
        ->orWhere('status', '<>', AnimalStatusEnum::SOLD)
        ->exists();
    }

    public function message()
    {
        return ':attribute não é apto a reprodução ou está indisponível.';
    }
}
