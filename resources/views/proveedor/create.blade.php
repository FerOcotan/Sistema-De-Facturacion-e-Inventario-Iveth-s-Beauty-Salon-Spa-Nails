
<div class="container">
    <h1>Crear Reservacion</h1>
    <form action="{{ route('proveedor.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre_proveedor" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre_proveedor" name="nombre_proveedor" placeholder="Nombre" required>
        </div>
        <div class="mb-3">
            <label for="direccion_proveedor" class="form-label">Direccion</label>
            <input type="text" class="form-control" id="direccion_proveedor" name="direccion_proveedor" placeholder="Direccion" required>
        </div>
        <div class="mb-3">
            <label for="telefono_proveedor" class="form-label">Telefono</label>
            <input type="text" class="form-control" id="telefono_proveedor" name="telefono_proveedor" placeholder="Telefono" required>
        </div>
        
        <button type="submit" class="btn btn-primary" >Guardar</button>
       
    </form>
</div>