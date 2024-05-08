@extends('layouts.plantillaPublica')
@section('contenido')

<!-- INICIO TITULO Y LOGO -->
<div class="container d-flex justify-content-center mt-4 ">
    <h1 style="font-size: 4vw;">Reservación de Citas</h1>
</div>
<!-- FIN TITULO Y LOGO -->

<!-- INICIO DEL FORMULARIO -->
<div class="container d-flex justify-content-center">
    <form action="">
        <div>
            <input type="text" placeholder="Nombre Completo" class="text-style">
        </div>
        <div>
            <input type="text" placeholder="Teléfono" class="text-style">
        </div>
        <div>
            <textarea placeholder="Dirección" class="area-style"></textarea>
        </div>
        <div>
            <input type="text" placeholder="Dui" class="text-style">
        </div>
        <div>
            <input type="text" placeholder="E-mail" class="text-style">
        </div>
        <div>
            <select name="" id="" class="combo-style">
                <option selected>Seleccione un Servicio</option>
            </select>
        </div>
        <div>
            <select name="" id="" class="combo-style">
                <option selected>Método de Pago</option>
                <option value="">Transferencia</option>
                <option value="">Tarjeta</option>
                <option value="">Efectivo</option>
            </select>
        </div>

        <div class="d-flex ">
            <input type="date" class="datetime-style">
            <input type="time" class="datetime-style">
        </div>

        <div class="text-center">
            <button class="btn-style">Aceptar</button>
        </div>
    </form>
</div>
<!-- FIN DEL FORMULARIO -->

@endsection