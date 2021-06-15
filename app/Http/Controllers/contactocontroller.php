<?php

namespace App\Http\Controllers;

use App\Mail\mensagerecibido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class contactocontroller extends Controller
{
     public function store()
    {

    		$message = request()->validate([
    			'nombre' => 'required',
    			'correo' => 'required',
    			'telefono' => 'required',
    			'empresa' => 'required',
    			'mensaje' => 'required'

  		]);

    		Mail::to('josegvieirat@gmail.com')->queue(new mensagerecibido($message));

    		return view('/recibido');
    }
}
