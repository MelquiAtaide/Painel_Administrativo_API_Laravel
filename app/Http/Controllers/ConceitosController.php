<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\conceitosRequest;
use App\Models\Conceitos;
use App\Models\Categorias;

class ConceitosController extends Controller
{
    public function listarConceitos(){
        $categorias = Categorias::all();
        $conceitos = Conceitos::all();
        return view('admin.conceitos', [
            'conceitos' => $conceitos,
            'categorias' => $categorias
        ]);
    }
    public function cadastrarConceitos(conceitosRequest $request){
        try {
            $conceitos = new Conceitos;

            $conceitos->categoria_id = $request->categoria;
            $conceitos->termo = $request->termo;
            $conceitos->definicao = $request->definicao;

            $conceitos->save();
            return redirect()->route('listar.conceitos')->with('sucesso', 'Cadastrado com sucesso!');
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->back()->withErrors('Ocorreu um erro ao cadastrar!');
        }
    }
    public function deletarConceitos($id){
        try {
            $usuario = Conceitos::where('id', $id)->delete();

            return redirect()->route('listar.conceitos')->with('sucesso', 'Deletado com sucesso!');
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->back()->withErrors('Ocorreu um erro ao deletar!');
        }
    }
}
