<div class="container">
    <h1>Editar Reservacion</h1>
    <form action="{{ route('reservacion.update', $reservacion->id_reservacion) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="id_cliente" class="form-label">Cliente</label>
            <input type="text" name="id_cliente" id="id_cliente" class="form-control" value="{{ $reservacion->id_cliente }}" required>
        </div>
        <div class="mb-3">
            <label for="id_servicio" class="form-label">Servicio</label>
            <input type="text" name="id_servicio" id="id_servicio" class="form-control" value="{{ $reservacion->id_servicio }}" required>
        </div>
        <div class="mb-3">
            <label for="id_estado" class="form-label">Estado</label>
            <input type="text" name="id_estado" id="id_estado" class="form-control" value="{{ $reservacion->id_estado }}" required>
        </div>
        <div class="mb-3">
            <label for="metodo_pago_reservacion" class="form-label">Metodo Pago</label>
            <input type="text" name="metodo_pago_reservacion" id="metodo_pago_reservacion" class="form-control" value="{{ $reservacion->metodo_pago_reservacion }}" required>
        </div>
        <div class="mb-3">
            <label for="fecha_hora_reservacion" class="form-label">Fecha</label>
            <input type="text" name="fecha_hora_reservacion" id="fecha_hora_reservacion" class="form-control" value="{{ $reservacion->fecha_hora_reservacion }}" required>
        </div>
       
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
