<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
// Importamos la ruta de los controladores
// Aprendí que tiene que ir 1 a 1 por el tema del PSR-4,
// el cual solo carga cada clase cuando se usa, curioso
use App\Http\Controllers\FormularioController;
use App\Http\Controllers\RatonesController;

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
Route::get('/ratones', [RatonesController::class, 'index'])
->name('ratones');

Route::get('/test-form', function () {
    return view('test_form');
})->name('test_form');

Route::post('/test-form', function (Request $request) {
    $request->validate([
        'nombre' => 'required|string|max:50',
        'email' => 'required|email',
        'password' => 'required|string|min:6'
    ]);

    return redirect()->route('test_form')->with('success', __('Formulario enviado correctamente'));
})->name('test_form.enviar');
