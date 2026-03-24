<?php

return [
    'required' => 'El campo :attribute es obligatorio.',
    'email' => 'El campo :attribute debe ser un correo válido.',
    'unique' => 'Este :attribute ya está registrado en el sistema.', 
    'confirmed' => 'La confirmación de :attribute no coincide.',    
    'min' => [
        'string' => 'El campo :attribute debe tener al menos :min caracteres.',
    ],
    'max' => [
        'string' => 'El campo :attribute no puede tener más de :max caracteres.',
    ],
    'attributes' => [
        'name'     => 'nombre',
        'email'    => 'correo electrónico',
        'password' => 'contraseña',
    ],
];
