<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\User;
use App\Role;

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
        return view('pages.dashboard');
    }
}
