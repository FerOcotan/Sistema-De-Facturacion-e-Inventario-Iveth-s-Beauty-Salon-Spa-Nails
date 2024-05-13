@extends ('layouts.plantillaPublica')
@section ('contenido')

<!-- INICIO TITULO Y LOGO -->
<div class="container d-flex justify-content-center">
    <div class="tituloLogo text-center">
        <img src="{{asset('./img/logo_delgado.png')}}" alt="">
        <h1 style="font-size: 4vw;">Catálogo</h1>
    </div>
</div>
<!-- FIN TITULO Y LOGO -->

<!-- INICIO BUSCAR -->
<form action="{{ route('buscarServicio') }}" method="POST">
    {{ csrf_field() }}
    <div class="container d-flex justify-content-between mb-3">
        <input type="hidden" value="" name="id_categoria" id="id_categoria">
        <div>
            <h1 style="font-size: 3vw;">Servicios</h1>
        </div>
        <div class="buscarInput d-flex">
            <div>
                <input type="text" placeholder="Buscar..." name="buscarNombre" id="buscarNombre" style="margin-right: 8.9vw;">
                <button type="submit" class="aLupa"><img src="{{asset('./img/lupa.png')}}" class="lupa" alt=""></button>
            </div>
        </div>

        <button type="button" class="botonBuscar"><img src="{{asset('./img/filtrar.png')}}" class="filtro" alt=""></button>
    </div>
</form>
<!-- FIN BUSCAR -->

<!-- INICIO TARJETAS -->
<?php   
    $producto = [[]];
    $iProd = 0;

    foreach ($servicios as $item)
    {    
        $producto[$iProd][0] = $item->id_producto;
        $producto[$iProd][1] = $item->nombre;
        $producto[$iProd][2] = $item->precio;
        $iProd++;   
    }
        
    echo '<div class="container mb-3 d-flex justify-content-between ">';

    for ($i=0; $i < count($producto); $i++) { 
        if ($i < 4) {
            echo '
                <a href="#" class="aTarjetas">
                    <div class="tarjetas">
                        <img src="';?>{{ asset('./img/Beneficios-de-cortarse-el-pelo.jpg') }}<?php echo'" class="card-img-top" alt="...">
                        <div class="cuerpo-tarjeta text-center ">
                            <h5 class="card-title" style="font-size: 2.3vw;">' . $producto[$i][1]. '</h5>
                            <p class="card-text" style="font-size: 2vw; margin-top: -1vw;">$' . $producto[$i][2]. '</p>
                        </div>
                    </div>
                </a>
            ';
        }
    }

    echo '</div>';

    echo '<div class="container mb-3 d-flex justify-content-between ">';

    for ($i=4; $i < count($producto); $i++) { 
        if ($i < 8) {
            echo '
                <a href="#" class="aTarjetas">
                    <div class="tarjetas">
                        <img src="';?>{{ asset('./img/Beneficios-de-cortarse-el-pelo.jpg') }}<?php echo'" class="card-img-top" alt="...">
                        <div class="cuerpo-tarjeta text-center ">
                            <h5 class="card-title" style="font-size: 2.3vw;">' . $producto[$i][1]. '</h5>
                            <p class="card-text" style="font-size: 2vw; margin-top: -1vw;">$' . $producto[$i][2]. '</p>
                        </div>
                    </div>
                </a>
            ';
        }
    }

    echo '</div>';
?>
<!-- FIN TARJETAS -->

<!-- INCIO DE LA PAGINACIÓN -->
    {{$servicios->links()}}
<!-- FIN DE LA PAGINACIÓN -->

@endsection