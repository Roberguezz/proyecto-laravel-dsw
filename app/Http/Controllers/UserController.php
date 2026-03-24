<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        // Aquí listaremos los usuarios
        // Traemos todos los usuarios de la base de datos
        $users = User::all();

        // Cargamos la vista que vamos a crear ahora
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        // Mostrar formulario de creación

        // Solo devolvemos la vista del formulario
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        // 1. Validación robusta (Requisito del enunciado)
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed', // 'confirmed' busca un campo password_confirmation
        ]);

        // 2. Cifrado de contraseña (Requisito del enunciado)
        $validated['password'] = Hash::make($validated['password']);

        // 3. Crear el usuario
        User::create($validated);

        // 4. Redirigir con mensaje de éxito
        return redirect()->route('users.index')->with('success', 'Usuario creado correctamente.');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.show', compact('user'));
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8|confirmed', // 'nullable' es la clave aquí
        ]);

        // Lógica de la contraseña 
        if (!empty($validated['password'])) {
            // Si hay algo, la ciframos
            $validated['password'] = Hash::make($validated['password']);
        } else {
            // Si está vacío, quitamos 'password' del array para que no lo intente actualizar
            unset($validated['password']);
        }

        $user->update($validated);

        return redirect()->route('users.index')->with('success', 'Usuario actualizado.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Seguridad
        if (auth()->user()->id == $user->id) {
            return redirect()->route('users.index')
                ->with('error', 'No puedes eliminarte a ti mismo.');
        }

        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'Usuario eliminado correctamente.');
    }
}