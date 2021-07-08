<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Role;
use App\Facturas;
use App\Clientes;
use App\Productos;
use App\Proveedores;
use App\Productosproveedor;

use Carbon\Carbon;
use Auth;
use DB;


class CajaController extends Controller
{
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['caja']);  
              
        $roles = Role::all();
        $clientes = Clientes::latest()->paginate();
        
        $fecha = Carbon::now();
        $hoy = date("d", strtotime($fecha));

        $facturas_hoy = DB::table('clientes')
                ->whereDay('created_at', '=', $hoy)
                ->get();
        
        return view('caja.caja',compact('clientes','roles','facturas_hoy'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function clientes_store(Request $request)
    {
        $request->user()->authorizeRoles(['caja']);
        
        $caja_id = auth()->user()->id;  

        $clientes = new Clientes;
        $clientes->numero_factura = $request->numero_factura; 
        $clientes->nombre = $request->nombre;
        $clientes->apellido = $request->apellido;
        $clientes->cedula = $request->cedula;
        $clientes->telefono = $request->telefono;
        $clientes->email = $request->email;
        $clientes->redsocial = $request->redsocial;
        $clientes->caja_id = $caja_id;

        $clientes->save();
      
       return redirect()->route('factura', [$clientes]);
        
    }

  
    public function factura(Request $request, $id)
    {
        $request->user()->authorizeRoles(['caja']);       
        
        $cliente = Clientes::FindOrFail ($id);
        $productos = Productos::all();
        $productos_proveedor = Productos::where('proveedor_id', $id)->get();

        return view('caja.cajacliente',compact('cliente', 'productos', 'productos_proveedor'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function factura_store(Request $request)
    {
        $request->user()->authorizeRoles(['caja']);       

        $caja_id = auth()->user()->id;

        $total_productos = count($request->cantidad);
        for ($i=0; $i < $total_productos; $i++)
        {
            $factura = new Facturas();
            $factura->numero_factura = $request->numero_factura;
            $factura->nombre_cliente = $request->nombre_cliente;
            $factura->cedula_cliente = $request->cedula_cliente;
            $factura->producto = $request->producto[$i];
            $factura->cantidad = $request->cantidad[$i];
            $factura->monto = $request->monto[$i];
            $factura->total = $factura->cantidad * $factura->monto;
            $factura->cliente_id = $request->cliente_id;
            $factura->caja_id = $caja_id; 
            $factura->save();
        }
      
       return redirect()->route('factura.recibo', [$factura]);
    }

    public function factura_recibo(Request $request, $data)
    {
        $request->user()->authorizeRoles(['caja']);

        $productos = Facturas::where('cliente_id', $data)->get();       
        $factura = Facturas::FindOrFail($data);

        $total = Facturas::where('cliente_id', $data)->sum('total');
        $conteo = Facturas::where('cliente_id', $data)->count();
      
        return view('caja.cajafactura',compact('productos','factura','total','conteo'))->with('i', (request()->input('page', 1) - 1) * 5);
    }


   


}
