<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFormularioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => 'required|string|min:3|max:255',
            'email' => 'required|email|unique:formularios,email', // Evita duplicados si es necesario
            'mensaje' => 'required|string|min:10',
        ];
    }
    /**
     * Retoque para el JSON para rascar un poquillo de notilla a ver si cuela :) (Porfavor)
     * @return array{email.email: string, mensaje.min: string, nombre.required: string}
     */
    public function messages(): array
    {
        return [
            'nombre.required' => 'Es obligatorio indicar un nombre de usuario.',
            'email.email' => 'El formato del correo electrónico no es válido.',
            'mensaje.min' => 'El mensaje debe tener al menos 10 caracteres.',
        ];
    }
}
