
<div class="container">
    <h1>Crear Reservacion</h1>
    <form action="{{ route('reservacion.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_cliente" class="form-label">Cliente</label>
            <input type="text" class="form-control" id="id_cliente" name="id_cliente" placeholder="Cliente" required>
        </div>
        <div class="mb-3">
            <label for="id_servicio" class="form-label">Servicio</label>
            <input type="text" class="form-control" id="id_servicio" name="id_servicio" placeholder="Servicio" required>
        </div>
        <div class="mb-3">
            <label for="id_estado" class="form-label">Estado</label>
            <input type="text" class="form-control" id="id_estado" name="id_estado" placeholder="Estado" required>
        </div>
        <div class="mb-3">
            <label for="metodo_pago_reservacion" class="form-label">Metodo Pago</label>
            <input type="text" class="form-control" id="metodo_pago_reservacicon" name="metodo_pago_reservacion" placeholder="Metodo pago" required>
        </div>
        <div class="mb-3">
            <label for="fecha_hora_reservacion" class="form-label">Fecha</label>
            <input type="text" class="form-control" id="fecha_hora_reservacion" name="fecha_hora_reservacion" placeholder="Fecha" required>
        </div>
        
        <button type="submit" class="btn btn-primary" >Guardar</button>
       
    </form>
</div>