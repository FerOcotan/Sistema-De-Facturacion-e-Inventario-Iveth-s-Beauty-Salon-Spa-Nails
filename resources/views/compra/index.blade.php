@include('includes.sidebar')
@include('includes.bostrapcrud')

<main>


<div class="container">
    <h1>Compra</h1>
    
      <!-- Button to trigger the modal for creating a new product -->
      <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#crearProductoModal">Agregar nueva compra
        </button>

           <!-- Formulario de ordenación -->
           <form method="GET" action="{{ route('compra.index') }}" class="mb-3">
            <div class="form-group">
                <label for="orderBy">Ordenar por:</label>
                <select name="orderBy" id="orderBy" class="form-control">
                    <option value="id_compra">ID</option>
                    <option value="id_empleado">Empleado</option>
                   
                    <option value="total_compra">Total</option>
                
                    <option value="fecha_hora_compra">Fecha</option>
                </select>

            </div>
            <button type="submit" class="btn btn-secondary">Ordenar</button>
        </form>


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
                    <form action="{{ route('compra.store') }}" method="POST">
        @csrf
        <div class="mb-3">
         <label for="id_categoria" class="form-label">Provedores</label>
         <select class="form-control" id="id_proveedor" name="id_proveedor" required>
          <option value="">Seleccione el estado</option>
          @foreach ($proveedor as $id_proveedor => $nombre_proveedor)
           <option value="{{ $id_proveedor }}">{{ $nombre_proveedor }}</option>
              @endforeach
               </select>
      </div>
      <div class="mb-3">
                        <label for="id_empleado" class="form-label">Empleado</label>
                        <select class="form-control" id="id_empleado" name="id_empleado" required>
                            <option value="">Selecciona un empleado</option>
                            @foreach ($empleados as $id_empleado => $nombre_empleado)
                        <option value="{{ $id_empleado }}">{{ $nombre_empleado }}</option>
                            @endforeach
                        </select>
                    </div>
        
        <div class="mb-3">
                        <label for="id_empleado" class="form-label">Producto</label>
                        <select class="form-control" id="id_producto" name="id_producto" required>
                            <option value="">Selecciona un producto</option>
                            @foreach ($productos as $id_producto => $nombre_producto)
                        <option value="{{ $id_producto }}">{{ $nombre_producto }}</option>
                            @endforeach
                        </select>
                    </div>
        <div class="mb-3">
            <label for="cantidad_compra" class="form-label">Cantidad</label>
            <input type="text" class="form-control" id="cantidad_compra" name="cantidad_compra" placeholder="Cantidad" required>
        </div>
        <div class="mb-3">
            <label for="total_compra" class="form-label">Total</label>
            <input type="text" class="form-control" id="total_compra" name="total_compra" placeholder="Total" required>
        </div>
        <div class="mb-3">
            <label for="fecha_hora_compra" class="form-label">Fecha</label>
            <input type="date" class="form-control" id="fecha_hora_compra" name="fecha_hora_compra" placeholder="Fecha" required>
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
                <th>ID Compra</th>
                <th>Proveedor</th>
                <th>Empleado</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Total</th>
                <th>Fecha</th>
                <th class="text-center">Acciones</th>
        </thead>
        <tbody>
            @foreach ($compras as $compra)
                <tr>
                    <td>{{ $compra->id_compra  }}</td>
                    <td>{{ $compra->id_proveedor }}</td>
                    <td>{{ $compra->id_empleado }}</td>
                    <td>{{ $compra->id_producto }}</td>
                    <td>{{ $compra->cantidad_compra }}</td>
                    <td>{{ $compra->total_compra }}</td>
                    <td>{{ $compra->fecha_hora_compra }}</td>
                    <td>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#detalleProductoModal{{ $compra->id_compra }}">
                                    Ver
                     </button>
                     
                           <!-- Botón para abrir el modal de edición -->
                           <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editarProductoModal{{ $compra->id_compra }}">
                                    Editar
                                </button>

                    </td>
                </tr>
                <!-- Modal de detalles -->
                <div class="modal fade" id="detalleProductoModal{{ $compra->id_compra }}" tabindex="-1" aria-labelledby="detalleProductoModalLabel{{ $compra->id_compra }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="detalleProductoModalLabel{{ $compra->id_compra }}">Detalle del Producto</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                <h1>Detalle de la Compra</h1>
                                    <p><strong>ID:</strong> {{ $compra->id_compra }}</p>
                                    <p><strong>Proveedor:</strong> {{ $compra->id_proveedor }}</p>
                                    <p><strong>Empleado:</strong> {{ $compra->id_empleado }}</p>
                                    <p><strong>Producto:</strong> {{ $compra->id_producto }}</p>
                                    <p><strong>Cantidad:</strong> {{ $compra->cantidad_compra }}</p>
                                    <p><strong>Total:</strong> {{ $compra->total_compra }}</p>
                                    <p><strong>Fecha:</strong> {{ $compra->fecha_hora_compra }}</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                       <!-- Modal de edición -->
                       <div class="modal fade" id="editarProductoModal{{  $compra->id_compra }}" tabindex="-1" aria-labelledby="editarProductoModalLabel{{  $compra->id_compra }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editarProductoModalLabel{{  $compra->id_compra }}">Editar Producto</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                <form action="{{ route('compra.update', $compra->id_compra) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="mb-3">
         <label for="id_categoria" class="form-label">Provedores</label>
         <select class="form-control" id="id_proveedor" name="id_proveedor" required>
          <option value="">Seleccione el estado</option>
          @foreach ($proveedor as $id_proveedor => $nombre_proveedor)
           <option value="{{ $id_proveedor }}">{{ $nombre_proveedor }}</option>
              @endforeach
               </select>
      </div>
        <div class="mb-3">
                        <label for="id_empleado" class="form-label">Empleado</label>
                        <select class="form-control" id="id_empleado" name="id_empleado" required>
                            <option value="">Selecciona un empleado</option>
                            @foreach ($empleados as $id_empleado => $nombre_empleado)
                        <option value="{{ $id_empleado }}">{{ $nombre_empleado }}</option>
                            @endforeach
                        </select>
                    </div>
        <div class="mb-3">
                        <label for="id_empleado" class="form-label">Producto</label>
                        <select class="form-control" id="id_producto" name="id_producto" required>
                            <option value="">Selecciona un producto</option>
                            @foreach ($productos as $id_producto => $nombre_producto)
                        <option value="{{ $id_producto }}">{{ $nombre_producto }}</option>
                            @endforeach
                        </select>
                    </div>
        <div class="mb-3">
            <label for="cantidad_compra" class="form-label">Precio</label>
            <input type="text" name="cantidad_compra" id="cantidad_compra" class="form-control" value="{{ $compra->cantidad_compra }}" required>
        </div>
        <div class="mb-3">
            <label for="total_compra" class="form-label">Existencias</label>
            <input type="text" name="total_compra" id="total_compra" class="form-control" value="{{ $compra->total_compra }}" required>
        </div>
        <div class="mb-3">
            <label for="fecha_hora_compra" class="form-label">Fecha</label>
            <input type="text" name="fecha_hora_compra" id="fecha_hora_compra" class="form-control" value="{{ $compra->fecha_hora_compra }}" required>
        </div>
       
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
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
