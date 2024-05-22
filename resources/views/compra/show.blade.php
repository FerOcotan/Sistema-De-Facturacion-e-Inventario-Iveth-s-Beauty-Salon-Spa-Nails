<div class="container">
    <h1>Detalle de la Compra</h1>
    <p><strong>ID:</strong> {{ $compra->id_compra }}</p>
    <p><strong>Proveedor:</strong> {{ $compra->id_proveedor }}</p>
    <p><strong>Empleado:</strong> {{ $compra->id_empleado }}</p>
    <p><strong>Producto:</strong> {{ $compra->id_producto }}</p>
    <p><strong>Cantidad:</strong> {{ $compra->cantidad_compra }}</p>
    <p><strong>Total:</strong> {{ $compra->total_compra }}</p>
    <p><strong>Fecha:</strong> {{ $compra->fecha_hora_compra }}</p>
    <a href="{{ route('compra.index') }}" class="btn btn-secondary">Volver</a>
</div>