<?php

namespace App\Http\Requests\Stages;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class PassportFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'passport_serial'  => 'required',
            'passport_number'  => 'required',
            'issue_date'       => 'required',
            'unit_code'        => 'required',
            'issue'            => 'required',
            'birth_place'      => 'required'
        ];
    }
    public function messages(): array
    {
        return [
            'passport_serial.required' => 'Серия обязательна к заполнению',
            'passport_number.required' => 'Номер обязателен к заполнению',
            'issue_date.required' => 'Дата выдачи обязательна к заполнению',
            'unit_code.required' => 'Код подразделения обязателен к заполнению',
            'issue.required' => 'Кем выдан обязателено к заполнению',
            'birth_place.required' => 'Место рождения обязателено к заполнению'
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors()->first(), 422));
    }
}
