<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\termoRequest;
use App\Models\Termos;
use App\Models\Categorias;
use App\Models\Eixos;
use App\Models\Favorito;

class TermoController extends Controller
{

    public function index()
    {
        $termos = Termos::with('categoria', 'foco', 'julgamento', 'acao')->paginate(10);
        return response()->json($termos);
    }
    public function favoritos(){
        $termosFavoritos = Favorito::where('usuario_id', 2)

            ->with('termo.foco', 'termo.julgamento', 'termo.acao')
            ->get();

        return response()->json($termosFavoritos);
    }
    public function AlterarFavorito(Request $request){
        $usuarioId = $request->input('usuario_id');
        $termoId = $request->input('termo_id');

        $favoritoExistente = Favorito::where('usuario_id', $usuarioId)
            ->where('termo_id', $termoId)
            ->first();

        if ($favoritoExistente) {
            $favoritoExistente->delete();
            return response()->json(['status' => 'removido']);
        } else {
        try {
            $favorito = new Favorito;
            $favorito->usuario_id = $usuarioId;
            $favorito->termo_id = $termoId;

            $favorito->save();

            return response()->json(['status' => 'adicionado']);
        } catch (\Exception $exception) {
            \Log::error($exception->getMessage());
            return response()->json(['status' => 'erro', 'message' => 'Erro interno no servidor'], 500);
        }
    }
    }

    public function create()
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
