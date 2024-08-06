<?php

namespace App\Http\Requests;

use App\Enums\AnimalClassEnum;
use App\Enums\AnimalSexEnum;
use App\Enums\AnimalStatusEnum;
use Illuminate\Foundation\Http\FormRequest;

class AnimalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['string', 'max:255', 'min:3', $this->method() == 'PUT' ? 'sometimes' : 'unique:animals,name'],
            'code' => ['string', $this->method() == 'PUT' ? 'sometimes' : 'unique:animals,code'],
            'sex' => 'string|in:' . implode(',', AnimalSexEnum::getConstantsValues()),
            'classification' => 'string|in:' . implode(',', AnimalClassEnum::getConstantsValues()),
            'status' => 'string|in:' . implode(',', AnimalStatusEnum::getConstantsValues()),
            'breed' => 'nullable|string',
            'image' => 'nullable|string',
            'born_date' => 'required|date',
            'father_id' => 'nullable|exists:animals,id',
            'mother_id' => 'nullable|exists:animals,id',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'name',
            'code' => 'codigo/número',
            'sex' => 'sexo',
            'breed' => 'raça',
            'born_date' => 'data de nascimento',
            'female_id' => 'fêmea/mãe',
            'male_id' => 'macho/pai',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo nome é obrigatório',
            'name.unique' => 'O campo nome deve ser único',

            'code.required' => 'O campo código é obrigatório',
            'code.unique' => 'O campo código deve ser obrigatório',

            'sex.required' => 'O campo sexo é obrigatório',

            'born_date.required' => 'O campo Data de Nascimento é obrigatório',
            
            'father_id.exists:animals,id' => 'Macho não encontrado',
            'mother_id.exists:animals,id' => 'Macho não encontrado',
        ];
    }
}
