
@include('includes.sidebar')
@include('includes.bostrapcrud')

<main>


<div class="container">
    <h1>Servicios</h1>
    <a href="{{ route('servicioempleado.create') }}" class="btn btn-primary">Crear Servicio</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID Servicio</th>
                <th>Estado</th>
                <th>Nombre</th>
                <th>Descripcion</th>
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
                        <a href="{{ route('servicioempleado.show', $servicio->id_servicio) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('servicioempleado.edit', $servicio->id_servicio) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('servicioempleado.destroy', $servicio->id_servicio) }}" method="POST" style="display:inline;">
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