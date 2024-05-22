@include('includes.sidebar')
@include('includes.bostrapcrud')

<main>
    <div class="container">
        <h1>Servicios</h1>

        <!-- Button to trigger the modal for creating a new service -->
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#crearServicioModal">
            Crear Servicio
        </button>
        
        <!-- Modal for creating a new service -->
        <div class="modal fade" id="crearServicioModal" tabindex="-1" aria-labelledby="crearServicioModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="crearServicioModalLabel">Crear Nuevo Servicio</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('servicioempleado.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="nombre_servicio" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre_servicio" name="nombre_servicio" placeholder="Nombre" required>
                            </div>
                            <div class="mb-3">
                                <label for="descripcion_servicio" class="form-label">Descripción</label>
                                <input type="text" class="form-control" id="descripcion_servicio" name="descripcion_servicio" placeholder="Descripción" required>
                            </div>
                            <div class="mb-3">
                                <label for="precio_servicio" class="form-label">Precio</label>
                                <input type="number" step="0.01" class="form-control" id="precio_servicio" name="precio_servicio" placeholder="Precio" required>
                            </div>
                            <div class="mb-3">
                                <label for="id_estado" class="form-label">Estado</label>
                                <input type="text" class="form-control" id="id_estado" name="id_estado" placeholder="Estado" required>
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
                    <th>ID Servicio</th>
                    <th>Estado</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($servicio as $servicio)
                    <tr>
                        <td>{{ $servicio->id_servicio }}</td>
                        <td>{{ $servicio->id_estado }}</td>
                        <td>{{ $servicio->nombre_servicio }}</td>
                        <td>{{ $servicio->descripcion_servicio }}</td>
                        <td>{{ $servicio->precio_servicio }}</td>
                        <td>
                            <div class="text-center">
                                <!-- Button to open the view modal -->
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#detalleServicioModal{{ $servicio->id_servicio }}">
                                    Ver
                                </button>

                                <!-- Button to open the edit modal -->
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editarServicioModal{{ $servicio->id_servicio }}">
                                    Editar
                                </button>

                                <!-- Button to open the delete confirmation modal -->
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#eliminarServicioModal{{ $servicio->id_servicio }}">
                                    Eliminar
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Modal for viewing details -->
                    <div class="modal fade" id="detalleServicioModal{{ $servicio->id_servicio }}" tabindex="-1" aria-labelledby="detalleServicioModalLabel{{ $servicio->id_servicio }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="detalleServicioModalLabel{{ $servicio->id_servicio }}">Detalle del Servicio</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p><strong>ID:</strong> {{ $servicio->id_servicio }}</p>
                                    <p><strong>Estado:</strong> {{ $servicio->id_estado }}</p>
                                    <p><strong>Nombre:</strong> {{ $servicio->nombre_servicio }}</p>
                                    <p><strong>Descripción:</strong> {{ $servicio->descripcion_servicio }}</p>
                                    <p><strong>Precio:</strong> {{ $servicio->precio_servicio }}</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal for editing -->
                    <div class="modal fade" id="editarServicioModal{{ $servicio->id_servicio }}" tabindex="-1" aria-labelledby="editarServicioModalLabel{{ $servicio->id_servicio }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editarServicioModalLabel{{ $servicio->id_servicio }}">Editar Servicio</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('servicioempleado.update', $servicio->id_servicio) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label for="nombre_servicio" class="form-label">Nombre</label>
                                            <input type="text" class="form-control" id="nombre_servicio" name="nombre_servicio" value="{{ $servicio->nombre_servicio }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="descripcion_servicio" class="form-label">Descripción</label>
                                            <input type="text" class="form-control" id="descripcion_servicio" name="descripcion_servicio" value="{{ $servicio->descripcion_servicio }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="precio_servicio" class="form-label">Precio</label>
                                            <input type="number" step="0.01" class="form-control" id="precio_servicio" name="precio_servicio" value="{{ $servicio->precio_servicio }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="id_estado" class="form-label">Estado</label>
                                            <input type="text" class="form-control" id="id_estado" name="id_estado" value="{{ $servicio->id_estado }}" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal for delete confirmation -->
                    <div class="modal fade" id="eliminarServicioModal{{ $servicio->id_servicio }}" tabindex="-1" aria-labelledby="eliminarServicioModalLabel{{ $servicio->id_servicio }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="eliminarServicioModalLabel{{ $servicio->id_servicio }}">Confirmar Eliminación</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>¿Estás seguro de que deseas eliminar este servicio?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <form action="{{ route('servicioempleado.destroy', $servicio->id_servicio) }}" method="POST" style="display:inline;">
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
