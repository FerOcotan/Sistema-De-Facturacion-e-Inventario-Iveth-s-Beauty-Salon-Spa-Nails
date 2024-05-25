<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\DetalleVenta;
use App\Models\DetalleVentaTemp;
use App\Models\Empleado;
use App\Models\Producto;
use App\Models\Venta;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class EmpleadosController extends Controller
{
    public function empleado()
    {
        $productos = Producto::all();
        $clientes = Cliente::all();
        $empleados = Empleado::all();
        $categorias = Categoria::all();

        $detVentTempBuscar = DetalleVentaTemp::select(
            'producto.nombre_producto',
            'producto.precio_producto',
            'detalle_venta_temp.cantidad_detalle',
            'producto.id_producto',
            'detalle_venta_temp.subtotal_detalle',
            'detalle_venta_temp.id_cliente'
        )
            ->join('producto', 'detalle_venta_temp.id_producto', '=', 'producto.id_producto')
            ->get();

        // Lógica para mostrar la vista de empleados
        return view('empleados.index', compact('productos', 'clientes', 'detVentTempBuscar', 'empleados', 'categorias'));
    }

    public function search(Request $request)
    {
        $productos = Producto::all();
        $clientes = Cliente::all();
        $empleados = Empleado::all();
        $categorias = Categoria::all();

        // $detVentTemp = new DetalleVentaTemp();
        // $detVentTemp->id_venta = 0;
        // $detVentTemp->id_producto = $request->prod;
        // $detVentTemp->id_cliente = $request->id_cliente;
        // $detVentTemp->id_empleado = $request->vendedor;
        // $detVentTemp->cantidad_detalle = $request->cant;
        // $detVentTemp->subtotal_detalle = $productos->first()->precio_producto * $request->cant;
        // $detVentTemp->save();

        $detVentTempBuscar = DetalleVentaTemp::select(
            'producto.nombre_producto',
            'producto.precio_producto',
            'detalle_venta_temp.cantidad_detalle',
            'producto.id_producto',
            'detalle_venta_temp.subtotal_detalle',
            'detalle_venta_temp.id_cliente'
        )
            ->join('producto', 'detalle_venta_temp.id_producto', '=', 'producto.id_producto')
            ->get();

        // Lógica para mostrar la vista de empleados
        return view('empleados.index', compact('productos', 'clientes', 'detVentTempBuscar', 'empleados', 'categorias'));
    }

    public function storeTemp(Request $request)
    {
        $productos = Producto::all();
        $clientes = Cliente::all();
        $empleados = Empleado::all();
        $categorias = Categoria::all();

        $detVentTemp = new DetalleVentaTemp();
        $detVentTemp->id_venta = 0;
        $detVentTemp->id_producto = $request->prod;
        $detVentTemp->id_cliente = $request->id_cliente;
        $detVentTemp->id_empleado = $request->vendedor;
        $detVentTemp->cantidad_detalle = $request->cant;
        $detVentTemp->subtotal_detalle = $productos->first()->precio_producto * $request->cant;
        $detVentTemp->save();

        $detVentTempBuscar = DetalleVentaTemp::select(
            'producto.nombre_producto',
            'producto.precio_producto',
            'detalle_venta_temp.cantidad_detalle',
            'producto.id_producto',
            'detalle_venta_temp.subtotal_detalle',
            'detalle_venta_temp.id_cliente'
        )
            ->join('producto', 'detalle_venta_temp.id_producto', '=', 'producto.id_producto')
            ->get();

        // Lógica para mostrar la vista de empleados
        return view('empleados.index', compact('productos', 'clientes', 'detVentTempBuscar', 'empleados', 'categorias'));
    }

    public function store(Request $request)
    {
        $venta = new Venta();
        $venta->id_cliente = $request->cliente;
        $venta->id_empleado = 1;
        $venta->metodo_pago_venta = $request->pago;
        $venta->fecha_hora_venta = $request->fecha;
        $venta->save();

        $buscarVenta = Venta::orderBy('id_venta', 'DESC')
            ->where('id_empleado', $request->vendedor)
            ->get();

        $detVentTempBuscar = DetalleVentaTemp::where('id_cliente', $request->cliente)
            ->get();

        foreach ($detVentTempBuscar as $item) {
            $detalleVenta = new DetalleVenta();
            $detalleVenta->id_venta = $buscarVenta->first()->id_venta;
            $detalleVenta->id_producto = $item->id_producto;
            $detalleVenta->cantidad_detalle = $item->cantidad_detalle;
            $detalleVenta->save();
        }

        $detVentTempBuscar = DetalleVentaTemp::where('id_cliente', $request->cliente)
            ->delete();

        return back();
    }

    public function storeCliente(Request $request)
    {
        $cliente = new Cliente();
        $cliente->id_estado = 3;
        $cliente->nombre_cliente = $request->nombre_cliente;
        $cliente->apellido_cliente = $request->apellido_cliente;
        $cliente->telefono_cliente = $request->telefono_cliente;
        $cliente->direccion_cliente = $request->direccion_cliente;
        $cliente->dui_cliente = $request->dui_cliente;
        $cliente->email_cliente = $request->email_cliente;
        $cliente->clave_cliente = $request->clave_cliente;
        $cliente->save();

        return redirect()->action([EmpleadosController::class, 'empleado']);
    }

    public function storeProducto(Request $request)
    {
        $productos = new Producto();
        $productos->id_categoria = $request->id_categoria;
        $productos->id_estado = 3;
        $productos->nombre_producto = $request->nombre_producto;
        $productos->precio_producto = $request->precio_producto;
        $productos->existencias = $request->existencias;
        $productos->save();

        return redirect()->action([EmpleadosController::class, 'empleado']);
    }

    public function showFacturaTemp(Request $request)
    {
        $fecha = $request->fecha_pdf;
        $pago = $request->pago_pdf;

        $cliente = Cliente::where('id_cliente', $request->id_cliente_pdf)
            ->get();
        $vendedor = Empleado::where('id_empleado', $request->vendedor_pdf)
            ->get();

        $detVentTemp = DetalleVentaTemp::select(
            'producto.nombre_producto',
            'producto.precio_producto',
            'detalle_venta_temp.cantidad_detalle',
            'producto.id_producto',
            'detalle_venta_temp.subtotal_detalle',
            'detalle_venta_temp.id_cliente'
        )
            ->join('producto', 'detalle_venta_temp.id_producto', '=', 'producto.id_producto')
            ->where('id_cliente', $request->id_cliente_pdf)
            ->get();

        $pdf = Pdf::loadView('pdf.factura', compact('cliente', 'fecha', 'pago', 'vendedor', 'detVentTemp'));

        return $pdf->stream();
    }
}
