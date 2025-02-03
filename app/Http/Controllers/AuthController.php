<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use Exception;
use Illuminate\Http\Request;
use App\Models\User;
use App\Services\ExceptionHandler;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Tymon\JWTAuth\Facades\JWTAuth;


class AuthController extends Controller
{

    protected $exceptions;

    public function __construct(ExceptionHandler $exceptions)
    {
        $this->exceptions = $exceptions;
    }

    public function register(RegisterRequest $request)
    {
        try {
            $data = $request->validated();
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);

            $token = JWTAuth::fromUser($user);

            return response()->json(compact('user', 'token'), 201);
        } catch (Exception $exception) {
            return $this->exceptions->getExceptions($exception);
        }
    }

    public function login(LoginRequest $request)
    {
        try {
            $credentials = $request->only('email', 'password');

            if (!$token = Auth::attempt($credentials)) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }
            $user = Auth::user();
            $user['image'] = Storage::disk('s3')->url('personalProfiles/' . $user['image']);

            return response()->json(['token' => $token, 'user' => $user]);
        } catch (Exception $exception) {
            return $this->exceptions->getExceptions($exception);
        }
    }

    public function logout()
    {
        try {
            Auth::logout();
            return response()->json(['message' => 'Successfully logged out']);
        } catch (Exception $exception) {
            return $this->exceptions->getExceptions($exception);
        }
    }

    public function me()
    {
        try {
            $user = Auth::user();
            $user['image'] = Storage::disk('s3')->url('personalProfiles/' . $user->image);
            $user['image'] = str_replace("paloma/", "", $user->image);
            return response()->json($user);
        } catch (Exception $exception) {
            return $this->exceptions->getExceptions($exception);
        }
    }
}
