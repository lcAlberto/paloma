<?php

namespace App\Http\Requests;

use App\Enums\AnimalHeatChildbirthTypeEnum;
use App\Enums\AnimalHeatStatusEnum;
use App\Rules\AnimalSuitableForReproductionInToTheFarm;
use App\Rules\BelongsToFarm;
use Illuminate\Foundation\Http\FormRequest;

class BreedingRequest extends FormRequest
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
            'occurrence_date' => 'required|date',
            'coverage_date' => 'nullable|date',
            'date_birth' => ['nullable', $this->method() == 'PUT' ? 'sometimes' : 'date'],
            'status' => 'string|in:'. implode(',', AnimalHeatStatusEnum::getConstantsValues()),
            'cover_method' => 'required|in:' . implode(',', AnimalHeatChildbirthTypeEnum::getConstantsValues()),
            'female_id' => ['required', 'exists:animals,id', new BelongsToFarm, new AnimalSuitableForReproductionInToTheFarm],
            'male_id' => ['nullable', 'exists:animals,id', new BelongsToFarm, new AnimalSuitableForReproductionInToTheFarm],
        ];
    }

    public function attributes()
    {
        return [
            'occurrence_date' => 'data do cio',
            'coverage_date' => 'data da cobertura',
            'date_birth' => 'data do parto',
            'status' => 'status',
            'cover_method' => 'método utilizado',
            'female_id' => 'fêmea',
            'male_id' => 'macho',
        ];
    }

    public function messages()
    {
        return [
            'occurrence_date.required' => 'O campo data do cio é obrigatório',
            'occurrence_date.date' => 'O campo data do cio deve ser uma data válida',

            'coverage_date.date' => 'O campo data da cobertura deve ser uma data válida',

            'date_birth.date' => 'O campo data do parto deve ser uma data válida',
            'date_birth.sometimes' => 'O campo data é obrigatório',

            'female_id.exists:animals,id' => 'Macho não encontrado',
            'male_id.exists:animals,id' => 'Macho não encontrado',
        ];
    }

}
