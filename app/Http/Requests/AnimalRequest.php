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
            'name' => ['required', 'string', 'max:255', 'min:3', $this->method() == 'PUT' ? 'sometimes' : 'unique:animals,name'],
            'code' => ['required', 'string', $this->method() == 'PUT' ? 'sometimes' : 'unique:animals,code'],
            'sex' => 'required|string|in:' . implode(',', AnimalSexEnum::getConstantsValues()),
            'classification' => 'required|string|in:' . implode(',', AnimalClassEnum::getConstantsValues()),
            'status' => 'required|string|in:' . implode(',', AnimalStatusEnum::getConstantsValues()),
            'breed' => 'required|nullable|string',
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

            'classification.required' => 'O campo classificação é obrigatório',

            'status.required' => 'O campo status é obrigatório',

            'breed.required' => 'O campo raça é obrigatório',

            'born_date.required' => 'O campo Data de Nascimento é obrigatório',
            
            'father_id.exists:animals,id' => 'Macho não encontrado',
            'mother_id.exists:animals,id' => 'Macho não encontrado',
        ];
    }
}
