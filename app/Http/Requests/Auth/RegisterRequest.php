<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'nome',
            'email' => 'email',
            'password' => 'senha',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo nome é obrigatório',
            'name.max:255' => 'O campo nome ultrapassa o limite de 255 caracteres',
            'name.min:3' => 'O campo nome precisa no mínimo de 3 caracteres',

            'email.required' => 'O campo email é obrigatório',
            'email.email' => 'O campo email é inválido',
            'email.unique:users' => 'O campo email já existe nos registros',

            'password.required' => 'O campo senha é obrigatório',
            'password.min:6' => 'O campo senha precisa ter no mínimo 6 caracteres',
            'password.confirmed' => 'O campo senha precisa ser identica ao campo confirmação de senha',
        ];
    }
}
