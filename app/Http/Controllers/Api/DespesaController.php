<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Despesa;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DespesaController extends Controller
{
    public function relatorio($mes, Request $request):JsonResponse
    {
        $user = $request->user();

        $despesas = Despesa::where('user_id', '=',$user->id)
            ->whereMonth('des_data', '=',$mes)
            ->get();

        return response()->json($despesas);
    }
}
