@extends ('layouts.plantillaPublica')
@section('contenido')

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
</head>

<!-- INICIO DEL NAVBAR -->
<header>
    <nav class="navbarTop ps-3 pe-5">
        <a href="{{ route('indexProducto') }}">
            <div class="logo">
                <img src="{{ asset('img/logo_delgado.png') }}" alt="Logo">
            </div>
        </a>

     <!-- INICIO BUSCAR -->
<div class="search-container">
    <form id="searchForm" action="{{ route('buscarProducto') }}" method="POST">
        {{ csrf_field() }}
        <input type="search" id="site-search" name="buscarNombre" placeholder="Buscar producto..." />
        <input type="hidden" value="" name="id_categoria" id="id_categoria">
        <button type="submit" class="btn-search">
            <i class="fas fa-search"></i>
        </button>
        <button type="button" class="btn-filter" data-bs-toggle="modal" data-bs-target="#filterModal">
            <i class="fas fa-filter"></i>
        </button>
    </form>
</div>

<!-- Modal de Alerta -->
@if ($sinResultados)
    <div class="modal fade" id="noResultsModal" tabindex="-1" aria-labelledby="noResultsModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="noResultsModalLabel">Sin Resultados</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    No se encontraron productos que coincidan con tu búsqueda.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
@endif
<!-- FIN BUSCAR -->

        <!-- Modal de Filtro -->
        <div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="filterModalLabel">Buscar por Categoría</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="text-center">
                            <span style="font-size: 1.5vw">Categorías</span>
                            <hr>
                            <select class="form-control" name="idCatCombo" id="idCatCombo" onchange="selecCat()" style="font-size: 1.2vw">
                                
                                @foreach ($categorias as $item)
                                <option value="{{ $item->id_categoria }}" style="font-size: 1vw; color: black;" >{{ $item->nombre_categoria }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" onclick="applyFilterAndSubmit()">Aplicar Filtro</button>
                    </div>
                </div>
            </div>
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

<!-- INICIO TITULO Y LOGO -->
<div class="container d-flex justify-content-center">
    <div class="tituloLogo text-center">
       
        <h1 style="font-size: 2.7vw;">Productos</h1>
    </div>
</div>
<!-- FIN TITULO Y LOGO -->

<!-- INICIO TARJETAS -->
<div class="container mb-3">
    @foreach ($productos->chunk(4) as $chunk)
        <div class="d-flex justify-content-between">
            @foreach ($chunk as $item)
                <a href="#" class="aTarjetas">
                    <div class="tarjetas">
                    <div class="cuerpo-tarjeta2 text-center">
                            <h5 class="card-title">{{ $item->nombre_producto }}</h5>
                          
                            
                        </div>
                        <img src="./img/Beneficios-de-cortarse-el-pelo.jpg" class="card-img-top" alt="...">
                        <div class="cuerpo-tarjeta text-center">
                          
                          
                            <p class="card-text card-price">${{ $item->precio_producto }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    @endforeach
</div>
<!-- FIN TARJETAS -->


<script>
    $(document).ready(function() {
        @if ($sinResultados)
            $('#noResultsModal').modal('show');
        @endif
    });
</script>

<!-- INCIO DE LA PAGINACIÓN -->
{{ $productos->links() }}
<!-- FIN DE LA PAGINACIÓN -->
@endsection
