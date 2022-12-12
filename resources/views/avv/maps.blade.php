@extends('layouts.main', ['class' => 'off-canvas-sidebar', 'activePage' => 'map', 'title' => __('MAPA DE AVVS')])

@section('content')
    <div class="content">
        <div class="container card bg-white">
            <div class="section">
                <h2 class="title text-center">MAPA DE AVV</h2>
                <div class="team">
                    <div class="row">
                        <div class="col-sm-12">
                            <div id="map" style= "width: 100%; height: 750px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><br><br>
    @endsection

<script>
  
    function initMap() 
    {
        var map = new google.maps.Map(document.getElementById('map'),
        {
            zoom: 6.5,
            center:new google.maps.LatLng(7.735217273856046,-65.326115365625),
        });



        @foreach ($avvs as $avv)
            var marker{{$avv->id}}
            const contentString{{ $avv->id }} =
                '<div id="content" style="color:black;">' +
                    '<h2 id="firstHeading" class="firstHeading">{{ $avv->nombre }}</h2>' +
                    '<div id="bodyContent">'+
                        '<p><b>ESTADO: </b>{{ (isset($avv->estado->nombre)) ? $avv->estado->nombre : '' }}'+
                        '<p><b>MUNICIPIO: </b>{{ (isset($avv->municipio->nombre)) ? $avv->municipio->nombre : '' }}'+
                        '<p><b>PARROQUIA: </b>{{ (isset($avv->parroquia->nombre)) ? $avv->parroquia->nombre : '' }}'+
                        '<p><b>DIRECCION: </b>{{ $avv->direccion }}'+
                        '<p><b>CANTIDAD DE VIVIENDAS: </b>{{ $avv->cant_viviendas }}'+
                        '<p><b>CANTIDAD DE PERSONAS: </b>{{ $avv->cant_personas }}'+
                        '<p><b>ORGANO RESPONSABLE: </b>{{ (isset($avv->organo->nombre)) ? $avv->organo->nombre : '' }}'+
                        '<p><a href="{{ url('/avv/'. $avv->id .'/show') }}" rel="tooltip"><b>VER FICHA</b></a></p>'+
                    "</div>" +
                "</div>";
                const infowindow{{$avv->id}} = new google.maps.InfoWindow({
                content: contentString{{$avv->id}},
                });    

            marker{{$avv->id}} = new google.maps.Marker({
                map: map,
                animation: google.maps.Animation.DROP,
                position: new google.maps.LatLng({{$avv->latitud}},{{$avv->longitud}}),
                title: '{{ $avv->nombre }}',
            });

            marker{{$avv->id}}.addListener("click", () => {
                infowindow{{$avv->id}}.open({
                    anchor: marker{{$avv->id}},
                    map,
                    shouldFocus: false,
                });
            });                       
        @endforeach     
    } 
</script>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCZhH6WXRQpmvkrpZ6w-kBIQTqOwHuPncI&callback=initMap&v=weekly" defer></script>
