@include('includes.sidebar')
@include('includes.bostrapcrud')

<main>
    <div class="container">
        <h1>Proveedores</h1>

        <!-- Button to trigger the modal for creating a new supplier -->
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#crearProveedorModal">
            Crear Proveedor
        </button>
        
        <!-- Modal for creating a new supplier -->
        <div class="modal fade" id="crearProveedorModal" tabindex="-1" aria-labelledby="crearProveedorModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="crearProveedorModalLabel">Crear Nuevo Proveedor</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('proveedor.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="nombre_proveedor" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre_proveedor" name="nombre_proveedor" placeholder="Nombre" required>
                            </div>
                            <div class="mb-3">
                                <label for="direccion_proveedor" class="form-label">Dirección</label>
                                <input type="text" class="form-control" id="direccion_proveedor" name="direccion_proveedor" placeholder="Dirección" required>
                            </div>
                            <div class="mb-3">
                                <label for="telefono_proveedor" class="form-label">Teléfono</label>
                                <input type="text" class="form-control" id="telefono_proveedor" name="telefono_proveedor" placeholder="Teléfono" required>
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
                    <th>ID Proveedor</th>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($proveedor as $proveedor)
                    <tr>
                        <td>{{ $proveedor->id_proveedor }}</td>
                        <td>{{ $proveedor->nombre_proveedor }}</td>
                        <td>{{ $proveedor->direccion_proveedor }}</td>
                        <td>{{ $proveedor->telefono_proveedor }}</td>
                        <td>
                            <div class="text-center">
                                <!-- Botón para abrir el modal de detalles -->
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#detalleProveedorModal{{ $proveedor->id_proveedor }}">
                                    Ver
                                </button>

                                <!-- Botón para abrir el modal de edición -->
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editarProveedorModal{{ $proveedor->id_proveedor }}">
                                    Editar
                                </button>

                                <!-- Botón para abrir el modal de confirmación de eliminación -->
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#eliminarProveedorModal{{ $proveedor->id_proveedor }}">
                                    Eliminar
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Modal de detalles -->
                    <div class="modal fade" id="detalleProveedorModal{{ $proveedor->id_proveedor }}" tabindex="-1" aria-labelledby="detalleProveedorModalLabel{{ $proveedor->id_proveedor }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="detalleProveedorModalLabel{{ $proveedor->id_proveedor }}">Detalle del Proveedor</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p><strong>ID:</strong> {{ $proveedor->id_proveedor }}</p>
                                    <p><strong>Nombre:</strong> {{ $proveedor->nombre_proveedor }}</p>
                                    <p><strong>Dirección:</strong> {{ $proveedor->direccion_proveedor }}</p>
                                    <p><strong>Teléfono:</strong> {{ $proveedor->telefono_proveedor }}</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal de edición -->
                    <div class="modal fade" id="editarProveedorModal{{ $proveedor->id_proveedor }}" tabindex="-1" aria-labelledby="editarProveedorModalLabel{{ $proveedor->id_proveedor }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editarProveedorModalLabel{{ $proveedor->id_proveedor }}">Editar Proveedor</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('proveedor.update', $proveedor->id_proveedor) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label for="nombre_proveedor" class="form-label">Nombre</label>
                                            <input type="text" class="form-control" id="nombre_proveedor" name="nombre_proveedor" value="{{ $proveedor->nombre_proveedor }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="direccion_proveedor" class="form-label">Dirección</label>
                                            <input type="text" class="form-control" id="direccion_proveedor" name="direccion_proveedor" value="{{ $proveedor->direccion_proveedor }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="telefono_proveedor" class="form-label">Teléfono</label>
                                            <input type="text" class="form-control" id="telefono_proveedor" name="telefono_proveedor" value="{{ $proveedor->telefono_proveedor }}" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal de confirmación de eliminación -->
                    <div class="modal fade" id="eliminarProveedorModal{{ $proveedor->id_proveedor }}" tabindex="-1" aria-labelledby="eliminarProveedorModalLabel{{ $proveedor->id_proveedor }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="eliminarProveedorModalLabel{{ $proveedor->id_proveedor }}">Confirmar Eliminación</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>¿Estás seguro de que deseas eliminar este proveedor?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <form action="{{ route('proveedor.destroy', $proveedor->id_proveedor) }}" method="POST" style="display:inline;">
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
