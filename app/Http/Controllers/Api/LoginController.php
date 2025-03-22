<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use function _PHPStan_781aefaf6\React\Promise\all;

class LoginController extends Controller
{
    public function auth(LoginRequest $request):JsonResponse
    {
        if (!Auth::attempt($request->validated())) {
            dd('Autenticação falhou');
            return response()->json([
                'error' => 'Email ou senha inválidos',
            ], 400);
        }

        $token = Auth::user()->createToken('user-token')->plainTextToken;

        return response()->json([
            'message'=>'Usuário logado com sucesso',
            'token'=> $token
        ], 201);
    }

    public function logout(Request $request): JsonResponse
    {

        if (!$request->user()) {
            return response()->json(['error' => 'Não autenticado'], 401);
        }


        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logout realizado com sucesso'], 200);
    }
}
