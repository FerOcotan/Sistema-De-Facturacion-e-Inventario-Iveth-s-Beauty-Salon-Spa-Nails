@include('includes.sidebar')
@include('includes.bostrapcrud')

<main>
    <div class="container">
        <h1>Producto</h1>
        
        <!-- Button to trigger the modal for creating a new product -->
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#crearProductoModal">
            Agregar Producto
        </button>
        
        <!-- Modal for creating a new product -->
        <div class="modal fade" id="crearProductoModal" tabindex="-1" aria-labelledby="crearProductoModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="crearProductoModalLabel">Crear Nuevo Producto</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('productoempleado.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="id_categoria" class="form-label">Categoría</label>
                                <input type="text" class="form-control" id="id_categoria" name="id_categoria" placeholder="Categoría" required>
                            </div>
                            <div class="mb-3">
                                <label for="id_estado" class="form-label">Estado</label>
                                <input type="text" class="form-control" id="id_estado" name="id_estado" placeholder="Estado" required>
                            </div>
                            <div class="mb-3">
                                <label for="nombre_producto" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre_producto" name="nombre_producto" placeholder="Nombre" required>
                            </div>
                            <div class="mb-3">
                                <label for="precio_producto" class="form-label">Precio</label>
                                <input type="text" class="form-control" id="precio_producto" name="precio_producto" placeholder="Precio" required>
                            </div>
                            <div class="mb-3">
                                <label for="existencias" class="form-label">Existencias</label>
                                <input type="text" class="form-control" id="existencias" name="existencias" placeholder="Existencias" required>
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
                    <th>ID Producto</th>
                    <th>Categoria</th>
                    <th>Estado</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Existencias</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($producto as $producto)
                    <tr>
                        <td>{{ $producto->id_producto }}</td>
                        <td>{{ $producto->id_categoria }}</td>
                        <td>{{ $producto->id_estado }}</td>
                        <td>{{ $producto->nombre_producto }}</td>
                        <td>{{ $producto->precio_producto }}</td>
                        <td>{{ $producto->existencias }}</td>
                        <td>
                            <div class="text-center">
                                <!-- Botón para abrir el modal de detalles -->
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#detalleProductoModal{{ $producto->id_producto }}">
                                    Ver
                                </button>
                                
                                <!-- Botón para abrir el modal de edición -->
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editarProductoModal{{ $producto->id_producto }}">
                                    Editar
                                </button>
                                
                                <!-- Botón para abrir el modal de confirmación de eliminación -->
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#eliminarProductoModal{{ $producto->id_producto }}">
                                    Eliminar
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Modal de detalles -->
                    <div class="modal fade" id="detalleProductoModal{{ $producto->id_producto }}" tabindex="-1" aria-labelledby="detalleProductoModalLabel{{ $producto->id_producto }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="detalleProductoModalLabel{{ $producto->id_producto }}">Detalle del Producto</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p><strong>ID:</strong> {{ $producto->id_producto }}</p>
                                    <p><strong>Categoría:</strong> {{ $producto->id_categoria }}</p>
                                    <p><strong>Estado:</strong> {{ $producto->id_estado }}</p>
                                    <p><strong>Nombre:</strong> {{ $producto->nombre_producto }}</p>
                                    <p><strong>Precio:</strong> {{ $producto->precio_producto }}</p>
                                    <p><strong>Existencias:</strong> {{ $producto->existencias }}</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal de edición -->
                    <div class="modal fade" id="editarProductoModal{{ $producto->id_producto }}" tabindex="-1" aria-labelledby="editarProductoModalLabel{{ $producto->id_producto }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editarProductoModalLabel{{ $producto->id_producto }}">Editar Producto</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('productoempleado.update', $producto->id_producto) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label for="id_categoria" class="form-label">Categoría</label>
                                            <input type="text" class="form-control" id="id_categoria" name="id_categoria" value="{{ $producto->id_categoria }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="id_estado" class="form-label">Estado</label>
                                            <input type="text" class="form-control" id="id_estado" name="id_estado" value="{{ $producto->id_estado }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="nombre_producto" class="form-label">Nombre</label>
                                            <input type="text" class="form-control" id="nombre_producto" name="nombre_producto" value="{{ $producto->nombre_producto }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="precio_producto" class="form-label">Precio</label>
                                            <input type="text" class="form-control" id="precio_producto" name="precio_producto" value="{{ $producto->precio_producto }}" required readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="existencias" class="form-label">Existencias</label>
                                            <input type="text" class="form-control" id="existencias" name="existencias" value="{{ $producto->existencias }}" required readonly>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal de confirmación de eliminación -->
                    <div class="modal fade" id="eliminarProductoModal{{ $producto->id_producto }}" tabindex="-1" aria-labelledby="eliminarProductoModalLabel{{ $producto->id_producto }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="eliminarProductoModalLabel{{ $producto->id_producto }}">Confirmar Eliminación</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>¿Estás seguro de que deseas eliminar este producto?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <form action="{{ route('productoempleado.destroy', $producto->id_producto) }}" method="POST" style="display:inline;">
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
