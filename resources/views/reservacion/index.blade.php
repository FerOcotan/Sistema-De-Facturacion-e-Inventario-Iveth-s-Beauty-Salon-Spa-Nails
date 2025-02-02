@include('includes.sidebar')
@include('includes.bostrapcrud')

<main>
    <div class="container">
        <h1 class="text-center" >Reservaciones</h1>

        <!-- Formulario de filtro por fecha -->
        <form action="{{ route('reservacionempleado.index') }}" method="GET" class="form-inline mb-3" >
            <div class="form-group mr-2">
                <label for="fecha" class="mr-2">Filtrar por Fecha:</label>
                <input type="date" class="form-control" id="fecha" name="fecha" value="{{ request('fecha') }}">
            </div>
            <button type="submit" class="btn btn-primary">Filtrar</button>
        </form>
        
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#crearReservacionModal">
            Crear Reservacion
        </button>

        <!-- Modal de creación de nueva reservación -->
        <div class="modal fade" id="crearReservacionModal" tabindex="-1" aria-labelledby="crearReservacionModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="crearReservacionModalLabel">Crear Nueva Reservación</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('reservacionempleado.store') }}" method="POST">
                            @csrf
                               <!-- Concat de nombre y apellido -->
                            <div class="mb-3">
                            <label for="id_cliente" class="form-label">Cliente</label>
                            <select class="form-control" id="id_cliente" name="id_cliente" required>
                                <option value="">Seleccione un Cliente</option>
                                @foreach ($clientes as $cliente)
                                    <option value="{{ $cliente->id_cliente }}">{{ $cliente->nombre_cliente }} {{ $cliente->apellido_cliente }}</option>
                                @endforeach
                            </select>
                        </div>

                            <div class="mb-3">
                                <label for="id_servicio" class="form-label">Servicio</label>
                                <select class="form-control" id="id_servicio" name="id_servicio" required>
                                    <option value="">Seleccione un Servicio</option>
                                    @foreach ($servicios as $id_servicio => $nombre_servicio)
                                        <option value="{{ $id_servicio }}">{{ $nombre_servicio }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="id_estado" class="form-label">Estado</label>
                                <select class="form-control" id="id_estado" name="id_estado" required>
                                    <option value="">Seleccione un Estado</option>
                                    @foreach ($estados as $id_estado => $nombre_estado)
                                        <option value="{{ $id_estado }}">{{ $nombre_estado }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="metodo_pago_reservacion" class="form-label">Método de Pago</label>
                                <select class="form-control" id="metodo_pago_reservacion" name="metodo_pago_reservacion" required>
                                    <option value="">Seleccione un Método de Pago</option>
                                    @foreach ($metodosPago as $metodoPago)
                                        <option value="{{ $metodoPago }}">{{ $metodoPago }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="fecha_hora_reservacion" class="form-label">Fecha</label>
                                <input type="datetime-local" class="form-control" id="fecha_hora_reservacion" name="fecha_hora_reservacion" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabla de reservaciones -->
        <table class="table">
            <thead>
                <tr>
                    <th>ID Reservacion</th>
                    <th>Cliente</th>
                    <th>Servicio</th>
                    <th>Estado</th>
                    <th>Método de Pago</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservaciones as $reservacion)
                    <tr>
                        <td>{{ $reservacion->id_reservacion }}</td>
                        <td>{{ $reservacion->nombre_cliente }}</td>
                        <td>{{ $reservacion->nombre_servicio }}</td>
                        <td>{{ $reservacion->estado }}</td>
                        <td>{{ $reservacion->metodo_pago_reservacion }}</td>
                        <td>{{ $reservacion->fecha_hora_reservacion }}</td>
                        <td>
                            <!-- Botón para abrir el modal de detalles -->
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#detalleReservacionModal{{ $reservacion->id_reservacion }}">
                                Ver
                            </button>
                            
                            <!-- Botón para abrir el modal de edición -->
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editarReservacionModal{{ $reservacion->id_reservacion }}">
                                Editar
                            </button>
                            
                            <!-- Botón para abrir el modal de confirmación de eliminación -->
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#eliminarReservacionModal{{ $reservacion->id_reservacion }}">
                                Eliminar
                            </button>
                        </td>
                    </tr>

                    <!-- Modal de detalles -->
                    <div class="modal fade" id="detalleReservacionModal{{ $reservacion->id_reservacion }}" tabindex="-1" aria-labelledby="detalleReservacionModalLabel{{ $reservacion->id_reservacion }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="detalleReservacionModalLabel{{ $reservacion->id_reservacion }}">Detalle de la Reservación</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p><strong>ID:</strong> {{ $reservacion->id_reservacion }}</p>
                                    <p><strong>Cliente:</strong> {{ $reservacion->nombre_cliente }}</p>
                                    <p><strong>Servicio:</strong> {{ $reservacion->nombre_servicio }}</p>
                                    <p><strong>Estado:</strong> {{ $reservacion->estado }}</p>
                                    <p><strong>Método de Pago:</strong> {{ $reservacion->metodo_pago_reservacion }}</p>
                                    <p><strong>Fecha:</strong> {{ $reservacion->fecha_hora_reservacion }}</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                  <!-- Edit Modal -->
<div class="modal fade" id="editarReservacionModal{{ $reservacion->id_reservacion }}" tabindex="-1" aria-labelledby="editarReservacionModalLabel{{ $reservacion->id_reservacion }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarReservacionModalLabel{{ $reservacion->id_reservacion }}">Editar Reservación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('reservacionempleado.update', $reservacion->id_reservacion) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="id_cliente" class="form-label">Cliente</label>
                        <input type="text" class="form-control" id="id_cliente" name="id_cliente" value="{{ $reservacion->nombre_cliente }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="id_servicio" class="form-label">Servicio</label>
                        <select class="form-control" id="id_servicio" name="id_servicio" required>
                            @foreach ($servicios as $id_servicio => $nombre_servicio)
                                <option value="{{ $id_servicio }}" {{ $reservacion->id_servicio == $id_servicio ? 'selected' : '' }}>{{ $nombre_servicio }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="id_estado" class="form-label">Estado</label>
                        <select class="form-control" id="id_estado" name="id_estado" required>
                            @foreach ($estados as $id_estado => $nombre_estado)
                                <option value="{{ $id_estado }}" {{ $reservacion->id_estado == $id_estado ? 'selected' : '' }}>{{ $nombre_estado }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="metodo_pago_reservacion" class="form-label">Método de Pago</label>
                        <select class="form-control" id="metodo_pago_reservacion" name="metodo_pago_reservacion" required>
                            @foreach ($metodosPago as $metodoPago)
                                <option value="{{ $metodoPago }}" {{ $reservacion->metodo_pago_reservacion == $metodoPago ? 'selected' : '' }}>{{ $metodoPago }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="fecha_hora_reservacion" class="form-label">Fecha</label>
                        <input type="datetime-local" class="form-control" id="fecha_hora_reservacion" name="fecha_hora_reservacion" value="{{ $reservacion->fecha_hora_reservacion }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>


                    <!-- Modal de confirmación de eliminación -->
                    <div class="modal fade" id="eliminarReservacionModal{{ $reservacion->id_reservacion }}" tabindex="-1" aria-labelledby="eliminarReservacionModalLabel{{ $reservacion->id_reservacion }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="eliminarReservacionModalLabel{{ $reservacion->id_reservacion }}">Confirmar Eliminación</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>¿Estás seguro de que deseas eliminar esta reservación?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <form action="{{ route('reservacionempleado.destroy', $reservacion->id_reservacion) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>
</main>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
