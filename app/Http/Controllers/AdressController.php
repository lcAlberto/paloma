<?php

namespace App\Http\Controllers;

use App\Http\Requests\Address\AddressRequest;
use App\Models\Farm;
use App\Models\Models\Address\Address;
use App\Models\Models\Address\City;
use App\Models\Models\Address\Country;
use App\Models\Models\Address\State;
use Illuminate\Http\Request;
use App\Services\ExceptionHandler;
use Illuminate\Support\Facades\Auth;

class AdressController extends Controller
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

    public function index()
    {
        try {
            $this->authorize('viewAddressAny', Address::class);

            $farmId = Auth::user()->farm_id;
            $adress = Address::where('farm_id', $farmId)->get();
            return response()->json($adress);
        } catch (\Exception $exception) {
            return $this->exceptions->getExceptions($exception);
        }
    }

    public function store(AddressRequest $request, Farm $farm)
    {
        try {
            // $this->authorize('createAddress', Address::class);

            $data = $request->validated();
            $address = Address::create($data);

            return response()->json([
                'message' => 'Endereço criado!',
                'address'=> $address,
            ], 201);
        } catch (\Exception $exception) {
            return $this->exceptions->getExceptions($exception);
        }
    }


    public function show(Address $address)
    {
        try {
            $this->authorize('viewAddress', $address);
            $address->load('farms');
                return response()->json($address);
        } catch (\Exception $exception) {
            return $this->exceptions->getExceptions($exception);
        }
    }

    public function update(AddressRequest $request, Address $address)
    {
        try {
            $this->authorize('updateAddress', $address);

            $data = $request->validated();
            $address->update($data);

            return response()->json([
                'message' => 'Endereço atualizado!',
                'address' => $address,
            ], 201);
        } catch (\Exception $exception) {
            return $this->exceptions->getExceptions($exception);
        }
    }

    public function destroy(Address $address)
    {
        try {
            $this->authorize('deleteAddress', $address);

            $address->delete();
            return response()->json(['message' => 'sucess'], 200);
        } catch (\Exception $exception) {
            return $this->exceptions->getExceptions($exception);
        }
    }

    public function fetchCountries () {
        try {
            $countries = Country::all();
            return response()->json([
                'message' => 'sucess',
                'countries' => $countries
            ], 200);
        }
        catch (\Exception $exception) {
            return $this->exceptions->getExceptions($exception);
        }
    }

    public function fetchStates(Country $country, State $state)
    {
        try {
            $states = $states = $state->where('country_id', $country->id)->get();
            return response()->json([
                'message' => 'sucess',
                'states' => $states
            ], 200);
        } catch (\Exception $exception) {
            return $this->exceptions->getExceptions($exception);
        }
    }

    public function fetchCities(State $state, City $city)
    {
        try {
            $cities = $city->where('state_id', $state->id)
            ->get();
            return response()->json([
                'message' => 'sucess',
                'cities' => $cities,
            ], 200);
        } catch (\Exception $exception) {
            return $this->exceptions->getExceptions($exception);
        }
    }
}
