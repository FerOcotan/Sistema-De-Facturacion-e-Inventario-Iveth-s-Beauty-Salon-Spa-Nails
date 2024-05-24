<div class="container">
    <h1>Editar Compra</h1>
    <form action="{{ route('compra.update', $compra->id_compra) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="id_proveedor" class="form-label">Proveedor</label>
            <input type="text" name="id_proveedor" id="id_proveedor" class="form-control" value="{{ $compra->id_proveedor }}" required>
        </div>
        <div class="mb-3">
            <label for="id_empleado" class="form-label">Empleado</label>
            <input type="text" name="id_empleado" id="id_empleado" class="form-control" value="{{ $compra->id_empleado }}" required>
        </div>
        <div class="mb-3">
            <label for="id_producto" class="form-label">Producto</label>
            <input type="text" name="id_producto" id="id_producto" class="form-control" value="{{ $compra->id_producto}}" required>
        </div>
        <div class="mb-3">
            <label for="cantidad_compra" class="form-label">Precio</label>
            <input type="text" name="cantidad_compra" id="cantidad_compra" class="form-control" value="{{ $compra->cantidad_compra }}" required>
        </div>
        <div class="mb-3">
            <label for="total_compra" class="form-label">Existencias</label>
            <input type="text" name="total_compra" id="total_compra" class="form-control" value="{{ $compra->total_compra }}" required>
        </div>
        <div class="mb-3">
            <label for="fecha_hora_compra" class="form-label">Fecha</label>
            <input type="text" name="fecha_hora_compra" id="fecha_hora_compra" class="form-control" value="{{ $compra->fecha_hora_compra }}" required>
        </div>
       
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>