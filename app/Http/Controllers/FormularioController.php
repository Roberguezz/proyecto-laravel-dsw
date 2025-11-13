<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FormularioController extends Controller
{
    public function mostrarFormulario()
    {
        return view('contacto');
    }

    public function procesarFormulario(Request $request)
    {
        // Validar los datos con los mecanismos de Laravel
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'email' => 'required|email',
            'mensaje' => 'required|string|max:500',
        ]);

        // Crear el formato CSV
        $linea = "Nombre: {$validated['nombre']} | Correo: {$validated['email']} | Mensaje: {$validated['mensaje']} | Fecha: " . now()->toDateTimeString();

        // Guardar en storage/app/formulario.csv
        Storage::append('formulario.csv', $linea);

        // Redirigir con mensaje de éxito
        return redirect()->route('contacto.enviar')->with('success', 'Formulario enviado correctamente.');
    }
}
