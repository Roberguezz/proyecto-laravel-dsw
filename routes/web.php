<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/contacto', function () {
    return view('contacto'); 
})->name('contacto');

Route::get('/index', function () {
    return view('index'); 
})->name('index');

Route::get('/ranking', function () {
    return view('ranking'); 
})->name('ranking');

Route::get('/ratones', function () {
    return view('ratones'); 
})->name('ratones');
