<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutosRequest extends FormRequest
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
            'nome' => 'required|string|max:255|min:4',
            'preco' => 'required|gt:-1|numeric',
            'fornecedor_id' => 'required',
            'foto' => 'image|max:2048'
        ];
    }

    public function messages(): array {
        return [
            'nome.required' => "Você precisa dar um nome ao produto",
            'nome.max' => "O nome do produto deve ter menos de 255 caracteres",
            'nome.min' => "O nome do produto deve ter no mínimo 4 caracteres",
            'preco.required' => "Você precisar dar um preço a um produto",
            'preco.gt' => "O valor do produto deve ser maior ou igual a zero",
            'preco.numeric' => "O valor do produto deve ser numérico",
            'fornecedor_id.required' => "O produto deve ter um fornecedor",
            'foto.imagem' => "O arquivo precisa ser uma foto",
            'foto.max' => "O tamanho da foto é muito grande"
        ];
    }
}
