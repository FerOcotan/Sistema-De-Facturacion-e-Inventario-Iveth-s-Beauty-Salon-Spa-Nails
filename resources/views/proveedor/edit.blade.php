<div class="container">
    <h1>Editar Proveedor</h1>
    <form action="{{ route('proveedor.update', $proveedor->id_proveedor) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="nombre_proveedor" class="form-label">Nombre</label>
            <input type="text" name="nombre_proveedor" id="nombre_proveedor" class="form-control" value="{{ $proveedor->nombre_proveedor }}" required>
        </div>
        <div class="mb-3">
            <label for="direccion_proveedor" class="form-label">Direccion</label>
            <input type="text" name="direccion_proveedor" id="direccion_proveedor" class="form-control" value="{{ $proveedor->direccion_proveedor }}" required>
        </div>
        <div class="mb-3">
            <label for="telefono_proveedor" class="form-label">Telefono</label>
            <input type="text" name="telefono_proveedor" id="telefono_proveedor" class="form-control" value="{{ $proveedor->telefono_proveedor }}" required>
        </div>
       
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>