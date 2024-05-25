@extends ('includes.sidebar')
@section('contenido')
@include('includes.bostrapcrud')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <div class="invoice-container">
        <div class="invoice-header">
            <h1>Facturación</h1>
        </div>

        
        <div class="invoice-details">
            <form action="{{ route('guardarVenta') }}" method="post" id="formulario">
                {{ csrf_field() }}
                <div class="invoice-info-row">
                    <div class="invoice-info">
                        <label for="cliente">Cliente</label>
                        <select id="cliente" name="cliente" onchange="infoCliente(), updateInvoiceTable()">
                            <option value="">Selecciona un cliente</option>
                            @foreach ($clientes as $item)
                                <option value="{{ $item->id_cliente }}">{{ $item->nombre_cliente }} {{ $item->apellido_cliente }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="invoice-info">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" readonly require>
                    </div>

                    <div class="invoice-info">
                        <label for="telefono">Teléfono</label>
                        <input type="tel" id="telefono" name="telefono" readonly require>
                    </div>
                </div>

                <div class="invoice-info-row">
                    <div class="invoice-info">
                        <label for="fecha">Fecha</label>
                        <input type="date" id="fecha" name="fecha" value="2024-05-13">
                    </div>

                    <div class="invoice-info">
                        <label for="pago">Pago</label>
                        <select id="pago" name="pago">
                            <option value="Efectivo">Efectivo</option>
                            <option value="Tarjeta">Tarjeta</option>
                            <option value="Tarjeta">Transferencia</option>
                        </select>
                    </div>

                    <div class="invoice-info">
                        <label for="vendedor">Empleado</label>
                        <select name="vendedor" id="vendedor">
                          
                            @foreach ($empleados as $item)
                                <option value="{{ $item->id_empleado }}">{{ $item->nombre_empleado }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <hr>
                <!-- Hidden fields for PDF data -->
                <input type="hidden" id="id_cliente_pdf" name="id_cliente_pdf">
                <input type="hidden" id="fecha_pdf" name="fecha_pdf">
                <input type="hidden" id="pago_pdf" name="pago_pdf">
                <input type="hidden" id="vendedor_pdf" name="vendedor_pdf">

                <button type="submit" class="btn btn-primary">Guardar </button>
            </form>

            <!-- Separate form for generating PDF -->
            <form action="{{ route('showFacturaTemp') }}" method="post" target="_blank" id="pdfForm">
                {{ csrf_field() }}
                
                <input type="hidden" id="pdf_cliente" name="id_cliente_pdf">
                <input type="hidden" id="pdf_fecha" name="fecha_pdf">
                <input type="hidden" id="pdf_pago" name="pago_pdf">
                <input type="hidden" id="pdf_vendedor" name="vendedor_pdf">
             

            </form>
        </div>
<hr>
        <button id="openAgregarProductosModal" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#agregarProductosModal">Agregar productos</button>
        <button type="button" class="btn btn-pdf" onclick="generarPDF()">
                    <i class="bi bi-file-pdf"></i>Imprimir
                </button>
                <hr>
        <!-- Agregar Productos Modal -->
        <div id="agregarProductosModal" class="modal fade" tabindex="-1" aria-labelledby="agregarProductosModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="agregarProductosModalLabel">Agregar Productos</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"></button>
                        
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="productoAgregar" class="form-label">Producto:</label>
                            <select  class="form-select form-control" name="productoAgregar" id="productoAgregar">
                                <option class="" selected>Seleccione...</option>
                                @foreach ($productos as $item)
                                    <option value="{{ $item->id_producto }}">{{ $item->nombre_producto }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="cantidad" class="form-label">Cantidad:</label>
                            <input type="number" class="form-control" name="cantidad" id="cantidad" placeholder="Cantidad">
                        </div>
                        <button class="btn btn-primary" onclick="addProduct()">Agregar</button>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="invoice-products" id="divAjax">
            <table class="table">
                <thead>
                    <tr>
                        <th>CODIGO</th>
                        <th>CANT.</th>
                        <th>DESCRIPCION</th>
                        <th>PRECIO UNIT.</th>
                        <th>PRECIO TOTAL</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody class="cuerpo">
                    <!-- Productos añadidos dinámicamente -->
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
    


    <script>
        function infoCliente() {
            var id_cliente = document.getElementById("cliente").value;

            @foreach ($clientes as $item)
                if ('{{ $item->id_cliente }}' == id_cliente) {
                    document.getElementById("email").value = '{{ $item->email_cliente }}';
                    document.getElementById("telefono").value = '{{ $item->telefono_cliente }}';
                }
            @endforeach
        }

        function addProduct() {
            var id_cliente = document.getElementById('cliente').value;
            var prod = document.getElementById("productoAgregar").value;
            var cant = document.getElementById("cantidad").value;

            if (!id_cliente || !prod || !cant) {
                alert('Seleccione el cliente, producto y cantidad');
                return;
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: '{{ route('agregarProductoTemporal') }}',
                data: { id_cliente, prod, cant },
                success: function(response) {
                    updateInvoiceTable();
                },
                error: function(error) {
                    console.error('Error:', error);
                }
            });
        }

        function removeProduct(id_producto) {
            var id_cliente = document.getElementById('cliente').value;

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: '{{ route('eliminarProductoTemporal') }}',
                data: { id_cliente, id_producto },
                success: function(response) {
                    updateInvoiceTable();
                },
                error: function(error) {
                    console.error('Error:', error);
                }
            });
        }

        function updateInvoiceTable() {
            var id_cliente = document.getElementById('cliente').value;

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: '{{ route('obtenerProductosTemporales') }}',
                data: { id_cliente },
                success: function(data) {
                    var cuerpo = document.querySelector('.cuerpo');
                    var subtotal = document.querySelector('.subtotal');
                    var iva = document.querySelector('.iva');
                    var total = document.querySelector('.total');

                    cuerpo.innerHTML = '';
                    var subtotalSum = 0;

                    data.forEach(item => {
                        var row = `
                            <tr>
                                <td>${item.id_producto}</td>
                                <td>${item.cantidad_detalle}</td>
                                <td>${item.nombre_producto}</td>
                                <td>$${item.precio_producto.toFixed(2)}</td>
                                <td>$${(item.precio_producto * item.cantidad_detalle).toFixed(2)}</td>
                                <td><button class="btn btn-danger" onclick="removeProduct(${item.id_producto})">Eliminar</button></td>
                            </tr>
                        `;
                        cuerpo.insertAdjacentHTML('beforeend', row);
                        subtotalSum += item.precio_producto * item.cantidad_detalle;
                    });

                    var ivaSum = subtotalSum * 0.13;
                    var totalSum = subtotalSum + ivaSum;

                    subtotal.textContent = `$${subtotalSum.toFixed(2)}`;
                    iva.textContent = `$${ivaSum.toFixed(2)}`;
                    total.textContent = `$${totalSum.toFixed(2)}`;
                },
                error: function(error) {
                    console.error('Error:', error);
                }
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            updateInvoiceTable();
        });
    </script>

<script>
        document.addEventListener("DOMContentLoaded", function() {
    // Event listener for form submission
    document.getElementById("formulario").addEventListener('submit', validarFormulario);
});

function infoCliente() {
    var id_cliente = document.getElementById("cliente").value;
    var fecha = document.getElementById('fecha').value;
    var pago = document.getElementById('pago').value;
    var vendedor = document.getElementById('vendedor').value;

    // Set the values of hidden fields for PDF data
    document.getElementById("id_cliente_pdf").value = id_cliente;
    document.getElementById('fecha_pdf').value = fecha;
    document.getElementById('pago_pdf').value = pago;
    document.getElementById('vendedor_pdf').value = vendedor;

    // Update client email and phone based on selected client
    @foreach ($clientes as $item)
        if ({{ $item->id_cliente }} == id_cliente) {
            document.getElementById("email").value = '{{ $item->email_cliente }}';
            document.getElementById("telefono").value = '{{ $item->telefono_cliente }}';
        }
    @endforeach
}

function validarFormulario(evento) {
    evento.preventDefault();

    var cliente = document.getElementById('cliente').value;
    if (cliente.length === 0) {
        alert('Seleccione el cliente');
        return;
    }

    var vendedor = document.getElementById('vendedor').value;
    if (vendedor.length === 0) {
        alert('Seleccione el vendedor');
        return;
    }

    // Submit the form
    this.submit();
}

function generarPDF() {
    // Get form data
    var cliente = document.getElementById("cliente").value;
    var fecha = document.getElementById('fecha').value;
    var pago = document.getElementById('pago').value;
    var vendedor = document.getElementById('vendedor').value;

    // Set the values of hidden fields for PDF form
    document.getElementById('pdf_cliente').value = cliente;
    document.getElementById('pdf_fecha').value = fecha;
    document.getElementById('pdf_pago').value = pago;
    document.getElementById('pdf_vendedor').value = vendedor;

    // Open PDF in new tab
    document.getElementById('pdfForm').submit();
}
    </script>
@endsection

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
