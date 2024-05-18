    <div class="container">
        <h1>Ventas</h1>
        <a href="{{ route('venta.create') }}" class="btn btn-primary">Crear Venta</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID Venta</th>
                    <th>Cliente</th>
                    <th>Empleado</th>
                    <th>Método de Pago</th>
                    <th>Fecha</th>
                    <th>Total</th>
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
                            <a href="{{ route('venta.show', $venta->id_venta) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('venta.edit', $venta->id_venta) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('venta.destroy', $venta->id_venta) }}" method="POST" style="display:inline;">
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

