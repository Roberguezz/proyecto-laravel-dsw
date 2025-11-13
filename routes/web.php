<?php

use Illuminate\Support\Facades\Route;

// Importamos la ruta de los controladores

use App\Http\Controllers\FormularioController;

// La página inicio siempre será Index
Route::get('/', function () {
    return view('index');
});

// Página de contacto (GET)
Route::get('/contacto', [FormularioController::class, 'mostrarFormulario'])
    ->name('contacto');

// Procesar formulario (POST)
Route::post('/contacto', [FormularioController::class, 'procesarFormulario'])
    ->name('contacto.enviar');

// Esta es la página principal Index    
Route::get('/index', function () {
    return view('index'); 
})->name('index');

// Esta es la página de Ranking
Route::get('/ranking', function () {
    return view('ranking'); 
})->name('ranking');

// Esta es la página de los ratones
Route::get('/ratones', [RatonesController::class, 'index'])->name('ratones');

