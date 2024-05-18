<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
    <!-- Añadir link a Font Awesome para usar iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <!-- INICIO DEL NAVBAR -->
    <header>
        <nav class="navbarTop ps-3 pe-5">
            <div class="logo">
                <img src="{{ asset('img/logob.png') }}"  alt="Logo">
            </div>
            <!-- INICIO BUSCAR -->
            <form action="{{ route('buscarProducto') }}" method="POST" class="search-container d-flex">
                {{ csrf_field() }}
                <input type="hidden" value="" name="id_categoria" id="id_categoria">
                <input type="text" class="search-input" placeholder="Buscar..." name="buscarNombre" id="buscarNombre">
                <button type="submit" class="aLupa"><img src="{{ asset('img/lupa.png') }}" class="lupa" alt=""></button>
                <button type="button" class="filter-button" id="filter-button">
                    <img src="{{ asset('img/filtrar.png') }}" class="filtro" alt="">
                </button>
                <div class="divFiltro" id="divFiltro">
                    <div class="text-center">
                        <span style="font-size: 2vw">Categorias</span>
                        <hr>
                        <select class="form-control" name="idCatCombo" id="idCatCombo" onchange="selecCat()" style="font-size: 1.5vw">
                            <option selected style="font-size: 2vw">Seleccione...</option>
                            @foreach ($categorias as $item)
                                <option value="{{ $item->id_categoria }}" style="font-size: 2vw">{{ $item->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </form>
            <!-- FIN BUSCAR -->
            <ul class="d-flex justify-content-end align-items-center nav-links">
                <li class="nav-item">
                    <a class="nav-link-hover" href="{{ route('indexProducto') }}">
                        <i class="fas fa-box"></i> Productos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link-hover" aria-current="page" href="{{ route('servicio') }}">
                        <i class="fas fa-concierge-bell"></i> Servicios
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link-hover" aria-current="page" href="{{ route('reservaciones') }}">
                        <i class="fas fa-calendar"></i> Agendar
                    </a>
                </li>
                <li class="nav-item">
                    <button class="logout-button" onclick="window.location.href='{{ route('cerrarSesion') }}'">
                        <i class="fas fa-sign-out-alt"></i> Salir
                    </button>
                </li>
            </ul>
        </nav>
    </header>
    <!-- FIN DEL NAVBAR -->
    <script>
        // Script para mostrar y ocultar el filtro de categorías
        document.getElementById('filter-button').addEventListener('click', function() {
            var divFiltro = document.getElementById('divFiltro');
            if (divFiltro.style.display === 'block') {
                divFiltro.style.display = 'none';
            } else {
                divFiltro.style.display = 'block';
            }
        });

        // Función para manejar la selección de categorías
        function selecCat() {
            var select = document.getElementById('idCatCombo');
            var idCategoria = select.value;
            document.getElementById('id_categoria').value = idCategoria;
        }
    </script>
</body>
</html>
