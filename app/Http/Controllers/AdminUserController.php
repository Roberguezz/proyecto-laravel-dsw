<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    // Listar usuarios (API y Web)
    public function index(Request $request)
    {
        if ($request->wantsJson() || $request->is('api/*')) {
            return response()->json(User::all());
        }

        $users = User::paginate(10);
        return view('adminlte.usuarios', compact('users'));
    }

    // Mostrar el formulario
    public function create()
    {
        return view('adminlte.usuarios');
    }

    // Guardar el usuario
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->back()->with('success', 'Usuario creado correctamente.');
    }

    // Ver un usuario solo (API)
    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        return response()->json($user);
    }
}