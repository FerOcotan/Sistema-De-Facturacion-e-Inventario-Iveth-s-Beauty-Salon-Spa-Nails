<div class="container">
    <h1>Detalle de Servicio</h1>
    <p><strong>ID:</strong> {{ $servicio->id_servicio }}</p>
    <p><strong>Estado:</strong> {{ $servicio->id_estado }}</p>
    <p><strong>Nombre:</strong> {{ $servicio->nombre_servicio }}</p>
    <p><strong>Descripcion:</strong> {{ $servicio->descripcion_servicio }}</p>
    <p><strong>Precio:</strong> {{ $servicio->precio_servicio }}</p>
    <a href="{{ route('servicio.index') }}" class="btn btn-secondary">Volver</a>
</div>