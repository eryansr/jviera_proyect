<!DOCTYPE html>
</html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="José Vieira">
  <meta name="description" content="Alcrist">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

  <!-- Estilos  -->
  <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">

  <!-- Ionic icons -->
  <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">

  <!-- Google fonts -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:700&display=swap" rel="stylesheet">


  <title>@yield('title')</title>
</head>

<body>

  <nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
      <a class="navbar-brand text-dark font-weight-bold">FAR-TODO</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="icon ion-md-menu lead text-black"></i>
      </button>


      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item mr-2">
            <a class="nav-link text-dark" href="/">Inicio</a>
          </li>
          <li class="nav-item mr-3">
            <a class="nav-link text-dark" href="/nosotros">Nosotros</a>
      
          <li class="nav-item mr-3">
            <a class="nav-link text-dark" href="/contacto">Conctacto</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark btn btn-primary py-1" href="{{ route('home') }}">Dashboard</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>  

 @yield('contenido')

  <section class="bg-light border-top">
    <div class="row no-gutters">
      <div class="col-lg-4 col-md-12 text-center py-4 border-right border-bottom">
        <small><a href="" class="text-dark"><i class="icon ion-logo-instagram mr-3 align-middle lead"></i> Instagram</a></small>
      </div>
      <div class="col-lg-4 col-md-12 text-center py-4 border-right border-bottom">
        <small><a href="" class="text-dark"><i class="icon ion-logo-facebook mr-3 align-middle lead"></i> Facebook</a></small>
    </div>
    <div class="col-lg-4 col-md-12 text-center py-4 border-right border-bottom">
        <small><a href="" class="text-dark"><i class="icon ion-logo-whatsapp mr-3 align-middle lead"></i> whatsapp</a></small>
    </div>
  </section>

  <section class="bg-light py-5">
    <div class="container">
     
        <div class="w-75">
      <h2 class="mb-0">Tenemos los mejores productos<br> precios y calidad del mercado</h2>
      <p class="text-muted">Queremos ofrecerte el mejor servicio y cumplir tus expectativas</p>
      </div>
    
   
    </div>
  </section>
  <footer class="bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="mb-5">
            <h6 class="mb-0">Ubicación de las oficinas</h6>
            <small class="text-muted">Paseo de la Reforma 296</small>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="mb-5">
            <h6 class="mb-0">Teléfono de contacto</h6>
            <small class="text-muted">+55 2882 2928</small>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="mb-5">
            <h6 class="mb-0">Email de contacto</h6>
            <small class="text-muted">hola@webook.mx</small>
          </div>
        </div>
      </div>
      <div class="row border-top py-4">
        <div class="col-lg-6">
          <small><span class="font-weight-bold">© 2020 Jose Vieira.</span> Creado por <a  class="text-dark" target="_blank">Jose viera</a></small>
        </div>
        <div class="col-lg-6 text-right">
          <ul class="list-inline mb-0">
            <li class="list-inline-item mr-4"><a href="#" class="text-dark lead"><i class="icon ion-logo-instagram"></i></a></li>
            <li class="list-inline-item mr-4"><a href="#" class="text-dark lead"><i class="icon ion-logo-facebook"></i></a></li>
            <li class="list-inline-item mr-4"><a href="#" class="text-dark lead"><i class="icon ion-logo-whatsapp"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
 
 

      <script src="{{ asset('js/jquery.js') }}"></script>
      <script src="{{ asset('js/popper.min.js') }}"></script>
      <script src="{{ asset('js/bootstrap.min.js') }}"></script>
      

</body>
</html>