<?php

use App\Http\Controllers\AdressController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\FarmController;
use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BreedingRecordController;
use App\Http\Controllers\TestNotificationController;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:api');
Route::get('me', [AuthController::class, 'me'])->middleware('auth:api');

Route::group(['middleware' => 'auth:api'], function () {
    Route::apiResource('address', AdressController::class);
    Route::apiResource('farms', FarmController::class);
    Route::apiResource('animals', AnimalController::class);
    Route::apiResource('breeding', BreedingRecordController::class);

    Route::get('/animal/mothers', [AnimalController::class, 'getAvailableMothers']);
    Route::get('/animal/fathers', [AnimalController::class, 'getAvailableFathers']);
    Route::get('/animal/getAvailableFemalesForReproduction', [AnimalController::class, 'getAvailableFemalesForReproduction']);
    Route::get('/animal/getAvailableMalesForReproduction', [AnimalController::class, 'getAvailableMalesForReproduction']);

    Route::post('/password/check', [ProfileController::class, 'checkPassword']);
    Route::put('/profile', [ProfileController::class, 'updatePersonalData']);
    Route::put('/password', [ProfileController::class, 'updatePassword']);

    /* NOTIFICATON TEST*/

    Route::post('/test-notification', [TestNotificationController::class, 'send']);
});

Route::get('countries', [AdressController::class, 'fetchCountries']);
Route::get('states/country/{country}', [AdressController::class, 'fetchStates']);
Route::get('city/state/{state}', [AdressController::class, 'fetchCities']);
