<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Formulario;
use App\Http\Resources\FormularioResource;
use App\Http\Requests\StoreFormularioRequest;
use App\Http\Requests\UpdateFormularioRequest;

class FormularioController extends Controller
{
    public function index()
    {
        // Devolvemos una colección de recursos
        return FormularioResource::collection(Formulario::all());
    }

    public function store(StoreFormularioRequest $request)
    {
        $formulario = Formulario::create($request->validated());
        return new FormularioResource($formulario);
    }

    public function show(Formulario $formulario)
    {
        return new FormularioResource($formulario);
    }

    public function update(UpdateFormularioRequest $request, Formulario $formulario)
    {
        $formulario->update($request->validated());
        return new FormularioResource($formulario);
    }

    public function destroy(Formulario $formulario)
    {
        $formulario->delete();
        return response()->json(null, 204); // Código 204 obligatorio por enunciado
    }
}