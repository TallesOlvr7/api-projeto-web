<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsuarioRequest;
use Illuminate\Http\JsonResponse;
use App\Models\User;

class UsuarioController extends Controller
{
    public function store(UsuarioRequest $request): JsonResponse
    {
        try {
            $usuario = User::create($request->all());

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
    public function usuarioPorEmail($email):JsonResponse
    {
        $usuario = User::where('email','=' ,$email)->first();

        return response()->json([
            'usuario' => $usuario,
        ], 200);
    }
}
