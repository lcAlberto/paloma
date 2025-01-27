<?php

namespace App\Http\Controllers;

use App\Http\Requests\FarmRequest;
use App\Models\Farm;
use App\Models\Models\Address\Address;
use App\Services\ExceptionHandler;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FarmController extends Controller
{

    protected $exceptions;

    public function __construct(ExceptionHandler $exceptions)
    {
        try {
            $this->exceptions = $exceptions;
        } catch (Exception $exception) {
            return $this->exceptions->getExceptions($exception);
        }
    }

    public function index()
    {
        try {
            return Farm::all();
        } catch (Exception $exception) {
            return $this->exceptions->getExceptions($exception);
        }
    }

    public function store(FarmRequest $request)
    {
        try {

            $farm = Farm::create($request->validated());

            $user = Auth::user();
            $user->farm_id = $farm->id;
            $user->save();

            if (isset($request['address_id'])) {
                $address = Address::find($request['address_id']);
                if ($address) {
                    $address->farm_id = $farm->id;
                    $address->save();
                }
            }


            $farm->load('address');

            return response()->json([
                'farm' => $farm,
            ], 201);
        } catch (Exception $exception) {
            return $this->exceptions->getExceptions($exception);
        }
    }

    public function show(Farm $farm)
    {
        try {
            $farm->load('address');

            return $farm;
        } catch (Exception $exception) {
            return $this->exceptions->getExceptions($exception);
        }
    }

    public function update(FarmRequest $request, Farm $farm)
    {
        try {
            $user = Auth::user();

            $farm->update($request->validated());
            if ($request->address_id) {
                $address = Address::find($request->address_id);
                $address->farm_id = $farm->id;
                $address->save();
            }

            $farm->load('address');

            return response()->json([
                'data' => $farm,
            ], 200);
        } catch (Exception $exception) {
            return $this->exceptions->getExceptions($exception);
        }
    }

    public function destroy(Farm $farm)
    {
        try {
            $farm->delete();
            return response()->json(['message' => 'sucess'], 200);
        } catch (Exception $exception) {
            return $this->exceptions->getExceptions($exception);
        }
    }
}
