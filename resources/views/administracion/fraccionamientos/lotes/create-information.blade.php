@extends('layouts.template_master')
@section('title','Registro de lotes')

@section('css')

@stop

@section('content')

    <div class="content-header">
        <div class="header-icon">
            <i class="pe-7s-plus"></i>
        </div>
        <div class="header-title">
            <h1>Registro de fraccionamientos</h1>
            <small>Registra nuevos fraccionamientos en el sistema.</small>
            <ol class="breadcrumb">
                <li><a href="/"><i class="pe-7s-home"></i> Resumen</a></li>
                <li><a href="{{asset('/fraccionamientos')}}">Fraccionamiento</a></li>
                <li><a href="{{asset('/fraccionamientos/'.$fraccionamiento->idFraccionamiento)}}">{{$fraccionamiento->fraccionamiento}}</a></li>
                <li><a href="{{asset('/fraccionamientos/'.$fraccionamiento->idFraccionamiento.'/lotes')}}">Lotes</a></li>
                <li class="active">Agregar lote</li>
            </ol>
        </div>
    </div>

    <div class="row">

        <div class="col-lg-4 col-md-4 col-xs-12 col-sm-12">
            <div class="panel">
                <div class="panel-heading text-center">
                    <h4 class="text-uppercase">Datos del fraccionamiento</h4>
                </div>
                <div class="panel-body">
                    <ul class="list-group">
                        <li class="list-group-item d-flex">
                            <div class="text-left">
                                <strong>Fraccionamiento</strong>
                            </div>
                            <div class="text-right">
                                <span>{{$fraccionamiento->fraccionamiento}}</span>
                            </div>
                        </li>
                        <li class="list-group-item d-flex">
                            <div class="text-left">
                                <strong>Empresa</strong>
                            </div>
                            <div class="text-right">
                                <span>{{$empresa->empresa}}</span>
                            </div>
                        </li>
                        <li class="list-group-item d-flex">
                            <div class="text-left">
                                <strong>Ubicación</strong>
                            </div>
                            <div class="text-right">
                                <span>{{$municipio->nombre}} {{$estado->nombre}}</span>
                            </div>
                        </li>
                    </ul>
                </div>
                <h4 style="padding: 5px; text-align: center; text-transform: uppercase;">Imagen fraccionada</h4>
                <div class="panel-body text-center" style="padding: 0px;">
                    <img style="width: 100%; height: 400px;" src="{{asset('imagenes/'.$fraccionamiento->url_img_lotes_fraccionado)}}" alt="">
                </div>
                <div class="panel-body" style="padding: 0px !important;">
                    <h4 class="text-center">Coordenadas geograficas</h4>
                    <div id="map"  style="width: 100%; height: 600px;"></div>
                </div>

            </div>
        </div>

        <div class="col-lg-8 col-md-8 col-xs-12 col-sm-12">
            {!! Form::open(['url'=>'fraccionamientos/'.$fraccionamiento->idFraccionamiento.'/lotes/store-information','method'=>'POST']) !!}
            <div class="panel">
                <div class="panel-heading bg-primary">
                    <div class="panel-title d-flex">
                        <div class="text-white">
                            <i class="ti-plus text-white"></i>
                            <h4 class="text-uppercase">Agregar información del lote</h4>
                        </div>
                    </div>
                </div>
                <div class="panel-body">

                    <div class="row">
                        <div class="col-md-6 col-xs-12 col-sm-12">
                            <div class="form-group">
                                <label for="">Numero del lote</label>
                                {!! Form::text('numeroLote',$lote->numeroLote ? $lote->numeroLote : old('numeroLote'),['class'=>'form-control']) !!}
                                @error('numeroLote')
                                    <span class="text-danger text-bold">{{$message}}</span>
                                @enderror
                            </div>

                        </div>
                        <div class="col-md-6 col-xs-12 col-sm-12">
                            <div class="form-group">
                                <label for="">Numero de la manzana</label>
                                {!! Form::text('numeroManzana',$lote->numeroManzana ? $lote->numeroManzana : old('numeroManzana'),['class'=>'form-control']) !!}
                                @error('numeroManzana')
                                    <span class="text-danger text-bold">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-xs-12 col-sm-12">
                            <div class="form-group">
                                <label for="">Selecciona un color del lote</label>
                                {!! Form::color('color',$lote->color ? $lote->color : old('color'),['class'=>'form-control']) !!}
                                @error('color')
                                    <span class="text-danger text-bold">{{$message}}</span>
                                @enderror
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 col-xs-12 col-sm-12">
                            <div class="form-group">
                                <label for="">Descripción del lote</label>
                                {!! Form::textarea('descripcion',$lote->descripcion ? $lote->descripcion : old('descripcion'),['class'=>'form-control']) !!}
                                @error('descripcion')
                                    <span class="text-danger text-bold">{{$message}}</span>
                                @enderror
                            </div>

                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <a href="{{asset('/fraccionamientos')}}" class="btn  btn-inverse"><i class="fa fa-chevron-circle-left"></i> Cancelar</a>
                    <button type="submit" class="btn  btn-primary"><i class="fa fa-chevron-circle-right"></i> Siguiente</button>
                </div>
            </div>
            {!! Form::close() !!}
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
