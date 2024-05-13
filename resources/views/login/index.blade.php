<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div class="container mt-5">
        <form action="{{ route('inicioSesion') }}" method="post">
            {{ csrf_field() }}
            <input type="text" class="form-control" placeholder="E-mail" name="correo" id="correo">
            <input type="text" class="form-control" placeholder="Contraseña" name="clave" id="clave">
            {{-- <input type="text" class="form-control" placeholder="clave" name="clave" id="clave"> --}}
            <input type="submit" class="form-control bg-primary text-light " value="Iniciar Sesion">
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
