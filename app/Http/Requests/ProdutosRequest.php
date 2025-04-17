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
            'nome' => 'required|max:255|min:4|string',
            'preco' => 'required|gt:0|numeric',
            'fornecedor_id' => 'required',
            'foto' => 'image|max:2048'
        ];
    }

    public function messages(): array {
        return [
            'nome.required' => "Você precisa dar um nome ao produto",
            'nome.max' =>"Digite um nome com menos de 255 caracteres",
            'nome.min' => "Digite um nome com ao menos 4 caracteres",
            "preco.numeric" => "O preço precisa ser um valor numérico",
            "foto.image" => "O arquivo precisa ser uma foto."
        ];
    }
}
