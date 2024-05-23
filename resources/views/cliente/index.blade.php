@include('includes.sidebar')
@include('includes.bostrapcrud')

<main>


<div class="container">
    <h1>Cliente</h1>
    <a href="{{ route('cliente.create') }}" class="btn btn-primary">Crear Cliente</a>
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
                        <a href="{{ route('cliente.show', $cliente->id_cliente) }}" class="btn btn-info">Ver</a>
                        
                        <form action="{{ route('cliente.destroy', $cliente->id_cliente) }}" method="POST" style="display:inline;">
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