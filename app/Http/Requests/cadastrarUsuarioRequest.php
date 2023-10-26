<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class cadastrarUsuarioRequest extends FormRequest
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
            'nome' => 'required|string|max:255',
            'email' => 'required|email',
            'perfil' => 'required',
            'senha' => 'required|min:8|max:100',
            'confirmar-senha' => 'required|same:senha'
        ];
    }
    public function messages(){
        return[
            'nome.required' => 'O campo nome é obrigatório!',
            'nome.string' => 'O campo nome deve ser somente de textos!',
            'nome.max' => 'O campo nome deve ter no máximo 255 caracteres!',
            'email.required' => 'O campo E-mail é obrigatório!',
            'email.email' => 'O campo E-mail deve ser um endereço de e-mail válido!',
            'perfil.required' => 'Selecione um perfil!',
            'senha.required' => 'O campo senha é obrigatório!',
            'senha.min' => 'O campo senha deve ter mais de 8 caracteres!',
            'senha.max' => 'O campo senha deve ter no máximo 100 caracteres!',
            'confirmar-senha.required' => 'Confirmar a senha é obrigatório!',
            'confirmar-senha.same' => 'As senhas devem ser iguais!'
        ];
    }
}
