<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'Iveth\'s Beauty Salon')</title>

        <!-- Estilos CSS locales -->
        <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
        <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">

        <!-- Font Awesome para iconos sociales -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

        <!-- Fuentes de Google -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Amaranth:ital,wght@0,400;0,700;1,400;1,700&family=Mea+Culpa&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300;400;700&display=swap" rel="stylesheet">

        <!-- Bootstrap 5 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        
        <!-- Referencia a la etiqueta head para otros archivos -->
        @yield('head')
    </head>
        <body class="mea-culpa-regular">

        @yield('contenido') <!-- Espacio para el contenido de otros archivos a esta plantilla -->
                
        <!-- INICIO DEL FOOTER -->
        <footer class="footerTop text-center pt-3 pb-3">
            <p style="font-size: 16px;">
                Copyright 2024 &#169; Iveth's Beauty Salon - Todos los derechos reservados
                <a href="https://www.instagram.com/tuperfil" target="_blank" class="social-icon">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://www.facebook.com/tuperfil" target="_blank" class="social-icon">
                    <i class="fab fa-facebook"></i>
                </a>
            </p>
        </footer>
        <!-- FIN DEL FOOTER -->

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="{{asset('js/script.js')}}"></script>
    </body>
</html>