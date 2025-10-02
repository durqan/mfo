<?php

namespace App\Http\Requests\Stages;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ContactsFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'firstname' => 'required|max:255',
            'lastname'  => 'required|max:255',
            'birth_date'  => 'required',
            'email'     => 'required|email|max:255',
            'phone'     => 'required|max:11',
        ];
    }
    public function messages(): array
    {
        return [
            'firstname.required' => 'Имя обязательно к заполнению',
            'firstname.max' => 'Имя не должно быть более 255 символов',
            'lastname.required' => 'Фамилия обязательно к заполнению',
            'lastname.max' => 'Фамилия не должно быть более 255 символов',
            'birth_date.required' => 'Дата рождения обязательна к заполнению',
            'email.email' => 'Не верный формат почты',
            'email.required' => 'Почта обязательна к заполнению',
            'email.max' => 'Почта не должна быть более 255 символов',
            'phone.required' => 'Телефон обязателен к заполнению',
            'phone.max' => 'Телефон не должен быть более 11 символов'
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors()->first(), 422));
    }
}
