<div class="container">
    <h1>Detalle del Cliente</h1>
    <p><strong>ID:</strong> {{ $cliente->id_cliente  }}</p>
    <p><strong>Nombre:</strong> {{ $cliente->nombre_cliente  }}</p>
    <p><strong>Apellido:</strong> {{ $cliente->apellido_cliente }}</p>
    <p><strong>Telefono:</strong> {{  $cliente->telefono_cliente }}</p>
    <p><strong>Direccion:</strong> {{ $cliente->direccion_cliente }}</p>
    <p><strong>Dui:</strong> {{ $cliente->dui_cliente }}</p>
    <p><strong>Email:</strong> {{ $cliente->email_cliente }}</p>
    <a href="{{ route('cliente.index') }}" class="btn btn-secondary">Volver</a>
</div>