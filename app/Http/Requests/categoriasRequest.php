<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class categoriasRequest extends FormRequest
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
            'sigla' => 'required',
            'descricao' =>'required'
        ];
    }
    public function messages(){
        return[
            'sigla.required' => 'O campo sigla é obrigatório!',
            'descricao.required' => 'O campo descrição é obrigatório!',
        ];
    }
}
