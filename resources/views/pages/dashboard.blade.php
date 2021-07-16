@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'home'
])
<head>
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
    animationEnabled: true,
    theme: "light2",
    title:{
        text: "Movimientos"
    },
    data: [{        
        type: "line",
        indexLabelFontSize: 16,
        dataPoints: [
            { y: 450 },
            { y: 414},
            { y: 520, indexLabel: "\u2191 highest",markerColor: "red", markerType: "triangle" },
            { y: 460 },
            { y: 450 },
            { y: 500 },
            { y: 480 },
            { y: 480 },
            { y: 410 , indexLabel: "\u2193 lowest",markerColor: "DarkSlateGrey", markerType: "cross" },
            { y: 500 },
            { y: 480 },
            { y: 510 }
        ]
    }]
});
chart.render();

}
</script>
</head>

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-globe text-warning"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Droguerias</p>
                                    <p class="card-title">{{$proveedores}}
                                        <p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-refresh"></i> Actualizar
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-money-coins text-success"></i> 
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Ingresos</p>
                                    <p class="card-title">$ {{$ingresos}}
                                        <p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-calendar-o"></i> Ultimo día
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-vector text-danger"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Cajas Activas</p>
                                    <p class="card-title">{{$cajas}}
                                        <p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-clock-o"></i> En la última hora
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-favourite-28 text-primary"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Clientes</p>
                                    <p class="card-title">{{$clientes}}
                                        <p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-refresh"></i> Actualizar
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
            <div class="card">
                <div class="card-header ">
                    <h5 class="card-title">Transacciones realizadas para el año {{$year}}</h5>
                </div>
                <div class="card-body ">
                    <canvas id=chartHours width="500" height="250"></canvas>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-history"></i> Actualizado hace 5 minutos
                    </div>
                </div>
            </div>    
            </div>
            <div class="col-md-6">
                <div class="card ">
                    <div class="card-body ">
                        <canvas id="doughnut-chart" width="500" height="300"></canvas>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-history"></i> Actualizado hace 3 minutos
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            <div class="card">
                <div class="card-header ">
                    <h5 class="card-title">Transacciones realizadas para el año {{$year}}</h5>
                </div>
                <div class="card-body ">
                    <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-history"></i> Actualizado hace 5 minutos
                    </div>
                </div>
            </div>
            </div>  
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
            demo.initChartsPages();
        });
    </script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script>
            $(document).ready(function() {
               
                new Chart(document.getElementById("doughnut-chart"), {
                    type: 'doughnut',
                    data: {
                      labels: ["Cajas", "Droguerias", "Clientes"],
                      datasets: [
                        {
                          label: "Population (millions)",
                          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f"],
                          data: [{{$cajas}},{{$proveedores}},{{$clientes}}]
                        }
                      ]
                    },
                    options: {
                      title: {
                        display: true
                      }
                    }
                });

            });
    </script>
    <script>
            $(document).ready(function() {
                chartColor = "#FFFFFF";

                ctx = document.getElementById('chartHours').getContext("2d");

                myChart = new Chart(ctx, {
                  type: 'line',

                  data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [{
                        borderColor: "#6bd098",
                        backgroundColor: "#6bd098",
                        pointRadius: 0,
                        pointHoverRadius: 0,
                        borderWidth: 3,
                        data: [{{$m1}}, {{$m2}}, {{$m3}}, {{$m4}}, {{$m5}}, {{$m6}}, {{$m7}}, {{$m8}}, {{$m9}}, {{$m10}}, {{$m11}}, {{$m12}}]
                      },
                    ]
                  },
                  options: {
                    legend: {
                      display: false
                    },

                    tooltips: {
                      enabled: false
                    },

                    scales: {
                      yAxes: [{

                        ticks: {
                          fontColor: "#9f9f9f",
                          beginAtZero: false,
                          maxTicksLimit: 5,
                          //padding: 20
                        },
                        gridLines: {
                          drawBorder: false,
                          zeroLineColor: "#ccc",
                          color: 'rgba(255,255,255,0.05)'
                        }

                      }],

                      xAxes: [{
                        barPercentage: 1.6,
                        gridLines: {
                          drawBorder: false,
                          color: 'rgba(255,255,255,0.1)',
                          zeroLineColor: "transparent",
                          display: false,
                        },
                        ticks: {
                          padding: 20,
                          fontColor: "#9f9f9f"
                        }
                      }]
                    },
                  }
                });
            });
        </script>
@endpush