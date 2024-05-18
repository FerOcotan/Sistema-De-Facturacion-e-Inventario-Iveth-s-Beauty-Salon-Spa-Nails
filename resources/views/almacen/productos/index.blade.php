@extends ('layouts.plantillaPublica')
@section('contenido')




    <!-- INICIO BUSCAR -->
    <form action="{{ route('buscarProducto') }}" method="POST">
        {{ csrf_field() }}
        <div class="container d-flex justify-content-between mb-3">
            <input type="hidden" value="" name="id_categoria" id="id_categoria">
            <div>
                <h1 style="font-size: 3vw;">Productos</h1>
            </div>
            <div class="buscarInput d-flex">
                <div>
                    <input type="text" placeholder="Buscar..." name="buscarNombre" id="buscarNombre" style="margin-right: 8.9vw;">
                    <button type="submit" class="aLupa"><img src="./img/lupa.png" class="lupa" alt=""></button>
                </div>
            </div>

            <button type="button" class="botonBuscar"><img src="./img/filtrar.png" class="filtro" alt=""></button>

            <div class="divFiltro">
                <div class="text-center">
                    <span style="font-size: 2vw">Categorias</span>
                    <hr>
                    <select class="form-control" name="idCatCombo" id="idCatCombo" onchange="selecCat()" style="font-size: 1.5vw">
                        <option selected style="font-size: 2vw">Seleccione...</option>
                        @foreach ($categorias as $item)
                        <?php   
                            echo '<option value="'. $item->id_categoria .'" style="font-size: 2vw">'. $item->nombre .'</option>';
                        ?>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </form>
    <!-- FIN BUSCAR -->

    <!-- INICIO TARJETAS -->
    <?php
    $producto = [[]];
    $iProd = 0;
    
    foreach ($productos as $item) {
        $producto[$iProd][0] = $item->id_producto;
        $producto[$iProd][1] = $item->nombre_producto;
        $producto[$iProd][2] = $item->precio_producto;
        $iProd++;
    }
    
    echo '<div class="container mb-3 d-flex justify-content-between ">';
    
    for ($i = 0; $i < count($producto); $i++) {
        if ($i < 4) {
            echo '
                    <a href="#" class="aTarjetas">
                        <div class="tarjetas">
                            <img src="./img/Beneficios-de-cortarse-el-pelo.jpg" class="card-img-top" alt="...">
                            <div class="cuerpo-tarjeta text-center ">
                                <h5 class="card-title" style="font-size: 2.3vw;">' .
                $producto[$i][1] .
                '</h5>
                                <p class="card-text" style="font-size: 2vw; margin-top: -1vw;">$' .
                $producto[$i][2] .
                '</p>
                            </div>
                        </div>
                    </a>
                ';
        }
    }
    
    echo '</div>';
    
    echo '<div class="container mb-3 d-flex justify-content-between ">';
    
    for ($i = 4; $i < count($producto); $i++) {
        if ($i < 8) {
            echo '
                    <a href="#" class="aTarjetas">
                        <div class="tarjetas">
                            <img src="./img/Beneficios-de-cortarse-el-pelo.jpg" class="card-img-top" alt="...">
                            <div class="cuerpo-tarjeta text-center ">
                                <h5 class="card-title" style="font-size: 2.3vw;">' .
                $producto[$i][1] .
                '</h5>
                                <p class="card-text" style="font-size: 2vw; margin-top: -1vw;">$' .
                $producto[$i][2] .
                '</p>
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
    {{ $productos->links() }}
    <!-- FIN DE LA PAGINACIÓN -->
@endsection