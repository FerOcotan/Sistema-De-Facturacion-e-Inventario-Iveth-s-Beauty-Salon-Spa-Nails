<div class="container">
    <h1>Detalle de Proveedor</h1>
    <p><strong>ID:</strong> {{ $proveedor->id_proveedor }}</p>
    <p><strong>Nombre:</strong> {{ $proveedor->nombre_proveedor }}</p>
    <p><strong>Direccion:</strong> {{ $proveedor->direccion_proveedor }}</p>
    <p><strong>Telefono:</strong> {{ $proveedor->telefono_proveedor }}</p>
    <a href="{{ route('proveedor.index') }}" class="btn btn-secondary">Volver</a>
</div>