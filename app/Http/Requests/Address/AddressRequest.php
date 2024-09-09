<?php

namespace App\Http\Requests\Address;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
            'country_id' => 'required|exists:countries,id',
            'state_id' => 'required|exists:states,id',
            'city_id' => 'required|exists:cities,id',
            'street' => 'required|string|required',
            'zipcode' => 'required|string|min:8',
        ];
    }

    public function attributes()
    {
        return [
            'country_id' => 'país',
            'state_id' => 'estado',
            'street' => 'rua e número',
            'city_id' => 'cidade',
            'zipcode' => 'cep ou codigo postal',
        ];
    }
}
