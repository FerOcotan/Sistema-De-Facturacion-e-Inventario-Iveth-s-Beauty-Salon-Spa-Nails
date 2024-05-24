@include('includes.sidebar')
@include('includes.bostrapcrud')


<main>
    <div class="container">
        <h1 class="text-center">Facturas</h1>
    
        
          <!-- Formulario de ordenación -->
          <form method="GET" action="{{ route('venta.index') }}" class="mb-3">
            <div class="form-group">
                <label for="orderBy">Ordenar por:</label>
                <select name="orderBy" id="orderBy" class="form-control">
                    <option value="id_cliente">ID</option>
                    <option value="id_empleado">Empleado</option>
                    <option value="fecha_hora_venta">Fecha</option>
                    <option value="total_venta">Total</option>
                </select>
            </div>
            <button type="submit" class="btn btn-secondary">Ordenar</button>
        </form>
       
           <!-- Botón para abrir  creación -->
           <a href="{{ route('empleado') }}" class="btn btn-primary">Nueva factura</a>

           
        <table class="table">
            <thead>
                <tr>
                    <th>ID Venta</th>
                    <th>Cliente</th>
                    <th>Empleado</th>
                    <th>Método de Pago</th>
                    <th>Fecha</th>
                    <th>Total</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($ventas as $venta)

                    <tr>
                        <td>{{ $venta->id_venta }}</td>
                        <td>{{ $venta->id_cliente }}</td>
                        <td>{{ $venta->id_empleado }}</td>
                        <td>{{ $venta->metodo_pago_venta }}</td>
                        <td>{{ $venta->fecha_hora_venta }}</td>
                        <td>{{ $venta->total_venta }}</td>
                        <td>

                        <!-- Botón para abrir el modal de detalles -->
                     <!-- Botón de descarga de PDF -->
                    <button type="button"  class="btn btn-pdf">
                        <i class="bi bi-file-pdf"></i> 
                    </button>

                            <!-- Botón para abrir el modal de detalles -->
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#detalleVentaModal{{ $venta->id_venta }}">
                                Ver
                            </button>
                             <!-- Botón para abrir el modal de edición -->
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editarVentaModal{{ $venta->id_venta }}">
                                Editar
                            </button>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#eliminarVentaModal{{ $venta->id_venta }}">
                                Eliminar
                            </button>
                        </td>
                    </tr>

                    <!-- Modal de edición -->
<div class="modal fade" id="editarVentaModal{{ $venta->id_venta }}" tabindex="-1" aria-labelledby="editarVentaModalLabel{{ $venta->id_venta }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarVentaModalLabel{{ $venta->id_venta }}">Editar Factura</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('venta.update', $venta->id_venta) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="id_cliente" class="form-label">Cliente</label>
                        <input type="text" class="form-control" id="id_cliente" name="id_cliente" value="{{ $venta->id_cliente }}" required readonly>
                    </div>
    
                    <div class="mb-3">
                        <label for="id_empleado" class="form-label">Empleado</label>
                        <select class="form-control" id="id_empleado" name="id_empleado" required>
                            <option value="">Selecciona un empleado</option>
                            @foreach ($empleados as $id_empleado => $nombre_empleado)
                                <option value="{{ $id_empleado }}" {{ $venta->id_empleado == $id_empleado ? 'selected' : '' }}>
                                    {{ $nombre_empleado }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="metodo_pago_venta" class="form-label">Método de Pago</label>
                        <select class="form-control" id="metodo_pago_venta" name="metodo_pago_venta" required>
                            @foreach ($metodosPagos as $metodoPago)
                                <option value="{{ $metodoPago }}" {{ $venta->metodo_pago_venta == $metodoPago ? 'selected' : '' }}>
                                    {{ $metodoPago }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="fecha_hora_venta" class="form-label">Fecha</label>
                        <input type="datetime-local" class="form-control" id="fecha_hora_venta" name="fecha_hora_venta" value="{{ \Carbon\Carbon::parse($venta->fecha_hora_venta)->format('Y-m-d\TH:i') }}" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="total_venta" class="form-label">Total</label>
                        <input type="number" step="0.01" class="form-control" id="total_venta" name="total_venta" value="{{ $venta->total_venta }}" required readonly>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>

    <!-- Modal de confirmación de eliminación -->
    <div class="modal fade" id="eliminarVentaModal{{ $venta->id_venta }}" tabindex="-1" aria-labelledby="eliminarVentaModalLabel{{ $venta->id_venta }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eliminarVentaModalLabel{{ $venta->id_venta }}">Confirmar Eliminación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>¿Estás seguro de que deseas eliminar esta venta?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <form action="{{ route('venta.destroy', $venta->id_venta) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


                    <!-- Modal de detalles -->
                    <div class="modal fade" id="detalleVentaModal{{ $venta->id_venta }}" tabindex="-1" aria-labelledby="detalleVentaModalLabel{{ $venta->id_venta }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="detalleVentaModalLabel{{ $venta->id_venta }}">Detalle de la Factura</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p><strong>ID:</strong> {{ $venta->id_venta }}</p>
                                    <p><strong>Cliente:</strong> {{ $venta->id_cliente }}</p>
                                    <p><strong>Empleado:</strong> {{ $venta->id_empleado }}</p>
                                    <p><strong>Método de Pago:</strong> {{ $venta->metodo_pago_venta }}</p>
                                    <p><strong>Fecha:</strong> {{ $venta->fecha_hora_venta }}</p>
                                    <p><strong>Total:</strong> {{ $venta->total_venta }}</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
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
