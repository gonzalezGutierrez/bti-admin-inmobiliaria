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
        <div class="col-sm-12 text-right m-b-10">
            <a href="{{asset('fraccionamientos/'.$fraccionamiento->idFraccionamiento.'/edit-information')}}" class="btn btn-primary">
                <i class="fa fa-edit"></i> Actualizar Información
            </a>
            <a href="" class="btn btn-primary"><i class="fa fa-image"></i> Actualizar Imagenes</a>
        </div>
        <div class="col-sm-12">
            <form action="">
                <div class="panel">
                    <div class="panel-heading bg-primary">
                        <h4 class="text-uppercase">Actualiza las coordenadas del area del fraccionamiento</h4>
                    </div>
                    <div class="panel-body" style="padding: 0px !important;">
                        <div id="map"  style="width: 100%; height: 600px;"></div>
                    </div>
                    <div class="panel-footer">
                        <a href="{{asset('/fraccionamiento')}}" class="btn  btn-inverse"><i class="fa fa-chevron-circle-left"></i> Cancelar</a>
                        <button type="button" id="btnSendFormPoligonos" class="btn  btn-primary"><i class="fa fa-chevron-circle-right"></i> Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop

@section('js')
    <script src="{{asset('assets/libraries/axios/axios.min.js')}}"></script>

    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCrrvWvr6JWo32OjaMOEdCfyNyUezlux9o"></script>

    <script>

        window.onload = mostrarLoading();

        function mostrarLoading() {
            $('html').addClass('loading-overlay-shown');
            $('#loading-overlay').fadeIn(300);
        }
        let map;
        let poligono;
        let mapa_container;
        let coordenadasUpdate = [];

        document.getElementById("btnSendFormPoligonos").addEventListener("click",() => {

            $('html').addClass('loading-overlay-shown');
            $('#loading-overlay').fadeIn(300);

            let endpoint = "http://localhost:8000/fraccionamientos/update-area-location?idFraccionamiento="+{{$fraccionamiento->idFraccionamiento}};

            axios.put(endpoint,{
                coordenadas:coordenadasUpdate
            }).then((result)=> {
                $('html').removeClass('loading-overlay-shown');
                $('#loading-overlay').fadeOut(300);
                alert("Coordenadas actualizadas correctamente");
                console.log(result);
            }).catch((error)=>{
                console.log(error);
                $('html').removeClass('loading-overlay-shown');
                $('#loading-overlay').fadeOut(300);
            });

        });

        $(document).ready(initMap());

        function initMap() {

            mapa_container = document.getElementById("map");

            let styleMap = new google.maps.StyledMapType([
                {elementType: 'geometry', stylers: [{color: '#ebe3cd'}]},
                {elementType: 'labels.text.fill', stylers: [{color: '#523735'}]},
                {elementType: 'labels.text.stroke', stylers: [{color: '#f5f1e6'}]},
                {
                    featureType: 'administrative',
                    elementType: 'geometry.stroke',
                    stylers: [{color: '#c9b2a6'}]
                },
                {
                    featureType: 'administrative.land_parcel',
                    elementType: 'geometry.stroke',
                    stylers: [{color: '#dcd2be'}]
                },
                {
                    featureType: 'administrative.land_parcel',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#ae9e90'}]
                },
                {
                    featureType: 'landscape.natural',
                    elementType: 'geometry',
                    stylers: [{color: '#dfd2ae'}]
                },
                {
                    featureType: 'poi',
                    elementType: 'geometry',
                    stylers: [{color: '#dfd2ae'}]
                },
                {
                    featureType: 'poi',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#93817c'}]
                },
                {
                    featureType: 'poi.park',
                    elementType: 'geometry.fill',
                    stylers: [{color: '#a5b076'}]
                },
                {
                    featureType: 'poi.park',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#447530'}]
                },
                {
                    featureType: 'road',
                    elementType: 'geometry',
                    stylers: [{color: '#f5f1e6'}]
                },
                {
                    featureType: 'road.arterial',
                    elementType: 'geometry',
                    stylers: [{color: '#fdfcf8'}]
                },
                {
                    featureType: 'road.highway',
                    elementType: 'geometry',
                    stylers: [{color: '#f8c967'}]
                },
                {
                    featureType: 'road.highway',
                    elementType: 'geometry.stroke',
                    stylers: [{color: '#e9bc62'}]
                },
                {
                    featureType: 'road.highway.controlled_access',
                    elementType: 'geometry',
                    stylers: [{color: '#e98d58'}]
                },
                {
                    featureType: 'road.highway.controlled_access',
                    elementType: 'geometry.stroke',
                    stylers: [{color: '#db8555'}]
                },
                {
                    featureType: 'road.local',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#806b63'}]
                },
                {
                    featureType: 'transit.line',
                    elementType: 'geometry',
                    stylers: [{color: '#dfd2ae'}]
                },
                {
                    featureType: 'transit.line',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#8f7d77'}]
                },
                {
                    featureType: 'transit.line',
                    elementType: 'labels.text.stroke',
                    stylers: [{color: '#ebe3cd'}]
                },
                {
                    featureType: 'transit.station',
                    elementType: 'geometry',
                    stylers: [{color: '#dfd2ae'}]
                },
                {
                    featureType: 'water',
                    elementType: 'geometry.fill',
                    stylers: [{color: '#b9d3c2'}]
                },
                {
                    featureType: 'water',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#92998d'}]
                }
            ], {name: 'Elink'});

            let COORDENADAS_INICIALES = {lat: 24.0277, lng:-104.653};

            map = new google.maps.Map(mapa_container,{
                center:COORDENADAS_INICIALES,
                zoom:5,
                scrollwheel:true,
                navigatorController:true,
                mapTypeControl:true,
                mapTypeControlOptions: {
                    style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
                    position: google.maps.ControlPosition.LEFT_TOP,
                    mapTypeIds: [
                        'roadmap',
                        'satellite',
                        'hybrid',
                        'terrain',
                        'elink'
                    ]
                },
                zoomControl: true,
                zoomControlOptions: {position: google.maps.ControlPosition.LEFT_CENTER},
                scaleControl: true,
                fullscreenControl: true,
                fullscreenControlOptions: {position: google.maps.ControlPosition.LEFT_CENTER},
                streetViewControl: false,
                streetViewControlOptions: {position: google.maps.ControlPosition.LEFT_CENTER},
                mapTypeId: google.maps.MapTypeId.HYBRID
            });

            map.mapTypes.set('roadmap',styleMap);

            map.setMapTypeId('roadmap');

            let coordenadas = [
                @foreach($coordenadas as $coordenada)
                    {lat:{{$coordenada->lat}},lng:{{$coordenada->lng}} },
                @endforeach
            ];

            poligono = new google.maps.Polygon({
                paths: coordenadas,
                //draggable: true,
                editable:true,
                strokeColor: "#FFC107",
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: "#FFC107",
                fillOpacity: 0.35,
            });

            poligono.setMap(map);

            //google.maps.event.addListener(poligono.getPath(),'insert_at',getPoligonsCoord);
            google.maps.event.addListener(poligono.getPath(), "set_at", getPoligonsCoord);

            $('html').removeClass('loading-overlay-shown');
            $('#loading-overlay').fadeOut(300);

        }

        function getPoligonsCoord() {

            $('html').addClass('loading-overlay-shown');
            $('#loading-overlay').fadeIn(300);

            coordenadasUpdate.length = 0;
            var len = poligono.getPath().getLength();
            for (var i = 0; i < len; i++) {
                let coordenadasJson  = JSON.stringify(poligono.getPath().getAt(i));
                coordenadasArray = JSON.parse(coordenadasJson);
                coordenadasUpdate.push("lat: "+coordenadasArray.lat+",lng: "+coordenadasArray.lng);
            }

            $('html').removeClass('loading-overlay-shown');
            $('#loading-overlay').fadeOut(300);



        }





    </script>

@stop
