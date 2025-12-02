<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Prueba</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 2rem; }
        label { display: block; margin-top: 1rem; }
        input { width: 300px; padding: 0.3rem; }
        .error { color: red; font-size: 0.9rem; }
        button { margin-top: 1rem; padding: 0.5rem 1rem; }
    </style>
</head>
<body>
    <h1>{{ __('Formulario de prueba') }}</h1>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('test_form.enviar') }}" method="POST">
        @csrf
        <label for="nombre">{{ __('Nombre') }}</label>
        <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}">

        <label for="email">{{ __('Correo') }}</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}">

        <label for="password">{{ __('Contraseña') }}</label>
        <input type="password" name="password" id="password">

        <button type="submit">{{ __('Enviar') }}</button>
    </form>
</body>
</html>
