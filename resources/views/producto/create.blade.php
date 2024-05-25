
<div class="container">
    <h1>Crear Producto</h1>
    <form action="{{ route('productoempleado.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_categoria" class="form-label">Categoria</label>
            <input type="text" class="form-control" id="id_categoria" name="id_categoria" placeholder="Categoria" required>
        </div>
        <div class="mb-3">
            <label for="id_estado" class="form-label">Estado</label>
            <input type="text" class="form-control" id="id_estado" name="id_estado" placeholder="Estado" required>
        </div>
        <div class="mb-3">
            <label for="nombre_producto" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre_producto" name="nombre_producto" placeholder="Nombre" required>
        </div>
        <div class="mb-3">
            <label for="precio_producto" class="form-label">Precio</label>
            <input type="text" class="form-control" id="precio_producto" name="precio_producto" placeholder="Precio" required>
        </div>
        <div class="mb-3">
            <label for="existencias" class="form-label">Existencias</label>
            <input type="text" class="form-control" id="existencias" name="existencias" placeholder="Existencias" required>
        </div>

        <button type="submit" class="btn btn-primary" >Guardar</button>
       
    </form>
</div>