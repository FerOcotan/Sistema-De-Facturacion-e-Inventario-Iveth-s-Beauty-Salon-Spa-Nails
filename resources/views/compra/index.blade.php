@include('includes.sidebar')
@include('includes.bostrapcrud')

<main>


<div class="container">
    <h1>Compra</h1>
    <a href="{{ route('compra.create') }}" class="btn btn-primary">Crear Compra</a>
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
                        <a href="{{ route('compra.show', $compra->id_compra) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('compra.edit', $compra->id_compra) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('compra.destroy', $compra->id_compra) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


</main>
