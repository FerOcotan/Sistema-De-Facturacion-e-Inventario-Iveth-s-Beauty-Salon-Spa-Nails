@extends('layouts.plantillaPublica')
@section('contenido')

<!-- INICIO TITULO Y LOGO -->
<div class="container d-flex justify-content-center mt-5 ">
    <h1 style="font-size: 4vw;">Reservación de Citas</h1>
</div>
<!-- FIN TITULO Y LOGO -->

<!-- INICIO DEL FORMULARIO -->
<div class="container mb-5 d-flex justify-content-center">
    <form action="{{route('realizarReserva')}}" method="POST">
        {{ csrf_field() }}
        <div>
            <input type="text" value="{{ $cliente->first()->nombre . ' ' . $cliente->first()->apellido }}" class="text-style" readonly>
        </div>
        <div>
            <input type="text" value="{{ $cliente->first()->telefono }}" class="text-style" readonly>
        </div>
        <div>
            <textarea class="area-style" readonly>{{ $cliente->first()->direccion }}</textarea>
        </div>
        <div>
            <input type="text" value="{{ $cliente->first()->dui }}" class="text-style" readonly>
        </div>
        <div>
            <input type="text" value="{{ $cliente->first()->email }}" class="text-style" readonly>
        </div>
        <div>
            <select name="id_servicio" id="id_servicio" class="combo-style">
                <option selected>Seleccione un Servicio</option>
                @foreach ($servicios as $item)
                    <?php
                        echo '<option value="'. $item->id_servicio .'">'. $item->nombre .'</option>';
                    ?>
                @endforeach
            </select>
        </div>
        <div>
            <select name="metodo_pago" id="metodo_pago" class="combo-style">
                <option selected>Método de Pago</option>
                <option value="Transferencia">Transferencia</option>
                <option value="Tarjeta">Tarjeta</option>
                <option value="Efectivo">Efectivo</option>
            </select>
        </div>

        <div class="d-flex ">
            <input type="date" class="datetime-style" name="fecha" id="fecha">
            <input type="time" class="datetime-style" name="hora" id="hora">
        </div>

        <div class="text-center">
            <button class="btn-style">Aceptar</button>
        </div>
    </form>
</div>
<!-- FIN DEL FORMULARIO -->

@endsection