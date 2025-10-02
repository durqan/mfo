<?php

namespace App\Http\Requests\Stages;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AddressFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'reg_region' => 'required',
            'reg_city' => 'required',
            'reg_street' => 'required',
            'reg_house' => 'required',
            'fakt_region' => 'required',
            'fakt_city' => 'required',
            'fakt_street' => 'required',
            'fakt_house' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'reg_region.required' => 'Регион регистрации обязателен к заполнению',
            'reg_city.required' => 'Город регистрации обязателен к заполнению',
            'reg_street.required' => 'Улица регистрации обязательна к заполнению',
            'reg_house.required' => 'Дом регистрации обязателен к заполнению',
            'fakt_region.required' => 'Регион проживания обязателен к заполнению',
            'fakt_city.required' => 'Город проживания обязателен к заполнению',
            'fakt_street.required' => 'Улица проживания обязательна к заполнению',
            'fakt_house.required' => 'Дом проживания обязателен к заполнению'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors()->first(), 422));
    }
}
