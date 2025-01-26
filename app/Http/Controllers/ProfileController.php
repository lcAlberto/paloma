<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordUpdateRequest;
use App\Http\Requests\ProfileRequest;
use App\Models\User;
use App\Services\ExceptionHandler;
use Dotenv\Exception\ValidationException;
use Exception;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
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

    public function getExceptions(Exception $exception)
    {
        if ($exception instanceof ValidationException) {
            if (request()->ajax() || request()->wantsJson()) {
                $errors = $exception->validator->getMessageBag();
                return response()->json(['error' => $errors], 422);
            }
            return redirect()->back()->withInput()->withErrors($exception->validator->getMessageBag());
        } else {
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }

    public function updatePersonalData(ProfileRequest $request, User $user)
    {
        try {
            $data = $request->validated();
            $user->update($data);
            return response()->json([
                'user' => $user,
            ], 201);
        } catch (Exception $exception) {
            return $this->exceptions->getExceptions($exception);
        }

    }

    public function checkPassword(PasswordUpdateRequest $request, User $user)
    {
        try {
            $user = auth()->user();

            if (!Hash::check($request->current_password, $user->password)) {
                return response()->json([
                    'message' => 'A senha atual está incorreta.',
                ], 422);
            }

            return response()->json([
                'message' => 'Senha correta!',
            ], 200);
        } catch (Exception $exception) {
            return $this->exceptions->getExceptions($exception);
        }
    }

    public function updatePassword(PasswordUpdateRequest $request, User $user)
    {
        try {
            $user = auth()->user();

            if (!Hash::check($request->current_password, $user->password)) {
                return response()->json([
                    'message' => 'A senha atual está incorreta.',
                ], 422);
            }

            $user->update([
                'password' => Hash::make($request->new_password),
            ]);

            return response()->json([
                'message' => 'Senha atualizada com sucesso!',
            ], 200);
        } catch (Exception $exception) {
            return $this->exceptions->getExceptions($exception);
        }

    }
}
