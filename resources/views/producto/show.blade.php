<div class="container">
    <h1>Detalle de Productos</h1>
    <p><strong>ID:</strong> {{ $producto->id_producto }}</p>
    <p><strong>Categoria:</strong> {{ $producto->id_categoria }}</p>
    <p><strong>Estado:</strong> {{ $producto->id_estado }}</p>
    <p><strong>Nombre:</strong> {{ $producto->nombre_producto }}</p>
    <p><strong>Precio:</strong> {{ $producto->precio_producto }}</p>
    <p><strong>Existencias:</strong> {{ $producto->existencias }}</p>
    <a href="{{ route('productoempleado.index') }}" class="btn btn-secondary">Volver</a>
</div>