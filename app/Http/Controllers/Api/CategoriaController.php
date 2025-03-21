<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriaRequest;
use App\Models\Categoria;
use Illuminate\Http\JsonResponse;

class CategoriaController extends Controller
{
    public function store(CategoriaRequest $request): JsonResponse
    {
        try {
            $categoria = Categoria::create($request->all());

            return response()->json([
                'message' => 'Categoria criada com sucesso',
                'Categoria' => $categoria,
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 400);
        }
    }
}