<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro</title>

    <link href="{{ asset('./css/registro.css') }}" rel="stylesheet">
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

        <div class="user_card">
            <div class="brand_logo_container">
                <img src="{{ asset('img/logo_delgado.png') }}" class="brand_logo" alt="Logo">
                <p class="subparrafo">Regístrate para reservar una cita o ver los productos.</p>
            </div>
            <div class="form_container">
                <form action="{{ route('registro') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        
                        <input type="text" class="form-control" id="nombre_cliente" name="nombre_cliente" placeholder="Nombre" required>
                    </div>
                    <div class="mb-3">
                        
                        <input type="text" class="form-control" id="apellido_cliente" name="apellido_cliente" placeholder="Apellido" required>
                    </div>
                    <div class="mb-3">
                        
                        <input type="text" class="form-control" id="telefono_cliente" name="telefono_cliente" placeholder="Teléfono" required>
                    </div>
                    <div class="mb-3">
                    
                        <input type="text" class="form-control" id="direccion_cliente" name="direccion_cliente" placeholder="Dirección" required>
                    </div>
                    <div class="mb-3">
                        
                        <input type="text" class="form-control" id="dui_cliente" name="dui_cliente" placeholder="DUI" required>
                    </div>
                    <div class="mb-3">
                        
                        <input type="email" class="form-control" id="email_cliente" name="email_cliente" placeholder="Correo Electrónico" required>
                    </div>
                    <div class="mb-3">
                        
                        <input type="password" class="form-control" id="clave_cliente" name="clave_cliente" placeholder="Contraseña" required>
                    </div>
        
                    <button type="submit" class="btn btn-primary">Registrarse</button>
                </form>

                <div class="separator">
                    <div class="line"></div>
                    <div class="or">O</div>
                    <div class="line"></div>
                </div>

                <div class="login_link_container">
                    <p class="login_link_text">¿Tienes una cuenta? <a href="{{ route('login') }}" class="login_link">Inicia sesión</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
