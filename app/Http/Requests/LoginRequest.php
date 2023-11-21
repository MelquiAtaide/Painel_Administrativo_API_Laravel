<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|email',
            'senha' => 'required|min:8|max:100',
        ];
    }
    public function messages(){
        return[
            'email.required' => 'O campo E-mail é obrigatório!',
            'senha.required' => 'O campo senha é obrigatório!',
            'senha.min' => 'O campo senha deve ter mais de 8 caracteres!',
            'senha.max' => 'O campo senha deve ter no máximo 100 caracteres!',
        ];
    }
}
