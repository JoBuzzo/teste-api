<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CotacaoRequest;
use App\Models\Cotacao;
use Illuminate\Http\Request;

class CotacaoDeFreteController extends Controller
{
    public function index(CotacaoRequest $request)
    {
        $data = $request->validated();

        return response()->json([
            'cotacao' => Cotacao::query()
                ->with([
                    'usuario',
                    'servico'
                ])
                ->withWhereHas('servico.vtxValores', function ($query) use ($data) {
                    $query->where('peso_inicial', '=', $data['peso_inicial'])
                        ->where('peso_final', '=', $data['peso_final'])
                        ->where('cep_inicio', '=', $data['cep_inicio'])
                        ->where('cep_final', '=', $data['cep_final']);
                })
                ->first()
        ]);
    }
}
