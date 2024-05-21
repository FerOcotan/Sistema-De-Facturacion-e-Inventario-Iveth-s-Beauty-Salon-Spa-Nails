<div class="container">
    <h1>Editar producto</h1>
    <form action="{{ route('producto.update', $producto->id_producto) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="id_categoria" class="form-label">Categoria</label>
            <input type="text" name="id_categoria" id="id_categoria" class="form-control" value="{{ $producto->id_categoria }}" required>
        </div>
        <div class="mb-3">
            <label for="id_estado" class="form-label">Estado</label>
            <input type="text" name="id_estado" id="id_estado" class="form-control" value="{{ $producto->id_estado }}" required>
        </div>
        <div class="mb-3">
            <label for="nombre_producto" class="form-label">Producto</label>
            <input type="text" name="nombre_producto" id="nombre_producto" class="form-control" value="{{ $producto->nombre_producto }}" required>
        </div>
        <div class="mb-3">
            <label for="precio_producto" class="form-label">Precio</label>
            <input type="text" name="precio_producto" id="precio_producto" class="form-control" value="{{ $producto->precio_producto }}" required>
        </div>
        <div class="mb-3">
            <label for="existencias" class="form-label">Existencias</label>
            <input type="text" name="existencias" id="existencias" class="form-control" value="{{ $producto->existencias }}" required>
        </div>
       
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>