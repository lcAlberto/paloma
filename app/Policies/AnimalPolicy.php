<?php

namespace App\Policies;

use App\Models\Animal;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class AnimalPolicy
{
    use HandlesAuthorization;

    public function listAnimals(User $user)
    {
        return Auth::user()->farm_id !== null;
    }

    public function viewAnimal(User $user, Animal $animal)
    {
        return $user->farm_id === $animal->farm()->get()->first()->id;
    }

    public function createAnimal(User $user)
    {
        return Auth::user()->farm_id !== null;
    }

    public function updateAnimal(User $user, Animal $animal)
    {
        return $user->farm_id === $animal->farm()->get()->first()->id;
    }

    public function deleteAnimal(User $user, Animal $animal)
    {
        return $user->farm_id === $animal->farm()->get()->first()->id;
    }

    public function restore(User $user, Animal $animal)
    {
        return $user->farm_id === $animal->farm()->get()->first()->id;
    }

    public function forceDelete(User $user, Animal $animal)
    {
        return $user->farm_id === $animal->farm()->get()->first()->id;
    }
}
