<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Role;
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
        $users = User::latest()->paginate();
        return view('caja.caja',compact('users','roles'))->with('i', (request()->input('page', 1) - 1) * 5);
    }






    #################### FUNCIONES DEL INVENTARIO  ############################# 

    public function inventario(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);       
        
        $proveedores = Proveedores::all();
        $productos = Productos::latest()->paginate();
        return view('admin.inventario',compact('productos', 'proveedores'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function productos_store(Request $request)
    {
        $request->user()->authorizeRoles(['admin']); 

        $producto = new Productos; 
        $producto->codigo = $request->codigo;
        $producto->descripcion = $request->descripcion;
        $producto->precio_compra = $request->precio_compra;
        $producto->precio_venta = $request->precio_venta;
        $producto->existencia = $request->existencia;
        $producto->linea = $request->linea;
        $producto->proveedor_id = $request->proveedor_id;
        $producto->ubicacion = $request->ubicacion;

        $producto->save();  
      
        return redirect()->route('inventario')->with('status','Registro realizado con éxito.');
        
    }

    
    public function proveedores_productos(Request $request, $id)
    {
        $request->user()->authorizeRoles(['admin']);       
        

        $proveedor = Proveedores::FindOrFail ($id);
        $productos = Productos::all();
        $productos_proveedor = Productos::where('proveedor_id', $id)->get();

        return view('admin.proveedores_productos',compact('proveedor', 'productos', 'productos_proveedor'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

   


}
