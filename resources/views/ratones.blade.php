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
                         <a class="a_menu_logo" href="{{route ('index')}}">
                            <span class="W">W</span>Mouse
                        </a>
                    </div>
                 </div>
                 <div class="Menu_cabecera_tabs">
                    <a class="a_menu" href="{{ route('ranking')}}">Ranking</a>
                    <a class="a_menu" href="{{ route('ratones')}}">Ratones</a>
                    <a class="a_menu" href="{{ route('contacto')}}">Contacto</a>
                 </div>
                 <div class="Menu_cabecera_end"></div>
            </div>
        </div>
    </header>
    <!-- Fin del header -->
    {{-- Aquí Empieza cada página --}}
    <h1>WMouse</h1>
    <p>Esta es la página de ratones</p>
    <div class="Mensaje_aviso_form_ratones">
        <p>Por ahora no hay mucho que enseñar, pero cuento con ustedes para barajar sugerencias de ratones, por ello, disponen de un formulario de sugerencias <a class="Carita" href="{{ route('contacto')}}">:)</a></p>
    </div>
</body>
</html>