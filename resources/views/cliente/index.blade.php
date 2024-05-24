@include('includes.sidebar')
@include('includes.bostrapcrud')

<main>


<div class="container">
    <h1>Cliente</h1>


         <!-- Button to trigger the modal for creating a new product -->
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#crearProductoModal">Agregar Cliente
        </button>

        <!-- Modal for creating a new product -->
        <div class="modal fade" id="crearProductoModal" tabindex="-1" aria-labelledby="crearProductoModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="crearProductoModalLabel">Añadir Cliente</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form action="{{ route('cliente.store') }}" method="POST">
        @csrf
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
            <label for="nombre_cliente" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre_cliente" name="nombre_cliente" placeholder="Nombre" required>
        </div>
        <div class="mb-3">
            <label for="apellido_cliente" class="form-label">Apellido</label>
            <input type="text" class="form-control" id="apellido_cliente" name="apellido_cliente" placeholder="Apellido" required>
        </div>
        <div class="mb-3">
            <label for="telefono_cliente" class="form-label">Telefono</label>
            <input type="text" class="form-control" id="telefono_cliente" name="telefono_cliente" placeholder="Telefono" required>
        </div>
        <div class="mb-3">
            <label for="direccion_cliente" class="form-label">Direccion</label>
            <input type="text" class="form-control" id="direccion_cliente" name="direccion_cliente" placeholder="Direccion" required>
        </div>
        <div class="mb-3">
            <label for="dui_cliente" class="form-label">Dui</label>
            <input type="text" class="form-control" id="dui_cliente" name="dui_cliente" placeholder="Dui" required>
        </div>
        <div class="mb-3">
            <label for="email_cliente" class="form-label">Email</label>
            <input type="text" class="form-control" id="email_cliente" name="email_cliente" placeholder="Email" required>
        </div>
        <div class="mb-3">
            <label for="clave_cliente" class="form-label">Clave</label>
            <input type="text" class="form-control" id="clave_cliente" name="clave_cliente" placeholder="Clave" required>
        </div>

        <button type="submit" class="btn btn-primary" >Guardar</button>
       
    </form>
                    </div>
                </div>
            </div>
        </div>
        

    <table class="table">
        <thead>
            <tr>
                <th>ID Cliente</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Telefono</th>
                <th>Direccion</th>
                <th>Dui</th>
                <th>Email</th>
                <th class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cliente as $cliente)
                <tr>
                    <td>{{ $cliente->id_cliente  }}</td>
                    <td>{{ $cliente->nombre_cliente  }}</td>
                    <td>{{ $cliente->apellido_cliente }}</td>
                    <td>{{ $cliente->telefono_cliente }}</td>
                    <td>{{ $cliente->direccion_cliente }}</td>
                    <td>{{ $cliente->dui_cliente }}</td>
                    <td>{{ $cliente->email_cliente }} </td>
                    <td>
                        
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#detalleProductoModal{{ $cliente->id_cliente }}">
                                    Ver
                     </button>
                     
                          <!-- Botón para abrir el modal de confirmación de eliminación -->
                          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#eliminarProductoModal{{ $cliente->id_cliente }}">
                                    Eliminar
                                </button>
                    </td>
                </tr>
                   <!-- Modal de detalles -->
                   <div class="modal fade" id="detalleProductoModal{{ $cliente->id_cliente }}" tabindex="-1" aria-labelledby="detalleProductoModalLabel{{ $cliente->id_cliente }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="detalleProductoModalLabel{{ $cliente->id_cliente }}">Detalle del Producto</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                <p><strong>ID:</strong> {{ $cliente->id_cliente  }}</p>
                                <p><strong>Nombre:</strong> {{ $cliente->nombre_cliente  }}</p>
                                <p><strong>Apellido:</strong> {{ $cliente->apellido_cliente }}</p>
                                <p><strong>Telefono:</strong> {{  $cliente->telefono_cliente }}</p>
                                <p><strong>Direccion:</strong> {{ $cliente->direccion_cliente }}</p>
                                <p><strong>Dui:</strong> {{ $cliente->dui_cliente }}</p>
                                <p><strong>Email:</strong> {{ $cliente->email_cliente }}</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                     <!-- Modal de confirmación de eliminación -->
                     <div class="modal fade" id="eliminarProductoModal{{ $cliente->id_cliente }}" tabindex="-1" aria-labelledby="eliminarProductoModalLabel{{ $cliente->id_cliente }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="eliminarProductoModalLabel{{ $cliente->id_cliente }}">Confirmar Eliminación</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>¿Estás seguro de que deseas eliminar este producto?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <form action="{{ route('cliente.destroy', $cliente->id_cliente) }}" method="POST" style="display:inline;">
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
