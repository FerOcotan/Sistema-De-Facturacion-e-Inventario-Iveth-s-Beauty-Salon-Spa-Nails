
<div class="container">
    <h1>Crear Compra</h1>
    <form action="{{ route('compra.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_proveedor" class="form-label">Proveedor</label>
            <input type="text" class="form-control" id="id_proveedor" name="id_proveedor" placeholder="Proveedor" required>
        </div>
        <div class="mb-3">
            <label for="id_empleado" class="form-label">Empleado</label>
            <input type="text" class="form-control" id="id_empleado" name="id_empleado" placeholder="Empleado" required>
        </div>
        <div class="mb-3">
            <label for="id_producto" class="form-label">Producto</label>
            <input type="text" class="form-control" id="id_producto" name="id_producto" placeholder="Producto" required>
        </div>
        <div class="mb-3">
            <label for="cantidad_compra" class="form-label">Cantidad</label>
            <input type="text" class="form-control" id="cantidad_compra" name="cantidad_compra" placeholder="Cantidad" required>
        </div>
        <div class="mb-3">
            <label for="total_compra" class="form-label">Total</label>
            <input type="text" class="form-control" id="total_compra" name="total_compra" placeholder="Total" required>
        </div>
        <div class="mb-3">
            <label for="fecha_hora_compra" class="form-label">Fecha</label>
            <input type="date" class="form-control" id="fecha_hora_compra" name="fecha_hora_compra" placeholder="Fecha" required>
        </div>

        <button type="submit" class="btn btn-primary" >Guardar</button>
       
    </form>
</div>