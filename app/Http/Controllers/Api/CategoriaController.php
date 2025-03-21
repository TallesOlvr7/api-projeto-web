<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriaRequest;
use App\Models\Categoria;
use Illuminate\Http\JsonResponse;

class CategoriaController extends Controller
{
    public function index(): JsonResponse
    {
        try {
            $categorias = Categoria::all(); // Recupera todas as categorias

            return response()->json([
                'categorias' => $categorias,
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 400);
        }
    }

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

    public function update(CategoriaRequest $request, $id): JsonResponse
    {
        try {
            $categoria = Categoria::findOrFail($id); // Busca a categoria pelo ID ou lança uma exceção se não encontrar
            $categoria->update($request->only('cat_nome')); // Atualiza apenas o campo 'nome'

            return response()->json([
                'message' => 'Categoria atualizada com sucesso',
                'Categoria' => $categoria,
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 400);
        }
    }

    public function destroy($id): JsonResponse
    {
        try {
            $categoria = Categoria::findOrFail($id); // Busca a categoria pelo ID ou lança uma exceção se não encontrar
            $categoria->delete(); // Remove a categoria

            return response()->json([
                'message' => 'Categoria removida com sucesso',
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 400);
        }
    }



    
}