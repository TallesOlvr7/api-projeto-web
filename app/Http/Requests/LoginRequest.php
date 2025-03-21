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
            'usu_email' => 'required|email|unique:users,email',
            'usu_senha' => 'required|string|min:4',
        ];
    }

    public function messages(): array
    {
        return [
            'usu_email.required' => 'O e-mail é obrigatório.',
            'usu_email.email' => 'O e-mail deve ser um endereço de e-mail válido.',

            'usu_senha.required' => 'A senha é obrigatória.',
            'usu_senha.string' => 'A senha deve ser uma string válida.',
        ];
    }
}
