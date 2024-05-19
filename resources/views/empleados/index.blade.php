@extends ('includes.sidebar')
@section('contenido')
    <div class="invoice-container">
        <div class="invoice-header">
            <h1>Nueva Factura</h1>
        </div>

        <div class="invoice-details">
            <div class="invoice-info-row">
                <div class="invoice-info">
                    <label for="cliente">Cliente:</label>
                    <select id="cliente" name="cliente">
                        <option value="">Selecciona un cliente</option>
                    </select>
                </div>

                <div class="invoice-info">
                    <label for="email1">Email:</label>
                    <input type="email" id="email1" name="email1">
                </div>

                <div class="invoice-info">
                    <label for="telefono1">Teléfono:</label>
                    <input type="tel" id="telefono1" name="telefono1">
                </div>
            </div>

            <div class="invoice-info-row">
                <div class="invoice-info">
                    <label for="fecha">Fecha:</label>
                    <input type="date" id="fecha" name="fecha" value="2024-05-13">
                </div>

                <div class="invoice-info">
                    <label for="pago">Pago:</label>
                    <select id="pago" name="pago">
                        <option value="efectivo">Efectivo</option>
                        <option value="tarjeta">Tarjeta</option>
                    </select>
                </div>

                <div class="invoice-info">
                    <label for="vendedor">Vendedor:</label>
                    <input type="text" id="vendedor" name="vendedor" value="Obed Alvarado">
                </div>
            </div>
        </div>


        <button id="openNuevoProductoModal">Nuevo producto</button>
        <button id="openNuevoClienteModal">Nuevo cliente</button>
        <button id="openAgregarProductosModal" onclick="addProd()">Agregar productos</button>
        <button id="openImprimirModal">Imprimir</button>
        <button onclick="cambiaDatos()">Recargar</button>

        <!-- Nuevo Producto Modal -->
        <div id="nuevoProductoModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Agregar nuevo producto</h2>
                <hr>

                <h5 class="title">Nombre del producto:</h5>
                <input class="inputt" type="email" id="email" name="email" placeholder="Nombre producto" />
                <h5 class="title">Precio:</h5>
                <input class="inputt" type="email" id="email" name="email" placeholder="Precio de venta" />
                <h5 class="title">Excistencias:</h5>
                <input class="inputt" type="email" id="email" name="email" placeholder="Excistencias" />
                <!-- Aquí irían los campos para ingresar información sobre el nuevo producto -->
                <button id="guardarNuevoProducto">Guardar</button>
            </div>
        </div>

        <!-- Nuevo Cliente Modal -->
        <div id="nuevoClienteModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Agregar nuevo cliente</h2>
                <hr>

                <h5 class="title">Nombre cliente:</h5>
                <input class="inputt" type="email" id="email" name="email" placeholder="Nombre" />
                <h5 class="title">Teléfono:</h5>
                <input class="inputt" type="email" id="email" name="email" placeholder="Teléfono" />
                <h5 class="title">E-mail:</h5>
                <textarea class="inputt" id="email" name="email" placeholder="Email"></textarea>

                <!-- Aquí irían los campos para ingresar información sobre el nuevo cliente -->
                <button id="guardarNuevoCliente">Guardar</button>
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
                <button class="boton" onclick="addProd()">Agregar</button>
            </div>
        </div>

        <!-- Imprimir Modal -->
        <div id="imprimirModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Imprimir</h2>
                <!-- Contenido para imprimir -->
                <button id="imprimir">Imprimir</button>
            </div>
        </div>

        <script>
            const idProd = [];
            const cantidad = [];
            var hola = 5;

            function addProd() {
                var prod = document.getElementById("productoAgregar").value;
                var cant = document.getElementById("cantidad").value;

                idProd.push(prod);
                cantidad.push(cant);

                document.querySelector("#idProduc").value = idProd;
                document.querySelector("#cant").value = cantidad;
            }
        </script>

        <input type="text" id="idProduc" name="idProduc">
        <input type="text" id="cant" name="cant">
        <input type="text" id="prueba" name="prueba">

        <div class="invoice-products">
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
                        function cambiaDatos() {
                            var cuerpo = document.querySelector('.cuerpo');

                            if (cantidad[0] != null) {

                                @foreach ($productos as $item)
                                    if () {
                                        cuerpo.innerHTML += "<?php
                                        
                                        echo '<tr>';
                                        echo '<td>" + idProd[0] + "</td>';
                                        echo '<td>" + cantidad[0] + "</td>';
                                        echo '<td>' . $item->nombre_producto . '</td>';
                                        echo '<td>$' . $item->precio_producto . '</td>';
                                        echo '<td>$" + cantidad[0] + "</td>';
                                        echo '</tr>';
                                        
                                        ?>";
                                    }
                                @endforeach
                            }
                        }
                    </script>

                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4">SUBTOTAL</td>
                        <td>$0.00</td>
                    </tr>
                    <tr>
                        <td colspan="4">IVA (13%)</td>
                        <td>$0.00</td>
                    </tr>
                    <tr>
                        <td colspan="4">TOTAL</td>
                        <td>$0.00</td>
                    </tr>
                </tfoot>
            </table>
        </div>


    </div>
@endsection
