<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|string|email|max:255|exists:users,email',
            'password' => 'required|string|min:6',
        ];
    }

    public function attributes()
    {
        return [
            'email' => 'email',
            'password' => 'senha',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'O campo email é obrigatório',
            'email.email' => 'O campo email é inválido',
            'email.unique:users' => 'O campo email já existe nos registros',
            'email.exists:users,email' => 'Email não encontrado',

            'password.required' => 'O campo senha é obrigatório',
            'password.min:6' => 'O campo senha precisa ter no mínimo 6 caracteres',
            'password.confirmed' => 'O campo senha precisa ser identica ao campo confirmação de senha',
        ];
    }
}
