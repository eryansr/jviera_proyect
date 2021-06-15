

@extends('plantilla')


@section('title', 'Contacto')

@section('contenido')

 <!-- Estilos  -->
  <link rel="stylesheet" href="{{ asset('css/estilos_contactos.css') }}">

<div class="container">
    
<form  method="POST" action="{{ route('contacto') }}" class="">
	@csrf
  <div class="position-relative text-dark">
  <h1>Contacte con nosotros</h1>
  
  <p class="intro">Agradecemos el interés por contactarse con nosotros, si desea recibir mayor información sobre alguno de nuestros servicios o productos, por favor rellene el siguiente formulario y enseguida estaremos respondiendo.</p>
  
  <hr>
  
  <div class="row">
      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
   
  
        <input type="text" name="nombre" placeholder="Nombre" id="nombre" value="{{ old('nombre') }}">
        	{!! $errors->first('nombre', '<small>:message</small><br>') !!}
        
        <input type="email" name="correo" placeholder="Correo"  id="correo" value="{{ old('email') }}">
        	{!! $errors->first('correo', '<small>:message</small><br>') !!}	
         
        <input type="text" name="telefono" placeholder="Teléfono" id="telefono" value="{{ old('telefono') }}">
        	{!! $errors->first('telefono', '<small>:message</small><br>') !!}
          
        <input type="text" name="empresa" placeholder="Empresa Opcional" id="empresa" value="{{ old('empresa') }}">
        	{!! $errors->first('empresa', '<small>:message</small><br>') !!}
          
        <textarea name="mensaje" placeholder="Escriba aquí su mensaje" id="mensaje" value="{{ old('mensaje') }}"></textarea>
        	{!! $errors->first('mensaje', '<small>:message</small><br>') !!}
  		<p></p>

    		<button  type="submit" id="boton" class="btn btn-primary btn-block formulario-contacto">Enviar</button>
    
      </div>
      
      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
      		
      <br>		
		<p class="info"><strong>¿Deseas un Sitio Web?</strong> Ponte en contacto con nosotros a través de este formulario.</p>

	    <p class="info">Desarrollamos Sitios Web adaptables a cualquier dispositivo utilizando para ello <strong> HTML5, CSS3, Bootstrap, Javascript y JQuery</strong>. Visita nuestro canal !!! ahí podrás encontrar recusos sobre Diseño y Desarrollo Web.</p>
	    
      <img src="img/img_contacto2.jpg" class="img-rounded img-responsive img-fluid" alt="Placeholder image"> </div>
    </div>
    </div>
  </form>
  <br>
  <br>
  
  </div>

	

@endsection