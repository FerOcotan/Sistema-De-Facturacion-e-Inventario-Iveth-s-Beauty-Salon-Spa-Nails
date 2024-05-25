
    <div class="container">
        <h1>Detalle de la Venta</h1>
        <p><strong>ID:</strong> {{ $venta->id_venta }}</p>
        <p><strong>Cliente:</strong> {{ $venta->id_cliente }}</p>
        <p><strong>Empleado:</strong> {{ $venta->id_empleado }}</p>
        <p><strong>Método de Pago:</strong> {{ $venta->metodo_pago_venta }}</p>
        <p><strong>Fecha:</strong> {{ $venta->fecha_hora_venta }}</p>
        <p><strong>Total:</strong> {{ $venta->total_venta }}</p>
        <a href="{{ route('venta.index') }}" class="btn btn-secondary">Volver</a>
    </div>


