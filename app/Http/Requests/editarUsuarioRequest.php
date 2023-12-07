<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class editarUsuarioRequest extends FormRequest
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
            'email' => [
                'required','email',Rule::unique('usuarios')->ignore($this->route('id')),
            ],
            'perfil' => 'required',
            'nova-senha' => 'nullable|min:8|max:100',
            'confirmar-nova-senha' => 'nullable|same:nova-senha'
        ];
    }
    public function messages(){
        return[
            'nome.required' => 'O campo nome é obrigatório!',
            'nome.string' => 'O campo nome deve ser somente de textos!',
            'nome.max' => 'O campo nome deve ter no máximo 255 caracteres!',
            'email.required' => 'O campo E-mail é obrigatório!',
            'email.email' => 'O campo E-mail deve ser um endereço de e-mail válido!',
            'email.unique' => 'E-mail usado já possui cadastro!',
            'perfil.required' => 'Selecione um perfil!',
            'nova-senha.min' => 'O campo nova-senha deve ter mais de 8 caracteres!',
            'nova-senha.max' => 'O campo nova-senha deve ter no máximo 100 caracteres!',
            'confirmar-nova-senha.same' => 'As senhas devem ser iguais!',
        ];
    }
}
