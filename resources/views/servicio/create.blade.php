
<div class="container">
    <h1>Crear Servicio</h1>
    <form action="{{ route('servicio.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_estado" class="form-label">Estado</label>
            <input type="text" class="form-control" id="id_estado" name="id_estado" placeholder="Estado" required>
        </div>
        <div class="mb-3">
            <label for="nombre_servicio" class="form-label">Servicio</label>
            <input type="text" class="form-control" id="nombre_servicio" name="nombre_servicio" placeholder="Servicio" required>
        </div>
        <div class="mb-3">
            <label for="descripcion_servicio" class="form-label">Descripcion</label>
            <input type="text" class="form-control" id="descripcion_servicio" name="descripcion_servicio" placeholder="Descripcion" required>
        </div>
        <div class="mb-3">
            <label for="precio_servicio" class="form-label">Precio</label>
            <input type="text" class="form-control" id="precio_servicio" name="precio_servicio" placeholder="Precio" required>
        </div>
        
        <button type="submit" class="btn btn-primary" >Guardar</button>
       
    </form>
</div>