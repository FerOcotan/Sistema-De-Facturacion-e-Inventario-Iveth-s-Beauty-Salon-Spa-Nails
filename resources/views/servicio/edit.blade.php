<div class="container">
    <h1>Editar Servicio</h1>
    <form action="{{ route('servicioempleado.update', $servicio->id_servicio) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="id_estado" class="form-label">Estado</label>
            <input type="text" name="id_estado" id="id_estado" class="form-control" value="{{ $servicio->id_estado }}" required>
        </div>
        <div class="mb-3">
            <label for="nombre_servicio" class="form-label">Nombre</label>
            <input type="text" name="nombre_servicio" id="nombre_servicio" class="form-control" value="{{ $servicio->nombre_servicio }}" required>
        </div>
        <div class="mb-3">
            <label for="descripcion_servicio" class="form-label">Descripcion</label>
            <input type="text" name="descripcion_servicio" id="descripcion_servicio" class="form-control" value="{{ $servicio->descripcion_servicio }}" required>
        </div>
        <div class="mb-3">
            <label for="precio_servicio" class="form-label">Precio</label>
            <input type="text" name="precio_servicio" id="precio_servicio" class="form-control" value="{{ $servicio->precio_servicio }}" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
