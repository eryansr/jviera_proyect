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


class AdminController extends Controller
{
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);       
        
        $roles = Role::all();
        $users = User::latest()->paginate();
        return view('admin.admin',compact('users','roles'))->with('i', (request()->input('page', 1) - 1) * 5);
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
        $producto->factura_proveedor = $request->factura_proveedor;
        $producto->ubicacion = $request->ubicacion;

        $producto->save();  
      
        return redirect()->route('inventario')->with('status','Registro realizado con éxito.');
        
    }

    public function productos_edit(Request $request, $id)
    {
        $request->user()->authorizeRoles(['admin']); 

        $proveedores = Proveedores::all();
        $productos = Productos::all();
        $producto = Productos::FindOrFail ($id);

        return view('admin.inventario_edit',compact('producto', 'productos', 'proveedores'));
    }

    public function productos_update(Request $request, $id)
    {
        $productos = Productos::FindOrFail ($id);
        $productos->update($request->all());

        return redirect()->route('inventario');
    }

    public function productos_delete($id)
    {
        $productos = Productos::FindOrFail ($id);
        $productos->delete();

        return redirect()->route('inventario');
    }
    #################### fin  ############################# 

    
    #################### FUNCIONES DE LA DROGUERIA / PROVEEDORES ############################# 

    public function proveedores(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);       
        
        $proveedores = Proveedores::latest()->paginate();
        return view('admin.proveedores',compact('proveedores'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function proveedores_store(Request $request)
    {
        $request->user()->authorizeRoles(['admin']); 

        $Proveedores = new Proveedores; 
        $Proveedores->codigo = $request->codigo;
        $Proveedores->proveedor = $request->proveedor;
        $Proveedores->factura = $request->factura;
        $Proveedores->ubicacion = $request->ubicacion;
        $Proveedores->save();  
      
        return redirect()->route('proveedores')->with('status','Registro realizado con éxito.');
        
    }

    public function proveedores_edit(Request $request, $id)
    {
        $request->user()->authorizeRoles(['admin']); 

        $proveedores = Proveedores::all();
        $proveedor = Proveedores::FindOrFail ($id);

        return view('admin.proveedores_edit',compact('proveedor', 'proveedores'));
    }

    public function proveedores_update(Request $request, $id)
    {
        $proveedor = Proveedores::FindOrFail ($id);
        $proveedores->update($request->all());

        return redirect()->route('proveedores');
    }

    public function proveedores_delete($id)
    {
        $proveedores = Proveedores::FindOrFail ($id);
        $proveedores->delete();

        return redirect()->route('proveedores');
    }

    public function proveedores_productos(Request $request, $id)
    {
        $request->user()->authorizeRoles(['admin']);       
        
        $proveedor = Proveedores::FindOrFail ($id);
        $productos = Productos::all();

        return view('admin.proveedores_productos',compact('proveedor', 'productos'))->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function proveedores_productos_store(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);       
  
        $producto = new Productos; 
        $producto->codigo = $request->codigo;
        $producto->descripcion = $request->descripcion;
        $producto->precio_compra = $request->precio_compra;
        $producto->precio_venta = $request->precio_venta;
        $producto->existencia = $request->existencia;
        $producto->linea = $request->linea;
        $producto->factura_proveedor = $request->factura_proveedor;
        $producto->ubicacion = $request->ubicacion;

        $producto->save();   

        return redirect()->route('proveedores')->with('status','Registro del articulo realizado con éxito.');

    }


   


}
