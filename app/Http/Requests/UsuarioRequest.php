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
            'usu_nome' => 'required|string|min:3|max:255',
            'usu_email' => 'required|email|unique:users,email',
            'usu_senha' => 'required|string|min:4|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'usu_nome.required' => 'O nome é obrigatório.',
            'usu_nome.string' => 'O nome deve ser uma string válida.',
            'usu_nome.min' => 'O nome deve ter pelo menos 3 caracteres.',
            'usu_nome.max' => 'O nome não pode ter mais de 255 caracteres.',

            'usu_email.required' => 'O e-mail é obrigatório.',
            'usu_email.email' => 'O e-mail deve ser um endereço de e-mail válido.',
            'usu_email.unique' => 'Este e-mail já está em uso.',

            'usu_senha.required' => 'A senha é obrigatória.',
            'usu_senha.string' => 'A senha deve ser uma string válida.',
            'usu_senha.min' => 'A senha deve ter pelo menos 4 caracteres.',
            'usu_senha.confirmed' => 'As senhas não coincidem.',
        ];
    }
}
