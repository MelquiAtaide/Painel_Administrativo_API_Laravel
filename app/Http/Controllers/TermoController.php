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
        $categoriaId = request('filtrarTermos');

        $query = Termos::query();

        if ($categoriaId) {
            $query->where('categoria_id', $categoriaId);
        }

        $termos = $query->paginate(15);
        // $termos->appends(['categoria' => $categoriaId]);
        // $termos = Termos::paginate(15);
        $categorias = Categorias::all();
        $focos = Eixos::where('tipo_id', 1)->get();
        $julgamentos = Eixos::where('tipo_id', 2)->get();
        $acoes = Eixos::where('tipo_id', 4)->get();
        return view('admin.termos', [
            'termos' => $termos,
            'categorias' => $categorias,
            'focos' => $focos,
            'julgamentos' => $julgamentos,
            'acoes' => $acoes,
            'categoriaId' => $categoriaId,
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
            $termo = Termos::where('id', $id)->delete();

            return redirect()->route('listar.termo')->with('sucesso', 'Deletado com sucesso!');
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->back()->withErrors('Ocorreu um erro ao deletar!');
        }

    }
    public function editarTermo(termoRequest $request, $id){
        try {
            $termo = Termos::where('id', $id)->first();

            $termo->categoria_id = $request->categoria;
            $termo->foco_id = $request->foco;
            $termo->julgamento_id = $request->julgamento;
            $termo->acao_id = $request->acao;

            $termo->save();
            return redirect()->route('listar.termo')->with('sucesso', 'Editado com sucesso!');
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->back()->withErrors('Ocorreu um erro ao editar!');
        }
    }

    // ==================== DE/RE =========================
    public function listarDeRe(){
        $termos = Termos::where('categoria_id', 1)->paginate(15);
        $categorias = Categorias::where('id', 1)->first();
        $focos = Eixos::where('tipo_id', 1)->orderBy('nome_eixo', 'asc')->get();
        $julgamentos = Eixos::where('tipo_id', 2)->orderBy('nome_eixo', 'asc')->get();
        return view('admin.deRe', [
            'termos' => $termos,
            'categorias' => $categorias,
            'focos' => $focos,
            'julgamentos' => $julgamentos
        ]);
    }
    public function cadastrarDeRe(termoRequest $request){
        try {
            $termo = new Termos;

            $termo->categoria_id = $request->categoria;
            $termo->foco_id = $request->foco;
            $termo->julgamento_id = $request->julgamento;

            $termo->save();
            return redirect()->route('listar.de.re')->with('sucesso', 'Cadastrado com sucesso!');
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->back()->withErrors('Ocorreu um erro ao cadastrar!');
        }
    }
    public function deletarDeRe($id){
        try {
            $termo = Termos::where('id', $id)->delete();

            return redirect()->route('listar.de.re')->with('sucesso', 'Deletado com sucesso!');
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->back()->withErrors('Ocorreu um erro ao deletar!');
        }

    }
    public function editarDeRe(termoRequest $request, $id){
        try {
            $termo = Termoss::where('id', $id)->first();

            $termo->categoria_id = $request->categoria;
            $termo->foco_id = $request->foco;
            $termo->julgamento_id = $request->julgamento;

            $termo->save();
            return redirect()->route('listar.de.re')->with('sucesso', 'Editado com sucesso!');
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->back()->withErrors('Ocorreu um erro ao editar!');
        }
    }
    // public function filtrarTermo(Request $request){
    //     $categoria = $request->filtrarTermos;
    //     $
    // }
}
