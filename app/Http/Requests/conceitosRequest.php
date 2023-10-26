<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class conceitosRequest extends FormRequest
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
            'categoria' => 'required',
            'termo' => 'required|string',
            'definicao' => 'required|string'
        ];
    }
    public function messages(){
        return[
            'categoria.required' => 'O campo categoria é obrigatório!',
            'termo.required' => 'O campo termo é obrigatório!',
            'termo.string' => 'O campo termo deve ser somente de textos!',
            'definicao.required' => 'O campo definição é obrigatório!',
            'definicao.string' => 'O campo definição deve ser somente de textos!',
        ];
    }
}
