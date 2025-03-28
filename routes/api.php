<?php

use App\Http\Controllers\Api\CategoriaController;
use App\Http\Controllers\Api\DespesaController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\UsuarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/usuario', [UsuarioController::class, 'store']);
Route::post('/login', [LoginController::class, 'auth']);


Route::middleware(['auth:sanctum'])->group(function(){
    Route::controller(CategoriaController::class)->group(function(){
        Route::get('/categoria', 'index');
        Route::post('/categoria', 'store');
    });

    Route::controller(DespesaController::class)->group(function(){
        Route::post('/despesa', 'store');
        Route::get('/despesas', 'index');
    });

    Route::post('/logout', [LoginController::class, 'logout']);
    Route::get('/usuario/{email}', [UsuarioController::class, 'usuarioPorEmail']);
});
