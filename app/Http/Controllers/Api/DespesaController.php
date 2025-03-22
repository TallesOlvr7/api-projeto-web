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

            $despesa = Despesa::create([
                'des_descricao'=>$data['des_descricao'],
                'cat_id'=>$data['cat_id'],
                'des_valor'=>$data['des_valor'],
                'des_data'=>$data['des_data'],
            ]);

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

    public function index(): JsonResponse
    {
        try {
            $despesas = Despesa::all()->load('categoria');

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
