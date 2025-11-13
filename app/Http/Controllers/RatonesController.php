<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Acceso al Storage
use Illuminate\Support\Facades\Storage;

class RatonesController extends Controller
{
    public function index()
    {
        $registros = [];

        // Verificación para ver si el archivo existe
        if (Storage::exists('formulario.csv')) {
        $contenido = Storage::get('formulario.csv');             // Leer todo el archivo
            $lineas = explode("\n", $contenido);   // Separar por línea
            foreach ($lineas as $linea) {
                if (trim($linea) !== '') {                    // Evitar líneas vacías
                    $registros[] = $linea;
                }
            }

            return view('ratones', compact('registros'));
        }
    }
}
