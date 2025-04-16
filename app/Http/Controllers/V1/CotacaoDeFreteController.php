<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CotacaoRequest;
use App\Models\Cotacao;
use App\Models\VtexValor;
use Illuminate\Http\Request;

class CotacaoDeFreteController extends Controller
{
    public function index(CotacaoRequest $request)
    {
        $data = $request->validated();

        return VtexValor::query()
            ->where('peso_inicial', '=', $data['peso_inicial'])
            ->where('peso_final', '=', $data['peso_final'])
            ->where('cep_inicio', '=', $data['cep_inicio'])
            ->where('cep_final', '=', $data['cep_final'])
            ->with([
                'servico',
                'servico.cotacoes',
                'servico.cotacoes.usuario'
            ])
            ->first();
    }

    public function show($id)
    {
        $cotacao = Cotacao::with([
            'servico',
            'usuario'
        ])
            ->findOrFail($id);

        return response()->json([
            'cotacao' => $cotacao,
            'valores' => VtexValor::where('id_servico', $cotacao->servico->id)->paginate(10)
        ]);
    }
}
