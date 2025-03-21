<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DespesaRequest;
use App\Models\Despesa;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DespesaController extends Controller
{
    public function store(DespesaRequest $request): JsonResponse
    {
        try {
            $user = $request->user();
            $data = $request->validated();
            $data['usu_id'] = $user->usu_id;

            $despesa = Despesa::create($data);

            return response()->json([
                'message' => 'Despesa criada com sucesso',
                'Despesa' => $despesa,
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 400);
        }
    }

    public function relatorio($mes, Request $request): JsonResponse
    {
        try {
            $user = $request->user();
            $despesas = Despesa::where('usu_id', '=',$user->usu_id)
                ->whereMonth('des_data', '=',$mes)
                ->with('categoria')
                ->get();

            return response()->json([
                'despesas' => $despesas,
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 400);
        }
    }
}
