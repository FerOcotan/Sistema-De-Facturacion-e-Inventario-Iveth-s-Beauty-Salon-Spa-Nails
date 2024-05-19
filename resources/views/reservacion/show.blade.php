
<div class="container">
    <h1>Detalle de la Reservacion</h1>
    <p><strong>ID:</strong> {{ $reservacion->id_reservacion }}</p>
    <p><strong>Cliente:</strong> {{ $reservacion->id_cliente }}</p>
    <p><strong>Servicio:</strong> {{ $reservacion->id_servicio }}</p>
    <p><strong>Estado:</strong> {{ $reservacion->id_estado }}</p>
    <p><strong>Metodo Pago:</strong> {{ $reservacion->metodo_pago_venta }}</p>
    <p><strong>Fecha:</strong> {{ $reservacion->fecha_hora_reservacion }}</p>
    <a href="{{ route('reservacion.index') }}" class="btn btn-secondary">Volver</a>
</div>