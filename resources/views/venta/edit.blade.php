    <div class="container">
        <h1>Editar Venta</h1>
        <form action="{{ route('venta.update', $venta->id_venta) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="id_cliente" class="form-label">Cliente</label>
                <input type="text" name="id_cliente" id="id_cliente" class="form-control" value="{{ $venta->id_cliente }}" required>
            </div>
            <div class="mb-3">
                <label for="id_empleado" class="form-label">Empleado</label>
                <input type="text" name="id_empleado" id="id_empleado" class="form-control" value="{{ $venta->id_empleado }}" required>
            </div>
            <div class="mb-3">
                <label for="metodo_pago_venta" class="form-label">Metodo Pago</label>
                <input type="text" name="metodo_pago_venta" id="metodo_pago_venta" class="form-control" value="{{ $venta->metodo_pago_venta }}" required>
            </div>
            <div class="mb-3">
                <label for="fecha_hora_venta" class="form-label">Fecha</label>
                <input type="text" name="fecha_hora_venta" id="fecha_hora_venta" class="form-control" value="{{ $venta->fecha_hora_venta }}" required>
            </div>
            <div class="mb-3">
                <label for="total_venta" class="form-label">Total</label>
                <input type="text" name="total_venta" id="total_venta" class="form-control" value="{{ $venta->total_venta }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>

