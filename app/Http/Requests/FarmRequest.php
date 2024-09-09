<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FarmRequest extends FormRequest
{

    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            'name' => 'required|string|unique:farms,name',
            'address_id' => ['required', 'exists:addresses,id', $this->method() == 'PUT' ? 'sometimes' : 'string'],
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'nome',
            'address_id' => 'endereço',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo nome é obrigatório',
        ];
    }
}
