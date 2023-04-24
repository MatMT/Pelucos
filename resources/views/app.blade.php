<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelucos - @yield('titulo')</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;700;900&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
</head>

<body>
    <div class="contenedor-app">
        <div class="imagen"></div>
        <div class="app">

            <h1 class="nombre-pagina">@yield('titulo')</h1>

            <p class="descripcion-pagina mb-10">@yield('descrip')</p>

            {{-- Contenido principal --}}
            @yield('contenido')

        </div>
    </div>


    @yield('js')

    <?php
    echo $script ?? '';
    ?>

</body>

</html>
