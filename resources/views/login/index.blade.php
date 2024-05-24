<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="{{ asset('./css/login.css') }}" rel="stylesheet">
</head>

<body>

    <div class="container">
        <div class="user_card">
            <div class="brand_logo_container">
                <img src="{{ asset('img/logo.png') }}" class="brand_logo" alt="Logo">
            </div>
            <div class="form_container">
                <form action="{{ route('inicioSesion') }}" method="post">
                    {{ csrf_field() }}
                    <div class="input-group mb-3">
                        <input type="email" class="form-control input_user" autocomplete="on" placeholder="E-mail" name="correo" id="correo" required>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control input_pass"  autocomplete="on"placeholder="Contraseña" name="clave" id="clave" required>
                    </div>
                    <div class="input-group mb-3">
                        <input type="submit" class="form-control bg-primary text-light login_btn" value="Iniciar Sesión">
                    </div>
                </form>
                <div class="separator">
                    <div class="line"></div>
                    <div class="or">O</div>
                    <div class="line"></div>
                </div>
                <div class="register_container">
                    <p class="register_text">¿No tienes una cuenta? <a href="{{ route('registro') }}" class="register_btn">Regístrate</a></p>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
