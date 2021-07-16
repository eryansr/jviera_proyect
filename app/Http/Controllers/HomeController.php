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


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    // public function index()
    // {
    //     return view('pages.dashboard');
    // }

    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['caja', 'admin']);       
        if (Auth::user()->hasRole('admin')) {
            $id = auth()->user()->id; 
            
            $proveedores = DB::table('proveedores')->count();
            $ingresos = DB::table('facturas')->sum('total');
            $cajas = DB::table('role_user')
                ->where('role_id', 2)
                ->count();
            $clientes = DB::table('clientes')->count();

            $year = now()->year;

            $m1 = Facturas::whereMonth('created_at', '=', '1')->whereYear('created_at', '=', $year)->count();
            $m2 = Facturas::whereMonth('created_at', '=', '2')->whereYear('created_at', '=', $year)->count();
            $m3 = Facturas::whereMonth('created_at', '=', '3')->whereYear('created_at', '=', $year)->count();
            $m4 = Facturas::whereMonth('created_at', '=', '4')->whereYear('created_at', '=', $year)->count();
            $m5 = Facturas::whereMonth('created_at', '=', '5')->whereYear('created_at', '=', $year)->count();
            $m6 = Facturas::whereMonth('created_at', '=', '6')->whereYear('created_at', '=', $year)->count();
            $m7 = Facturas::whereMonth('created_at', '=', '7')->whereYear('created_at', '=', $year)->count();
            $m8 = Facturas::whereMonth('created_at', '=', '8')->whereYear('created_at', '=', $year)->count();
            $m9 = Facturas::whereMonth('created_at', '=', '9')->whereYear('created_at', '=', $year)->count();
            $m10 = Facturas::whereMonth('created_at', '=', '10')->whereYear('created_at', '=', $year)->count();
            $m11 = Facturas::whereMonth('created_at', '=', '11')->whereYear('created_at', '=', $year)->count();
            $m12 = Facturas::whereMonth('created_at', '=', '12')->whereYear('created_at', '=', $year)->count();
            
             return view('pages.dashboard',compact('cajas','proveedores','ingresos','clientes','m1','m2','m3','m4','m5','m6','m7','m8','m9','m10','m11','m12','year'));
        } else{

            $id = auth()->user()->id; 

            $clientes_caja = DB::table('clientes')
                ->where('caja_id', $id)
                ->count();
            $efectivo_caja = DB::table('facturas')
                ->select('total')
                ->where('caja_id', $id)
                ->sum('total');

            return view('caja.dashboard',compact('clientes_caja','efectivo_caja'));
        } 
    }
}
