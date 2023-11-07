<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\eixosRequest;
use App\Models\TipoEixo;
use App\Models\Eixos;

class EixoController extends Controller
{
    public function listarEixo(){
        $tipos = TipoEixo::all();
        $eixos = Eixos::all();
        return view('admin.eixo', [
            'eixos' => $eixos,
            'tipos' => $tipos
        ]);
    }
    public function cadastrarEixo(eixosRequest $request){
        try {
            $eixos = new Eixos;

            $eixos->tipo_id = $request->tipo_eixo;
            $eixos->nome_eixo = $request->nome_eixo;

            $eixos->save();
            return redirect()->route('listar.eixo')->with('sucesso', 'Cadastrado com sucesso!');
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->back()->withErrors('Ocorreu um erro ao cadastrar!');
        }
    }
    public function deletarEixo($id){
        try {
            $eixos = Eixos::where('id', $id)->delete();

            return redirect()->route('listar.eixo')->with('sucesso', 'Deletado com sucesso!');
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->back()->withErrors('Ocorreu um erro ao deletar!');
        }
    }
    public function editarEixo(eixosRequest $request, $id){
        try {
            $eixos = Eixos::where('id', $id)->first();
            $eixos->tipo_id = $request->tipo_eixo;
            $eixos->nome_eixo = $request->nome_eixo;

            $eixos->save();
            return redirect()->route('listar.eixo')->with('sucesso', 'Editado com sucesso!');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Ocorreu um erro ao editar!');
        }
    }
}
