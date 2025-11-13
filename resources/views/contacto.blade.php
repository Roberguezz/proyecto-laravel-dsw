<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <title>WMouse</title>
</head>

<body>
    <!-- Header apto para copiarse en todas las vistas -->
    <header>
        <div class="Menu_cabecera">
            <div class="Menu_cabecera_content">
                <div class="Menu_cabecera_start">
                    <div class="Logo">
                        <a class="a_menu_logo" href="{{ route('index') }}">
                            <span class="W">W</span>Mouse
                        </a>
                    </div>
                </div>
                <div class="Menu_cabecera_tabs">
                    <a class="a_menu" href="{{ route('ranking') }}">Ranking</a>
                    <a class="a_menu" href="{{ route('ratones') }}">Ratones</a>
                    <a class="a_menu" href="{{ route('contacto') }}">Contacto</a>
                </div>
                <div class="Menu_cabecera_end"></div>
            </div>
        </div>
    </header>
    <!-- Fin del header -->
    {{-- Aquí Empieza cada página --}}
    <h1>WMouse</h1>
    <p>Esta es la página de contacto</p>

    {{-- Formulario --}}
    <h2 class="Titulo_form">Formulario para solicitar Ratones</h2>
    <form class="Formulario" method="POST" action="{{ route('contacto.enviar') }}">
        @csrf

        <div class="Nombre_mas_texto">
            <label for="nombre">Nombre:</label>
            <input class="Cuadrotexto_nombre" type="text" id="nombre" name="nombre" value="{{ old('nombre') }}">
            {{-- La funcion old es un helper que recuerda en texto ante un error de validación :) --}}
        </div>
        <div class="Email_mas_texto">
            <label for="email">Correo electrónico:</label>
            <input class="Cuadrotexto_email" type="email" id="email" name="email" value="{{ old('email') }}">
        </div>
        <div class="Mensaje_mas_texto">
            <label for="mensaje">Mensaje:</label>
            <textarea class="Cuadrotexto_mensaje" id="mensaje" name="mensaje" rows="4"></textarea>
        </div>
        <button class="Boton_enviar" type="submit">
            Enviar
        </button>
    </form>

    {{-- Mostrar errores de validación --}}
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Mostrar mensaje de éxito --}}
    @if (session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif

</body>

</html>
