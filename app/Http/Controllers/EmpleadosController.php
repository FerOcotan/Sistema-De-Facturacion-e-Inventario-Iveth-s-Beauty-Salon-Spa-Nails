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
        try {
            // Buscar detalles temporales de venta
            $detVentTempBuscar = DetalleVentaTemp::where('id_cliente', $request->cliente)->get();
    
            if ($detVentTempBuscar->isEmpty()) {
                return back()->withErrors(['error' => 'No se encontraron detalles de venta temporales.']);
            }
    
            // Calcular el total de la venta
            $totalVenta = 0;
            foreach ($detVentTempBuscar as $item) {
                $totalVenta += $item->subtotal_detalle;
            }
    
            // Crear una nueva venta
            $venta = new Venta();
            $venta->id_cliente = $request->cliente;
            $venta->id_empleado = $request->vendedor; // Deberías cambiar esto si el id del empleado debe ser dinámico
            $venta->metodo_pago_venta = $request->pago;
            $venta->fecha_hora_venta = $request->fecha;
            $venta->total_venta = $totalVenta; // Guardar el total de la venta
            $venta->save();
    
            // Verificar que la venta se haya creado correctamente
            \Log::info('Venta creada: ' . $venta->id_venta);
    
            // Guardar los detalles de la venta
            foreach ($detVentTempBuscar as $item) {
                $detalleVenta = new DetalleVenta();
                $detalleVenta->id_venta = $venta->id_venta;
                $detalleVenta->id_producto = $item->id_producto;
                $detalleVenta->cantidad_detalle = $item->cantidad_detalle;
                $detalleVenta->subtotal_detalle = $item->subtotal_detalle; // Asegúrate de guardar el subtotal
                $detalleVenta->save();
    
                \Log::info('Detalle de venta guardado: ' . $detalleVenta->id_detalle);
            }
    
            // Eliminar detalles temporales de venta después de guardarlos en la tabla definitiva
            DetalleVentaTemp::where('id_cliente', $request->cliente)->delete();
    
            return back()->with('success', 'Venta guardada correctamente');
        } catch (\Exception $e) {
            \Log::error('Error al guardar la venta: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Error al guardar la venta: ' . $e->getMessage()]);
        }
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

 


  

    public function agregarProductoTemporal(Request $request)
    {
        $producto = Producto::find($request->prod);
        $cantidad = $request->cant;

        $detVentTemp = new DetalleVentaTemp();
        $detVentTemp->id_venta = 0; // Asumimos que es temporal, por lo que id_venta es 0 o NULL
        $detVentTemp->id_producto = $producto->id_producto;
        $detVentTemp->id_cliente = $request->id_cliente;
        $detVentTemp->id_empleado = $request->vendedor;
        $detVentTemp->cantidad_detalle = $cantidad;
        $detVentTemp->subtotal_detalle = $producto->precio_producto * $cantidad;
        $detVentTemp->save();

        return response()->json(['success' => 'Producto agregado correctamente']);
    }

    public function eliminarProductoTemporal(Request $request)
    {
        DetalleVentaTemp::where('id_cliente', $request->id_cliente)
            ->where('id_producto', $request->id_producto)
            ->delete();

        return response()->json(['success' => 'Producto eliminado correctamente']);
    }

    public function obtenerProductosTemporales(Request $request)
    {
        $productos = DetalleVentaTemp::where('id_cliente', $request->id_cliente)
            ->join('producto', 'detalle_venta_temp.id_producto', '=', 'producto.id_producto')
            ->get([
                'producto.id_producto',
                'producto.nombre_producto',
                'detalle_venta_temp.cantidad_detalle',
                'producto.precio_producto',
                'detalle_venta_temp.subtotal_detalle'
            ]);

        return response()->json($productos);
    }
    
   
}
