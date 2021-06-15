@extends('plantilla')


@section('title', 'inicio')


@section('contenido')

<section id="hero-container" class="position-relative text-light">
    <div id="hero-background"></div>
      <div id="hero-content" class="container h-100">
        <div class="row no-gutters h-100 d-flex">
          <div id="hero-text" class="col-md-6 align-self-center">
            <h1 class="display-3 font-weight-bold mb-4">Nuestra capacidad a su disposición</h1>
            <p class="lead mb-5">Nos ocuparemos constantemente de su bienestar con los mejores precios y servicios.
            </p>
            <a href="#" class="btn btn-primary">Mas información</a>
          </div>
         <div class="col-md-6 img-container align-self-center h-100">
            <img src="img/fartodo-logo.png" id="hero-img" class="position-relative">
          </div>
        </div>
      </div>
  </section>

  <script>
  window.onload = function () {
    setTimeout(function () {
    document.getElementById('hero-background').style.width = '100%';
    }, 1500);
    setTimeout(function () {
      document.getElementById('hero-text').style.opacity = '1';
    }, 2500);
    setTimeout(function () {
      document.getElementById('hero-img').style.opacity = '1';
    }, 3500);
  
  };
</script>



@endsection

