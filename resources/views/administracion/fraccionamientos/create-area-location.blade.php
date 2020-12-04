@extends('layouts.template_master')
@section('title','Registro de clientes')

@section('css')

@stop

@section('content')
    <div class="content-header">
        <div class="header-icon">
            <i class="pe-7s-map-marker"></i>
        </div>
        <div class="header-title">
            <h1>Registro de fraccionamientos</h1>
            <small>Registra nuevos fraccionamientos en el sistema.</small>
            <ol class="breadcrumb">
                <li><a href="/"><i class="pe-7s-home"></i> Resumen</a></li>
                <li><a href="{{asset('/fraccionamientos')}}">Fraccionamiento</a></li>
                <li class="active">Registrar Coordenadas del fraccionamiento</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <form action="">
                <div class="panel">
                    <div class="panel-heading bg-primary">
                        <h4 class="text-uppercase">Selecciona en el mapa las coordenadas del fraccionamiento</h4>
                    </div>
                    <div class="panel-body" style="padding: 0px !important;">
                        <div id="map"  style="width: 100%; height: 600px;"></div>
                    </div>
                    <div class="panel-footer">
                        <a href="{{asset('/fraccionamiento')}}" class="btn  btn-inverse"><i class="fa fa-chevron-circle-left"></i> Cancelar</a>
                        <button type="button" id="btnSendFormPoligonos" class="btn  btn-primary"><i class="fa fa-chevron-circle-right"></i> Siguiente</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop

@section('js')
    <script src="{{asset('assets/libraries/axios/axios.min.js')}}"></script>

    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <script defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCrrvWvr6JWo32OjaMOEdCfyNyUezlux9o&callback=initMap">
    </script>

    <script>


        window.onload = mostrarLoading();

        function mostrarLoading() {
            $('html').addClass('loading-overlay-shown');
            $('#loading-overlay').fadeIn(300);
        }

        let poly;
        let map;
        let coordenadas = [];
        let init = 0;

        let btnSendFormPoligonos = document.getElementById("btnSendFormPoligonos");

        btnSendFormPoligonos.addEventListener("click",()=> {

            $('html').addClass('loading-overlay-shown');
            $('#loading-overlay').fadeIn(300);

            let endpoint = "http://localhost:8000/fraccionamientos/store-area-location?idFraccionamiento="+{{$fraccionamiento->idFraccionamiento}};

            axios.post(endpoint,{
                "coordenadas":coordenadas
            }).then((result)=> {

                if ( result.status == 201 ) {

                    alert(result.data.msg);

                    let idFraccionamiento = "{{$fraccionamiento->idFraccionamiento}}";

                    $('html').removeClass('loading-overlay-shown');
                    $('#loading-overlay').fadeOut(300);

                    window.location = `http://localhost:8000/fraccionamientos/${idFraccionamiento}/create-add-images`;

                }


            }).catch((error)=> {
                console.log(error);
            });

        });

        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                zoom: 8,
                center: { lat: 16.75, lng: -93.1167 },
            });
            poly = new google.maps.Polyline({
                strokeColor: "#EDA013",
                strokeOpacity: 1.0,
                strokeWeight: 3,
            });
            poly.setMap(map);
            // Add a listener for the click event
            map.addListener("click", addLatLng);

            $('html').removeClass('loading-overlay-shown');
            $('#loading-overlay').fadeOut(300);
        }

        // Handles click events on a map, and adds a new point to the Polyline.
        function addLatLng(event) {

            console.log(event.latLng);

            const path = poly.getPath();
            // Because path is an MVCArray, we can simply append a new coordinate
            // and it will automatically appear.
            path.push(event.latLng);
            // Add a new marker at the new plotted point on the polyline.
            new google.maps.Marker({
                position: event.latLng,
                title: "#" + path.getLength(),
                map: map,
            });

            //convertir a json
            coordenadasJson  = JSON.stringify(event.latLng);

            //convertir a array
            coordenadasArray = JSON.parse(coordenadasJson);

            //almacenar los
            coordenadas.push("lat: "+coordenadasArray.lat+",lng: "+coordenadasArray.lng);

        }

    </script>

@stop
