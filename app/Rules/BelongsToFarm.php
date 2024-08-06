<?php

namespace App\Rules;

use App\Models\Animal;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class BelongsToFarm implements Rule
{
    protected $farmId;

    public function __construct()
    {
        $this->farmId = Auth::user()->farm_id;
    }

    public function passes($attribute, $value)
    {
        return Animal::where('id', $value)->where('farm_id', $this->farmId)->exists();
    }

    public function message()
    {
        return ':attribute não pertence a sua fazenda.';
    }
}
