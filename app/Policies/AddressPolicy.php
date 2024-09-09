<?php

namespace App\Policies;

use App\Models\Farm;
use App\Models\Models\Address\Address;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class AddressPolicy
{
    use HandlesAuthorization;

    public function viewAddressAny(User $user)
    {
        return Auth::user()->farm_id !== null;
    }

    public function viewAddress(User $user, Address $address)
    {        
        return $address->farm_id === Auth::user()->farm_id;
    }

    public function createAddress(User $user, Address $address)
    {
        return $address->farm_id === Auth::user()->farm_id;    }

    public function updateAddress(User $user, Address $address)
    {
        return $address->farm_id === Auth::user()->farm_id;    }

    public function deleteAddress(User $user, Address $address)
    {
        return $address->farm_id === Auth::user()->farm_id;
    }

    public function restoreAddress(User $user, Address $address)
    {
        return $address->farm_id === Auth::user()->farm_id;
    }

    public function forceDeleteAddress(User $user, Address $address)
    {
        return $address->farm_id === Auth::user()->farm_id;
    }
}
