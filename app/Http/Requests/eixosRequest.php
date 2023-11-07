<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class eixosRequest extends FormRequest
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
            'tipo_eixo' => 'required',
            'nome_eixo' => 'required|string|unique:eixos,nome_eixo',
        ];
    }
    public function messages(){
        return[
            'tipo_eixo.required' => 'O campo tipo é obrigatório!',
            'nome_eixo.required' => 'O campo nome é obrigatório!',
            'nome_eixo.string' => 'O campo nome deve ser somente de textos!',
            'nome_eixo.unique' => 'Este eixo já existe',
        ];
    }
}
