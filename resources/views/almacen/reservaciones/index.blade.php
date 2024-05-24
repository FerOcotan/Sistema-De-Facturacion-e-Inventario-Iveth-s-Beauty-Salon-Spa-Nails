@extends('layouts.plantillaPublica')
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
<div class="container d-flex justify-content-center mt-5 ">
    <h1 style="font-size: 4vw;">Reservación de Citas</h1>
</div>
<!-- FIN TITULO Y LOGO -->

<div class="container mb-5 d-flex justify-content-center">
    <form action="{{route('realizarReserva')}}" method="POST" id="reservaForm">
        {{ csrf_field() }}
        <div>
            <div>
                <p class="card-text card-price">Nombre Cliente</p>
            </div>
            <input type="text" id="nombre_cliente" value="{{ $cliente->first()->nombre_cliente . ' ' . $cliente->first()->apellido_cliente }}" class="text-style" readonly>
        </div>
        <div>
            <div>
                <p class="card-text card-price">Telefono</p>
            </div>
            <input type="text" id="telefono_cliente" value="{{ $cliente->first()->telefono_cliente }}" class="text-style" readonly>
        </div>
        <div>
            <div>
                <p class="card-text card-price">Dirección</p>
            </div>
            <textarea id="direccion_cliente" class="area-style" readonly>{{ $cliente->first()->direccion_cliente }}</textarea>
        </div>
        <div>
            <div>
                <p class="card-text card-price">DUI</p>
            </div>
            <input type="text" id="dui_cliente" value="{{ $cliente->first()->dui_cliente }}" class="text-style" readonly>
        </div>
        <div>
            <div>
                <p class="card-text card-price">E-mail</p>
            </div>
            <input type="text" id="email_cliente" value="{{ $cliente->first()->email_cliente }}" class="text-style" readonly>
        </div>
        <hr>
        <div>
            <div>
                <p class="card-text card-price text-center">Servicio a realizar</p>
            </div>
            <select name="id_servicio" id="id_servicio" class="combo-style">
                
                @foreach ($servicios as $item)
                    <option value="{{ $item->id_servicio }}">{{ $item->nombre_servicio }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <div>
                <p class="card-text card-price text-center">Pago</p>
            </div>
            <select name="metodo_pago" id="metodo_pago" class="combo-style">
                
                <option value="Transferencia">Transferencia</option>
                <option value="Tarjeta">Tarjeta</option>
                <option value="Efectivo">Efectivo</option>
            </select>
        </div>
        <hr>
        <div>
            <p class="card-text card-price text-center">Fecha y Hora de la cita:</p>
        </div>
        <div class="d-flex">
            <input type="date" id="fecha" class="datetime-style" name="fecha">
            <input type="time" id="hora" class="datetime-style" name="hora">
        </div>
        <div class="text-center">
            <button type="button" class="btn-style" data-toggle="modal" data-target="#confirmModal" onclick="updateModal()">Aceptar</button>
        </div>
    </form>
</div>

<!-- Modal -->
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmModalLabel">Confirmación de Reserva</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="resumenReserva"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="confirmButton">Confirmar</button>
            </div>
        </div>
    </div>
</div>


<script>
    function updateModal() {
        const nombre = document.getElementById('nombre_cliente').value;
        const servicio = document.getElementById('id_servicio').selectedOptions[0].text;
        const pago = document.getElementById('metodo_pago').value;
        const fecha = document.getElementById('fecha').value;
        const hora = document.getElementById('hora').value;

        const resumen = `Su cita se realizará el día ${fecha} a las ${hora} a nombre de ${nombre}. El servicio a realizar es ${servicio} y el método de pago seleccionado es ${pago}.`;

        document.getElementById('resumenReserva').innerText = resumen;
    }

    document.getElementById('confirmButton').addEventListener('click', function() {
        document.getElementById('reservaForm').submit();
    });
</script>

@endsection