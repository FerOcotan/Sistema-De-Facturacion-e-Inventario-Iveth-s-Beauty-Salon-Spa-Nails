@extends ('layouts.plantillaPublica')

{{-- TITULO DE LA PAGINA --}}
@section('title', 'Servicios')

@section('contenido')

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
                <form id="searchForm" action="{{ route('buscarServicio') }}" method="POST">
                    @csrf
                    <input type="search" id="site-search" name="buscarNombre" placeholder="Buscar producto..." />
                    <input type="hidden" value="" name="id_categoria" id="id_categoria">
                    <button type="submit" class="btn-search">
                        <i class="fas fa-search"></i>
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

            <ul class="d-flex justify-content-end align-items-center nav-links">
                <li class="nav-item">
                    <a class="nav-link-hover" href="{{ route('indexProducto') }}">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link-hover" aria-current="page" href="{{ route('servicio') }}">Servicios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link-hover" href="{{ route('reservaciones') }}">Hacer reservación</a>
                </li>
                <li class="nav-item">
                    <button class="logout-button" onclick="window.location.href='{{ route('cerrarSesion') }}'">
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
            
            <h1 style="font-size: 3vw;">Catálogo</h1>
        </div>
    </div>
    <!-- FIN TITULO Y LOGO -->

    <!-- INICIO TARJETAS -->
    <div class="container mb-3 ">
    @foreach ($servicios->chunk(4) as $chunk)
            <div class="d-flex justify-content-between">
                @foreach ($chunk as $item)
            <a href="#" class="aTarjetas">
                <div class="tarjetas">
                    <div class="cuerpo-tarjeta2 text-center">
                        <h5 class="card-title">{{ $item->nombre_servicio }}</h5>
                    </div>

                    <img src="{{ $item->img_servicio }}" class="card-img-top" alt="{{ $item->nombre_servicio }}">

                    <div class="cuerpo-tarjeta text-center">    
                        <p class="card-text card-price">${{ $item->precio_servicio  }}</p>
                    </div>
                </div>
            </a>
            @endforeach
            </div>
        @endforeach
    </div>
    <!-- FIN TARJETAS -->

    <!-- INICIO DE LA PAGINACIÓN -->
    <div class="pagination-container">
        {{ $servicios->links() }}
    </div>
    <!-- FIN DE LA PAGINACIÓN -->

    @if ($sinResultados)
        <script>
            $(document).ready(function() {
                $('#noResultsModal').modal('show');
            });
        </script>
    @endif

@endsection
