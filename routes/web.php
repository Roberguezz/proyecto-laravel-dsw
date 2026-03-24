<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormularioController;
use App\Http\Controllers\RatonesController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\UserController;

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

// Grupo protegido por autenticación
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

    // Gestión de Usuarios con prefijo /admin
    Route::prefix('admin')->group(function () {

        // Rutas manuales (como pide el enunciado antes del extra)
        // Route::get('/users', [UserController::class, 'index'])->name('users.index');
        // Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        // Route::post('/users', [UserController::class, 'store'])->name('users.store');
        // Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
        // Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
        // Route::put('/users/{id}/edit', [UserController::class, 'update'])->name('users.update');
        // Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

       // La línea única que sustituye a las manuales (Requisito Extra)
        Route::resource('users', UserController::class);
    });
});
