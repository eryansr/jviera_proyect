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
            return view('pages.dashboard');
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
