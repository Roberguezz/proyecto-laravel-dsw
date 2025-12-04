<?php

namespace App\Http\Controllers;

use App\Models\Formulario;

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
        // Validar datos
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'email' => 'required|email',
            'mensaje' => 'required|string|max:500',
        ]);

        // Guardar en la base de datos
        Formulario::create($validated);

        // Redirigir con mensaje
        return redirect()->route('contacto.enviar')->with('success', 'Formulario enviado correctamente.');
    }
}
