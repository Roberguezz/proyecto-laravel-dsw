<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormularioController;
use App\Http\Controllers\RatonesController;
use App\Http\Controllers\AdminUserController;

// Página de inicio
Route::get('/', function () {
    return view('index');
})->name('index');

// Página de contacto (GET)
Route::get('/contacto', [FormularioController::class, 'mostrarFormulario'])
    ->name('contacto');

// Procesar formulario (POST)
Route::post('/contacto', [FormularioController::class, 'procesarFormulario'])
    ->name('contacto.enviar');

// Página Ranking
Route::get('/ranking', function () {
    return view('ranking'); 
})->name('ranking');

// Página Ratones
Route::get('/ratones', [RatonesController::class, 'index'])
    ->name('ratones');

// Rutas protegidas (requieren autenticación)
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

     // AdminLTE Welcome
    Route::get('/adminlte', function () {
        return view('adminlte.welcome');
    })->name('adminlte.welcome');

    // AdminLTE Usuarios
    Route::get('/adminlte/usuarios', [AdminUserController::class, 'create'])
        ->name('adminlte.usuarios');

    Route::post('/adminlte/usuarios', [AdminUserController::class, 'store'])
        ->name('adminlte.usuarios.store');
});
