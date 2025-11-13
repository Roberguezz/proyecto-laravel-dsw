<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Acceso al Storage
use Iluminate\Support\Facades\Storage;

class RatonesController extends Controller
{
    public function index()
    {
        $registros = [];

        // Verificación para ver si el archivo existe
        if (Storage::exist('formulario.csv')) {
            $lineas = Storage::lines('formulario.csv');
            foreach ($lineas as $linea) {
                $registros[] = $linea;
            }
        }

        return view('ratones', compact('registros'));
    }
}
