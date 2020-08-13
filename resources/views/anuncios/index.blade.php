@extends('layouts.app')

@section('content')

        <style type="text/css">

        .imagenAnun2{
            /*display: none;*/
            width: 40%;
            height: auto;
            /*height:70%;*/
            max-width:500px; 
            margin-right: -25px !important;
        }

        .card-header, .card-footer{        
            /*-webkit-linear-gradient(to left, #d87602, #d64322);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;*/

            /*background-image:
            linear-gradient(to right, white, gray);*/
            padding: 20px;
            background: rgba(0, 0, 0, 0.6);
            color: gray;
            font: 18px Arial, sans-serif;
        }
        .palabraVerInmueble2, .palabraVerEstaciona2,.PalabraEditarPago2, .tituloTabla2
        {
            display: none;
        }
        @media only screen and (max-width: 800px)  {

            .PalabraEditarPago, .PalabraRealizarPago, .PalabraPagoConfirmar{
                display: none;
            }
            .palabraVerInmueble{
                display: none;
            }
            .palabraVerInmueble2{
                display: block;
            }
            .palabraVerEstaciona{
                display: none;
            }
            .palabraVerEstaciona2{
                display: block;
            }
            .PalabraEditarPago2{
                display: block;
            }
            .iconosMetaforas{
                display: none;    
            }
            .card-table{
                width: 100%
            }

        }
        @media only screen and (max-width: 200px)  {
            .botonesEditEli{
                width: 15px;
                height: 15px;
            }
            .iconosMetaforas2{
                width: 5px;
                height: 5px;    
            }
            .imagenAnun2{
                width: 30%;
            }
        }
        @media screen and (max-width: 480px) {
            .tituloTabla{
                display: none;
            }
            .tituloTabla2{
                display: block;
            }
            .iconosMetaforas2{
                width: 15px;
                height: 15px;    
            }
            .botonesEditEli{
                width: 30px;
                height: 30px;
                margin-top: 5px;
                    
            }
            .imagenAnun2{
                width: 30%;
            }
        }


    </style>
<div class="container">
    <input type="hidden" id="colorView" value="#25c2e3 !important">
    <div class="row page-title" id="tituloP">
        <div class="col-md-12">
            <nav aria-label="breadcrumb" class="float-right mt-1">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Publicidad</li>
                </ol>
            </nav>
            <h4 class="mb-1 mt-0">Publicidad</h4>
        </div>
    </div>
    <div class="row page-title" style="display: none;" id="tituloP1">
        <div class="col-md-12">
            <nav aria-label="breadcrumb" class="float-right mt-1">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Anuncios</li>
                </ol>
            </nav>
            <h4 class="mb-1 mt-0">Anuncios</h4>
        </div>
    </div>
    <div class="row page-title" style="display: none;" id="tituloP2">
        <div class="col-md-12">
            <nav aria-label="breadcrumb" class="float-right mt-1">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Empresas</li>
                </ol>
            </nav>
            <h4 class="mb-1 mt-0">Empresas</h4>
        </div>
    </div>
    <div class="row page-title" style="display: none;" id="tituloP3">
        <div class="col-md-12">
            <nav aria-label="breadcrumb" class="float-right mt-1">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ url('anuncios') }}">Publicidad</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Control de Pagos</li>
                </ol>
            </nav>
            <h4 class="mb-1 mt-0">Control de Pagos</h4>
        </div>
    </div>
    @include('flash::message')
    @if(count($errors))
        <div class="alert-list m-4">
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <ul>
                    @foreach($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                    @endforeach

                </ul>
            </div>
        </div>
    @endif
    <div id="tablaAnucios" style="display: none;">
        <div class="card border border-info rounded card-tabla shadow p-3 mb-5 bg-white rounded tabla-estilo">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12 offset-md-12">
                            <a class="btn btn-success boton-tabla shadow" data-toggle="modal" data-target="#crearAnuncio" onclick="AnuncioCreate()" style="
                                border-radius: 10px;
                                color: white;
                                height: 35px;
                                margin-bottom: 5px;
                                margin-top: 5px;
                                float: right;">
                                <span class="PalabraEditarPago ">Nuevo Anuncio</span>
                                <center>
                                    <span class="PalabraEditarPago2 ">
                                        <i data-feather="plus" class="iconosMetaforas2"></i>
                                    </span>
                                </center>
                            </a>
                        </div>
                    </div>
                </div>
                

                <div class="col-md-8">
                    <table class="table dataTable data-table-basic table-curved table-striped tabla-estilo" style="width: 100%;">
                         <thead>
                            <tr class="table-default text-white">
                                <td colspan="1"></td>
                                <td colspan="3" align="center">
                                    <div class="card border border-info" style="background-color: #D6EAF8" role="alert">
                                        <span class="text-dark p-1 mb-1"><strong>Aviso: </strong><br>-Seleccione un anuncio para ver mas opciones.</span>
                                    </div>
                                </td>
                                <td colspan="1"></td>
                            </tr>
                            <tr class="bg-primary text-white" id="th2" style="display: none">
                                <th width="10"></th>
                                <th>
                                    <span class="PalabraEditarPago">Título</span>
                                    <span class="PalabraEditarPago2">T</span>
                                </th>
                                <th>
                                    <span class="PalabraEditarPago">URL</span>
                                    <span class="PalabraEditarPago2">@</span>
                                </th>
                                <th colspan="2">
                                    <center>
                                        <span class="PalabraEditarPago">Opciones</span>
                                        <span class="PalabraEditarPago2">O</span>
                                    </center>
                                </th>
                            </tr>
                            <tr class="bg-info text-white" id="th1">
                                <th>#</th>
                                <th>
                                    <span class="tituloTabla">Título</span>
                                    <span class="tituloTabla2">T</span>
                                </th>
                                <th>
                                    <span class="tituloTabla">URL</span>
                                    <span class="tituloTabla2">@</span>
                                </th>
                                <!-- <th>Estacionamientos</th> -->
                                <th>
                                    <span class="tituloTabla">Descripción</span>
                                    <span class="tituloTabla2">S</span>
                                </th>
                                <th>
                                    <span class="tituloTabla">Imagen</span>
                                    <span class="tituloTabla2">I</span>
                                </th>
                                <!-- <th>Mensualidades</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @php $num=0 @endphp
                            @foreach($anuncios as $key)
                                
                                <tr id="vista1-{{$key->id}}" onclick="opcionesTabla(1,'{{$key->id}}')">
                                    <td align="center">
                                        {{$num=$num+1}}
                                    </td>
                                    <td>{{$key->titulo}}</td>
                                    <td>{{$key->link}}</td>
                                    <td>{{$key->descripcion}}</td>
                                    <td><img class="imagenAnun" src="{{ asset($key->url_img) }}" class="avatar" style="width:100%;max-width:640px;"></td>
                                </tr>
                                <tr id="vista2-{{$key->id}}" class="table-success" style="display: none;">
                                    <td width="10">
                                        <button class="btn btn-success btn-sm boton-tabla shadow botonesEditEli" onclick="opcionesTabla(2,'{{$key->id}}')">
                                            <span class="PalabraEditarPago ">Regresar</span>
                                            <center>
                                                <span class="PalabraEditarPago2 ">
                                                    <i data-feather="arrow-left" class="iconosMetaforas2"></i>
                                                </span>
                                            </center>
                                        </button>
                                    </td>
                                    <td>
                                        
                                        <span>{{$key->titulo}}</span>
                                    </td>
                                    <td>
                                        <span>{{$key->link}}</span>
                                    </td>
                                    <td colspan="2" align="center">

                                        <a href="#" class="border border-light btn btn-info btn-sm boton-tabla shadow botonesEditEli" style="border-radius: 5px;" onclick="VerAdminAsignado('{{$key->id}}')">
                                            <span class="PalabraEditarPago "><strong>Ver Asignados</strong></span>
                                            <center>
                                                <span class="PalabraEditarPago2 ">
                                                    <strong><i data-feather="eye" class="iconosMetaforas2"></i></strong>
                                                </span>
                                            </center>
                                        </a>
                                        @php $count=0 @endphp
                                        @foreach($EmpresasAnuncios as $key2)
                                            @if($count == 0)
                                                <a href="#" class="btn btn-warning btn-sm boton-tabla shadow botonesEditEli" style="border-radius: 5px;" onclick="EditarAnuncio('{{$key->id}}','{{$key->id_empresa}}','{{$key->titulo}}','{{$key->descripcion}}','{{$key->url_img}}','{{$key->link}}','{{$key2->referencia}}','{{$key2->id_planP}}')">
                                                    <span class="PalabraEditarPago ">Editar</span>
                                                    <center>
                                                        <span class="PalabraEditarPago2 ">
                                                            <i data-feather="edit" class="iconosMetaforas2"></i>
                                                        </span>
                                                    </center>
                                                </a>
                                                @php $count++ @endphp
                                            @endif
                                        @endforeach()

                                        <a href="#" class="btn btn-danger btn-sm boton-tabla shadow botonesEditEli" style="border-radius: 5px;" onclick="EliminarAnuncio('{{$key->id}}')">
                                            <span class="PalabraEditarPago ">Eliminar</span>
                                            <center>
                                                <span class="PalabraEditarPago2 ">
                                                    <i data-feather="trash" class="iconosMetaforas2"></i>
                                                </span>
                                            </center>
                                        </a>
                                    </td>
                                    <td style="display: none"></td>
                                    

                                </tr>
                                <tr style="display: none;">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @endforeach()
                        </tbody>
                    </table>
                </div>
                <div class="col-md-4">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            @php $num=0 @endphp
                            @foreach($anuncios as $key)
                                @if($num == 0)
                                    <div class="carousel-item active">
                                        <center>
                                            <h3 alt="{{$num=$num+1}} slide"><strong class="text-dark">{{$key->titulo}}</strong></h3>
                                            <br>
                                            <img class="imagenAnun" src="{{ asset($key->url_img) }}" class="avatar" style="width:100%;max-width:640px;">
                                            <div class="row justify-content-center">
                                                <div class="col-md-12">
                                                    
                                                </div>
                                            </div>
                                        </center>
                                    </div>
                                @else
                                    <div class="carousel-item">
                                        <center>
                                            <h3 alt="{{$num=$num+1}} slide"><strong class="text-dark">{{$key->titulo}}</strong></h3>
                                            <br>
                                            <img class="imagenAnun" src="{{ asset($key->url_img) }}" class="avatar" style="width:100%;max-width:640px;">
                                            <div class="row justify-content-center">
                                                <div class="col-md-12">
                                                    
                                                </div>
                                            </div>
                                        </center>
                                    </div>
                                @endif

                                @php $num++ @endphp
                            @endforeach()

                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                        </div>
                </div>
            </div>
        </div>
    </div>


    <div id="tablaEmpresas" style="display: none;">
        <div class="card border border-warning rounded card-tabla shadow p-3 mb-5 bg-white rounded tabla-estilo">
            

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12 offset-md-12">
                                    <a class="btn btn-success boton-tabla shadow" data-toggle="modal" data-target="#NuevaEmpresa" style="
                                        border-radius: 10px;
                                        color: white;
                                        height: 35px;
                                        margin-bottom: 5px;
                                        margin-top: 5px;
                                        float: right;">
                                        <span class="PalabraEditarPago ">Nueva Empresa</span>
                                        <center>
                                            <span class="PalabraEditarPago2 ">
                                                <i data-feather="plus" class="iconosMetaforas2"></i>
                                            </span>
                                        </center>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table dataTable data-table-basic table-curved table-striped tabla-estilo" style="width: 100%;">
                        <thead>
                            <tr class="table-default text-white">
                                <td colspan="2" align="center">
                                    <div class="card border border-info" style="background-color: #D6EAF8" role="alert">
                                        <span class="text-dark p-1 mb-1"><strong>Aviso: </strong><br>-Seleccione una empresa para ver mas opciones.</span>
                                    </div>
                                </td>
                                <td colspan="3"></td>
                            </tr>
                            <tr class="bg-primary text-white th2" style="display: none">
                                <th width="10"></th>
                                <th>
                                    <span class="PalabraEditarPago">Nombre</span>
                                    <span class="PalabraEditarPago2">N</span>
                                </th>
                                <th>
                                    <span class="PalabraEditarPago">RUT</span>
                                    <span class="PalabraEditarPago2">#</span>
                                </th>
                                <th colspan="2">
                                    <center>
                                        <span class="PalabraEditarPago">Opciones</span>
                                        <span class="PalabraEditarPago2">O</span>
                                    </center>
                                </th>
                            </tr>
                            <tr class="bg-info text-white th1">
                                <th>#</th>
                                <th>
                                    <span class="tituloTabla">Nombre</span>
                                    <span class="tituloTabla2">T</span>
                                </th>
                                <th>
                                    <span class="tituloTabla">Rut</span>
                                    <span class="tituloTabla2">@</span>
                                </th>
                                <!-- <th>Estacionamientos</th> -->
                                <th>
                                    <span class="tituloTabla">Descripción</span>
                                    <span class="tituloTabla2">S</span>
                                </th>
                                <th>
                                    <span class="tituloTabla">Status</span>
                                    <span class="tituloTabla2">S</span>
                                </th>
                                <!-- <th>Mensualidades</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @php $num=0 @endphp
                            @foreach($empresas as $key)
                                <tr class="vista1-{{$key->id}}" onclick="opcionesTabla(1,'{{$key->id}}')">
                                    <td align="center">
                                        {{$num=$num+1}}
                                    </td>
                                    <td>{{$key->nombre}}</td>
                                    <td>{{$key->rut_empresa}}</td>
                                    <td>{{$key->descripcion}}</td>
                                    @if($key->status == 'Activo')
                                        <td style="position: all;">
                                                <span class="tituloTabla text-success"><strong>Activo</strong></span>
                                                <span class="tituloTabla2 text-success"><strong>A</strong></span>
                                        </td>
                                    @else
                                        <td style="position: all;">
                                                <span class="tituloTabla text-danger"><strong>Inactivo</strong></span>
                                                <span class="tituloTabla2 text-danger"><strong>I</strong></span>
                                        </td>
                                    @endif
                                </tr>
                                <tr class="vista2-{{$key->id}}" class="table-success" style="display: none;">
                                    <td width="10">
                                        <button class="btn btn-success btn-sm boton-tabla shadow botonesEditEli" onclick="opcionesTabla(2,'{{$key->id}}')">
                                            <span class="PalabraEditarPago ">Regresar</span>
                                            <center>
                                                <span class="PalabraEditarPago2 ">
                                                    <i data-feather="arrow-left" class="iconosMetaforas2"></i>
                                                </span>
                                            </center>
                                        </button>
                                    </td>
                                    <td>
                                        
                                        <span>{{$key->nombre}}</span>
                                    </td>
                                    <td>
                                        <span>{{$key->rut_empresa}}</span>
                                    </td>
                                    <td colspan="2" align="center">

                                       <a href="#" class="btn btn-warning btn-sm" onclick="editarEmpresa('{{$key->id}}','{{$key->nombre}}','{{$key->rut_empresa}}','{{$key->descripcion}}','{{$key->status}}')">
                                            <span class="PalabraEditarPago ">Editar</span>
                                            <center>
                                                <span class="PalabraEditarPago2 ">
                                                    <i data-feather="edit" class="iconosMetaforas2"></i>
                                                </span>
                                            </center>
                                        </a>
                                    <a href="#" class="btn btn-danger btn-sm" onclick="eliminarEmpresa('{{$key->id}}')">
                                            <span class="PalabraEditarPago ">Eliminar</span>
                                            <center>
                                                <span class="PalabraEditarPago2 ">
                                                    <i data-feather="trash" class="iconosMetaforas2"></i>
                                                </span>
                                            </center>
                                        </a>
                                    </td>
                                    <td style="display: none"></td>
                                    

                                </tr>
                                <tr style="display: none;">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @endforeach()
                        </tbody>
                    </table>
                </div>
                <div class="col-md-4">
                    @php $num=0 @endphp
                    @foreach($empresas as $key)
                        <div class="row vista2-{{$key->id}}" style="display: none;">
                            <div class="col-md-12">
                                <div class="card border card-tabla shadow p-1 bg-white tabla-estilo" style="border-radius: 15px !important;">
                                    <!-- <img src="assets/images/logo.svg" alt="brand-logo" height="18" class="mr-1"> -->
                                    <strong><h3 align="center">{{$key->nombre}}</h3></strong>
                                    <!-- <small>11 mins ago</small> -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card border border-info mb-3">
                                                @foreach($EmpresasAnuncios as $key2)
                                                    @if($key->id == $key2->id_empresa)
                                                            <ul class="list-group list-group-flush">
                                                                <li class="list-group-item">
                                                                        
                                                                    <span><b>{{$key2->anuncios->titulo}}</b></span>
                                                                    <br>
                                                                    <span>{{$key2->anuncios->link}}</span>
                                                                    <div class="float-right">
                                                                        <img src="{{ asset($key2->planP->url_img) }}" class="shadow" style="width: 50px; height: 50px; border-radius: 35px !important;">
                                                                        <img class="" src="{{ asset($key2->anuncios->url_img) }}" class="" style="width: 50px; height: 50px; border-radius: 30px;">
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                    @endif
                                                @endforeach()
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach()
                </div>
            </div>
        </div>
    </div>

    <div id="tablaControl" style="display: none;">
        <div class="card border border-danger card-tabla shadow p-3 mb-5 bg-white">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        @foreach($anuncios as $key)
                            @foreach($EmpresasAnuncios as $key2)
                                @if($key->id == $key2->id_anuncios)
                                    <a href="#" onclick="verInfoControl('{{$key->id}}',1,'{{$key2->status}}')">
                                    @if($key2->status == 'Activo')
                                        <div class="mb-3 card border border border-success" id="tablaCC{{$key->id}}">
                                    @else
                                        <div class="mb-3 card border border border-danger" id="tablaCC{{$key->id}}">
                                    @endif
                                        <?php 
                                            $fecha1 =   Date('Y-m-d');
                                            $fecha2 =   Date($key2->fecha_termino);
                                            $fecha3 =   Date($key2->fecha_orden);

                                            $dias = (strtotime($fecha2)-strtotime($fecha3))/86400;
                                            $dias = abs($dias);
                                            $dias = floor($dias);

                                            $dias2 = (strtotime($fecha2)-strtotime($fecha1))/86400;
                                            $dias2 = abs($dias2);
                                            $dias2 = floor($dias2);

                                            if($fecha1 > $fecha2){
                                                $dias   = 0;
                                                $dias2  = 0;
                                                $total  = 0;
                                            }else{
                                                $dias = abs($dias);
                                                $dias = floor($dias);

                                                if ($dias2 != 0) {
                                                    $total = ($dias2*100)/$dias;
                                                }else{
                                                    $total = 0;
                                                }
                                            }
                                        ?>
                                        <div class="card-body">
                                            <div class="mb-3">
                                                
                                                @if($key2->status == 'Activo')
                                                    <small style="border-radius: 30px;" class=" btn btn-success btn-sm disabled">{{$key2->status}}</small>
                                                @else
                                                    <small style="border-radius: 30px;" class=" btn btn-danger btn-sm disabled">{{$key2->status}}</small>
                                                @endif
                                                <span class="mb-2 p-2" style="font-size: 40px;color: gray; font: 18px Arial, sans-serif;" align="left">
                                                    {{$key->titulo}}
                                                </span>
                                                <small style="color: grey; float: right;border-radius: 30px;">Hace {{(strtotime($fecha1)-strtotime($fecha3))/86400}} Dias</small>
                                                <div class="float-right">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-10">
                                                    @if($key2->status == 'Activo')
                                                        <div class="progress mb-2" style="width: 100%;">
                                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="{{$total}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$total}}%"></div>
                                                        </div>
                                                    @else
                                                        <div class="progress mb-2" style="width: 100%;">
                                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="{{$total}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$total}}%"></div>
                                                        </div>
                                                    @endif
                                                    <center><span class="mb-2" style="color: grey; font: 20px Arial, sans-serif;">{{$dias2}}</span> <small style="color: grey"> Dias Restantes</small></center>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="float-right">
                                                        <img src="{{ asset($key->url_img) }}" class="shadow" style="width: 50px; height: 50px; border-radius: 35px !important;">
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                @endif
                            @endforeach()
                        @endforeach()
                    </div>
                    @foreach($anuncios as $key)
                        @foreach($EmpresasAnuncios as $key2)
                            @if($key->id == $key2->id_anuncios)
                                <div class="col-md-6">
                                    <div class="verDatosPagoA{{$key2->id}}" style="display: none">                                    
                                        <div class="card border shadow" style="
                                        background-image: url('{{ asset($key->url_img) }}');
                                        background-position: center;
                                        background-repeat: no-repeat;
                                        background-size: cover;
                                        display: none;">
                                            <div class="card-header">
                                                <button type="button" class="btn btn-success rounded" onclick="verInfoControl('{{$key->id}}',2,'{{$key2->status}}')" style="border-radius: 30px !important; float: left !important;">
                                                    <span class="PalabraEditarPago ">Regresar</span>
                                                    <center>
                                                        <span class="PalabraEditarPago2 ">
                                                            <i data-feather="arrow-left" class="iconosMetaforas2"></i>
                                                        </span>
                                                    </center>
                                                </button>
                                                <div class="button-list float-right">

                                                    <button type="button" class="btn btn-warning rounded" onclick="editarPagoPublcidad('{{$key2->id}}','{{$key2->referencia}}','{{$key2->planP->id}}')" style="border-radius: 30px !important;">
                                                        <span class="PalabraEditarPago ">Editar</span>
                                                        <center>
                                                            <span class="PalabraEditarPago2 ">
                                                                <i data-feather="edit" class="iconosMetaforas2"></i>
                                                            </span>
                                                        </center>
                                                    </button>
                                                    <!-- <button type="button" class="btn btn-info rounded" onclick="diaNegocio(2)" style="border-radius: 30px !important;">
                                                        <span class="PalabraEditarPago ">Renovar</span>
                                                        <center>
                                                            <span class="PalabraEditarPago2 ">
                                                                <i data-feather="plus" class="iconosMetaforas2"></i>
                                                            </span>
                                                        </center>
                                                    </button>
                                                    <button type="button" class="btn btn-danger rounded" onclick="diaNegocio(3)" style="border-radius: 30px !important;">
                                                        <span class="PalabraEditarPago ">Eliminar</span>
                                                        <center>
                                                            <span class="PalabraEditarPago2 ">
                                                                <i data-feather="trash" class="iconosMetaforas2"></i>
                                                            </span>
                                                        </center>
                                                    </button> -->
                                                </div>
                                                <br>
                                                <br>

                                            </div>
                                            <div onclick="verInfoControl('{{$key->id}}',2,'{{$key2->status}}')">
                                                <div class="card-body bg-white">
                                                    <?php 
                                            $fecha1 =   Date('Y-m-d');
                                            $fecha2 =   Date($key2->fecha_termino);
                                            $fecha3 =   Date($key2->fecha_orden);

                                            $dias = (strtotime($fecha2)-strtotime($fecha3))/86400;
                                            $dias = abs($dias);
                                            $dias = floor($dias);

                                            $dias2 = (strtotime($fecha2)-strtotime($fecha1))/86400;
                                            $dias2 = abs($dias2);
                                            $dias2 = floor($dias2);

                                            if($fecha1 > $fecha2){
                                                $dias   = 0;
                                                $dias2  = 0;
                                                $total  = 0;
                                            }else{
                                                $dias = abs($dias);
                                                $dias = floor($dias);

                                                if ($dias2 != 0) {
                                                    $total = ($dias2*100)/$dias;
                                                }else{
                                                    $total = 0;
                                                }
                                            }
                                        ?>
                                                    <h3 style="">
                                                        Referencia: 
                                                    </h3>
                                                        <small>{{$key2->referencia}}</small>
                                                    <h3 style="">
                                                        Fecha de orden: 
                                                    </h3>
                                                        <small>{{$key2->fecha_orden}}</small>
                                                    <h3 style="">
                                                        Término de la orden: 
                                                    </h3>
                                                        <small>{{$key2->fecha_termino}}</small>
                                                    <h3 style="">
                                                    Dias restantes: 
                                                </h3>
                                                    <small>{{$dias}}</small>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach()
                    @endforeach()
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-4 center" id="VerTabla1">
            <a href="#" onclick="VerTabla(1)" id="verTabla2-1" style="display: none; width: 100%;">
                <div class="card border border-dark shadow rounded m-7" style="height: 400px;
                background-image: url('{{ asset('assets/images/anuncios/anuncios.jpg') }}');
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
                ">
                    <div class="card-header">
                        <h3 align="right" class="text-warning" >ANUNCIOS</h3>
                    </div>
                    <div class="card-body p-3 mb-5 ">
                    </div>
                    <div class="card-footer">
                        <strong class="text-warning">Visualizar los Anuncios de la App.</strong>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 center" id="VerTabla2">
            <a href="#" onclick="VerTabla(2)" id="verTabla2-2" style="display: none; width: 100%;">
                <div class="card border border-dark shadow rounded m-7" style="height: 400px;
                background-image: url('{{ asset('assets/images/anuncios/empresa.jpg') }}');
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
                ">
                    <div class="card-header">
                        <h3 align="right" class="text-warning" >EMPRESAS</h3>
                    </div>
                    <div class="card-body p-3 mb-5 ">
                    </div>
                    <div class="card-footer">
                        <strong class="text-warning">Visionar las Empresas Registradas</strong>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 center" id="VerTabla3">
            <a href="#" onclick="VerTabla(3)" id="verTabla2-3" style="display: none; width: 100%;">
                <div class="card border border-dark shadow rounded m-7" style="height: 400px;
                background-image: url('{{ asset('assets/images/anuncios/control.jpg') }}');
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
                ">
                    <div class="card-header">
                        <h3 align="right" class="text-warning" >CONTROL</h3>
                    </div>
                    <div class="card-body p-3 mb-5 ">
                    </div>
                    <div class="card-footer">
                        <strong class="text-warning">Gestionar el Control de Pagos, Duración y Anuncios a Visualizar en la App.</strong>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

<!-- --------------------------------------------VER AnuncioS--------------------------------------------------------- -->
    <div class="modal fade" id="VerAnuncio" role="dialog">
        <div class="modal-dialog modals-default">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Ver Anuncio</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <center>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Título del Anuncio</label>
                                    <span id="ver_idem"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Url</label>
                                    <span id="ver_tipo"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Estado del Anuncio</label>
                                    <span id="ver_status"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Pago común</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">$</div>
                                        </div>
                                        <input type="number" name="monto[]" class="form-control" placeholder="10">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </center>
                </div>                            
            </div>
        </div>
    </div>
<!-- --------------------------------------------FIN REGISTRAR AnuncioS--------------------------------------------------------- -->


     {!! Form::open(['route' => ['anuncios.update',1], 'enctype' => 'multipart/form-data', 'method' => 'PUT', 'name' => 'editar_anunc', 'id' => 'editar_anunc', 'data-parsley-validate']) !!}
            @csrf
            <div class="modal fade" id="editarAnuncio" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>Editar anuncio</h4>                
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <ul class="nav nav-pills nav-fill mb-3" id="pills-tab" role="tablist" style="background-color: #C5C5C5 !important;">
                              <li class="nav-item">
                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home2" role="tab" aria-controls="pills-empresa" aria-selected="true">1</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile2" role="tab" aria-controls="pills-datos" aria-selected="false">2</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact2" role="tab" aria-controls="pills-imagen" aria-selected="false">3</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" id="pills-pago-tab" data-toggle="pill" href="#pills-pago2" role="tab" aria-controls="pills-pago" aria-selected="false">4</a>
                              </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                              <div class="tab-pane fade show active" id="pills-home2" role="tabpanel" aria-labelledby="pills-home-tab">
                                    <center>
                                        <div class="card border border-info shadow p-3 m-4">
                                            <div class="card-body">
                                                <label for="SelectEmpresa">¿Cuál es la empresa que desea el anuncio?</label>
                                                <select class="form-control select2" name="id_empresa" required id="id_empresa_anuncio">
                                                    @foreach($empresas as $key)
                                                        <option value="{{$key->id}}">{{$key->nombre}} .- {{$key->rut_empresa}}</option>
                                                    @endforeach()
                                                </select>
                                            </div>
                                        </div>                                    
                                        <div class="form-group">
                                        </div>
                                        <div class="card border border-info shadow p-3 m-4">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label>¿Cuales administradores podrán visualizar el anuncio?</label> 
                                                    <br>
                                                    <input type="checkbox" name="admins_todos" onchange="TodosAdmins()" id="todoAdmin2"  data-toggle="tooltip" data-placement="top" title="Seleccione si desea seleccionar a todos los admins" value="1" checked>
                                                    <label for="admins_todos">Seleccionar todos</label>

                                                    <select name="id_admins[]" id="SelectAdminA3" class="form-control select2 border border-default" multiple="multiple" required>
                                                        @foreach($users_admin as $key)
                                                            <option value="{{$key->id}}">{{$key->name}} - RUT: {{$key->rut}}</option>
                                                        @endforeach
                                                        <option value="10">prueba</option>
                                                    </select>

                                                    <div style="display: none;">
                                                        <select name="id_admins[]" id="SelectAdminA4" class="form-control select2 border border-default" multiple="multiple" style="display: none;">
                                                            @foreach($users_admin as $key)
                                                                <option value="{{$key->id}}">{{$key->name}} - RUT: {{$key->rut}}</option>
                                                            @endforeach
                                                            <option value="10">prueba</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </center>
                              </div>

                              <div class="tab-pane fade" id="pills-profile2" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <center>
                                        <div class="card border border-info shadow p-3 m-4">
                                            <div class="row justify-content-center">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Título del anuncio</label>
                                                        <input type="text" class="form-control" placeholder="Ej: Nuevos modelos de autos" name="titulo" required id="tituloAnunE">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row justify-content-center">                                                       
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Link</label>
                                                        <input type="url" placeholder="Ej: https://www.google.co.ve/" class="form-control" name="link" required id="urlAnunE">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row justify-content-center">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Descripción</label>
                                                        <textarea placeholder="Ej: ¡Con nuevos repuestos traidos desde Suiza!..." class="form-control" name="descripcion" required id="descripAnunE"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </center>
                              </div>
                              <div class="tab-pane fade" id="pills-contact2" role="tabpanel" aria-labelledby="pills-contact-tab">
                                  <center>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Imagen</label>
                                                    <div id="mostrarImagenEditar" align="center"></div>
                                                    <div class="alert alert-primary" role="alert">
                                                        <p><strong>Recordar que:</strong><br>
                                                        - La imagen no debe exceder los 800 KB de tamaño<br>
                                                        - La imagen no debe tener una anchura mayor a 1024 kb<br>
                                                        - La imagen no debe tener una altura mayor a 800 kb</p>
                                                    </div>
                                                    <input type="file" class="form-control" id="example-fileinput" name="imagen">
                                                </div>
                                            </div>
                                        </div>
                                  </center>

                              </div>

                              <div class="tab-pane fade" id="pills-pago2" role="tabpanel" aria-labelledby="pills-pago-tab">
                                  <center>
                                        <div class="form-group">
                                            <label>Referencia</label>
                                            <input type="text" class="form-control" name="referencia" required id="referenciaAnuncioE">
                                        </div>
                                        <div class="row">
                                            <?php $num=0; ?>
                                            @foreach($planesPago as $key)
                                                @if($num==0)
                                                    <div class="col-md-6">
                                                        <div class="card shadow border card-tabla rounded" style="border-color: {{$key->color}} !important; height: 400px;">
                                                            <div class="card-body">
                                                                <div class="custom-control custom-radio mb-2">
                                                                  <input type="radio" id="customRadio2-{{$key->id}}" name="planP" value="{{$key->id}}" checked>
                                                                </div>
                                                               <h3>{{$key->nombre}}</h3>
                                                               <span>{{$key->dias}} dias</span>
                                                               <br>
                                                                <span style="font-size: 30px;">$</span><span style="font-size: 70px;">{{$key->monto}}</span><strong>/Mes</strong>
                                                               <br>
                                                               <center>
                                                                <img align="center" class="imagenAnun2" src="{{ asset($key->url_img) }}" class="" style="
                                                                    ">
                                                               </center>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="col-md-6">
                                                        <div class="card shadow border card-tabla rounded" style="border-color: {{$key->color}} !important; height: 400px;">
                                                            <div class="card-body">
                                                                <div class="custom-control custom-radio mb-2">
                                                                   <input type="radio" id="customRadio2-{{$key->id}}" name="planP" value="{{$key->id}}">
                                                                </div>
                                                               <h3>{{$key->nombre}}</h3>
                                                               <span>{{$key->dias}} dias</span>
                                                               <br>
                                                                <span style="font-size: 30px;">$</span><span style="font-size: 70px;">{{$key->monto}}</span><strong>/Mes</strong>
                                                               <br>
                                                               <center>
                                                                <img align="center" class="imagenAnun" src="{{ asset($key->url_img) }}" class="" style="
                                                                    width: 50%;
                                                                    /*height: 100%;*/
                                                                    /*height:70%;*/
                                                                    max-width:500px; 
                                                                    margin-right: -25px !important;">
                                                               </center>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                <?php $num++; ?>
                                            @endforeach()
                                        </div>
                                  </center>

                              </div>
                            </div>
                            <center>
                                <div class="row">
                                    <div class="col-md-12">
                                    </div>
                                </div>
                            </center>
                            <div class="float-right">
                                <input type="hidden" name="id_anuncio" id="idAnuncioE">
                                <button type="submit" class="btn btn-success" >Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    {!! Form::close() !!}

    {!! Form::open(['route' => ['anuncios.destroy',1033], 'method' => 'DELETE']) !!}
        @csrf
        <div class="modal fade" id="eliminarAnuncio" role="dialog">
            <div class="modal-dialog modals-default">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Eliminar anuncio</h4>                
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <center>
                            <h3>¿Está seguro de querer eliminar el anuncio? Esta opción no se podrá deshacer</h3>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="id" required id="idAnuncio">
                                    </div>
                                </div>
                            </div>

                            <div class="float-right">
                                <button type="submit" class="btn btn-danger" >Eliminar</button>
                            </div>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    {!! Form::close() !!}


    <form action="{{ route('anuncios.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal fade" id="crearAnuncio" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Nuevo anuncio</h4>                
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <ul class="nav nav-pills nav-fill mb-3" id="pills-tab" role="tablist" style="background-color: #C5C5C5 !important;">
                          <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-empresa" aria-selected="true">1</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-datos" aria-selected="false">2</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-imagen" aria-selected="false">3</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="pills-pago-tab" data-toggle="pill" href="#pills-pago" role="tab" aria-controls="pills-pago" aria-selected="false">4</a>
                          </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                          <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <center>
                                <div class="card border border-info shadow p-3 m-4">
                                    <div class="card-body">
                                        <label for="SelectEmpresa">¿Cuál es la empresa que desea el anuncio?</label>
                                        <select class="form-control select2" name="id_empresa" required>
                                            @foreach($empresas as $key)
                                                <option value="{{$key->id}}">{{$key->nombre}} .- {{$key->rut_empresa}}</option>
                                            @endforeach()
                                        </select>
                                    </div>
                                </div>                                    
                                <div class="form-group">
                                </div>
                                <div class="card border border-info shadow p-3 m-4">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>¿Cuales administradores podrán visualizar el anuncio?</label> 
                                            <div class="">                                                                                
                                                <input type="checkbox" name="admins_todos" onchange="TodosAdmins()" id="todoAdmin"  data-toggle="tooltip" data-placement="top" title="Seleccione si desea seleccionar a todos los admins" value="1">
                                                <label for="admins_todos">Seleccionar todos</label>
                                            </div>
                                            <select required name="id_admins[]" id="SelectAdminA" class="form-control select2 border border-default" multiple="multiple">
                                                @foreach($users_admin as $key)
                                                    <option value="{{$key->id}}">{{$key->name}} - RUT: {{$key->rut}}</option>
                                                @endforeach
                                                <option value="10">prueba</option>
                                            </select>

                                            <div style="display: none">
                                                <select name="id_admins[]" id="SelectAdminA2" class="form-control select2 border border-default" multiple="multiple" style="display: none;">
                                                    @foreach($users_admin as $key)
                                                        <option value="{{$key->id}}">{{$key->name}} - RUT: {{$key->rut}}</option>
                                                    @endforeach
                                                    <option value="10">prueba</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </center>


                          </div>
                          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                <center>
                                    <div class="card border border-info shadow p-3 m-4">
                                        <div class="row justify-content-center">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Título del anuncio</label>
                                                    <input type="text" class="form-control" placeholder="Ej: Nuevos modelos de autos" name="titulo" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">                                                       
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Link</label>
                                                    <input type="url" placeholder="Ej: https://www.google.co.ve/" class="form-control" name="link" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Descripción</label>
                                                    <textarea placeholder="Ej: ¡Con nuevos repuestos traidos desde Suiza!..." class="form-control" name="descripcion" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </center>
                          </div>
                          <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                              <center>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Imagen</label>
                                                <div class="alert alert-primary" role="alert">
                                                    <p><strong>Recordar que:</strong><br>
                                                    - La imagen no debe exceder los 800 KB de tamaño<br>
                                                    - La imagen no debe tener una anchura mayor a 1024 kb<br>
                                                    - La imagen no debe tener una altura mayor a 800 kb</p>
                                                </div>
                                                <input type="file" class="form-control" id="example-fileinput" name="imagen" required>
                                            </div>
                                        </div>
                                    </div>
                              </center>

                          </div>

                          <div class="tab-pane fade" id="pills-pago" role="tabpanel" aria-labelledby="pills-pago-tab">
                              <center>
                                    <div class="form-group">
                                        <label>Referencia</label>
                                        <input type="text" class="form-control" name="referencia" required>
                                    </div>
                                    <div class="row">
                                        <?php $num=0; ?>
                                        @foreach($planesPago as $key)
                                            @if($num==0)
                                                <div class="col-md-6">
                                                    <div class="card shadow border card-tabla rounded" style="border-color: {{$key->color}} !important; height: 400px;">
                                                        <div class="card-body">
                                                            <div class="custom-control custom-radio mb-2">
                                                              <input type="radio" id="customRadio1" name="planP" value="{{$key->id}}" checked>
                                                            </div>
                                                           <h3>{{$key->nombre}}</h3>
                                                           <span>{{$key->dias}} dias</span>
                                                           <br>
                                                            <span style="font-size: 30px;">$</span><span style="font-size: 70px;">{{$key->monto}}</span><strong>/Mes</strong>
                                                           <br>
                                                           <center>
                                                            <img align="center" class="imagenAnun2" src="{{ asset($key->url_img) }}">
                                                           </center>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="col-md-6">
                                                    <div class="card shadow border card-tabla rounded" style="border-color: {{$key->color}} !important; height: 400px;">
                                                        <div class="card-body">
                                                            <div class="custom-control custom-radio mb-2">
                                                              <input type="radio" id="customRadio1" name="planP" value="{{$key->id}}">
                                                            </div>
                                                           <h3>{{$key->nombre}}</h3>
                                                           <span>{{$key->dias}} dias</span>
                                                           <br>
                                                            <span style="font-size: 30px;">$</span><span style="font-size: 70px;">{{$key->monto}}</span><strong>/Mes</strong>
                                                           <br>
                                                           <center>
                                                            <img align="center" class="imagenAnun2" src="{{ asset($key->url_img) }}">
                                                           </center>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            <?php $num++; ?>
                                        @endforeach()
                                    </div>
                              </center>

                          </div>
                        </div>
                        <center>
                            <div class="row">
                                <div class="col-md-12">
                                </div>
                            </div>
                        </center>
                        <div class="float-right">
                            <button type="submit" class="btn btn-success" >Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>




<!-- --------------------------------------------FIN REGISTRAR AnuncioS------------------------------------------------------ -->

{!! Form::open(['route' => ['empresas.store'],'method' => 'POST', 'name' => 'registrarEmpresa', 'id' => 'registrar_empresa', 'data-parsley-validate']) !!}
    @csrf 
    <div class="modal fade" id="NuevaEmpresa" role="dialog" style="border-radius: 30px !important;">
        <div class="modal-dialog modals-default">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Nueva Empresa</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <center>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <!-- <label for="nombre">Nombre</label> -->
                                    <input type="text" name="nombre" class="form-control border-info" required placeholder="Nombre de la empresa">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <input type="text" name="rut" placeholder="Rut de la empresa" minlength="7" maxlength="8" class="form-control border-info" required>
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div class="form-group">
                                    <div style="float: left !important;">
                                        <input type="number" name="verificador" min="1" minlength="1" maxlength="1" value="0" class="form-control border-info" max="9" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <!-- <label>Estado del Anuncio</label> -->
                                    <textarea class="form-control border-info" name="descripcion" placeholder="¿Alguna descripción sobre la empresa?" required></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="status">¿La empresa se registrará como activa?</label>
                                    <select class="form-control select2 border-info" required name="status">
                                        <option value="Activo" selected>Activo</option>
                                        <option value="Inactivo">Inactivo</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </center>
                    <div class="float-right">
                        <button type="submit" class="btn btn-success" >Agregar</button>
                    </div>
                </div>                            
            </div>
        </div>
    </div>
{!! Form::close() !!}


{!! Form::open(['route' => ['empresas.update',1], 'method' => 'PUT', 'name' => 'editar_empresa', 'id' => 'editar_empresa', 'data-parsley-validate']) !!}
    @csrf
    <div class="modal fade" id="editarEmpresa" role="dialog">
        <div class="modal-dialog modals-default">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Editar Empresa</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <center>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <!-- <label for="nombre">Nombre</label> -->
                                    <input type="text" name="nombre" class="form-control" required placeholder="Nombre de la empresa" id="nombreEmpresa_e">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <input type="text" name="rut" placeholder="Rut de la empresa" minlength="7" maxlength="8" class="form-control" required id="rutEmpresa_e">
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div class="form-group">
                                    <div style="float: left !important;">
                                        <input type="number" name="verificador" min="1" minlength="1" maxlength="1" value="0" class="form-control" max="9" required id="verificadorEmpresa_e">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <!-- <label>Estado del Anuncio</label> -->
                                    <textarea class="form-control" name="descripcion" placeholder="¿Alguna descripción sobre la empresa?" id="descripcionEmpresa_e"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="status">¿La empresa se registrará como activa?</label>
                                    <select class="form-control select2" required name="status" id="statusEmpresa_e">
                                        <option value="Activo">Activo</option>
                                        <option value="Inactivo">Inactivo</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </center>
                    <div class="float-right">
                        <input type="hidden" name="id" id="idEmpresa_e">
                        <button type="submit" class="btn btn-success" >Editar</button>
                    </div>
                </div>                            
            </div>
        </div>
    </div>
</form>
                
{!! Form::open(['route' => ['empresas.destroy',1033], 'method' => 'DELETE']) !!}
    @csrf 
    <div class="modal fade" id="eliminarEmpresa" role="dialog">
        <div class="modal-dialog modals-default">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Eliminar Empresa</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="modal-body">
                        <center>
                            <h3>¿Está seguro de querer eliminar esta empresa? Sus anuncios y pagos también serán eliminados. Esta opción no se podrá deshacer</h3>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="id" required id="idAnuncio">
                                    </div>
                                </div>
                            </div>
                        </center>
                    </div>
                    <div class="float-right">
                        <input type="hidden" name="id" id="id_empresa">
                        <button type="submit" class="btn btn-danger" >Eliminar</button>
                    </div>
                </div>                            
            </div>
        </div>
    </div>
{!! Form::close() !!} 

{!! Form::open(['route' => ['editar_orden_anuncio'], 'method' => 'GET', 'name' => 'editarOrdenAnuncio', 'id' => 'editarOrdenAnuncio', 'data-parsley-validate']) !!}
    @csrf
    <div class="modal fade" id="editarOAnuncio" role="dialog">
        <div class="modal-dialog modals-default">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Editar Orden de Pago</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <center>
                        <div class="form-group">
                            <label>Nro. Referencia</label>
                            <input type="text" name="referencia" id="referencia_e" class="form-control" required="">
                        </div>
                        <div class="row">
                            @foreach($planesPago as $key)
                                <div class="col-md-6">
                                    <div class="card shadow border card-tabla rounded" style="border-color: {{$key->color}} !important;">
                                        <div class="card-body">
                                            <div class="custom-control custom-radio mb-2">
                                              <input type="radio" id="customRadio1-{{$key->id}}" name="planP" value="{{$key->id}}">
                                            </div>
                                           <h3>{{$key->nombre}}</h3>
                                           <span>{{$key->dias}} dias</span>
                                           <br>
                                            <span style="font-size: 30px;">$</span><span style="font-size: 70px;">{{$key->monto}}</span><strong>/Mes</strong>
                                           <br>
                                           <center>
                                            <img align="center" class="imagenAnun2" src="{{ asset($key->url_img) }}">
                                           </center>
                                        </div>
                                    </div>
                                </div>
                            @endforeach()
                        </div>
                    </center>
                    <div class="float-right">
                        <input type="hidden" name="id" id="id_orden_pago">
                        <button type="submit" class="btn btn-success" >Actualizar</button>
                    </div>
                </div>                            
            </div>
        </div>
    </div>
</form>

@endsection

<script type="text/javascript">

    



    function select(accion, id, idem, tipo, status) {

        if (accion==1) {
            $('#VerAnuncio').modal('show');
            $('#ver_idem').val(idem);
            $('#ver_tipo').val(tipo);
            $('#ver_status').val(status);
        }
        if(accion==2){
            editar(id, idem, tipo, status);
            $('#editarAnuncio').modal('show');
        }
        if (accion==3) {
            $('#id').val(id);
            $('#eliminarAnuncio').modal('show');
        } else {

        }
    }

    // function eliminar(id) {
    //     $('#id').val(id);
    // }

    function mensual(accion, id) {

        $('#selectO').val(0);
        if (accion==1) {
            $('#SelectAnio1').val(0);
            $('#createMensualidad').modal('show');
            $('#buttonCreate').empty();
            $('#createMensuality1').empty();
            $('#createMensuality2').empty();
            $('#idCreateM').val(id);
            // $('#anioCreateM').val(anio);
        }
        if(accion==2){
            $('#SelectAnio2').val(0);
            $('#editMensuality1').empty();
            $('#editMensuality2').empty();
            $('#buttonEdit').empty();
            $('#editarMensualidad').modal('show');
            $('#idEditM').val(id);
            // $('#anioEditM').val(anio);
        }
        if (accion==3) {
            $('#deleteMensualidad').modal('show');
            $('#idDeleteM').val(id);
            // $('#anioDeleteM').val(anio);
        } 
        if (accion==4){
            $('#buttonShow').empty();
            $('#fechasM').empty();
            $('#MesesM').empty();
            $('#idShowM').val(id);
            $('#VerMensualidades').modal('show');

            $.get('Anuncios/'+id+'/buscar_anios', function(data) {
        
                beforeSend: $('#MesesM').append('Cargando...');
                complete: $('#MesesM').empty();
                    
                if (data.length > 0) {

                    $('#fechasM').append(
                        '<div class="row">'+
                            '<div class="col-md-12">'+
                                '<div class="form-group">'+
                                    '<label>Especifique el año para ver la mensualidad</label>'+
                                        '<select class="form-control" onchange="accionM(4,this.value);" id="verFechaMensual">'+
                                            '<option value="0">Seleccionar año</option>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                        '</div>'
                    );

                    for (var i = 0; i < data.length; i++) {
                        $('#verFechaMensual').append('<option value="'+data[i].anio+'">'+data[i].anio+'</option>');
                    }
                    
                }else
                    $('#fechasM').append('El Anuncio no posee mensualidades');

            });
        }else {

        }
    }


    function mostrarC(opcion) {
        if (opcion==1) {
            $('#createMensuality1').show();
            $('#createMensuality2').hide();
            $('#montoAnioC').attr('disabled',true);
            $('#accionCreate').val(1);
        } else {
            $('#createMensuality1').hide();
            $('#createMensuality2').show();
            $('#montoAnioC').attr('disabled',false);
            $('#accionCreate').val(2);
        }
    }

    function mostrarE(opcion) {
        if (opcion==1) {
            $('#montoAnio_e').attr('disabled',true);
            $('#editMensuality1').show();
            $('#editMensuality2').hide();
            $('#accionEdit').val(1);
        } else {
            $('#montoAnio_e').attr('disabled',false);
            $('#editMensuality1').hide();
            $('#editMensuality2').show();
            $('#accionEdit').val(2);
        }
    }

    function accionM(accion, anio) {

        var mes = ['','Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre',''];
        var f = new Date();
        var m = f.getMonth()+1;
        var a = f.getFullYear();

        if (accion == 1) {
            var id = $('#idCreateM').val();
            $('#anioCreateM').val(anio);

            $.get('Anuncios/'+id+'/'+anio+'/buscar_mensualidad', function(data) {
        

                $('#montoAnio').empty();
                $('#buttonCreate').empty();
                $('#createMensuality1').empty();
                $('#createMensuality2').empty();

                beforeSend: $('#createMensuality1').append('Cargando...');
                complete: $('#createMensuality1').empty();

                if (data.length > 0) {

                    
                    $('#createMensuality1').append('Ya existen registros para este año');
                    $('#buttonC').attr('disabled',true);

                }else{

                    $('#buttonCreate').append(
                        "<div class='card-box'>"+
                            "<div class='row'>"+
                                "<div class='col-md-6' width='100%'>"+
                                    "<a href='#' class='btn btn-block btn-success' onclick='mostrarC(1)'>Montos por mes</a>"+
                                "</div>"+
                                "<div class='col-md-6' width='100%'>"+
                                    "<a href='#' class='btn btn-block btn-warning' onclick='mostrarC(2)'>Monto por año</a>"+
                                "</div>"+
                            "</div>"+
                        "</div"
                    );
                    $('#createMensuality1').append('<label>Montos por mes</label><br>');

                    if(a == anio){
                        for (var i = 0; i < 13; i++) {
                        
                            if(i>=m){
                                $('#createMensuality1').append(
                                    '<div class="row">'+
                                        '<div class="col-md-4">'+
                                            '<div class="form-group">'+
                                                '<input type="hidden" name="mes[]" class="form-control-plaintext">'+
                                                '<label>'+mes[i]+'</label>'+
                                            '</div>'+
                                        '</div>'+
                                        '<div class="col-md-6">'+
                                            '<div class="form-group">'+
                                                '<div class="input-group mb-2">'+
                                                    '<div class="input-group-prepend">'+
                                                        '<div class="input-group-text">$</div>'+
                                                    '</div>'+
                                                    '<input type="number" name="monto[]" class="form-control" placeholder="10">'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'
                                );
                            }
                        }

                    }

                    else{
                        for (var i = 1; i < 13; i++) {
                            $('#createMensuality1').append(
                                '<div class="row">'+
                                    '<div class="col-md-4">'+
                                        '<div class="form-group">'+
                                            '<input type="hidden" name="mes[]" class="form-control-plaintext">'+
                                            '<label>'+mes[i]+'</label>'+
                                        '</div>'+
                                    '</div>'+
                                    '<div class="col-md-6">'+
                                        '<div class="form-group">'+
                                            '<div class="input-group mb-2">'+
                                                '<div class="input-group-prepend">'+
                                                    '<div class="input-group-text">$</div>'+
                                                '</div>'+
                                                '<input type="number" name="monto[]" class="form-control" placeholder="10">'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'
                            );
                        } 
                    }
                    $('#createMensuality2').append(
                        '<div class="row">'+
                            '<div class="col-md-12">'+
                                '<div class="form-group">'+
                                    '<label>Monto por todo el año</label>'+
                                    '<div class="input-group mb-2">'+
                                        '<div class="input-group-prepend">'+
                                            '<div class="input-group-text">$</div>'+
                                        '</div>'+
                                        '<input type="text" id="montoAnioC" name="montoaAnio" class="form-control" id="montoAnio_e" placeholder="10">'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                        '</div>'
                    );
                    $('#createMensuality2').css('display','none');

                    $('#buttonC').attr('disabled',false);
                }
            });

        }
        if (accion == 2) {

            var id = $('#idEditM').val();
            $('#anioEditM').val(anio);

            $.get('Anuncios/'+id+'/'+anio+'/buscar_mensualidad', function(data) {
        
                var m = f.getMonth()-1;
                $('#montoAnio').empty();
                $('#buttonEdit').empty();
                $('#editMensuality1').empty();
                $('#editMensuality2').empty();

                beforeSend: $('#editMensuality1').append('Cargando...');
                complete: $('#editMensuality1').empty();

                if (data.length == 0) {

                    $('#editMensuality1').append('No existen registros de este año para editar');
                    $('#buttonEdit').attr('disabled',true);

                }else{
                    var montoT=data.length-1;
                    $('#buttonEdit').append(
                        "<div class='card-box'>"+
                            "<div class='row'>"+
                                "<div class='col-md-6' width='100%'>"+
                                    "<a href='#' class='btn btn-block btn-success' onclick='mostrarE(1)'>Montos por mes</a>"+
                                "</div>"+
                                "<div class='col-md-6' width='100%'>"+
                                    "<a href='#' class='btn btn-block btn-warning' onclick='mostrarE(2)'>Monto por año</a>"+
                                "</div>"+
                            "</div>"+
                        "</div"
                    );
                    $('#editMensuality1').append('<label>Montos por mes</label><br>');

                    
                    for (var i = 0; i < data.length; i++) {
                            
                            console.log(i);
                            $('#editMensuality1').append(
                                '<div class="row">'+
                                    '<div class="col-md-4">'+
                                        '<div class="form-group">'+
                                            '<input type="hidden" value="'+data[i].mes+'" name="mes[]" class="form-control-plaintext">'+
                                            '<label>'+mes[data[i].mes]+'</label>'+
                                        '</div>'+
                                    '</div>'+
                                    '<div class="col-md-6">'+
                                        '<div class="form-group">'+
                                            '<div class="input-group mb-2">'+
                                                '<div class="input-group-prepend">'+
                                                    '<div class="input-group-text">$</div>'+
                                                '</div>'+
                                                '<input type="number" value="'+data[i].monto+'" name="monto[]" class="form-control" placeholder="10">'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'
                            );

                    }
                    $('#editMensuality2').append(
                        '<div class="row">'+
                            '<div class="col-md-12">'+
                                '<div class="form-group">'+
                                    '<label>Monto por todo el año</label>'+
                                    '<div class="input-group mb-2">'+
                                        '<div class="input-group-prepend">'+
                                            '<div class="input-group-text">$</div>'+
                                        '</div>'+
                                        '<input type="text" name="montoaAnio" value="'+data[montoT].monto+'" class="form-control" id="montoAnio_e" placeholder="10" disabled="disabled">'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                        '</div>'
                    );
                    $('#editMensuality2').css('display','none');

                    $('#buttonE').attr('disabled',false);
                }
            });
        }
        if (accion == 3) {

            $('#deleteMensuality').empty();
            var id = $('#idDeleteM').val();
            $('#anioDeleteM').val(anio);

            $.get('Anuncios/'+id+'/'+anio+'/buscar_mensualidad', function(data) {
        
                for (var i = 0; i < 13; i++) {
                    $('#montoMese_e'+i).empty();
                }
                $('#montoAnio_e').empty();

                beforeSend: $('#deleteMensuality').append('Cargando...');
                    
                if (data.length > 0) {

                    $('#deleteMensuality').empty();
                    $('#deleteMensuality').append('<h3>Existen registros para este año</h3><br><p>¿Eliminar mensualidad de este año? No habrá vuelta atrás</p>');
                    $('#buttonD').attr('disabled', false);

                }else{
                    $('#deleteMensuality').empty();
                    $('#deleteMensuality').append('No hay registros de este año');
                    $('#buttonD').attr('disabled', true);
                }


            });
        } 
        if (accion == 4){

            var id = $('#idShowM').val();
            $('#MesesM').empty();
            $.get('Anuncios/'+id+'/'+anio+'/buscar_mensualidad', function(data) {
        
                $('#buttonShow').empty();

                beforeSend: $('#MesesM').append('Cargando...');
                complete: $('#MesesM').empty();

                if (data.length > 0) {

                    var montoT=data.length-1;
                    // $('#buttonShow').append(
                    //     "<div class='card-box'>"+
                    //         "<div class='row'>"+
                    //             "<div class='col-md-6' width='100%'>"+
                    //                 "<a href='#' class='btn btn-success' onclick='mostrarS(1)'>Montos por mes</a>"+
                    //             "</div>"+
                    //             "<div class='col-md-6' width='100%'>"+
                    //                 "<a href='#' class='btn btn-warning' onclick='mostrarS(2)'>Monto por año</a>"+
                    //             "</div>"+
                    //         "</div>"+
                    //     "</div"
                    // );
                    $('#MesesM').append('<label>Montos por mes</label><br>');

                    
                    for (var i = 0; i < data.length; i++) {
                            
                        $('#MesesM').append(
                            '<div class="row">'+
                                '<div class="col-md-4">'+
                                    '<div class="form-group">'+
                                        '<button type="button" style="width=100% !important" class="btn btn-block btn-outline-info">'+mes[data[i].mes]+'</button>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="col-md-8">'+
                                    '<button class="btn btn-block btn-success" style="width=100% !important">$ <strong>'+data[i].monto+'</strong></button>'+
                                '</div>'+
                            '</div>'
                        );

                    }
                    $('#MesesM').append('<label>Montos por Año</label><br>');

                    $('#MesesM').append(
                        '<div class="row justify-content-center">'+
                            '<div class="col-md-4">'+
                                    '<button type="button" class="btn btn-block btn-outline-warning">'+anio+'</button>'+
                            '</div>'+
                            '<div class="col-md-8">'+
                                    '<button class="btn btn-block btn-warning" style="width=100% !important">$ <strong>'+data[montoT].monto+'</strong></button>'+
                                '</div>'+
                        '</div>'
                    );
                    $('#editMensuality2').css('display','none');

                    $('#buttonE').attr('disabled',false);
                }
            });
        }
    }

    function editar(id, idem, tipo,status) {

        $('#id_e').val(id);
        $('#idem').val(idem);
        $('#tipo').val(tipo);
        $('#status_e').val(status);
    }

    function opcion(opcion) {
        var f = new Date();
        var anio=f.getFullYear();
        // var mes=['','Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
        $('#opcion').val(opcion);
        $('#opcion_e').val(opcion);

        if (opcion==2) {
            for (var i = 0; i < 13; i++) {
                $('#montoMeses'+i).prop('disabled',true).val(null).prop('required',false);
            }
            $('#montoAnio').prop('disabled',false).prop('required',true);
        }else {
            for (var i = 0; i < 13; i++) {
                $('#montoMeses'+i).prop('disabled',false).val(null).prop('required',true);
            }
            $('#montoAnio').prop('disabled',true).val(null).prop('required',false);
        }

    }

    function VerTabla(opcion) {
        $('#tituloP').hide();
        $('#tituloP1').hide();
        $('#tituloP2').hide();
        $('#tituloP3').hide();
               
        $('#VerTabla1').hide();
        $('#VerTabla2').hide();
        $('#VerTabla3').hide();

        if (opcion == 1) {
            $("#tablaEmpresas").fadeOut("slow",
                function() {
                    $(this).hide();
                    $("#tablaControl").fadeOut("slow");
                    $("#tablaAnucios")
                        .css('opacity', 0)
                        .slideDown('slow')
                        .animate(
                            { opacity: 1 },
                            { queue: false, duration: 'slow' }
                        );
                    $('#tituloP1').fadeIn(300);
                    $('#VerTabla2').show();
                    $('#VerTabla2').removeClass("col-md-4").addClass("col-md-6");
                    $('#VerTabla3').show();
                    $('#VerTabla3').removeClass("col-md-4").addClass("col-md-6");
                });


        }else if(opcion == 2){
            $("#tablaAnucios").fadeOut("slow",
                function() {
                    $(this).hide();
                    $("#tablaControl").fadeOut("slow");
                    $("#tablaEmpresas")
                        .css('opacity', 0)
                        .slideDown('slow')
                        .animate(
                            { opacity: 1 },
                            { queue: false, duration: 'slow' }
                        );
                    $('#tituloP2').fadeIn(300);
                });

            $('#VerTabla1').show();
            $('#VerTabla1').removeClass("col-md-4").addClass("col-md-6");
            $('#VerTabla3').show();
            $('#VerTabla3').removeClass("col-md-4").addClass("col-md-6");
        }else{
            $("#tablaAnucios").fadeOut("slow",
                function() {
                    $(this).hide();
                    $("#tablaEmpresas").fadeOut("slow");
                    $("#tablaControl")
                        .css('opacity', 0)
                        .slideDown('slow')
                        .animate(
                            { opacity: 1 },
                            { queue: false, duration: 'slow' }
                        );
                    $('#tituloP3').fadeIn(300);
                });
            $('#tituloP3').show();
            $('#VerTabla1').show();
            $('#VerTabla1').removeClass("col-md-4").addClass("col-md-6");
            $('#VerTabla2').show();
            $('#VerTabla2').removeClass("col-md-4").addClass("col-md-6");
        }
    }

    function editarEmpresa(id, nombre, rut, descripcion, status) {
        $('#idEmpresa_e').val(id);
        $('#nombreEmpresa_e').val(nombre);

        $('#rutEmpresa_e').val(rut.substr(0,(rut.length-2)));
        $('#verificadorEmpresa_e').val(rut.substr(-1,(rut.length)));

        $('#descripcionEmpresa_e').val(descripcion);
        $('#statusEmpresa_e').val(status);

        $('#editarEmpresa').modal('show');
    }

    function eliminarEmpresa(id) {
        $('#id_empresa').val(id);
        $('#eliminarEmpresa').modal('show');
    }
    function editarPagoPublcidad(id,referencia,id_planP) {
        $('#editarOAnuncio').modal('show');
        $('#referencia_e').val(referencia);
        $('#customRadio1-'+id_planP).prop('checked', true);
        $('#id_orden_pago').val(id);
    }

    function verInfoControl(id,opcion,status) {

        if (opcion == 1) {
            $('.verDatosPagoA'+id).fadeIn(300);
            $('#tablaCC'+id).removeClass("border-success").removeClass("border-danger").addClass("border-info");
        }else{
            $('.verDatosPagoA'+id).fadeOut('slow');
            if (status == 'Activo') {
                $('#tablaCC'+id).removeClass("border-info").addClass("border-success");
            }else{
                $('#tablaCC'+id).removeClass("border-info").addClass("border-danger");
            }
        }
    }
    
</script>

