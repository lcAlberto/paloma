<?php

namespace App\Policies;

use App\Models\Animal;
use App\Models\BreedingRecord;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class BreedingRecordPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, BreedingRecord $breedingRecord)
    {
        $female = $breedingRecord->female()->get()->first();
        return $female->farm_id === Auth::user()->farm_id;
    }

    public function create(User $user)
    {
        return true;
    }

    public function update(User $user, BreedingRecord $breedingRecord)
    {
        return $user->farm_id === $breedingRecord->female->farm_id;
    }

    public function delete(User $user, BreedingRecord $breedingRecord)
    {
        return $user->farm_id === $breedingRecord->female->farm_id;
    }

    public function restore(User $user, BreedingRecord $breedingRecord)
    {
        //
    }

    public function forceDelete(User $user, BreedingRecord $breedingRecord)
    {
        //
    }
}
