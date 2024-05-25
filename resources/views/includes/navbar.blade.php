<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link href="{{ asset('./css/navbar.css') }}" rel="stylesheet">
    <!-- Añadir link a Font Awesome para usar un icono de logout -->
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300;400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script>
        // Aplica el modo oscuro antes de que el navegador pinte la página
        if (localStorage.getItem("modoOscuro") === "true") {
            document.documentElement.classList.add("dark-mode");
        }
    </script>
</head>

<body>


    <!-- INICIO DEL NAVBAR -->
    <header>
        <nav class="navbarTop ps-3 pe-5">
        <a href="{{ route('indexProducto') }}">
                <div class="logo">
                    <img src="{{ asset('img/logo_delgado.png') }}" alt="Logo">
                </div>
            </a>

            
            
            <div class="search-container">
                <input type="search" id="site-search" name="q" />
                <button class="btn-search">
                    <i class="fas fa-search"></i>
                </button>
                </div>


            <ul class="d-flex justify-content-end align-items-center nav-links">
                <li class="nav-item">
                    <a class="nav-link-hover" href="{{route('indexProducto')}}">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link-hover" aria-current="page" href="{{route('servicio')}}">Servicios</a>
                </li>
                <li class="nav-item">
                    <a class="mav-link-hover" onclick="window.location.href='{{route('reservaciones')}}'">Hacer reservación</a>
                </li>
                <li class="nav-item">
                    <button class="logout-button" onclick="window.location.href='{{route('cerrarSesion')}}'">
                        <i class="fas fa-sign-out-alt"></i>
                    </button>
                </li>
            </ul>
        </nav>
    </header>
    <!-- FIN DEL NAVBAR -->

   

</body>
</html>
