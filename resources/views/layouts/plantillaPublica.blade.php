<?php
    // if($id_usuario > 0)
    // {
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Productos</title>
        <link href="{{asset('./css/estilos.css')}}" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Amaranth:ital,wght@0,400;0,700;1,400;1,700&family=Mea+Culpa&display=swap" rel="stylesheet">
    </head>
    <body class="mea-culpa-regular">


        @yield('contenido')
        
           <!-- INICIO DEL FOOTER -->
           <footer class="footerTop text-center pt-3 pb-3">
    <div>
       
    </div>
    <span style="font-size: 16px;">
        Copyright 2024 &#169; Iveth's Beauty Salon - Todos los derechos reservados
        <a href="https://www.instagram.com/tuperfil" target="_blank" class="social-icon">
            <i class="fab fa-instagram"></i>
        </a>
        <a href="https://www.facebook.com/tuperfil" target="_blank" class="social-icon">
            <i class="fab fa-facebook"></i>
        </a>
    </span>
</footer>

    <!-- FIN DEL FOOTER -->

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="{{asset('js/script.js')}}"></script>
    </body>
</html>

<?php
    // }
    // else if($id_usuario == 0)
    // {
    //     echo 'Igual a 0';
    //     echo '<br>';
    //     echo 'Valor real: ' . $id_usuario;
    // }
    // else {
    //     echo 'Pagina no disponible';
    // }
?>