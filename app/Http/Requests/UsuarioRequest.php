<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:4',
        ];
    }

    public function messages()
    {
        return [
            'usu_name.required' => 'O nome é obrigatório.',
            'usu_name.string' => 'O nome deve ser uma string válida.',
            'usu_name.min' => 'O nome deve ter pelo menos 3 caracteres.',
            'usu_name.max' => 'O nome não pode ter mais de 255 caracteres.',

            'usu_email.required' => 'O e-mail é obrigatório.',
            'usu_email.email' => 'O e-mail deve ser um endereço de e-mail válido.',
            'usu_email.unique' => 'Este e-mail já está em uso.',

            'password.required' => 'A senha é obrigatória.',
            'password.string' => 'A senha deve ser uma string válida.',
            'password.min' => 'A senha deve ter pelo menos 4 caracteres.',
        ];
    }
}
