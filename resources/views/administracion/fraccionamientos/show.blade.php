@extends('layouts.template_master')
@section('content')


    <div class="content-header">
        <div class="header-icon">
            <i class="pe-7s-map-marker"></i>
        </div>
        <div class="header-title">
            <h1>Detalle del fraccionamiento</h1>
            <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque, quibusdam.</small>
            <ol class="breadcrumb">
                <li><a href="/"><i class="pe-7s-home"></i> Resumen</a></li>
                <li><a href="{{asset('fraccionamientos')}}"><i class="pe-7s-home"></i> Fraccionamientos</a></li>
                <li class="active">{{$fraccionamiento->fraccionamiento}}</li>
            </ol>
        </div>
    </div>

    <div class="row">

        <div class="col-sm-12 text-right m-b-10">
            <a href="{{asset('fraccionamientos/'.$fraccionamiento->idFraccionamiento.'/lotes')}}" class="btn btn-primary">
                <i class="fa fa-map"></i> Ver lotes
            </a>
            <a href="{{asset('fraccionamientos/'.$fraccionamiento->idFraccionamiento.'/imagenes')}}" class="btn btn-primary"><i class="fa fa-image"></i> Imagenes del fraccionamiento</a>
        </div>

        <div class="col-md-12 col-lg-12 col-sm-12">

            <div class="panel">
                <div class="panel-heading bg-primary">
                    <div class="panel-title d-flex">
                        <div class="text-white">
                            <i class="ti-home text-white"></i>
                            <h4 class="text-uppercase">Detalle del fraccionamiento</h4>
                        </div>
                        <a data-toggle="tooltip" data-placement="top" title="Actualizar Información" href="{{asset('fraccionamientos/'.$fraccionamiento->idFraccionamiento.'/edit-information')}}"><i class="fa fa-edit"></i></a>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="20%">Fraccionamiento</th>
                                <th>{{$fraccionamiento->fraccionamiento}}</th>
                            </tr>
                            <tr>
                                <th width="20%">Empresa</th>
                                <th>{{$empresa->empresa}}</th>
                            </tr>
                            <tr>
                                <th width="20%">Ubicación</th>
                                <th>{{$municipio->nombre}} {{$estado->nombre}}</th>
                            </tr>
                            <tr>
                                <th width="20%">Descripción</th>
                                <th>{{$fraccionamiento->descripcion}}</th>
                            </tr>
                        </thead>
                    </table>
                    <a data-toggle="modal" data-target="#myModal" class="btn btn-sm btn-primary">Ver imagen Fraccionada</a>

                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Imagen Fraccionada</h4>
                                </div>
                                <div class="modal-body" style="padding: 0px;">
                                    <img style="width: 100%;" src="{{asset('imagenes/'.$fraccionamiento->url_img_lotes_fraccionado)}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="panel">

                <div class="panel-heading bg-primary">
                    <div class="panel-title d-flex">
                        <div class="text-white">
                            <i class="ti-home text-white"></i>
                            <h4 class="text-uppercase">Area del fraccionamiento</h4>
                        </div>
                        <a data-toggle="tooltip" data-placement="top" title="Actualizar Area" href="{{asset('fraccionamientos/'.$fraccionamiento->idFraccionamiento.'/edit-area-location')}}"><i class="fa fa-edit"></i></a>
                    </div>
                </div>

                <div class="panel-body" style="padding: 0px !important;">
                    <div id="map"  style="width: 100%; height: 600px;"></div>
                </div>

            </div>



        </div>

    </div>


@stop

@section('js')
    <script src="{{asset('assets/libraries/axios/axios.min.js')}}"></script>

    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCrrvWvr6JWo32OjaMOEdCfyNyUezlux9o"></script>

    <script>

        let map;
        let poligono;
        let mapa_container;

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
                //editable:true,
                strokeColor: "#FFC107",
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: "#FFC107",
                fillOpacity: 0.35,
            });

            poligono.setMap(map);


        }

    </script>

@stop
