<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Role;

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
}
