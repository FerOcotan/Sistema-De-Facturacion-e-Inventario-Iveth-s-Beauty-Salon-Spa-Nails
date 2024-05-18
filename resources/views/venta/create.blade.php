
    <div class="container">
        <h1>Crear Venta</h1>
        <form action="{{ route('venta.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="id_cliente" class="form-label">Cliente</label>
                <input type="text" class="form-control" id="id_cliente" name="id_cliente" placeholder="Cliente" required>
            </div>
            <div class="mb-3">
                <label for="id_empleado" class="form-label">Empleado</label>
                <input type="text" class="form-control" id="id_empleado" name="id_empleado" placeholder="Empleado" required>
            </div>
            <div class="mb-3">
                <label for="metodo_pago_venta" class="form-label">Metodo Pago</label>
                <input type="text" class="form-control" id="metodo_pago_venta" name="metodo_pago_venta" placeholder="Metodo pago" required>
            </div>
            <div class="mb-3">
                <label for="fecha_hora_venta" class="form-label">Fecha</label>
                <input type="text" class="form-control" id="fecha_hora_venta" name="fecha_hora_venta" placeholder="Fecha" required>
            </div>
            <div class="mb-3">
                <label for="total_venta" class="form-label">Total</label>
                <input type="text" class="form-control" id="total_venta" name="total_venta" placeholder="Total" required>
            </div>
            <button class="boton">
                <ion-icon name="print-outline"></ion-icon>
                <a href="{{ route('venta.index') }}" class="btn btn-primary">Guardar</a>
            </button>
        </form>
    </div>

