<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\cadastrarUsuarioRequest;
use App\Models\Usuarios;
use App\Models\Perfil;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    public function redirecionarUsuarios(){
        $perfis = Perfil::all();
        $usuarios = Usuarios::all();
        return view('admin.usuarios', ['usuarios' => $usuarios, 'perfis' => $perfis]);
    }
    public function redirecionarCadastrar(){

        $perfis = Perfil::all();

        return view('admin.cadastrar', ['perfis' => $perfis]);
    }
    public function cadastrar(cadastrarUsuarioRequest $request){
        try {
            $usuario = new Usuarios;
            $senha = Hash::make($request->senha);

            $usuario->nome = $request->nome;
            $usuario->email = $request->email;
            $usuario->senha = $senha;
            $usuario->perfil_id = $request->perfil;

            $usuario->save();
            return redirect()->route('redirecionar.usuarios')->with('sucesso', 'Cadastrado com sucesso!');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Ocorreu um erro ao cadastrar!');
        }
    }
    public function deletarUsuario($id){
        try {
            $usuario = Usuarios::where('id', $id)->delete();

            return redirect()->route('redirecionar.usuarios')->with('sucesso', 'Deletado com sucesso!');
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->back()->withErrors('Ocorreu um erro ao deletar!');
        }

    }
    public function editarUsuario(cadastrarUsuarioRequest $request, $id){
        try {
            $usuario = Usuarios::where('id', $id)->first();
            $senha = Hash::make($request->senha);

            $usuario->nome = $request->nome;
            $usuario->email = $request->email;
            $usuario->senha = $senha;
            $usuario->perfil_id = $request->perfil;

            $usuario->save();
            return redirect()->route('redirecionar.usuarios')->with('sucesso', 'Editado com sucesso!');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Ocorreu um erro ao editar!');
        }
    }
}
