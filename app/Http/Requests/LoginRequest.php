<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'password' => 'required|string|min:4',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'O e-mail é obrigatório.',
            'email.email' => 'O e-mail deve ser um endereço de e-mail válido.',

            'password.required' => 'A senha é obrigatória.',
            'password.string' => 'A senha deve ser uma string válida.',
        ];
    }
}
