<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGuestRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'sometimes|nullable|email|unique:guests,email|max:255',
            'phone' => 'required|string|unique:guests,phone|max:20|regex:/^\+?([1-9]\d{0,2})[\s.-]?(\d{1,4})[\s.-]?(\d{7,15})$/',
            'country' => 'sometimes|nullable|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'Имя обязательно для заполнения.',
            'last_name.required' => 'Фамилия обязательна для заполнения.',
            'email.unique' => 'Этот email уже зарегистрирован.',
            'phone.required' => 'Телефон обязателен для заполнения.',
            'phone.regex' => 'Недопустимый формат номера телефона.',
            'phone.max' => 'Номер телефона не может быть длиннее 20 символов.',
        ];
    }
}
