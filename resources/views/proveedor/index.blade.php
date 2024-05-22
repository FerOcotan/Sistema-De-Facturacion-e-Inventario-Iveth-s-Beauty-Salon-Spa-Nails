@include('includes.sidebar')
@include('includes.bostrapcrud')

<main>

<div class="container">
    <h1>Proveedores</h1>
    <a href="{{ route('proveedor.create') }}" class="btn btn-primary">Crear Proveedor</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID Proveedor</th>
                <th>Nombre</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($proveedor as $proveedor)
                <tr>
                    <td>{{ $proveedor->id_proveedor }}</td>
                    <td>{{ $proveedor->nombre_proveedor }}</td>
                    <td>{{ $proveedor->direccion_proveedor }}</td>
                    <td>{{ $proveedor->telefono_proveedor }}</td>
                    <td>

                    <div class="text-center">
                        <a href="{{ route('proveedor.show', $proveedor->id_proveedor) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('proveedor.edit', $proveedor->id_proveedor) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('proveedor.destroy', $proveedor->id_proveedor) }}" method="POST" style="display:inline;">
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