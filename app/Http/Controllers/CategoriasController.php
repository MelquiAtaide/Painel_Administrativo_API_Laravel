<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorias;
use App\Http\Requests\categoriasRequest;

class CategoriasController extends Controller
{
    public function listarCategorias(){
        $categorias = Categorias::all();

        return view('admin.categorias', ['categorias' => $categorias]);
    }
    public function cadastrarCategorias(categoriasRequest $request){
        try {
            $categorias = new Categorias;

            $categorias->sigla = $request->sigla;
            $categorias->descricao = $request->descricao;

            $categorias->save();
            return redirect()->route('listar.categorias')->with('sucesso', 'Cadastrado com sucesso!');
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->back()->withErrors('Ocorreu um erro ao cadastrar!');
        }
    }
    public function deletarCategoria($id){
        try {
            $categoria = Categorias::where('id', $id)->delete();

            return redirect()->route('listar.categorias')->with('sucesso', 'Deletado com sucesso!');
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->back()->withErrors('Ocorreu um erro ao deletar!');
        }

    }

}
