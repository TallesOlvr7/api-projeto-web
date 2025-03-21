<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriaRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'cat_nome' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'usu_nome.required' => 'O nome é obrigatório.',
            'usu_nome.string' => 'O nome deve ser uma string válida.',
            'usu_nome.max' => 'O nome não pode ter mais de 255 caracteres.',
        ];
    }
}