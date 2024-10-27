<?php

namespace App\Http\Controllers;

use App\Models\Cidade;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CidadeController extends Controller
{
    public function selectCidade(Request $request) : JsonResponse{
        $cidades = Cidade::where('estado_id', $request -> estado_id)->orderBy('nome')->get();

        if($cidades){
            return response()->json($cidades, 200);
        }

        return response()->json (['message' => 'Nenhuma cidade encontrada.', 422]);

    }
}
