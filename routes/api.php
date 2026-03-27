<?php

use App\Http\Controllers\Api\V1\FormularioController;
use App\Http\Controllers\AdminUserController; 
use App\Http\Controllers\Api\AuthController;  
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// 1. Ruta pública para LOGIN (Obtener el Token)
Route::post('/login', [AuthController::class, 'login']);

// 2. Rutas Protegidas por Sanctum
Route::middleware('auth:sanctum')->group(function () {
    
    // Ruta por defecto de Laravel (opcional)
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // TUS RUTAS DE USUARIOS (Para la tarea AE5.3)
    Route::get('/users', [AdminUserController::class, 'index']);
    Route::get('/users/{id}', [AdminUserController::class, 'show']);

    // Tus rutas de formularios (v1) que ya tenías
    Route::prefix('v1')->group(function () {
        Route::apiResource('formularios', FormularioController::class);
    });
});