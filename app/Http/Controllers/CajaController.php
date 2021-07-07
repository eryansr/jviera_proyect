<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Role;
use App\Factura;
use App\Clientes;
use App\Productos;
use App\Proveedores;
use App\Productosproveedor;

use Auth;
use DB;


class CajaController extends Controller
{
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['caja']);  
              
        $roles = Role::all();
        $clientes = Clientes::latest()->paginate();
        return view('caja.caja',compact('clientes','roles'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function clientes_store(Request $request)
    {
        $request->user()->authorizeRoles(['caja']);
        
        $caja_id = auth()->user()->id;  

        $clientes = new Clientes; 
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
        $productos = $request->get('producto');

        for ($i = 0; $i < count($productos); $i++) {
          Factura::create([
            factura => $request->factura[$i],
            nombre => $request->nombre[$i],
            apellido => $request->apellido[$i],
            cedula => $request->cedula[$i],
            producto => $request->producto[$i],
            cantidad => $request->cantidad[$i],
            monto => $request->monto[$i],
            total => $request->total[$i],
            cliente_id => $request->cliente_id[$i],
            caja_id => $caja_id[$i]  
          ]);
        }


        // $censo = Censo::create( $request->validated() );
        // $censoid = $censo->id;

        // $total = count($request->cedulaf);
        // for ($i=0; $i < $total; $i++)
        // {
        //     $cargas = new Familia();
        //     $cargas->cedulaf = $request->cedulaf[$i];
        //     $cargas->apellidof = $request->apellidof[$i];
        //     $cargas->nombref = $request->nombref[$i];
        //     $cargas->edadf = $request->edadf[$i];
        //     $cargas->sexof = $request->sexof[$i];
        //     $cargas->civilf = $request->civilf[$i];
        //     $cargas->filiacion = $request->filiacion[$i];
        //     $cargas->instruccionf = $request->instruccionf[$i];
        //     $cargas->ocupacionf = $request->ocupacionf[$i];
        //     $cargas->enfermedad = $request->enfermedad[$i];
        //     $cargas->censo_id = $censoid;
        //     $cargas->save();
        // }
      
       return redirect()->route('factura', [$factura]);
    }


   


}
