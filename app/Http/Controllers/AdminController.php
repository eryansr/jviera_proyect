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

    #################### funciones del inventario ############################# 
    public function inventario(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);       
        
        $productos = Productos::latest()->paginate();
        return view('admin.inventario',compact('productos'))->with('i', (request()->input('page', 1) - 1) * 5);
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
        $producto->factura_proveedor = $request->factura_proveedor;
        $producto->ubicacion = $request->ubicacion;
        $producto->linea_id = $request->linea_id;
        $producto->marca_id = $request->marca_id;
        $producto->drogueria_id = $request->drogueria_id;
        $producto->estatus_id = $request->estatus_id;
        $producto->save();  
      
        return redirect()->route('inventario')->with('status','Registro realizado con éxito.');
        
    }

    public function productos_edit(Request $request, $id)
    {
        $request->user()->authorizeRoles(['admin']); 

        $productos = Productos::all();
        $producto = Productos::FindOrFail ($id);

        return view('admin.inventario_edit',compact('producto', 'productos'));
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
    #################### fin funciones del inventario ############################# 
    
    #################### funciones de proveedores ############################# 
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

    public function proveedores_productos(Request $request, $id)
    {
        $request->user()->authorizeRoles(['admin']);       
        
        $proveedor = Proveedores::FindOrFail ($id);

        return view('admin.proveedores_productos',compact('proveedor'))->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function proveedores_productos_store(Request $request, $id)
    {
        $request->user()->authorizeRoles(['admin']);       
        
        $proveedor = Proveedores::FindOrFail ($id);

        $proveedores_productos = new Productosproveedor;
        $proveedores_productos->codigo = $request->codigo;
        $proveedores_productos->producto = $request->producto;
        $proveedores_productos->existencia = $request->existencia;
        $proveedores_productos->costo_producto = $request->costo_producto;
        $proveedores_productos->factura = $request->factura;
        $proveedores_productos->save();    

        $proveedores_productos->Productosproveedor()->sync($proveedor_id); 

        return redirect()->route('proveedores.productos')->with('status','Registro del articulo realizado con éxito.');

    }


   


}
