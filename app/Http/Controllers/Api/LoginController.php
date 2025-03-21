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
    public function login(LoginRequest $request):JsonResponse
    {
        if(!Auth::attempt($request->validated())){
            return response()->json([
                'error'=>'Email ou senha inválidos',
            ], 400);
        }

        $token = $request->user()->createToken('user-token')->plainTextToken;
        return response()->json([
            'message'=>'Usuário logado com sucesso',
            'token'=> $token
        ], 201);
    }

    public function logout(Request $request): JsonResponse
    {
        $request->user()->tokens->each(function ($token) {
            $token->delete();
        });

        return response()->json(['message' => 'Logout realizado com sucesso.'], 201);
    }
}
