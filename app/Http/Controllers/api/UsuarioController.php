<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginRequest;
use App\Models\Usuarios;

class UsuarioController extends Controller
{
    public function gerarToken($usuario)
    {
        try {
            // Gere um token para o usuário
            $token = JWTAuth::fromUser($usuario);
            return $token;
        } catch (JWTException $e) {
            // Trate erros na geração do token, se necessário
            return response()->json(['error' => 'Erro ao gerar o token'], 500);
        }
    }
    // $token = $this->gerarToken($login);

    // Retorne o token e informações do usuário
    // return response()->json([
        //     'token' => $token,
        //     'usuario' => $login,
        // ]);
    public function logar(Request $request){
        $login = Usuarios::where('email', $request->email)->first();

        if ($login && Hash::check($request->senha, $login->senha)) {

            return response()->json($login);
        }
        return response()->json(['erro' => 'Credenciais inválidas'], 200);
    }

    public function cadastrarUsuario(Request $request){
        try {
            $usuario = new Usuarios;
            $senha = Hash::make($request->senha);

            $usuario->nome = $request->nome;
            $usuario->email = $request->email;
            $usuario->senha = $senha;
            $usuario->perfil_id = 2;

            $usuario->save();
            return response()->json([
                'success' => true,
                'message' => 'Cadastro realizado com sucesso!',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Erro ao cadastrar usuário.',
                'error' => $th->getMessage(), // Adicione mais informações de erro se necessário
            ], 500);
        }
    }
}
