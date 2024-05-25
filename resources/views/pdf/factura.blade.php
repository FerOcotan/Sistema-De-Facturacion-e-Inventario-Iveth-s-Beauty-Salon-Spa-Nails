<!doctype html>
<html lang="en">
<head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Ephesis&family=Satisfy&display=swap" rel="stylesheet">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Factura</title>
<link rel="stylesheet" href="css/facturab.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="invoice-header">
            <div class="invoice-title" style="font-family: 'Dancing Script';     font-size: 50px; /* Tamaño del título */
">Iveth's Beauty Salon</div>
<div class="invoice-title" style="font-family: 'Dancing Script';     font-size: 20px; /* Tamaño del título */
">Spa & Nails</div>
        </div>
        <div class="invoice-details">
    <div class="customer-details">
        <!-- Detalles del cliente -->
        <p><strong>Cliente:</strong> {{ $cliente->first()->nombre_cliente }} {{ $cliente->first()->apellido_cliente }}</p>
        <p><strong>Email:</strong> {{ $cliente->first()->email_cliente }}</p>
        <p><strong>Teléfono:</strong> {{ $cliente->first()->telefono_cliente }}</p>
    </div>
    <div class="vendor-details">
        <!-- Detalles del vendedor -->
        <p><strong>Vendedor:</strong> {{ $vendedor->first()->nombre_empleado }} {{ $vendedor->first()->apellido_empleado }}</p>
        <p><strong>Fecha:</strong> <?php echo $fecha; ?></p>
        <p><strong>Pago:</strong> <?php echo $pago; ?></p>
    </div>
</div>


    <table class="table">
        <!-- Encabezados de la tabla -->
        <thead>
            <tr>
                <th>CANT.</th>
                <th>DESCRIPCIÓN</th>
                <th>PRECIO UNIT.</th>
                <th>PRECIO TOTAL</th>
            </tr>
        </thead>
        <tbody class="cuerpo">
            <?php
            $subtotal = 0;
            ?>
            <!-- Detalles de la factura -->
            @foreach ($detVentTemp as $item)
            <?php
                echo "
                    <tr>
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
        <!-- Totales -->
        <tfoot>
            <tr>
                <td colspan="3" class="text-end">SUBTOTAL</td>
                <td>${{ $subtotal }}</td>
            </tr>
            <tr>
                <td colspan="3" class="text-end">IVA (13%)</td>
                <td>${{ $subtotal * 0.13 }}</td>
            </tr>
            <tr>
                <td colspan="3" class="text-end">TOTAL</td>
                <td class="total">${{ $subtotal * 1.13 }}</td>
            </tr>
        </tfoot>
    </table>

    <div class="footer">
        <p>Gracias por su compra. ¡Vuelva pronto!</p>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
</body>
</html>
