<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Role;
use App\Productos;
use App\Clientes;
use App\Proveedores;
use App\Facturas;
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

    public function users_store(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);       
        $role_name = $request->role_name;
        
        $user = new User; 
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $user->save();

        $user->roles()->attach(Role::where('name','=', $role_name)->first());

        $users = User::latest()->paginate();
        $roles = Role::all();
        return view('admin.admin',compact('users','roles'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function users_edit(Request $request, $id)
    {
        $request->user()->authorizeRoles(['admin']); 

        $users = User::latest()->paginate();
        $roles = Role::all();
        $user = User::FindOrFail ($id);

        return view('admin.admin_edit',compact('users', 'roles', 'user'));
    }

    public function users_update(Request $request, $id)
    {
        $user = User::FindOrFail ($id);
        $user->update($request->all());

        return redirect()->route('admin');
    }

    public function users_delete($id)
    {
        $user = User::FindOrFail ($id);
        $user->delete();

        return redirect()->route('admin');
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
        $productos_proveedor = Productos::where('proveedor_id', $id)->get();

        return view('admin.proveedores_productos',compact('proveedor', 'productos', 'productos_proveedor'))->with('i', (request()->input('page', 1) - 1) * 5);
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
        $producto->proveedor_id = $request->proveedor_id;
        $producto->ubicacion = $request->ubicacion;

        $producto->save();   

        return redirect()->route('proveedores')->with('status','Registro del articulo realizado con éxito.');

    }

    public function clientes(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);       

        $clientes = Clientes::latest()->paginate();

        return view('admin.clientes',compact('clientes'))->with('i', (request()->input('page', 1) - 1) * 5);

    }

    public function balances(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);       

        $cajas = DB::table('role_user')
                ->where('role_id', 2)
                ->get();

        $f =DB::table('facturas')
                ->orderBy('cliente_id')
                ->get();
        $facturas = $f->unique('numero_factura');

        $total = Facturas::sum('total');
        $conteo = Facturas::distinct('numero_factura')->count();
        

        return view('admin.balances',compact('cajas','facturas','total','conteo'))->with('i', (request()->input('page', 1) - 1) * 5);

    }

    public function caja_estatus(Request $request, $id)
    {
        $request->user()->authorizeRoles(['admin']);       

        $productos = Facturas::where('caja_id', $id)->select('producto')->count();       
        $factura = Facturas::distinct('numero_factura')->where('caja_id', $id)->count();
        $total = Facturas::where('caja_id', $id)->sum('total');

        return view('admin.caja_estatus',compact('total','factura','productos'))->with('i', (request()->input('page', 1) - 1) * 5);

    }

    public function reportes_generales(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);       
   
        $f =DB::table('facturas')
                ->orderBy('cliente_id')
                ->get();
        $facturas = $f->unique('numero_factura');

        return view('admin.reportes_generales',compact('facturas'))->with('i', (request()->input('page', 1) - 1) * 5);

    }

    public function reportes_generales_factura(Request $request, $data)
    {
        $request->user()->authorizeRoles(['admin']);

        $facturas = DB::table('facturas')
                ->where('cliente_id', $data)
                ->pluck('numero_factura')->first();
            
        $productos = Facturas::where('numero_factura',$facturas)->get();       
        $factura = Facturas::where('numero_factura', $facturas)->first();

        $total = Facturas::where('cliente_id', $data)->sum('total');
        $conteo = Facturas::where('cliente_id', $data)->count();
      
        return view('admin.reportes_generales_factura',compact('productos','factura','total','conteo'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

   


}
