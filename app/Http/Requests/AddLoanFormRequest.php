<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AddLoanFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'sum' => 'required|integer|min:1000|max:30000',
            'days' => 'required|integer|min:1|max:21',
            'password' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'sum.required' => 'Обязательно укажите сумму займа',
            'days.required' => 'Обязательно укажите срок займа',
            'password.required' => 'Обязательно укажите пароль',
            'sum.min' => 'Минимальная сумма займа - 1000р',
            'sum.max' => 'Максимальная сумма займа - 30000р',
            'days.min' => 'Минимальная срок займа - 1 день',
            'days.max' => 'Максимальная срок займа - 21 день'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors()->first(), 422));
    }
}
