<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class termoRequest extends FormRequest
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
            'categoria'  => 'required',
            'foco'       => 'required',
            'julgamento' => 'nullable',
            'acao'       => 'nullable'
        ];
    }
    public function messages(){
        return [
            'categoria.required' => 'O campo categoria é obrigatório',
            'foco.required'      => 'O campo foco é obrigatório'
        ];
    }
}
