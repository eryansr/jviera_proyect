<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Role;
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

   


}
