@csrf
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('registro') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="nombre_cliente" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre_cliente" name="nombre_cliente" placeholder="Nombre" required>
            </div>
            <div class="mb-3">
                <label for="apellido_cliente" class="form-label">Apellido</label>
                <input type="text" class="form-control" id="apellido_cliente" name="apellido_cliente" placeholder="Apellido" required>
            </div>
            <div class="mb-3">
                <label for="telefono_cliente" class="form-label">Teléfono</label>
                <input type="text" class="form-control" id="telefono_cliente" name="telefono_cliente" placeholder="Teléfono" required>
            </div>
            <div class="mb-3">
                <label for="direccion_cliente" class="form-label">Dirección</label>
                <input type="text" class="form-control" id="direccion_cliente" name="direccion_cliente" placeholder="Dirección" required>
            </div>
            <div class="mb-3">
                <label for="dui_cliente" class="form-label">DUI</label>
                <input type="text" class="form-control" id="dui_cliente" name="dui_cliente" placeholder="DUI" required>
            </div>
            <div class="mb-3">
                <label for="email_cliente" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" id="email_cliente" name="email_cliente" placeholder="Correo Electrónico" required>
            </div>
            <div class="mb-3">
                <label for="clave_cliente" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="clave_cliente" name="clave_cliente" placeholder="Contraseña" required>
            </div>
            <div class="mb-3">
                <label for="img_user" class="form-label">Imagen de Perfil (URL)</label>
                <input type="text" class="form-control" id="img_user" name="img_user" placeholder="Imagen de Perfil (URL)">
            </div>
            <button type="submit" class="btn btn-primary">Registrarse</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
