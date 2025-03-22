<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DespesaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'des_valor' => 'required|numeric',
            'des_descricao' => 'required|string|max:255',
            'des_data' => 'required|date',
            'cat_id' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'des_valor.required' => 'O valor da despesa é obrigatório.',
            'des_valor.numeric' => 'O valor da despesa deve ser numérico.',
            'des_descricao.required' => 'A descrição da despesa é obrigatória.',
            'des_descricao.string' => 'A descrição deve ser uma string válida.',
            'des_descricao.max' => 'A descrição não pode ter mais de 255 caracteres.',
            'des_data.required' => 'A data da despesa é obrigatória.',
            'des_data.date' => 'A data deve ser uma data válida.',
            'cat_id.required' => 'A categoria é obrigatória.',
            'cat_id.exists' => 'A categoria selecionada não existe.',
        ];
    }
}
