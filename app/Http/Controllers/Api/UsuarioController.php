<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsuarioRequest;
use App\Models\Usuario;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function store(UsuarioRequest $request): JsonResponse
    {
        try {
            $usuario = Usuario::create($request->all());

            return response()->json([
                'message' => 'Usuário criado com sucesso',
                'Usuario' => $usuario,
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 400);
        }
    }
}
