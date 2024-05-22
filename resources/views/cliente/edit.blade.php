<div class="container">
    <h1>Editar producto</h1>
    <form action="{{ route('cliente.update', $cliente->id_cliente) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="id_estado" class="form-label">Estado</label>
            <input type="text" name="id_estado" id="id_estado" class="form-control" value="{{ $cliente->id_estado }}" required>
        </div>
        <div class="mb-3">
            <label for="nombre_cliente" class="form-label">Nombre</label>
            <input type="text" name="nombre_cliente" id="nombre_cliente" class="form-control" value="{{ $cliente->nombre_cliente }}" required>
        </div>
        <div class="mb-3">
            <label for="apellido_cliente" class="form-label">Apellido</label>
            <input type="text" name="apellido_cliente" id="apellido_cliente" class="form-control" value="{{ $cliente->apellido_cliente }}" required>
        </div>
        <div class="mb-3">
            <label for="telefono_cliente" class="form-label">Telefono</label>
            <input type="text" name="telefono_cliente" id="telefono_cliente" class="form-control" value="{{ $cliente->telefono_cliente }}" required>
        </div>
        <div class="mb-3">
            <label for="direccion_cliente" class="form-label">Direccion</label>
            <input type="text" name="direccion_cliente" id="direccion_cliente" class="form-control" value="{{ $cliente->direccion_cliente }}" required>
        </div>
        <div class="mb-3">
            <label for="dui_cliente" class="form-label">Dui</label>
            <input type="text" name="dui_cliente" id="dui_cliente" class="form-control" value="{{ $cliente->dui_cliente }}" required>
        </div>
        <div class="mb-3">
            <label for="email_cliente" class="form-label">Email</label>
            <input type="text" name="email_cliente" id="email_cliente" class="form-control" value="{{ $cliente->email_cliente }}" required>
        </div>
        <div class="mb-3">
            <label for="clave_cliente" class="form-label">Clave</label>
            <input type="text" name="clave_cliente" id="clave_cliente" class="form-control" value="{{ $cliente->clave_cliente }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>