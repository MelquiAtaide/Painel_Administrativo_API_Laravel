<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\termoRequest;
use App\Models\Termos;
use App\Models\Categorias;
use App\Models\Eixos;

class TermoController extends Controller
{
    public function listarTermo(){
        $termos = Termos::all();
        $categorias = Categorias::all();
        $focos = Eixos::where('tipo_id', 1)->get();
        $julgamentos = Eixos::where('tipo_id', 2)->get();
        $acaos = Eixos::where('tipo_id', 4)->get();
        return view('admin.termos', [
            'termos' => $termos,
            'categorias' => $categorias,
            'focos' => $focos,
            'julgamentos' => $julgamentos,
            'acaos' => $acaos
        ]);
    }
    public function cadastrarTermo(termoRequest $request){
        try {
            $termo = new Termos;

            $termo->categoria_id = $request->categoria;
            $termo->foco_id = $request->foco;
            $termo->julgamento_id = $request->julgamento;
            $termo->acao_id = $request->acao;

            $termo->save();
            return redirect()->route('listar.termo')->with('sucesso', 'Cadastrado com sucesso!');
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->back()->withErrors('Ocorreu um erro ao cadastrar!');
        }
    }
    public function deletarTermo($id){
        try {
            $usuario = Usuarios::where('id', $id)->delete();

            return redirect()->route('listar.termo')->with('sucesso', 'Deletado com sucesso!');
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->back()->withErrors('Ocorreu um erro ao deletar!');
        }

    }
    public function editarTermo(cadastrarUsuarioRequest $request, $id){
        try {
            $usuario = Usuarios::where('id', $id)->first();
            $senha = Hash::make($request->senha);

            $usuario->nome = $request->nome;
            $usuario->email = $request->email;
            $usuario->senha = $senha;
            $usuario->perfil_id = $request->perfil;

            $usuario->save();
            return redirect()->route('listar.termo')->with('sucesso', 'Editado com sucesso!');
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->back()->withErrors('Ocorreu um erro ao editar!');
        }
    }
}
