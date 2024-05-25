<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <table class="table">
        <thead>
            <tr>
                <th>Cliente</th>
                <th>Email</th>
                <th>Teléfono</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $cliente->first()->nombre_cliente }} {{ $cliente->first()->apellido_cliente }}</td>
                <td>{{ $cliente->first()->email_cliente }}</td>
                <td>{{ $cliente->first()->telefono_cliente }}</td>
            </tr>
        </tbody>
    </table>

    <table class="table">
        <thead>
            <tr>
                <th>Vendedor</th>
                <th>Fecha</th>
                <th>Pago</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $vendedor->first()->nombre_empleado }} {{ $vendedor->first()->apellido_empleado }}</td>
                <td><?php echo $fecha; ?></td>
                <td><?php echo $pago; ?></td>
            </tr>
        </tbody>
    </table>

    <table class="table">
        <thead>
            <tr>
                <th>CODIGO</th>
                <th>CANT.</th>
                <th>DESCRIPCION</th>
                <th>PRECIO UNIT.</th>
                <th>PRECIO TOTAL</th>
            </tr>
        </thead>
        <tbody class="cuerpo">
            <?php
                $subtotal = 0;
            ?>
            @foreach ($detVentTemp as $item)
                <?php
                    echo "
                        <tr>
                            <td>$item->id_producto</td>
                            <td>$item->cantidad_detalle</td>
                            <td>$item->nombre_producto</td>
                            <td>$item->precio_producto</td>
                            <td>$item->subtotal_detalle</td>
                        </tr>
                    ";
                    
                    $subtotal += $item->subtotal_detalle;

                ?>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4">SUBTOTAL</td>
                <td class="subtotal">${{ $subtotal }}</td>
            </tr>
            <tr>
                <td colspan="4">IVA (13%)</td>
                <td class="iva">${{ $subtotal * 1.13 }}</td>
            </tr>
            <tr>
                <td colspan="4">TOTAL</td>
                <td class="total">${{ $subtotal * 1.13 }}</td>
            </tr>
        </tfoot>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
