@extends ('includes.sidebar')
@section('contenido')
    <div class="invoice-container">
        <div class="invoice-header">
            <h1>Nueva Factura</h1>
        </div>

        <div class="invoice-details">
            <form action="{{ route('guardarVenta') }}" method="post">
                {{ csrf_field() }}
                <div class="invoice-info-row">
                    <div class="invoice-info">
                        <label for="cliente">Cliente:</label>
                        <select id="cliente" name="cliente" onchange="infoCliente(), search();">
                            <option value="">Selecciona un cliente</option>
                            @foreach ($clientes as $item)
                                <option value="{{ $item->id_cliente }}">{{ $item->nombre_cliente }}
                                    {{ $item->apellido_cliente }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="invoice-info">
                        <label for="email1">Email:</label>
                        <input type="email" id="email" name="email">
                    </div>

                    <div class="invoice-info">
                        <label for="telefono1">Teléfono:</label>
                        <input type="tel" id="telefono" name="telefono">
                    </div>
                </div>

                <div class="invoice-info-row">
                    <div class="invoice-info">
                        <label for="fecha">Fecha:</label>
                        <input type="date" id="fecha" name="fecha" value="2024-05-13" onchange="infoCliente()">
                    </div>

                    <div class="invoice-info">
                        <label for="pago">Pago:</label>
                        <select id="pago" name="pago" onchange="infoCliente()">
                            <option value="Efectivo">Efectivo</option>
                            <option value="Tarjeta">Tarjeta</option>
                        </select>
                    </div>

                    <div class="invoice-info">
                        <label for="vendedor">Vendedor:</label>
                        <select name="vendedor" id="vendedor" onchange="infoCliente()">
                            <option value="">Vendedor...</option>
                            @foreach ($empleados as $item)
                                <option value="{{ $item->id_empleado }}">{{ $item->nombre_empleado }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
        </div>

        <button type="submit">Guardar Venta</button>
        </form>

        <button id="openNuevoProductoModal">Nuevo producto</button>
        <button id="openNuevoClienteModal">Nuevo cliente</button>
        <button id="openAgregarProductosModal">Agregar productos</button>
        <button id="openImprimirModal">Imprimir</button>

        <!-- Nuevo Producto Modal -->
        <div id="nuevoProductoModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Agregar nuevo producto</h2>
                <hr>

                <form action="{{ route('guardarProducto') }}" method="post">
                    {{ csrf_field() }}
                    <h5 class="title">Nombre del producto:</h5>
                    <input class="inputt" type="text" id="nombre_producto" name="nombre_producto"
                        placeholder="Nombre producto" />
                    <h5 class="title">Precio:</h5>
                    <input class="inputt" type="text" id="precio_producto" name="precio_producto"
                        placeholder="Precio de venta" />
                    <h5 class="title">Existencias:</h5>
                    <input class="inputt" type="text" id="existencias" name="existencias" placeholder="Excistencias" />
                    <h5 class="title">Categoría:</h5>
                    <select class="inputt" name="id_categoria" id="id_categoria">
                        <option selected>Seleccionar...</option>
                        @foreach ($categorias as $item)
                            <option value="{{ $item->id_categoria }}">{{ $item->nombre_categoria }}</option>
                        @endforeach
                    </select>
                    <!-- Aquí irían los campos para ingresar información sobre el nuevo producto -->
                    <button type="submit" id="guardarNuevoProducto">Guardar</button>
                </form>
            </div>
        </div>

        <!-- Nuevo Cliente Modal -->
        <div id="nuevoClienteModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Agregar nuevo cliente</h2>
                <hr>

                <form action="{{ route('guardarCliente') }}" method="post">
                    {{ csrf_field() }}
                    <h5 class="title">Nombre cliente:</h5>
                    <input class="inputt" type="text" id="nombre_cliente" name="nombre_cliente" placeholder="Nombres" />
                    <h5 class="title">Apellido cliente:</h5>
                    <input class="inputt" type="text" id="apellido_cliente" name="apellido_cliente"
                        placeholder="Apellidos" />
                    <h5 class="title">Dirección:</h5>
                    <input class="inputt" type="text" id="direccion_cliente" name="direccion_cliente"
                        placeholder="Dirección" />
                    <h5 class="title">DUI:</h5>
                    <input class="inputt" type="text" id="dui_cliente" name="dui_cliente" placeholder="DUI" />
                    <h5 class="title">Teléfono:</h5>
                    <input class="inputt" type="text" id="telefono_cliente" name="telefono_cliente"
                        placeholder="Teléfono" />
                    <h5 class="title">E-mail:</h5>
                    <textarea class="inputt" id="email_cliente" name="email_cliente" placeholder="Email"></textarea>
                    <h5 class="title">Clave:</h5>
                    <input class="inputt" type="text" id="clave_cliente" name="clave_cliente"
                        placeholder="Contraseña" />

                    <!-- Aquí irían los campos para ingresar información sobre el nuevo cliente -->
                    <button type="submits" id="guardarNuevoCliente">Guardar</button>
                </form>
            </div>
        </div>

        <!-- Agregar Productos Modal -->
        <div id="agregarProductosModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Agregar Productos</h2>
                <!-- Aquí irían los campos para agregar productos -->
                <select class="form-control" name="productoAgregar" id="productoAgregar">
                    <option selected>Seleccione...</option>
                    @foreach ($productos as $item)
                        <option value="{{ $item->id_producto }}">{{ $item->nombre_producto }}</option>
                    @endforeach
                </select>
                <input type="text" name="cantidad" id="cantidad" placeholder="Cantidad">
                <button class="boton" onclick="addVenta(), search()">Agregar</button>
            </div>
        </div>

        <!-- Imprimir Modal -->
        <div id="imprimirModal" class="modal">
            <form action="{{ route('pdfFactura') }}" id="formulario" method="post" target="_blank">
                {{ csrf_field() }}
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <h2>Imprimir</h2>
                    <input type="hidden" name="id_cliente_pdf" id="id_cliente_pdf">
                    <input type="hidden" name="fecha_pdf" id="fecha_pdf">
                    <input type="hidden" name="pago_pdf" id="pago_pdf">
                    <input type="hidden" name="vendedor_pdf" id="vendedor_pdf">
                    <!-- Contenido para imprimir -->
                    <button type="submit" id="imprimir">Imprimir</button>
                </div>
            </form>
        </div>

        <script>
            function infoCliente() {
                var id_cliente = document.getElementById("cliente").value;
                var fecha = document.getElementById('fecha').value;
                var pago = document.getElementById('pago').value;
                var vendedor = document.getElementById('vendedor').value;

                document.getElementById("id_cliente_pdf").value = id_cliente;
                document.getElementById('fecha_pdf').value = fecha;
                document.getElementById('pago_pdf').value = pago;
                document.getElementById('vendedor_pdf').value = vendedor;

                @foreach ($clientes as $item)
                    if ({{ $item->id_cliente }} == id_cliente) {
                        document.getElementById("email").value = '{{ $item->email_cliente }}';
                        document.getElementById("telefono").value = '{{ $item->telefono_cliente }}';
                    }
                @endforeach
            }

            function pdfAbrir() {
                window.open('/empleado/pdf2', '_blank');
            }

            document.addEventListener("DOMContentLoaded", function() {
                document.getElementById("formulario").addEventListener('submit', validarFormulario);
            });

            function validarFormulario(evento) {
                evento.preventDefault();
                var usuario = document.getElementById('cliente').value;
                if (usuario.length == 0) {
                    alert('Seleccione el cliente');
                    return;
                }
                var clave = document.getElementById('vendedor').value;
                if (clave.length == 0) {
                    alert('Seleccione el vendedor');
                    return;
                }
                this.submit();
            }
        </script>

        <div class="invoice-products" id="divAjax">
            <table>
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
                    <script>
                        function search() {
                            var id_cliente = document.getElementById('cliente').value;
                            var prod = document.getElementById("productoAgregar").value;
                            var cant = document.getElementById("cantidad").value;

                            if (id_cliente > 0) {
                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                                    }
                                });

                                $.ajax({
                                    type: 'POST',
                                    url: './empleado/buscardetalle',
                                    data: {
                                        id_cliente,
                                        prod,
                                        cant
                                    },

                                    success: function(detVentTempBuscar) {

                                        var cuerpo = document.querySelector('.cuerpo');
                                        var subtotal = document.querySelector('.subtotal');
                                        var iva = document.querySelector('.iva');
                                        var total = document.querySelector('.total');

                                        var subtotalSum = 0;
                                        var ivaSum = 0;
                                        var totalSum = 0;

                                        cuerpo.innerHTML = "";

                                        @foreach ($detVentTempBuscar as $item)
                                            if ({{ $item->id_cliente }} == id_cliente) {
                                                cuerpo.innerHTML += "<?php
                                                
                                                echo '<tr>';
                                                echo '<td>' . $item->id_producto . '</td>';
                                                echo '<td>' . $item->cantidad_detalle . '</td>';
                                                echo '<td>' . $item->nombre_producto . '</td>';
                                                echo '<td>$' . $item->precio_producto . '</td>';
                                                echo '<td>$' . $item->subtotal_detalle . '</td>';
                                                echo '</tr>';
                                                
                                                ?>";

                                                subtotalSum += {{ $item->precio_producto }};
                                            }
                                        @endforeach

                                        subtotal.innerHTML = "$" + subtotalSum.toFixed(2);
                                        iva.innerHTML = "$" + (subtotalSum * 1.13).toFixed(2);
                                        total.innerHTML = "$" + (subtotalSum * 1.13).toFixed(2);

                                        // alert('Producto añadido');

                                    },
                                    statusCode: {
                                        404: function() {
                                            alert('web not found');
                                        }
                                    },
                                    error: function(x, xs, xt) {
                                        // window.open(JSON.stringify(x));
                                        alert('error: ' + JSON.stringify(x) + "\n error string: " + xs + "\n error throwed: " +
                                            xt);
                                    }
                                });
                            } else {
                                alert('Primero seleccione un cliente');
                            }
                        }

                        function addVenta() {
                            var id_cliente = document.getElementById('cliente').value;
                            var id_empleado = document.getElementById('vendedor').value;
                            var prod = document.getElementById("productoAgregar").value;
                            var cant = document.getElementById("cantidad").value;

                            if (id_cliente > 0) {
                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                                    }
                                });

                                $.ajax({
                                    type: 'POST',
                                    url: './empleado/ventatemporal',
                                    data: {
                                        id_cliente,
                                        prod,
                                        cant
                                    },

                                    success: function(detVentTempBuscar) {

                                        var cuerpo = document.querySelector('.cuerpo');
                                        var subtotal = document.querySelector('.subtotal');
                                        var iva = document.querySelector('.iva');
                                        var total = document.querySelector('.total');

                                        var subtotalSum = 0;
                                        var ivaSum = 0;
                                        var totalSum = 0;

                                        cuerpo.innerHTML = "";

                                        @foreach ($detVentTempBuscar as $item)
                                            if ({{ $item->id_cliente }} == id_cliente) {
                                                cuerpo.innerHTML += "<?php
                                                
                                                echo '<tr>';
                                                echo '<td>' . $item->id_producto . '</td>';
                                                echo '<td>' . $item->cantidad_detalle . '</td>';
                                                echo '<td>' . $item->nombre_producto . '</td>';
                                                echo '<td>$' . $item->precio_producto . '</td>';
                                                echo '<td>$' . $item->subtotal_detalle . '</td>';
                                                echo '</tr>';
                                                
                                                ?>";

                                                subtotalSum += {{ $item->precio_producto }};
                                            }
                                        @endforeach

                                        subtotal.innerHTML = "$" + subtotalSum.toFixed(2);
                                        iva.innerHTML = "$" + (subtotalSum * 1.13).toFixed(2);
                                        total.innerHTML = "$" + (subtotalSum * 1.13).toFixed(2);

                                        // alert('Producto añadido');

                                    },
                                    statusCode: {
                                        404: function() {
                                            alert('web not found');
                                        }
                                    },
                                    error: function(x, xs, xt) {
                                        // window.open(JSON.stringify(x));
                                        alert('error: ' + JSON.stringify(x) + "\n error string: " + xs + "\n error throwed: " +
                                            xt);
                                    }
                                });
                            } else {
                                alert('Primero seleccione un cliente y el empleado');
                            }
                        }
                    </script>

                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4">SUBTOTAL</td>
                        <td class="subtotal">$0.00</td>
                    </tr>
                    <tr>
                        <td colspan="4">IVA (13%)</td>
                        <td class="iva">$0.00</td>
                    </tr>
                    <tr>
                        <td colspan="4">TOTAL</td>
                        <td class="total">$0.00</td>
                    </tr>
                </tfoot>
            </table>
        </div>


    </div>
@endsection
