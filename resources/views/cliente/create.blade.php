
<div class="container">
    <h1>Crear Producto</h1>
    <form action="{{ route('cliente.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_estado" class="form-label">Estado</label>
            <input type="text" class="form-control" id="id_estado" name="id_estado" placeholder="Estado" required>
        </div>
        <div class="mb-3">
            <label for="nombre_cliente" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre_cliente" name="nombre_cliente" placeholder="Nombre" required>
        </div>
        <div class="mb-3">
            <label for="apellido_cliente" class="form-label">Apellido</label>
            <input type="text" class="form-control" id="apellido_cliente" name="apellido_cliente" placeholder="Apellido" required>
        </div>
        <div class="mb-3">
            <label for="telefono_cliente" class="form-label">Telefono</label>
            <input type="text" class="form-control" id="telefono_cliente" name="telefono_cliente" placeholder="Telefono" required>
        </div>
        <div class="mb-3">
            <label for="direccion_cliente" class="form-label">Direccion</label>
            <input type="text" class="form-control" id="direccion_cliente" name="direccion_cliente" placeholder="Direccion" required>
        </div>
        <div class="mb-3">
            <label for="dui_cliente" class="form-label">Dui</label>
            <input type="text" class="form-control" id="dui_cliente" name="dui_cliente" placeholder="Dui" required>
        </div>
        <div class="mb-3">
            <label for="email_cliente" class="form-label">Email</label>
            <input type="text" class="form-control" id="email_cliente" name="email_cliente" placeholder="Email" required>
        </div>
        <div class="mb-3">
            <label for="clave_cliente" class="form-label">Clave</label>
            <input type="text" class="form-control" id="clave_cliente" name="clave_cliente" placeholder="Clave" required>
        </div>

        <button type="submit" class="btn btn-primary" >Guardar</button>
       
    </form>
</div>