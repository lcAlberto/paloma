<?php

namespace App\Policies;

use App\Models\Animal;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AnimalPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, Animal $animal)
    {
        return $user->farm_id === $animal->farm_id;
    }

    public function create(User $user)
    {
        return true;
    }

    public function update(User $user, Animal $animal)
    {
        return $user->farm_id === $animal->farm_id;
    }

    public function delete(User $user, Animal $animal)
    {
        return $user->farm_id === $animal->farm_id;
    }

    public function restore(User $user, Animal $animal)
    {
        //
    }

    public function forceDelete(User $user, Animal $animal)
    {
        //
    }
}
