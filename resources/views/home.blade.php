@extends('layouts.main', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row"> <!-- Graficas Resumen -->
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-primary card-header-icon">
              <div class="card-icon">
                <i class="material-icons">list_alt</i>
              </div>
              {{-- <p class="card-category">Total Registros</p> --}}
              <h2 class="card-title text-center">{{ $avv->count() }}</h2>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i>TOTAL DE AVV REGISTRADAS</i>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-secondary card-header-icon">
              <div class="card-icon">
                <i class="material-icons">content_paste</i>
              </div>
              <h2 class="card-title text-center">{{ $preregistro->count() }}</h2>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i>AVV EN PREREGISTRO</i>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">looks_one</i>
              </div>
              <h2 class="card-title text-center">{{ $nivel1->count() }}</h2>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i>AVV EN NIVEL 1</i>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">looks_two</i>
              </div>
              <h2 class="card-title text-center">{{ $nivel2->count() }}</h2>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i>AVV EN NIVEL 2</i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons">looks_3</i>
              </div>
              <h2 class="card-title text-center">{{ $nivel3->count() }}</h2>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i>AVV EN NIVEL 3</i>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
              <div class="card-icon">
                <i class="material-icons">looks_4</i>
              </div>
              <h2 class="card-title text-center">{{ $nivel4->count() }}</h2>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i>AVV EN NIVEL 4</i>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-dark card-header-icon">
              <div class="card-icon bg-dark">
                <i class="material-icons">looks_5</i>
              </div>
              <h2 class="card-title text-center">{{ $nivel5->count() }}</h2>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i>AVV EN NIVEL 5</i>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
              <div class="card-icon">
                <i class="material-icons">currency_exchange</i>
              </div>
              <h2 class="card-title text-center">{{ $nivel6->count() }}</h2>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i>AVV EN NIVEL 6</i>
              </div>
            </div>
          </div>
        </div>                
      </div>


      {{-- GRAFICA AVV POR ESTADO NACIONAL --}}
      @if (auth()->user()->estado_id == '25')
        {{-- GRAFICA AVV POR ESTADO --}}
        <div class="row">
          <div class="col-md-12">
            <div class="card card-chart">
              <div class="card-header">
                <canvas id="myChart"></canvas>
              </div>
              <div class="card-body">
                <h4 class="card-title"></h4>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons">access_time</i> updated 4 minutes ago
                </div>
              </div>
            </div>
          </div>
        </div>
      @endif

      <div class="row">
        <div class="col-md-12">
          <div class="card card-chart">
            <div class="card-header">
              <canvas id="GraficaPorNivel"></canvas>
            </div>
            <div class="card-body">
              <h4 class="card-title"></h4>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">access_time</i> updated 4 minutes ago
              </div>
            </div>
          </div>
        </div>
      </div>

      {{-- GRAFICA AVV POR MUNICIPIO O PARROQUIA ESTADAL --}}
      @if (auth()->user()->estado_id <> 25)
        <div class="row">
          <div class="col-md-12">
            <div class="card card-chart">
              <div class="card-header">
                <canvas id="mun_pq"></canvas>
              </div>
              <div class="card-body">
                <h4 class="card-title"></h4>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons">access_time</i> updated 4 minutes ago
                </div>
              </div>
            </div>
          </div>
        </div>
      @endif

      {{-- GRAFICA IMPLANTACION Y FACTIBILIDAD DE SERVICIO--}}
      @if (auth()->user()->admin || (auth()->user()->rol_id == 4))
        <div class="rows">
          <div class="col-md-6">
            <div class="card card-chart">
              <div class="card-header">
                <canvas id="implantacion"></canvas>
              </div>
              <div class="card-body">
                <h4 class="card-title"></h4>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons">access_time</i>IMPLANTACION
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card card-chart">
              <div class="card-header">
                <canvas id="proyectos" height="300"></canvas>
              </div>
              <div class="card-body">
                <h4 class="card-title"></h4>
                <p class="card-category"></p>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons">access_time</i>PROYECTOS
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="rows">
          <div class="col-md-6">
            <div class="card card-chart">
              <div class="card-header">
                <canvas id="avances"></canvas>
              </div>
              <div class="card-body">
                <h4 class="card-title"></h4>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons">access_time</i>AVANCES DE PROYECTOS
                </div>
              </div>
            </div>
          </div>
        </div>
      @endif

      {{-- INTU NIVEL 2 --}}
      @if (auth()->user()->admin || auth()->user()->rol_id == 3)

        <div class="rows">
          <div class="col-md-6">
            <div class="card card-chart">
              <div class="card-header">
                <canvas id="servicios_cercanos"></canvas>
              </div>
              <div class="card-body">
                <h4 class="card-title"></h4>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons">access_time</i>SERVICIOS CERCANOS
                </div>
              </div>
            </div>
          </div>
            
            <div class="col-md-6">
              <div class="card card-chart">
                <div class="card-header">
                  <canvas id="prefactibilidad"></canvas>
                </div>
                <div class="card-body">
                  <h4 class="card-title"></h4>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">access_time</i>INFORME DE PREFACTIBILIDAD
                  </div>
                </div>
              </div>
            </div>
        </div>

        <div class="rows">
          <div class="col-md-6">
            <div class="card card-chart">
              <div class="card-header">
                <canvas id="factibilidad_servicios"></canvas>
              </div>
              <div class="card-body">
                <h4 class="card-title"></h4>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons">access_time</i>FACTIBILIDAD DE SERVICIOS
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card card-chart">
              <div class="card-header">
                <canvas id="salida_cartografica"></canvas>
              </div>
              <div class="card-body">
                <h4 class="card-title"></h4>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons">access_time</i>SALIDA CARTOGRAFICA
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="rows">
          <div class="col-md-6">
            <div class="card card-chart">
              <div class="card-header">
                <canvas id="levantamiento_topografico"></canvas>
              </div>
              <div class="card-body">
                <h4 class="card-title"></h4>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons">access_time</i>LEVANTAMIENTO TOPOGRAFICO
                </div>
              </div>
            </div>
          </div>
            
            <div class="col-md-6">
              <div class="card card-chart">
                <div class="card-header">
                  <canvas id="estudio_suelo"></canvas>
                </div>
                <div class="card-body">
                  <h4 class="card-title"></h4>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">access_time</i>ESTUDIO DE SUELOS
                  </div>
                </div>
              </div>
            </div>
        </div>

        <div class="rows">
          <div class="col-md-8">
            <div class="card card-chart">
              <div class="card-header">
                <canvas id="propiedadterreno"></canvas>
              </div>
              <div class="card-body">
                <h4 class="card-title"></h4>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons">access_time</i>PROPIEDAD DEL TERRENO
                </div>
              </div>
            </div>
          </div>
        </div>
          
      @endif
    </div>
  </div>
@endsection

@push('js')

@if (auth()->user()->estado_id == 25)
  <script type="text/javascript">

    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        plugins: [ChartDataLabels],
        type: 'bar',
        data: {
            labels: [
                @foreach ($estados as $estado)
                    "{{ $estado->nombre }}",
                @endforeach
            ],
            datasets: [{
                label: 'AVV POR ESTADO',
                borderRadius: Number.MAX_VALUE,
                borderWidth: 4,
                borderSkipped: false,
                data: [
                @foreach ($estados as $estado)
                  {{ $estado->avv_count }},
                @endforeach
                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.5)',
                    'rgba(54, 162, 235, 0.5)',
                    'rgba(255, 206, 86, 0.5)',
                    'rgba(75, 192, 192, 0.5)',
                    'rgba(153, 102, 255, 0.5)',
                    'rgba(255, 159, 64, 0.5)',
                    'rgba(255, 99, 132, 0.5)',
                    'rgba(54, 162, 235, 0.5)',
                    'rgba(255, 206, 86, 0.5)',
                    'rgba(75, 192, 192, 0.5)',
                    'rgba(153, 102, 255, 0.5)',
                    'rgba(255, 159, 64, 0.5)',
                    'rgba(166, 101, 80, 0.5)',
                    'RGBA(78, 147, 191, 0.5)',
                    'RGBA(78,147,93,0.5)',
                    'RGBA(78,146,159,0.5)',
                    'RGBA(78,73,159,0.5)',
                    'RGBA(78,171,24,0.5)',
                    'RGBA(184,76,24,0.5)',
                    'RGBA(184,76,255,0.5)',
                    'RGBA(184,174,164,0.5)',
                    'RGBA(245,174,164,0.5)',
                    'RGBA(194,239,164,0.5)',
                    'RGBA(255,0,0,0.5)'

                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(166, 101, 80, 1)',
                    'RGBA(78, 147, 191, 1)',
                    'RGBA(78,147,93,1)',
                    'RGBA(78,146,159,1)',
                    'RGBA(78,73,159,1)',
                    'RGBA(78,171,24,1)',
                    'RGBA(184,76,24,1)',
                    'RGBA(184,76,255,1)',
                    'RGBA(184,174,164,1)',
                    'RGBA(245,174,164,1)',
                    'RGBA(194,239,164,1)',
                    'RGBA(255,0,0,1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
          responsive: true,
          plugins: {
            datalabels:{
              align: 'end',
              anchor: 'end',
              font: function(context) {
                var w = context.chart.width;
                return {
                  size: w < 512 ? 12 : 14,
                  weight: 'bold',
                };
              },
              color: function(context) {
                  return context.dataset.borderColor;
              },
            },
            legend: {
              position: 'top',
            },
            title: {
              display: false,
              text: 'Chart.js Bar Chart'
            }
          }
        }
    });
  </script>    
@endif

{{-- REDES ESTADAL --}}
@if (auth()->user()->estado_id <> 25)
  <script type="text/javascript">

    var ctx1= document.getElementById('mun_pq').getContext('2d');
    var myChart1 = new Chart(ctx1, {
        plugins: [ChartDataLabels],
        type: 'bar',
        data: {
            labels: [
                @foreach ($mun_o_pq as $munopq)
                    "{{ $munopq->nombre }}",
                @endforeach
            ],
            datasets: [{
                label: 'AVV POR ESTADO',
                borderRadius: Number.MAX_VALUE,
                borderWidth: 4,
                borderSkipped: false,
                data: [
                @foreach ($mun_o_pq as $munopq)
                  {{ $munopq->avv_count }},
                @endforeach
                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.5)',
                    'rgba(54, 162, 235, 0.5)',
                    'rgba(255, 206, 86, 0.5)',
                    'rgba(75, 192, 192, 0.5)',
                    'rgba(153, 102, 255, 0.5)',
                    'rgba(255, 159, 64, 0.5)',
                    'rgba(255, 99, 132, 0.5)',
                    'rgba(54, 162, 235, 0.5)',
                    'rgba(255, 206, 86, 0.5)',
                    'rgba(75, 192, 192, 0.5)',
                    'rgba(153, 102, 255, 0.5)',
                    'rgba(255, 159, 64, 0.5)',
                    'rgba(166, 101, 80, 0.5)',
                    'RGBA(78, 147, 191, 0.5)',
                    'RGBA(78,147,93,0.5)',
                    'RGBA(78,146,159,0.5)',
                    'RGBA(78,73,159,0.5)',
                    'RGBA(78,171,24,0.5)',
                    'RGBA(184,76,24,0.5)',
                    'RGBA(184,76,255,0.5)',
                    'RGBA(184,174,164,0.5)',
                    'RGBA(245,174,164,0.5)',
                    'RGBA(194,239,164,0.5)',
                    'RGBA(255,0,0,0.5)'

                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(166, 101, 80, 1)',
                    'RGBA(78, 147, 191, 1)',
                    'RGBA(78,147,93,1)',
                    'RGBA(78,146,159,1)',
                    'RGBA(78,73,159,1)',
                    'RGBA(78,171,24,1)',
                    'RGBA(184,76,24,1)',
                    'RGBA(184,76,255,1)',
                    'RGBA(184,174,164,1)',
                    'RGBA(245,174,164,1)',
                    'RGBA(194,239,164,1)',
                    'RGBA(255,0,0,1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
              datalabels:{
                align: 'end',
                anchor: 'end',
                font: function(context) {
                  var w = context.chart.width;
                  return {
                    size: w < 512 ? 12 : 14,
                    weight: 'bold',
                  };
                },
                color: function(context) {
                    return context.dataset.borderColor;
                },
              },
              legend: {
                position: 'top',
              },
              title: {
                display: false,
                text: 'Chart.js Bar Chart'
              }
            }
        }
    });
  </script>    
@endif

{{-- FMH NACIONAL --}}
@if (auth()->user()->admin || auth()->user()->rol_id == 4)
  <script type="text/javascript">

    var ctx2 = document.getElementById('implantacion').getContext('2d');
    var myChart2 = new Chart(ctx2, 
      {
        plugins: [ChartDataLabels],
        type: 'pie',
        options: {
            responsive: true,
            plugins: {
            datalabels:{
              color:'#ffffff',
              font: function(context) {
                var w = context.chart.width;
                return {
                  size: w < 512 ? 12 : 14,
                  weight: 'bold',
                };
              },
            },
              title: {
                display: true,
                text: 'IMPLANTACIONES'
              },
              legend: {
                position: 'bottom',
              }
            }
        },
        data: 
        {
          labels: [
            @foreach ($implantaciones as $implantacion)
                "{{ $implantacion->nombre }}",
            @endforeach
          ],
          datasets: [{
              data: [
              @foreach ($implantaciones as $implantacion)
                {{ $implantacion->avv_count }},
              @endforeach
              ],
              backgroundColor: [
                'rgba(75, 192, 192, 0.4)',
                'rgba(54, 162, 235, 0.4)',
                'RGBA(255, 0, 0, 0.4)'

              ],
              borderColor: [
                'rgba(75, 192, 192, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 0, 0, 1)'
              ],
              borderWidth: 1
          }]
        }
      });
  </script>

  <script type="text/javascript">
    var ctx3 = document.getElementById('proyectos').getContext('2d');
    const myChart3 = new Chart(ctx3,
      {
        plugins: [ChartDataLabels],
        type: 'bar',
        data: 
        {
            labels: [
              @foreach ($proyectos as $proyecto)
                "{{ $proyecto->nombre }}",
              @endforeach
            ],
            datasets: [
              {
                label: 'PROYECTOS',
                borderRadius: 9,
                borderSkipped: false,
                data: [
                  @foreach ($proyectos as $proyecto)
                    {{ $proyecto->avv_count }},
                  @endforeach                
                ],
                backgroundColor: [
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'RGBA(255,0,0,0.2)'
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'RGBA(255,0,0,1)'
                ],
                borderWidth: 1
            }]
        },
        options:{
          plugins:{
            datalabels: {
              color: '#36A2EB',
              align: 'end',
              anchor: 'end',
              font: function(context) {
                var w = context.chart.width;
                return {
                  size: w < 512 ? 12 : 14,
                  weight: 'bold',
                };
              },
              color: function(context) {
                  return context.dataset.borderColor;
              },
            }
          },
          responsive:true,
          layout: {
                padding: {
                left: 0,
                right: 0,
                top: 15,
                bottom: 0
                }
            },
          scales: {
              y: {
                  beginAtZero: true
              }
          }
        }
      });
  </script>

  <script type="text/javascript">
    var ctx4 = document.getElementById('avances').getContext('2d');
    const myChart4 = new Chart(ctx4, 
      {
        plugins: [ChartDataLabels],
        type: 'bar',
        data: 
        {
            labels: ['0% a 24%', '25% a 49%', '50% a 74%', '75% a 100%'],
            datasets: [
              {
                label: 'AVANCES',
                borderRadius: 9,
                borderSkipped: false,
                data: ['{{ count($avance00a24) }}','{{ count($avance25a49) }}','{{ count($avance50a74) }}','{{ count($avance75a100) }}'],
                backgroundColor: [
                    'rgba(75, 192, 192, 0.4)',
                    'rgba(153, 102, 255, 0.4)',
                    'rgba(255, 159, 64, 0.4)',
                    'rgba(255, 99, 132, 0.4)'
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
          plugins: {
              datalabels:{
                align: 'end',
                anchor: 'end',
                font: function(context) {
                  var w = context.chart.width;
                  return {
                    size: w < 512 ? 12 : 14,
                    weight: 'bold',
                  };
                },
                color: function(context) {
                    return context.dataset.borderColor;
                },
              },
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
      });
  </script>  
@endif

{{-- INTU NACIONAL NIVEL 2 --}}
@if ( auth()->user()->admin || auth()->user()->rol_id == 3)
  <script type="text/javascript">
    var ctx5 = document.getElementById('servicios_cercanos').getContext('2d');
    const myChart5 = new Chart(ctx5, 
      {
        plugins: [ChartDataLabels],
        type: 'bar',
        data: 
        {
            labels: [
              @foreach ($servicios_cercanos as $servicios_cercano)
                  "{{ $servicios_cercano->nombre }}",
                @endforeach
            ],
            datasets: [
              {
                label: 'SERVICIOS CERCANOS',
                borderRadius: 9,
                borderSkipped: false,
                data: [
                  @foreach ($servicios_cercanos as $servicios_cercano)
                    {{ $servicios_cercano->avv_count }},
                  @endforeach
                ],
                backgroundColor: [
                    'rgba(75, 192, 192, 0.4)',
                    'rgba(153, 102, 255, 0.4)',
                    'rgba(255, 159, 64, 0.4)'
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
          plugins: {
              datalabels:{
                align: 'end',
                anchor: 'end',
                font: function(context) {
                  var w = context.chart.width;
                  return {
                    size: w < 512 ? 12 : 14,
                    weight: 'bold',
                  };
                },
                color: function(context) {
                    return context.dataset.borderColor;
                },
              },
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
      });
  </script>

  <script type="text/javascript">
    var ctx6 = document.getElementById('prefactibilidad').getContext('2d');
    const myChart6 = new Chart(ctx6, 
      {
        plugins: [ChartDataLabels],
        type: 'bar',
        data: 
        {
            labels: [
              @foreach ($prefactibilidades as $prefactibilidad)
                  "{{ $prefactibilidad->nombre }}",
                @endforeach
            ],
            datasets: [
              {
                label: ' INFORME DE PREFACTIBILIDAD',
                borderRadius: 9,
                borderSkipped: false,
                data: [
                  @foreach ($prefactibilidades as $prefactibilidad)
                    {{ $prefactibilidad->avv_count }},
                  @endforeach
                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.4)',
                    'rgba(153, 102, 255, 0.4)',
                    'rgba(255, 159, 64, 0.4)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
          plugins: {
              datalabels:{
                align: 'end',
                anchor: 'end',
                font: function(context) {
                  var w = context.chart.width;
                  return {
                    size: w < 512 ? 12 : 14,
                    weight: 'bold',
                  };
                },
                color: function(context) {
                    return context.dataset.borderColor;
                },
              },
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
      });
  </script>

  <script type="text/javascript">
    var ctx7 = document.getElementById('factibilidad_servicios').getContext('2d');
    const myChart7 = new Chart(ctx7, 
      {
        plugins: [ChartDataLabels],
        type: 'pie',
        data: 
        {
            labels: [
              @foreach ($factibilidad_servicios as $factibilidad_servicio)
                  "{{ $factibilidad_servicio->nombre }}",
                @endforeach
            ],
            datasets: [
              {
                label: 'FACTIBILIDAD DE SERVICIOS',
                data: [
                  @foreach ($factibilidad_servicios as $factibilidad_servicio)
                    {{ $factibilidad_servicio->avv_count }},
                  @endforeach
                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.6)',
                    'rgba(166, 101, 80, 0.6)',
                    'rgba(255, 159, 64, 0.6)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(166, 101, 80, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
          plugins: {
              datalabels:{
                color:'#ffffff',
                font: function(context) {
                  var w = context.chart.width;
                  return {
                    size: w < 512 ? 12 : 14,
                    weight: 'bold',
                  };
                },
              },
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
      });
  </script>

  <script type="text/javascript">
    var ctx8 = document.getElementById('salida_cartografica').getContext('2d');
    const myChart8 = new Chart(ctx8, 
      {
        plugins: [ChartDataLabels],
        type: 'doughnut',
        data: 
        {
            labels: [
              @foreach ($salida_cartograficas as $salida_cartografica)
                  "{{ $salida_cartografica->nombre }}",
                @endforeach
            ],
            datasets: [
              {
                label: 'SALIDA CARTOGRAFICA',
                data: [
                  @foreach ($salida_cartograficas as $salida_cartografica)
                    {{ $salida_cartografica->avv_count }},
                  @endforeach
                ],
                backgroundColor: [
                    'rgba(255, 159, 64, 0.6)',
                    'rgba(255, 99, 132, 0.6)',
                    'rgba(153, 102, 255, 0.6)'
                ],
                borderColor: [
                    'rgba(255, 159, 64, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(153, 102, 255, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
          plugins: {
              datalabels:{
                color:'#ffffff',
                font: function(context) {
                  var w = context.chart.width;
                  return {
                    size: w < 512 ? 12 : 14,
                    weight: 'bold',
                  };
                },
              },
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
      });
  </script>

  <script type="text/javascript">
    var ctx9 = document.getElementById('levantamiento_topografico').getContext('2d');
    const myChart9 = new Chart(ctx9, 
      {
        plugins: [ChartDataLabels],
        type: 'bar',
        data: 
        {
            labels: [
              @foreach ($levantamiento_topograficos as $levantamiento_topografico)
                  "{{ $levantamiento_topografico->nombre }}",
                @endforeach
            ],
            datasets: [
              {
                label: 'SERVICIOS CERCANOS',
                borderRadius: 9,
                borderSkipped: false,
                data: [
                  @foreach ($levantamiento_topograficos as $levantamiento_topografico)
                    {{ $levantamiento_topografico->avv_count }},
                  @endforeach
                ],
                backgroundColor: [
                    'rgba(75, 192, 192, 0.4)',
                    'rgba(153, 102, 255, 0.4)',
                    'rgba(255, 159, 64, 0.4)'
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
          plugins: {
              datalabels:{
                align: 'end',
                anchor: 'end',
                font: function(context) {
                  var w = context.chart.width;
                  return {
                    size: w < 512 ? 12 : 14,
                    weight: 'bold',
                  };
                },
                color: function(context) {
                    return context.dataset.borderColor;
                },
              },
            },
            indexAxis: 'y',
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
      });
  </script>

  <script type="text/javascript">
    var ctx10 = document.getElementById('estudio_suelo').getContext('2d');
    const myChart10 = new Chart(ctx10, 
      {
        plugins: [ChartDataLabels],
        type: 'bar',
        data: 
        {
            labels: [
              @foreach ($estudio_suelos as $estudio_suelo)
                  "{{ $estudio_suelo->nombre }}",
                @endforeach
            ],
            datasets: [
              {
                label: 'ESTUDIO DE SUELO',
                borderRadius: 9,
                borderSkipped: false,
                data: [
                  @foreach ($estudio_suelos as $estudio_suelo)
                    {{ $estudio_suelo->avv_count }},
                  @endforeach
                ],
                backgroundColor: [
                    'rgb(54, 162, 235, 0.4)',
                    'rgba(153, 102, 255, 0.4)',
                    'rgba(255, 159, 64, 0.4)',
                    'rgba(255, 99, 132, 0.4)',
                    'rgba(75, 192, 192, 0.4)'
                ],
                borderColor: [
                    'rgb(54, 162, 235, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(75, 192, 192, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
          plugins: {
              datalabels:{
                align: 'end',
                anchor: 'end',
                font: function(context) {
                  var w = context.chart.width;
                  return {
                    size: w < 512 ? 12 : 14,
                    weight: 'bold',
                  };
                },
                color: function(context) {
                    return context.dataset.borderColor;
                },
              },
            },
            indexAxis: 'y',
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
      });
  </script>

  <script type="text/javascript">
    var ctx11 = document.getElementById('propiedadterreno').getContext('2d');
    const myChart11 = new Chart(ctx11, 
      {
        plugins: [ChartDataLabels],
        type: 'bar',
        data: 
        {
            labels: [
              @foreach ($propiedad_terrenos as $propiedad_terreno)
                  "{{ $propiedad_terreno->nombre }}",
                @endforeach
            ],
            datasets: [
              {
                label: 'PROPIEDAD DEL TERRENO',
                borderRadius: 9,
                borderSkipped: false,
                data: [
                  @foreach ($propiedad_terrenos as $propiedad_terreno)
                    {{ $propiedad_terreno->avv_count }},
                  @endforeach
                ],
                backgroundColor: [
                    'rgb(54, 162, 235, 0.4)',
                    'rgba(153, 102, 255, 0.4)',
                    'rgba(255, 159, 64, 0.4)',
                    'rgba(255, 99, 132, 0.4)',
                    'rgba(75, 192, 192, 0.4)'
                ],
                borderColor: [
                    'rgb(54, 162, 235, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(75, 192, 192, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
          plugins: {
              datalabels:{
                align: 'end',
                anchor: 'end',
                font: function(context) {
                  var w = context.chart.width;
                  return {
                    size: w < 512 ? 12 : 14,
                    weight: 'bold',
                  };
                },
                color: function(context) {
                    return context.dataset.borderColor;
                },
              },
            },
            indexAxis: 'y',
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
      });
  </script>
@endif

<script type="text/javascript">

  var ctx12 = document.getElementById('GraficaPorNivel').getContext('2d');
  var myChart12 = new Chart(ctx12, {
      plugins: [ChartDataLabels],
      type: 'bar',
      data: {
          labels: ['Preregistro', 'NIVEL 1', 'NIVEL 2', 'NIVEL 3', 'NIVEL 4', 'NIVEL 5', 'NIVEL 6', 'NIVEL 7', 'NIVEL 8', 'NIVEL 9'],
          datasets: [{
              label: 'AVV POR NIVEL',
              borderRadius: Number.MAX_VALUE,
              borderWidth: 4,
              borderSkipped: false,
              data: [{{$preregistro->count()}}, 
                     {{$nivel1->count()}}, 
                     {{$nivel2->count()}}, 
                     {{$nivel3->count()}}, 
                     {{$nivel4->count()}}, 
                     {{$nivel5->count()}},
                     {{$nivel6->count()}},
                     {{$nivel7->count()}},
                    120,70],
              backgroundColor: [
                  'rgba(255, 99, 132, 0.5)',
                  'rgba(54, 162, 235, 0.5)',
                  'rgba(255, 206, 86, 0.5)',
                  'rgba(75, 192, 192, 0.5)',
                  'rgba(153, 102, 255, 0.5)',
                  'rgba(255, 159, 64, 0.5)',
                  'rgba(255, 99, 132, 0.5)',
                  'rgba(54, 162, 235, 0.5)',
                  'rgba(255, 206, 86, 0.5)',
                  'rgba(75, 192, 192, 0.5)'

              ],
              borderColor: [
                  'rgba(255, 99, 132, 1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(153, 102, 255, 1)',
                  'rgba(255, 159, 64, 1)',
                  'rgba(255, 99, 132, 1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)'
              ],
              borderWidth: 1
          }]
      },
      options: {
        responsive: true,
        plugins: {
          datalabels:{
            align: 'end',
            anchor: 'end',
            font: function(context) {
              var w = context.chart.width;
              return {
                size: w < 512 ? 12 : 14,
                weight: 'bold',
              };
            },
            color: function(context) {
                return context.dataset.borderColor;
            },
          },
          legend: {
            position: 'top',
          },
          title: {
            display: false,
            text: 'Chart.js Bar Chart'
          }
        }
      }
  });
</script>   

@endpush

@section('plugins.BootstrapSwitch', true)
@section('css')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection

@section('js')
  <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
  <script src="{{ asset('js/functions3.js')}}" type="text/javascript"></script>
@endsection