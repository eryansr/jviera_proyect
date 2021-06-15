

@extends('plantilla')

@section('title', 'Nosotros')

@section('contenido')

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Estilos  -->
  <link rel="stylesheet" href="{{ asset('css/estilo_nosotros.css') }}">

                      <div class="text-center prueba">
                        <h2>Calidad en farmacia, Somos <b>Fartodo</b></h2>
                      </div>

                      <section class="our-webcoderskull padding-lg">
  <div class="container">
    <div class="row heading heading-icon">
        <h2>Our Team</h2>
    </div>
    <ul class="row">
      <li class="col-12 col-md-6 col-lg-3">
          <div class="cnt-block equal-hight" style="height: 349px;">
            <figure><img src="../img/png1.png" class="img-responsive" alt=""></figure>
            <h3><a href="">Misión</a></h3>
            <p>Ofrecer una asistencia sanitaria de calidad, para alcanzar y mantener la salud, ofreciendo servicios farmacéuticos y productos, de forma profesional, servicial y cercana.</p>
          </div>
      </li>
      <li class="col-12 col-md-6 col-lg-3">
          <div class="cnt-block equal-hight" style="height: 349px;">
            <figure><img src="../img/png4.png" class="img-responsive" alt=""></figure>
            <h3><a href="#">Visión</a></h3>
            <p>Facilitar un rápido acceso a los productos que precisen, primando los servicios profesionales, para que saquen el máximo beneficio a sus medicamentos.</p>
          </div>
      </li>
      <li class="col-12 col-md-6 col-lg-3">
          <div class="cnt-block equal-hight" style="height: 349px;">
            <figure><img src="../img/png3.png" class="img-responsive" alt=""></figure>
            <h3><a href="">Equipo</a></h3>
            <p>Nuestro equipo altamente calificado para la resolucion de tus problemas y brindarte la mejor antencion posible.</p>
          </div>
       </li>
      <li class="col-12 col-md-6 col-lg-3">
          <div class="cnt-block equal-hight" style="height: 349px;">
            <figure><img src="../img/png2.png" class="img-responsive" alt=""></figure>
            <h3><a href="">Valores</a></h3>
            <p>Compromiso, responsabilidad, seguridad
                humanidad, honestidad, respeto, calidad, resolución, eficiencia
                profesionalidad.</p>
          </div>
      </li>
    </ul>
  </div>
</section>
                      
                   
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    @endsection
