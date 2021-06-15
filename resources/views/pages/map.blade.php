@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'map'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header ">
                        Google Maps
                    </div>
                    <div class="card-body ">
                        <div id="map" class="map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3926.9861494433226!2d-67.45987938474175!3d10.181779772670373!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e80219358b94b41%3A0x57db14b5dfe2b671!2sAvenida%20Hugo%20Oliveros%2C%20Cagua%202122%2C%20Aragua!5e0!3m2!1ses!2sve!4v1622336349285!5m2!1ses!2sve" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            demo.initGoogleMaps();
        });
  </script>
@endpush