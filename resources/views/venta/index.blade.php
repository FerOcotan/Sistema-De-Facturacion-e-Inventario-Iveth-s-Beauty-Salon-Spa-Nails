@include('includes.sidebar')

<head>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>


<main>
    <div class="container">
        <h1>Facturas</h1>
        <!-- Botón para abrir el modal de creación -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#crearVentaModal">
            Crear Factura
        </button>
        
        <!-- Modal de creación -->
        <div class="modal fade" id="crearVentaModal" tabindex="-1" aria-labelledby="crearVentaModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="crearVentaModalLabel">Crear Factura</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
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
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>ID Venta</th>
                    <th>Cliente</th>
                    <th>Empleado</th>
                    <th>Método de Pago</th>
                    <th>Fecha</th>
                    <th>Total</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($venta as $venta)
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
                    <button type="button"  class="btn btn-danger">
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
                            <input type="text" class="form-control" id="id_cliente" name="id_cliente" value="{{ $venta->id_cliente }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="id_empleado" class="form-label">Empleado</label>
                            <input type="text" class="form-control" id="id_empleado" name="id_empleado" value="{{ $venta->id_empleado }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="metodo_pago_venta" class="form-label">Metodo Pago</label>
                            <input type="text" class="form-control" id="metodo_pago_venta" name="metodo_pago_venta" value="{{ $venta->metodo_pago_venta }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="fecha_hora_venta" class="form-label">Fecha</label>
                            <input type="text" class="form-control" id="fecha_hora_venta" name="fecha_hora_venta" value="{{ $venta->fecha_hora_venta }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="total_venta" class="form-label">Total</label>
                            <input type="text" class="form-control" id="total_venta" name="total_venta" value="{{ $venta->total_venta }}" required>
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
