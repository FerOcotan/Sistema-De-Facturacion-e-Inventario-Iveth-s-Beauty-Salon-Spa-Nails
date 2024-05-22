@include('includes.sidebar')
@include('includes.bostrapcrud')


<main>



<div class="container">
    <h1>Producto</h1>
    <a href="{{ route('productoempleado.create') }}" class="btn btn-primary">Crear Producto</a>
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
                        <a href="{{ route('productoempleado.show', $producto->id_producto) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('productoempleado.edit', $producto->id_producto) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('productoempleado.destroy', $producto->id_producto) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</main>