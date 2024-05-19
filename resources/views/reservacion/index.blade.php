<div class="container">
    <h1>Reservaciones</h1>
    <a href="{{ route('reservacion.create') }}" class="btn btn-primary">Crear Reservacion</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID Reservacion</th>
                <th>Cliente</th>
                <th>Servicio</th>
                <th>Estado</th>
                <th>Método de Pago</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservacion as $reservacion)
                <tr>
                    <td>{{ $reservacion->id_reservacion }}</td>
                    <td>{{ $reservacion->id_cliente }}</td>
                    <td>{{ $reservacion->id_servicio }}</td>
                    <td>{{ $reservacion->id_estado }}</td>
                    <td>{{ $reservacion->metodo_pago_reservacion }}</td>
                    <td>{{ $reservacion->fecha_hora_reservacion }}</td>
                    <td>
                        <a href="{{ route('reservacion.show', $reservacion->id_reservacion) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('reservacion.edit', $reservacion->id_reservacion) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('reservacion.destroy', $reservacion->id_reservacion) }}" method="POST" style="display:inline;">
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
