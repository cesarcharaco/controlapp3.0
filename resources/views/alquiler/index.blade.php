@extends('layouts.app')

@section('content')



    <style type="text/css">
      .seccionControl,#seccionControl1,#seccionControl2,#seccionControl3,#seccionControl4,#seccionControl5,#seccionControl6{
        display: none;
      }
    </style>






     <style type="text/css">
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
        .palabraVerAlquiler2, .palabraVerEstaciona2,.PalabraEditarPago2, .tituloTabla2
        {
            display: none;
        }
        @media only screen and (max-width: 800px)  {

            .PalabraEditarPago, .PalabraRealizarPago, .PalabraPagoConfirmar{
                display: none;
            }
            .palabraVerAlquiler{
                display: none;
            }
            .palabraVerAlquiler2{
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
        }


    </style>
    <input type="hidden" id="colorView" value="#CB8C4D !important">
    <div class="row page-title" id="tituloP">
        <div class="col-md-12">
            <nav aria-label="breadcrumb" class="float-right mt-1">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Alquiler</li>
                </ol>
            </nav>
            <h4 class="mb-1 mt-0">Alquiler</h4>
        </div>
    </div>
    <div class="row page-title" style="display: none;" id="tituloP1">
        <div class="col-md-12">
            <nav aria-label="breadcrumb" class="float-right mt-1">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Instalaciones</li>
                </ol>
            </nav>
            <h4 class="mb-1 mt-0">Instalaciones</h4>
        </div>
    </div>
    <div class="row page-title" style="display: none;" id="tituloP2">
        <div class="col-md-12">
            <nav aria-label="breadcrumb" class="float-right mt-1">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Arrendamientos</li>
                </ol>
            </nav>
            <h4 class="mb-1 mt-0">Arrendamientos</h4>
        </div>
    </div>
    <div class="row page-title" style="display: none;" id="tituloP3">
        <div class="col-md-12">
            <nav aria-label="breadcrumb" class="float-right mt-1">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ url('anuncios') }}">Control</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Control y Agenda</li>
                </ol>
            </nav>
            <h4 class="mb-1 mt-0">Control y Agenda</h4>
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

    <div id="tablaInstalaciones" style="display: none;">
        <div class="card border border-info rounded card-tabla shadow p-3 mb-5 bg-white rounded tabla-estilo">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12 offset-md-12">
                            <a class="btn btn-success boton-tabla shadow" onclick="crearInstalacion()" style="
                                border-radius: 10px;
                                color: white;
                                height: 35px;
                                margin-bottom: 5px;
                                margin-top: 5px;
                                float: right;">
                                <span class="PalabraEditarPago ">Nueva Instalación</span>
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
                                        <span class="text-dark p-1 mb-1"><strong>Aviso: </strong><br>-Seleccione una instalación para ver mas opciones.</span>
                                    </div>
                                </td>
                                <td colspan="1"></td>
                            </tr>
                            <tr class="bg-primary text-white" id="th2" style="display: none">
                                <th width="10"></th>
                                <th>
                                    <span class="PalabraEditarPago">Nombre</span>
                                    <span class="PalabraEditarPago2">N</span>
                                </th>
                                <th colspan="2">
                                    <center>
                                        <span class="PalabraEditarPago">Opciones</span>
                                        <span class="PalabraEditarPago2">O</span>
                                    </center>
                                </th>
                                <th>
                                    <span class="PalabraEditarPago">Dias</span>
                                    <span class="PalabraEditarPago2">D</span>
                                </th>
                            </tr>
                            <tr class="bg-info text-white" id="th1">
                                <th>#</th>
                                <th>
                                    <span class="tituloTabla">Nombre</span>
                                    <span class="tituloTabla2">T</span>
                                </th>
                                <th>
                                    <span class="tituloTabla">Horario Disponible</span>
                                    <span class="tituloTabla2">@</span>
                                </th>
                                <!-- <th>Estacionamientos</th> -->
                                <th>
                                    <span class="tituloTabla">Max. personas</span>
                                    <span class="tituloTabla2">S</span>
                                </th>
                                <th>
                                    <span class="tituloTabla">Status</span>
                                    <span class="tituloTabla2">S</span>
                                </th>
                                <!-- <th>Mensualidades</th> -->
                            </tr>
                            @foreach($instalaciones as $key)
                                <tr id="vista1-{{$key->id}}" onclick="opcionesTabla(1,'{{$key->id}}')">
                                    <td>{{$key->id}}</td>
                                    <td>{{$key->nombre}}</td>
                                    <td>
                                        <ul>
                                        @foreach($key->dias as $key2)
                                            <li>{{ $key2->dia }}</li>
                                        @endforeach
                                        </ul>
                                    </td>
                                    <td>{{$key->max_personas}}</td>
                                    <td>{{$key->status}}</td>
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
                                        
                                        <span>{{$key->nombre}}</span>
                                    </td>
                                    <td style="display: none;">
                                    </td>
                                    <td colspan="2" align="center">

                                        <a href="#" class="btn btn-warning btn-sm boton-tabla shadow botonesEditEli" style="border-radius: 5px;" onclick="editarInstalacion('{{$key->id}}','{{$key->nombre}}','{{$key->id_dia}}','{{$key->hora_desde}}','{{$key->hora_hasta}}','{{$key->max_personas}}','{{$key->status}}')">

                                            <span class="PalabraEditarPago "><strong>Editar</strong></span>
                                            <center>
                                                <span class="PalabraEditarPago2 ">
                                                    <strong><i data-feather="edit" class="iconosMetaforas2"></i></strong>
                                                </span>
                                            </center>
                                        </a>

                                        <a href="#" class="btn btn-warning btn-sm boton-tabla shadow botonesEditEli" style="border-radius: 5px;" onclick="eliminarInstalacion('{{$key->id}}')">
                                            <span class="PalabraEditarPago ">Desactivar</span>
                                            <center>
                                                <span class="PalabraEditarPago2 ">
                                                    <i data-feather="trash" class="iconosMetaforas2"></i>
                                                </span>
                                            </center>
                                        </a>
                                    </td>
                                    <td>
                                        @foreach($key->dias as $key2)
                                            <li>{{ $key2->dia }}</li>
                                        @endforeach
                                    </td>
                                    

                                </tr>
                                <tr style="display: none;">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @endforeach
                        </thead>
                        <tbody>



                        </tbody>
                    </table>
                </div>
                <div class="col-md-4">
                    <div class="vistaColumnaInstalaciones nuevoArriendo2 border shadow" align="center" id="crearInstalacion" style="border-radius: 30px !important;">
                        <div class="card-body">
                          {!! Form::open(['route' => ['alquiler.store'], 'enctype' => 'multipart/form-data', 'method' => 'POST', 'name' => 'registrar_instalacion', 'id' => 'registrar_instalacion', 'data-parsley-validate']) !!}
                              @csrf
                            <h3 align="center" style="
                              color: gray;
                                font: 18px Arial, sans-serif;">
                                Nueva Instalación
                              </h3>
                              <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" name="nombre" class="form-control" required placeholder="Instalación 1" required>
                              </div>
                              <div class="form-group card shadow" style="border-radius: 30px !important;">
                                <div class="card-body">
                                  
                                  <label>Horario de disponibilidad</label>
                                  <br>
                                  <i data-feather="minus"></i>
                                  <!-- <div class="button-list">
                                    <button type="button" class="btn btn-primary" onclick="diaNegocio(1)" id="horarioBotonDia1">Lunes</button>
                                    <button type="button" class="btn btn-primary" onclick="diaNegocio(2)" id="horarioBotonDia2">Martes</button>
                                    <button type="button" class="btn btn-primary" onclick="diaNegocio(3)" id="horarioBotonDia3">Miércoles</button>
                                    <button type="button" class="btn btn-primary" onclick="diaNegocio(4)" id="horarioBotonDia4">Jueves</button>
                                    <button type="button" class="btn btn-primary" onclick="diaNegocio(5)" id="horarioBotonDia5">Viernes</button>
                                    <button type="button" class="btn btn-primary" onclick="diaNegocio(6)" id="horarioBotonDia6">Sábado</button>
                                    <button type="button" class="btn btn-primary" onclick="diaNegocio(7)" id="horarioBotonDia7">Domingo</button>
                                  </div> -->
                                  <div class="form-group">
                                      <select name="id_dia[]" id="id_dia" class="form-control select2" multiple="multiple" required>
                                          @foreach($dias as $key)
                                            <option value="{{$key->id}}">{{$key->dia}}</option>
                                          @endforeach
                                      </select>
                                  </div>
                                  <br>
                                  <div class="row justify-content-center">
                                    <div class="col-md-12">
                                      <div class="form-group" align="center">
                                        <label>Desde</label>
                                        <input class="form-control" id="example-time" type="time" name="hora_desde">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row justify-content-center">
                                    <div class="col-md-12">
                                    </div>
                                    <div class="col-md-12">
                                      <div class="form-group" align="center">
                                        <label>Hasta</label>
                                        <input class="form-control" id="example-time" type="time" name="hora_hasta">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <label>Nro. máximo de personas</label>
                                <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
                                  <span class="input-group-addon bootstrap-touchspin-prefix input-group-prepend">
                                    <span class="input-group-text" style="width:39px; height:39px;">
                                      <i data-feather="users"></i>
                                    </span>
                                  </span>
                                  <input name="max_personas" min="1" minlength="1" max="50" data-toggle="touchspin" type="number" data-bts-prefix="$" class="form-control" placeholder="7" required>
                                </div>
                              </div>
                              <div class="form-group">
                                  <label>Status</label>
                                  <select name="status" class="form-control select2" id="status_PlanP">
                                    <option value="Activo">Activo</option>
                                    <option value="Inactivo">Inactivo</option>
                                  </select>
                              </div>
                              <!-- <label>Plan dirigido a:</label>
                              <div class="row justify-content-center">
                                <div class="col-md-6" align="center">
                                  <h3 align="center" style="color: gray; font: 18px Arial, sans-serif;">Anuncios</h3>
                                  <div class="custom-control custom-radio">
                                                  <input type="radio" id="customRadio1" name="tipo" value="Anuncio" checked>
                                              </div>
                                  <div class="border border-success p-3 shadow" align="center" style="

                                  background-image: url('{{ asset('assets/images/planes_p/anuncios.jpg') }}');
                                            background-position: center;
                                            background-repeat: no-repeat;
                                            background-size: cover;

                                  border-radius: 10px !important;
                                  height: 130px !important;
                                  width: 130px !important;">
                                  </div>
                                </div>
                                <div class="col-md-6" align="center">
                                  <h3 align="center" style="color: gray; font: 18px Arial, sans-serif;">Alquiler</h3>
                                  <div class="custom-control custom-radio">
                                                  <input type="radio" id="customRadio2" name="tipo" value="Alquiler">
                                              </div>
                                  <div class="border border-success p-3 shadow" align="center" style="

                                  background-image: url('{{ asset('assets/images/planes_p/alquiler.jpg') }}');
                                            background-position: center;
                                            background-repeat: no-repeat;
                                            background-size: cover;

                                  border-radius: 10px !important;
                                  height: 130px !important;
                                  width: 130px !important;">
                                  </div>
                                </div>
                              </div> -->
                              
                            <button type="submit" class="btn btn-success">Agregar</button>
                          {!! Form::close() !!}
                        </div>
                    </div>
                    <div class="vistaColumnaInstalaciones editarArriendo border border-warning shadow" id="editarInstalacion" style="display: none; border-radius: 30px !important;">
                        <div class="card-body">
                          {!! Form::open(['route' => ['editar_instalacion'], 'enctype' => 'multipart/form-data', 'method' => 'POST', 'name' => 'update_instalacion', 'id' => 'update_instalacion', 'data-parsley-validate']) !!}
                              @csrf
                            <h3 align="center" style="
                              color: gray;
                                font: 18px Arial, sans-serif;">
                                Editar Instalación
                              </h3>
                              <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" name="nombre" class="form-control" required placeholder="Instalación 1" required id="nombreInstalacion">
                              </div>
                              <div class="form-group card shadow" style="border-radius: 30px !important;">
                                <div class="card-body">
                                  
                                  <label>Horario de disponibilidad</label>
                                  <br>
                                  <i data-feather="minus"></i>
                                  <div class="form-group">
                                    <select name="id_dia[]" id="id_diaInstalaciones" class="form-control select2" multiple="multiple" required>
                                        @foreach($dias as $key)
                                            <option value="{{$key->id}}">{{$key->dia}}</option>
                                        @endforeach
                                    </select>
                                  </div>
                                  <br>
                                  <div class="row justify-content-center">
                                    <div class="col-md-6">
                                      <div class="form-group" align="center">
                                        <label>Desde</label>
                                        <input class="form-control" type="time" name="hora_desde" id="desdeInstalacion">
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group" align="center">
                                        <label>Hasta</label>
                                        <input class="form-control" type="time" name="hora_hasta" id="hastaInstalacion">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <label>Nro. máximo de personas</label>
                                <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
                                  <span class="input-group-addon bootstrap-touchspin-prefix input-group-prepend">
                                    <span class="input-group-text" style="width:39px; height:39px;">
                                      <i data-feather="users"></i>
                                    </span>
                                  </span>
                                  <input name="max_personas" min="1" minlength="1" max="50" data-toggle="touchspin" type="number" data-bts-prefix="$" class="form-control" placeholder="7" required id="npersonasInstalacion">
                                </div>
                              </div>
                              <div class="form-group">
                                  <label>Status</label>
                                  <select name="status" class="form-control select2" id="status_PlanP" id="statusInstalacion">
                                    <option value="Activo">Activo</option>
                                    <option value="Inactivo">Inactivo</option>
                                  </select>
                              </div>
                              
                              <input type="hidden" name="id" id="idInstalacion">
                            <button type="submit" class="btn btn-warning">Editar</button>
                          {!! Form::close() !!}
                        </div>
                    </div>
                    <div class="vistaColumnaInstalaciones EliminarArriendo border border-warning shadow" id="EliminarInstalacion" style="display: none; border-radius: 30px !important;">
                        <div class="card-body">
                          
                          {!! Form::open(['route' => ['desactivar_instalacion'], 'method' => 'POST']) !!}
                            @csrf
                            <h3>Desactivar instalacion</h3> 
                            Se DESACTIVARÁN, NO se ELIMINARÁN los datos de la instalación. Se cambiará el status a Inactivo.
                            <div class="float-right">
                              <input type="hidden" name="id" class="id_instalacionE" id="id_instalacionE">
                              <button type="submit" class="btn btn-warning btn-sm">Desactivar</button>
                            </div>
                          {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="tablaArriendos" style="display: none;">
        <div class="card border border-info rounded card-tabla shadow p-3 mb-5 bg-white rounded tabla-estilo">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12 offset-md-12">
                            <a class="btn btn-success boton-tabla shadow" onclick="nuevoArriendo()" style="
                                border-radius: 10px;
                                color: white;
                                height: 35px;
                                margin-bottom: 5px;
                                margin-top: 5px;
                                float: right;">
                                <span class="PalabraEditarPago ">Nuevo Arrendamiento</span>
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
                    <!-- <div class="card border border-primary rounded card-tabla shadow p-3 mb-5 bg-white rounded tabla-estilo">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Dias</label>
                                        <select class="form-control select2" name="dia">
                                            <?php $d=0; ?>
                                            @foreach($dias as $key)
                                                @foreach($dias2 as $key2)
                                                    @if($key->id == $key2->id)
                                                        <option value="{{$key2->id}}">{{$key->dia}}</option>
                                                    @endif
                                                @endforeach()
                                            @endforeach()
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Fechas</label>
                                        <select class="form-control select2" name="fechas">
                                            <?php $f=0; ?>
                                            @for($i=0; $i< count($alquiler); $i++)
                                                @php $f=$alquiler[$i]->created_at->year @endphp

                                                @if($alquiler[$i]->created_at->year == $f)
                                                    <option value="{{$f}}">{{$f}}</option>
                                                    $f++;
                                                @else
                                                    <option value="{{$f}}">{{$f}}</option>
                                                @endif
                                            @endfor()
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Horas</label>
                                        <select class="form-control select2" name="horas">
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tipo de Alquiler</label>
                                            <select class="form-control select2" id="tipo_alquiler" name="tipo_alquiler" onchange="TipoAlquiler(this.value)" required>
                                                <option value="Permanente">Permanente</option>
                                                <option value="Temporal">Temporal</option>
                                            </select>
                                        </div>
                                </div>
                            </div>
                            <center>
                                <a href="#vistaArriendo" class="btn btn-info">Buscar</a>
                            </center>
                        </div>
                    </div> -->
                    <table class="table dataTable data-table-basic table-curved table-striped tabla-estilo" style="width: 100%;">
                         <thead id="vistaArriendo">
                            <tr class="table-default text-white">
                                <td colspan="1"></td>
                                <td colspan="3" align="center">
                                    <div class="card border border-info" style="background-color: #D6EAF8" role="alert">
                                        <span class="text-dark p-1 mb-1"><strong>Aviso: </strong><br>-Seleccione una instalación para ver mas opciones.</span>
                                    </div>
                                </td>
                                <td colspan="1"></td>
                            </tr>
                            <tr class="bg-primary text-white" class="th2" style="display: none">
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
                            <tr class="bg-info text-white" class="th1">
                                <th>#</th>
                                <th>
                                    <span class="tituloTabla">Residente</span>
                                    <span class="tituloTabla2">Re</span>
                                </th>
                                <th>
                                    <span class="tituloTabla">Instalación</span>
                                    <span class="tituloTabla2">ins</span>
                                </th>
                                <!-- <th>Estacionamientos</th> -->
                                <th>
                                    <span class="tituloTabla">Tipo de alquiler</span>
                                    <span class="tituloTabla2">TA</span>
                                </th>
                                <th>
                                    <span class="tituloTabla">Fecha</span>
                                    <span class="tituloTabla2">F</span>
                                </th>
                                <th>
                                    <span class="tituloTabla">Hora</span>
                                    <span class="tituloTabla2">H</span>
                                </th>
                                <!-- <th>Mensualidades</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($alquiler as $key)
                                <tr id="vista1-{{$key->id}}" onclick="opcionesTabla(1,'{{$key->id}}')">
                                    <td>{{$key->id}}</td>
                                    <td>{{$key->residente->nombres}}</td>
                                    <td>{{$key->instalacion->nombre}}</td>
                                    <td>{{$key->tipo_alquiler}}</td>
                                    <td>{{$key->fecha}}</td>
                                    <td>{{$key->hora}}</td>
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
                                        <span>{{$key->residente->nombres}}</span><br>
                                    </td>
                                    <td>
                                        <span>{{$key->instalacion->nombre}}</span>
                                    </td>
                                    <td>
                                        <span>{{$key->tipo_alquiler}}</span>
                                    </td>
                                    <td colspan="2" align="center">
                                        @foreach($key->pagos_has_alquiler as $key2)
                                            <a href="#" class="btn btn-warning btn-sm boton-tabla shadow botonesEditEli" style="border-radius: 5px;" onclick="editarArriendo(
                                                    '{{$key->id}}',
                                                    '{{$key->id_residente}}',
                                                    '{{$key->id_instalacion}}',
                                                    '{{$key->tipo_alquiler}}',
                                                    '{{$key->fecha}}',
                                                    '{{$key->hora}}',
                                                    '{{$key->num_horas}}',
                                                    '{{$key->status}}',
                                                    '{{$key2->status}}',
                                                    '{{$key2->referencia}}',
                                                    '{{$key2->id_planesPago}}'
                                                )">
                                                <span class="PalabraEditarPago "><strong>Editar</strong></span>
                                                <center>
                                                    <span class="PalabraEditarPago2 ">
                                                        <strong><i data-feather="edit" class="iconosMetaforas2"></i></strong>
                                                    </span>
                                                </center>
                                            </a>
                                        @endforeach()

                                        <a href="#" class="btn btn-danger btn-sm boton-tabla shadow botonesEditEli" style="border-radius: 5px;" onclick="eliminarArriendo('{{$key->id}}','{{$key->id_instalacion}}')">
                                            <span class="PalabraEditarPago ">Eliminar</span>
                                            <center>
                                                <span class="PalabraEditarPago2 ">
                                                    <i data-feather="trash" class="iconosMetaforas2"></i>
                                                </span>
                                            </center>
                                        </a>
                                    </td>
                                    

                                </tr>
                                <tr style="display: none;">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-4">
                  <div class="vistaColumnaArriendos EliminarArriendo border border-danger shadow" id="EliminarArriendo" style="display: none; border-radius: 30px !important;">
                        <div class="card-body">
                          
                          {!! Form::open(['route' => ['eliminar_alquiler'], 'method' => 'POST']) !!}
                            @csrf
                            <h3>¿Está realmente seguro de querer eliminar este Arriendo?</h3> 
                            Se eliminarán todos los datos y pagos relacionados a este arriendo.
                            <div class="float-right">
                              <input type="text" name="id" class="id_ArriendoE" id="id_ArriendoE">
                              <input type="text" name="id_instalacion" class="id_ArriendoE" id="id_instalacion">
                              <button type="submit" class="btn btn-danger">Eliminar</button>
                            </div>
                          {!! Form::close() !!}
                        </div>
                  </div>
                </div>
            </div>
        </div>
    </div>

    <div id="tablaControl" style="display: none;">
        <div class="card border border-info rounded card-tabla shadow p-3 mb-5 bg-white rounded tabla-estilo">
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3" align="right">
                        <div class="row">
                            <div class="col-md-12 offset-md-12">
                                <a class="btn btn-danger boton-tabla shadow" onclick="crearIncidencia()" style="
                                    border-radius: 10px;
                                    color: white;
                                    height: 35px;
                                    margin-bottom: 5px;
                                    margin-top: 5px;
                                    float: right;">
                                    <span class="PalabraEditarPago ">¿Algún problema?</span>
                                    <center>
                                        <span class="PalabraEditarPago2 ">
                                            <i data-feather="plus" class="alert-octagon"></i>
                                        </span>
                                    </center>
                                </a>
                            </div>
                        </div>
                        <div class="form-group card shadow" style="border-radius: 30px !important;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card shadow card-tabla border border-success">
                                                    <div class="card-body">
                                                        <table class="tablaControl table table-striped tabla-estilo">
                                                            <thead>
                                                                <tr align="center">
                                                                    <th colspan="2">Estado de alquileres</th>
                                                                </tr>
                                                                <tr align="center">
                                                                    <th align="center">Activos</th>
                                                                    <th align="center">Inactivos</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                    $alquilerA=0;
                                                                    $alquilerI=0;
                                                                ?>
                                                                @foreach($alquiler as $key)
                                                                    @if($key->status == 'Activo')
                                                                        @php $alquilerA++; @endphp
                                                                    @else
                                                                        @php $alquilerI++; @endphp
                                                                    @endif
                                                                @endforeach()
                                                                <tr align="center">
                                                                    <td>
                                                                        {{ $alquilerA }}
                                                                    </td>
                                                                    <td>
                                                                        {{ $alquilerI }}
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card shadow card-tabla border border-success">
                                                    <div class="card-body">
                                                        <table class="tablaControl table table-striped tabla-estilo">
                                                            <thead>
                                                                <tr align="center">
                                                                    <th colspan="3">Nro. de alquileres por año</th>
                                                                </tr>
                                                                <tr align="center">
                                                                    <th align="center">{{ date('Y') }}</th>
                                                                    <th align="center">{{ date('Y')-1 }}</th>
                                                                    <th align="center">{{ date('Y')-2 }}</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr align="center">
                                                                    
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card shadow card-tabla border border-success">
                                                    <div class="card-body">
                                                        <table class="tablaControl table table-striped tabla-estilo">
                                                            <thead>
                                                                <tr align="center">
                                                                    <th colspan="2">Estado de instalaciones</th>
                                                                </tr>
                                                                <tr align="center">
                                                                    <th align="center">Activos</th>
                                                                    <th align="center">Inactivos</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                    $instalaA=0;
                                                                    $instalaI=0;
                                                                ?>
                                                                @foreach($instalaciones as $key)
                                                                    @if($key->status == 'Activo')
                                                                        @php $instalaA++; @endphp
                                                                    @else
                                                                        @php $instalaI++; @endphp
                                                                    @endif
                                                                @endforeach()
                                                                <tr align="center">
                                                                    <td>
                                                                        {{ $instalaA }}
                                                                    </td>
                                                                    <td>
                                                                        {{ $instalaI }}
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{--<div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card shadow card-tabla border border-success">
                                                    <div class="card-body">
                                                        <canvas id="myChart"></canvas>
                                                        <table class="tablaControl table table-striped tabla-estilo">
                                                            <thead>
                                                                <tr align="center">
                                                                    <th colspan="3">Total de ingresos</th>
                                                                </tr>
                                                                <tr align="center">
                                                                    <th align="center">{{ date('Y') }}</th>
                                                                    <th align="center">{{ date('Y')-1 }}</th>
                                                                    <th align="center">{{ date('Y')-2 }}</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr align="center">
                                                                    
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-4 center" id="VerTabla1">
            <a href="#" onclick="VerTabla(1)" id="verTabla2-1" style="display: none; width: 100%;">
                <div class="card border border-dark shadow rounded m-7" style="height: 400px;
                background-image: url('{{ asset('assets/images/alquiler/instalaciones.jpg') }}');
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
                ">
                    <div class="card-header">
                        <h3 align="right" class="text-warning" >INSTALACIONES</h3>
                    </div>
                    <div class="card-body p-3 mb-5 ">
                    </div>
                    <div class="card-footer">
                        <strong class="text-warning">Visualizar las instalaciones de la App.</strong>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 center" id="VerTabla2">
            <a href="#" onclick="VerTabla(2)" id="verTabla2-2" style="display: none; width: 100%;">
                <div class="card border border-dark shadow rounded m-7" style="height: 400px;
                background-image: url('{{ asset('assets/images/alquiler/arrendamiento.jpg') }}');
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
                ">
                    <div class="card-header">
                        <h3 align="right" class="text-warning" >ARRENDAMIENTOS</h3>
                    </div>
                    <div class="card-body p-3 mb-5 ">
                    </div>
                    <div class="card-footer">
                        <strong class="text-warning">Visionar los arrendamientos registradas</strong>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 center" id="VerTabla3">
            <a href="#" onclick="VerTabla(3)" id="verTabla2-3" style="display: none; width: 100%;">
                <div class="card border border-dark shadow rounded m-7" style="height: 400px;
                background-image: url('{{ asset('assets/images/alquiler/controlhorario.jpg') }}');
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
                ">
                    <div class="card-header">
                        <h3 align="right" class="text-warning" >AGENDA Y CONTROL</h3>
                    </div>
                    <div class="card-body p-3 mb-5 ">
                    </div>
                    <div class="card-footer">
                        <strong class="text-warning">Gestionar el Control, arrendamientos, tiempo, horarios y agendas a Visualizar en la App.</strong>
                    </div>
                </div>
            </a>
        </div>
    </div>

    

    
    {!! Form::open(['route' => ['registrar_incidencia'], 'enctype' => 'multipart/form-data', 'method' => 'POST', 'name' => 'registrar_incidencia', 'id' => 'registrar_incidencia', 'data-parsley-validate']) !!}
        @csrf
        <div class="modal fade" id="crearIncidencia" role="dialog">
            <div class="modal-dialog modals-default border border-danger">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Reportar incidencia</h4>
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Las indicidencias se agragarán como recargas a los residentes por daños en los equipos e instalaciones</p>
                        <center>
                            <div class="form-group">
                                <label>Residente</label>
                                <select class="form-control select2" id="id_residente" onchange="buscarTodo(this.value)" name="id_residente" required>
                                    <option value="0" selected disabled>Seleccione residente</option>
                                    @foreach($residentes as $key)
                                        <option value="{{$key->id}}">{{$key->nombres}} {{$key->apellidos}} - {{$key->rut}}</option>
                                    @endforeach()
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Motivo</label>
                                <input type="text" name="motivo" class="form-control" required placeholder="Romper ventanas de la oficina">
                            </div>
                            <div class="form-group">
                                <label>Observación (Opcional)</label>
                                <textarea class="form-control" name="observacion" placeholder="¿Algo que desee acotar?"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Monto</label>
                                <input type="number" name="monto" class="form-control" placeholder="15000" required>
                        </center>
                        <div align="center">
                            <button type="submit" class="btn btn-danger">Guardar incidencia</button>
                        </div>
                    </div>                            
                </div>
            </div>
        </div>
    {!! Form::close() !!}

    {!! Form::open(['route' => ['registrar_alquiler'], 'enctype' => 'multipart/form-data', 'method' => 'POST', 'name' => 'registrar_alquiler', 'id' => 'registrar_alquiler', 'data-parsley-validate']) !!}
        @csrf
        <div class="modal fade" id="nuevoArriendo" role="dialog">
            <div class="modal-dialog modals-default border border-primary rounded">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Nuevo Arriendo</h4>
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
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-pago" role="tab" aria-controls="pills-datos" aria-selected="false">2</a>
                          </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                <center>
                                  <div class="form-group">
                                    <label>Residente</label>
                                    <select class="form-control select2" id="id_residente" onchange="buscarTodo(this.value)" name="id_residente" required>
                                        <option value="0" selected disabled>Seleccione residente</option>
                                        @foreach($residentes as $key)
                                            <option value="{{$key->id}}">{{$key->nombres}} {{$key->apellidos}} - {{$key->rut}}</option>
                                        @endforeach()
                                    </select>
                                  </div>
                                   <div class="form-group">
                                    <label>Instalación</label>
                                    <select class="form-control select2" id="instalacionList" name="id_instalacion">
                                        <option value="0" selected disabled required>Seleccione instalación</option>
                                        @foreach($instalaciones as $key)
                                        @if($key->status=="Activo")
                                            <option value="{{$key->id}}">{{$key->nombre}} - Dias disponible:@foreach($key->dias as $key2) {{$key2->dia}} @endforeach - {{$key->status}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label>Tipo de Alquiler</label>
                                    <select class="form-control select2" id="tipo_alquiler" name="tipo_alquiler" onchange="TipoAlquiler(this.value)" required>
                                      <option value="Permanente">Permanente</option>
                                      <option value="Temporal">Temporal</option>
                                    </select>
                                  </div>
                                  <div class="form-group card shadow vistaTipoAlquiler" style="border-radius: 30px !important; display: none;">
                                    <div class="card-body">
                                      <div class="form-group">
                                        <label>Fecha</label>
                                        <input type="date" name="fecha" class="form-control" id="fechaAlquiler">
                                      </div>
                                          
                                      <div class="form-group" align="center">
                                        <label>Hora</label>
                                        <input class="form-control" type="time" name="hora"  id="horaAlquiler">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label>Nro. de horas</label>
                                    <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
                                      <span class="input-group-addon bootstrap-touchspin-prefix input-group-prepend">
                                        <span class="input-group-text" style="width:39px; height:39px;">
                                          <i data-feather="watch"></i>
                                        </span>
                                      </span>
                                      <input name="num_horas" min="1" minlength="2" max="24" data-toggle="touchspin" type="number"  class="form-control" placeholder="7" required>
                                    </div>
                                    </div>
                                    <div class="form-group">
                                      <label>Status</label>
                                      <select name="status" class="form-control select2" id="status_PlanP">
                                        <option value="Activo">Activo</option>
                                        <option value="Inactivo">Inactivo</option>
                                      </select>
                                    </div>                                  
                                </center>
                            </div>
                            <div class="tab-pane fade" id="pills-pago" role="tabpanel" aria-labelledby="pills-pago-tab">
                                <center>
                                    <div class="form-group" id="pagoRealizado">
                                        <div class="">                  
                                            <label for="admins_todos">¿Se realizó el pago?</label>
                                            <input type="checkbox" name="admins_todos" onchange="TodosAdmins()" id="todoAdmin"  data-toggle="tooltip" data-placement="top" title="Seleccione si el pago se realizó correctamente" value="1">
                                        </div>
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
                        <div align="center">
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </div>
                    </div>                          
                </div>
            </div>
        </div>
    {!! Form::close() !!}

    {!! Form::open(['route' => ['editar_alquiler'], 'enctype' => 'multipart/form-data', 'method' => 'POST', 'name' => 'update_arriendo', 'id' => 'update_arriendo', 'data-parsley-validate']) !!}
        @csrf
        <div class="modal fade" id="editarArriendo2" role="dialog">
            <div class="modal-dialog modals-default border border-primary rounded">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Editar Arriendo</h4>
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <ul class="nav nav-pills nav-fill mb-3" id="pills-tab" role="tablist" style="background-color: #C5C5C5 !important;">
                          <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-homeE" role="tab" aria-controls="pills-empresaE" aria-selected="true">1</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-pagoE" role="tab" aria-controls="pills-datosE" aria-selected="false">2</a>
                          </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-homeE" role="tabpanel" aria-labelledby="pills-home-tab">
                                <center>
                                  <div class="form-group">
                                    <label>Residente</label>
                                    <select class="form-control select2" id="id_residenteArriendoE" onchange="buscarTodo(this.value)" name="id_residente" required>
                                        <option value="0" selected disabled>Seleccione residente</option>
                                        @foreach($residentes as $key)
                                            <option value="{{$key->id}}">{{$key->nombres}} {{$key->apellidos}} - {{$key->rut}}</option>
                                        @endforeach()
                                    </select>
                                  </div>
                                   <div class="form-group">
                                    <label>Instalación</label>
                                    <select class="form-control select2" id="instalacionListArriendoE" name="id_instalacion">
                                        <option value="0" selected disabled required>Seleccione instalación</option>
                                        @foreach($instalaciones as $key)
                                        <option value="{{$key->id}}">{{$key->nombre}} - Dias disponible:@foreach($key->dias as $key2) {{$key2->dia}} @endforeach - {{$key->status}}</option>
                                        @endforeach
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label>Tipo de Alquiler</label>
                                    <select class="form-control select2" id="tipo_alquilerArriendoE" name="tipo_alquiler" onchange="TipoAlquiler(this.value)" required>
                                      <option value="Permanente">Permanente</option>
                                      <option value="Temporal">Temporal</option>
                                    </select>
                                  </div>
                                  <div class="form-group card shadow vistaTipoAlquiler" style="border-radius: 30px !important; display: none;">
                                    <div class="card-body">
                                      <div class="form-group">
                                        <label>Fecha</label>
                                        <input type="date" name="fecha" class="form-control" id="fechaAlquilerArriendoE">
                                      </div>
                                          
                                      <div class="form-group" align="center">
                                        <label>Hora</label>
                                        <input class="form-control" type="time" name="hora"  id="horaAlquilerArriendoE">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label>Nro. de horas</label>
                                    <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
                                      <span class="input-group-addon bootstrap-touchspin-prefix input-group-prepend">
                                        <span class="input-group-text" style="width:39px; height:39px;">
                                          <i data-feather="watch"></i>
                                        </span>
                                      </span>
                                      <input name="num_horas" min="1" minlength="2" max="24" data-toggle="touchspin" type="number"  class="form-control" placeholder="7" required id="num_horasArriendoE">
                                    </div>
                                    </div>
                                    <div class="form-group">
                                      <label>Status</label>
                                      <select name="status" class="form-control select2" id="statusArriendoE">
                                        <option value="Activo">Activo</option>
                                        <option value="Inactivo">Inactivo</option>
                                      </select>
                                    </div>                                  
                                </center>
                            </div>
                            <div class="tab-pane fade" id="pills-pagoE" role="tabpanel" aria-labelledby="pills-pago-tab">
                                <center>
                                    <div class="form-group" id="pagoRealizado">
                                            <div>                  
                                                <label for="admins_todos">¿Se realizó el pago?</label>
                                                <input type="checkbox" name="admins_todos" id="pagadoArriendoE"  data-toggle="tooltip" data-placement="top" title="Seleccione si el pago se realizó correctamente" value="1">
                                            </div>
                                            <div>  
                                                <span id="pagadoArriendoE2"></span>
                                            </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label>Referencia</label>
                                        <input type="text" class="form-control" name="referencia" id="referenciaArriendoE" required>
                                    </div>
                                    <div class="row">
                                        <?php $num=0; ?>
                                            @foreach($planesPago as $key)
                                                @if($num==0)
                                                    <div class="col-md-6">
                                                        <div class="card shadow border card-tabla rounded" style="border-color: {{$key->color}} !important; height: 400px;">
                                                            <div class="card-body">
                                                                <div class="custom-control custom-radio mb-2">
                                                                  <input type="radio" id="planPArriendoE{{$key->id}}" name="planP" value="{{$key->id}}" checked>
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
                                                                  <input type="radio" id="planPArriendoE{{$key->id}}" name="planP" value="{{$key->id}}">
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
                        <div align="center">
                            <input type="hidden" name="id" id="id_editarArriendo">
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </div>
                    </div>                          
                </div>
            </div>
        </div>
    {!! Form::close() !!}

@endsection

<script type="text/javascript">

    function editarArriendo(id,id_residente,id_instalacion,tipo_alquiler,fecha,hora,num_horas,status,status2,referencia,id_planesPago) {

        $('#id_residenteArriendoE').val(id_residente);
        $('#instalacionListArriendoE').val(id_instalacion);
        $('#tipo_alquilerArriendoE').val(tipo_alquiler);
        $('#fechaAlquilerArriendoE').val(fecha);
        $('#horaAlquilerArriendoE').val(hora);
        $('#num_horasArriendoE').val(num_horas);
        $('#statusArriendoE').val(status);

        $('#pagadoArriendoE').val(status2);

        if(status2 == 'Pagado'){
            $('#pagadoArriendoE').prop('checked', true);
        }else{
            $('#pagadoArriendoE').removeAttr('checked', false);
        }

        $('#pagadoArriendoE2').html(status2);

        $('#referenciaArriendoE').val(referencia);
        $('#planPArriendoE'+id).prop('checked', true);

        $('#id_editarArriendo').val(id);
        $('#editarArriendo2').modal('show');
    }

    function eliminarArriendo(id, id_instalacion) {
        $('#id_ArriendoE').val(id);
        $('#id_instalacion').val(id_instalacion);
        $('#EliminarArriendo').fadeIn(300);
    }

    function TipoAlquiler(tipo) {
        if(tipo == 'Permanente'){
            $('.vistaTipoAlquiler').fadeOut('slow',
            function() { 
              $(this).hide();
            });
            $('#fechaAlquiler').removeAttr('required',false);
            $('#horaAlquiler').removeAttr('required',false);
        }else{
            $('.vistaTipoAlquiler').fadeIn(300);
            $('#fechaAlquiler').attr('required',true);
            $('#horaAlquiler').attr('required',true);
        }
    }




    function crearInstalacion() {
        $(".vistaColumnaInstalaciones").fadeOut("slow",
          function() {
            $(".vistaColumnaInstalaciones").hide();
            $("#crearInstalacion").fadeIn(300);
          });
    }

    function editarInstalacion(id,nombre,id_dia,hora_desde,hora_hasta,max_personas,status) {
        $('#idInstalacion').val(id);
        $('#nombreInstalacion').val(nombre);
        $('#id_diaInstalacion').val(id_dia);
        $('#desdeInstalacion').val(hora_desde);
        $('#hastaInstalacion').val(hora_hasta);
        $('#npersonasInstalacion').val(max_personas);
        $('#statusInstalacion').val(status);
        $(".vistaColumnaInstalaciones").fadeOut("slow",
          function() {
            $(".vistaColumnaInstalaciones").hide();
            $("#editarInstalacion").fadeIn(300);
          });
    }

    function eliminarInstalacion(id) {
        $('#id_instalacionE').val(id);
        $(".vistaColumnaInstalaciones").fadeOut("slow",
          function() {
            $(".vistaColumnaInstalaciones").hide();
            $("#EliminarInstalacion").fadeIn(300);
          });
    }




    function nuevoArriendo() {
        $('#nuevoArriendo').modal('show');
    }
    function crearIncidencia(){
        $('#crearIncidencia').modal('show');
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
          $("#tablaArriendos").fadeOut("slow",
              function() {
                  $(this).hide();
                  $("#tablaControl").fadeOut("slow");
                  $("#tablaInstalaciones")
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
          $("#tablaInstalaciones").fadeOut("slow",
              function() {
                  $(this).hide();
                  $("#tablaControl").fadeOut("slow");
                  $("#tablaArriendos")
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
          $("#tablaInstalaciones").fadeOut("slow",
              function() {
                  $(this).hide();
                  $("#tablaArriendos").fadeOut("slow");
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
  function NuevoAlquiler() {
    $('#verTabla3-2').hide();
    $('#verTabla3-3').hide();
    $("#tablaAlquiler").fadeOut("slow",
      function() {
        $(this).hide();
        $(".seccionQueHacer").fadeIn(100);
        $(function () {
          setTimeout( function(){

              $('#verTabla3-1')
              .css('opacity', 0)
                  .slideDown('slow')
                  .animate(
                      { opacity: 1 },
                      { queue: false, duration: 'slow' }
                  );
              setTimeout( function(){
                  $('#verTabla3-2')
                  .css('opacity', 0)
                  .slideDown('slow')
                  .animate(
                      { opacity: 1 },
                      { queue: false, duration: 'slow' }
                  );
                  setTimeout( function(){
                      $('#verTabla3-3')
                      .css('opacity', 0)
                      .slideDown('slow')
                      .animate(
                          { opacity: 1 },
                          { queue: false, duration: 'slow' }
                      );
                  }  , 500 );
              }  , 500 );
          }  , 500 );
        });
      });
  }
  function seccionNegocio(opcion) {
    if (opcion == 1) {
      $('#cardTipoNegocio1').hide();
      $('#cardTipoNegocio2').hide();
      $('#cardTipoNegocio3').hide();
      $('#cardTipoNegocio4').hide();
      $('#cardTipoNegocio5').hide();
      $('#cardTipoNegocio6').hide();
      $(".seccionQueHacer").fadeOut("slow",
        function() {
          $(this).hide();
          $(".seccionTipoNegocio").fadeIn(300);
        });
      setTimeout( function(){

        $('.seccionControl')
        .css('opacity', 0)
          .slideDown('slow')
          .animate(
              { opacity: 1 },
              { queue: false, duration: 'slow' }
          );
          setTimeout( function(){
            $('#seccionControl1')
            .css('opacity', 0)
                  .slideDown('slow')
                  .animate(
                      { opacity: 1 },
                      { queue: false, duration: 'slow' }
                  );
          }  , 400 );

        $('#cardTipoNegocio1')
          .css('opacity', 0)
              .slideDown('slow')
              .animate(
                  { opacity: 1 },
                  { queue: false, duration: 'slow' }
              );
          setTimeout( function(){
              $('#cardTipoNegocio2')
              .css('opacity', 0)
              .slideDown('slow')
              .animate(
                  { opacity: 1 },
                  { queue: false, duration: 'slow' }
              );
              setTimeout( function(){
                  $('#cardTipoNegocio3')
                  .css('opacity', 0)
                  .slideDown('slow')
                  .animate(
                      { opacity: 1 },
                      { queue: false, duration: 'slow' }
                  );
                  setTimeout( function(){
                    $('#cardTipoNegocio4')
                    .css('opacity', 0)
                    .slideDown('slow')
                    .animate(
                        { opacity: 1 },
                        { queue: false, duration: 'slow' }
                    );
                    setTimeout( function(){
                      $('#cardTipoNegocio5')
                      .css('opacity', 0)
                      .slideDown('slow')
                      .animate(
                          { opacity: 1 },
                          { queue: false, duration: 'slow' }
                      );
                      setTimeout( function(){
                        $('#cardTipoNegocio6')
                        .css('opacity', 0)
                        .slideDown('slow')
                        .animate(
                            { opacity: 1 },
                            { queue: false, duration: 'slow' }
                        );
                    }  , 400 );
                  }  , 400 );
                }  , 400 );
              }  , 400 );
          }  , 400 );
      }  , 1000 );
      $('#negocio').val(1)
    }else{
    }
  }
  function SelectTipoN(opcion){
    $('#InputTipoNegocio').val(opcion);
    $('.seccionTipoNegocio').attr("disabled", "disabled").off('click');
    var a=0;
    for (var i = 0; i < 7; i++) {
      if (i != opcion) {
        $("#cardTipoNegocio"+i).fadeOut("slow");
      }
      a++;
    }
    if(i == 7){
      if(opcion == 1){
        $('#seccionControl2-2').attr('src','{{ asset("assets/images/alquiler/gym.png") }}');
      }else if(opcion == 2){
        $('#seccionControl2-2').attr('src','{{ asset("assets/images/alquiler/market.png") }}');
      }else if(opcion == 3){
        $('#seccionControl2-2').attr('src','{{ asset("assets/images/alquiler/restaurant.png") }}');
      }else if(opcion == 4){
        $('#seccionControl2-2').attr('src','{{ asset("assets/images/alquiler/factory.png") }}');
      }else if(opcion == 5){
        $('#seccionControl2-2').attr('src','{{ asset("assets/images/alquiler/oficina.png") }}');
      }else{
        $('#seccionControl2-2').attr('src','{{ asset("assets/images/alquiler/theater.png") }}');
      }
      $("#cardTipoNegocio"+opcion).fadeOut("slow");
      setTimeout( function(){
        $('#seccionControl2')
        .css('opacity', 0)
              .slideDown('slow')
              .animate(
                  { opacity: 1 },
                  { queue: false, duration: 'slow' }
              );
      }  , 400 );
    }
    $('.seccionTipoNegocio').fadeOut("slow");
    $('.seccionDatosNegocio').fadeIn(300);
  }

  function seccionHorario() {
    $(".seccionDatosNegocio").fadeOut("slow",
      function() {
        $(this).hide();
        $(".seccionHorarioNegocio").fadeIn(300);
      });
    $('#seccionControl3').fadeIn('show');
  }

  function diaNegocio(dia) {
    if(dia == 1){
      if($('#horarioBotonDia1').hasClass('btn-primary')){
        $('.seccionHorarioNegocio').append('<input type="hidden" name="dia[]" class="inputDia1" value="1">');
        $('#horarioBotonDia1').removeClass('btn-primary').addClass('btn btn-success');
      }else{
        $('.inputDia1').remove();
        $('#horarioBotonDia1').removeClass('btn-success').addClass('btn btn-primary');
      }
    }else if(dia == 2){
      if($('#horarioBotonDia2').hasClass('btn-primary')){
        $('.seccionHorarioNegocio').append('<input type="hidden" name="dia[]" class="inputDia2" value="2">');
          $('#horarioBotonDia2').removeClass('btn-primary').addClass('btn btn-success');
      }else{
        $('.inputDia2').remove();
        $('#horarioBotonDia2').removeClass('btn-success').addClass('btn btn-primary');
      }
    }else if(dia == 3){
      if($('#horarioBotonDia3').hasClass('btn-primary')){
        $('.seccionHorarioNegocio').append('<input type="hidden" name="dia[]" class="inputDia3" value="3">');
          $('#horarioBotonDia3').removeClass('btn-primary').addClass('btn btn-success');
      }else{
        $('.inputDia3').remove();
        $('#horarioBotonDia3').removeClass('btn-success').addClass('btn btn-primary');
      }
    }else if(dia == 4){
      if($('#horarioBotonDia4').hasClass('btn-primary')){
        $('.seccionHorarioNegocio').append('<input type="hidden" name="dia[]" class="inputDia4" value="4">');
          $('#horarioBotonDia4').removeClass('btn-primary').addClass('btn btn-success');
      }else{
        $('.inputDia4').remove();
        $('#horarioBotonDia4').removeClass('btn-success').addClass('btn btn-primary');
      }
    }else if(dia == 5){
      if($('#horarioBotonDia5').hasClass('btn-primary')){
        $('.seccionHorarioNegocio').append('<input type="hidden" name="dia[]" class="inputDia5" value="5">');
          $('#horarioBotonDia5').removeClass('btn-primary').addClass('btn btn-success');
      }else{
        $('.inputDia5').remove();
        $('#horarioBotonDia5').removeClass('btn-success').addClass('btn btn-primary');
      }
    }else if(dia == 6){
      if($('#horarioBotonDia6').hasClass('btn-primary')){
        $('.seccionHorarioNegocio').append('<input type="hidden" name="dia[]" class="inputDia6" value="6">');
          $('#horarioBotonDia6').removeClass('btn-primary').addClass('btn btn-success');
      }else{
        $('.inputDia6').remove();
        $('#horarioBotonDia6').removeClass('btn-success').addClass('btn btn-primary');
      }
    }else{
      if($('#horarioBotonDia7').hasClass('btn-primary')){
        $('.seccionHorarioNegocio').append('<input type="hidden" name="dia[]" class="inputDia7" value="7">');
        $('#horarioBotonDia7').removeClass('btn btn-primary').addClass('btn btn-success');
      }else{
        $('.inputDia7').remove();
        $('#horarioBotonDia7').removeClass('btn-success').addClass('btn btn-primary');
      }
    }
  }

  function seccionPago() {
    $(".seccionHorarioNegocio").fadeOut("slow",
      function() {
        $(this).hide();
        $(".seccionPagoNegocio").fadeIn(300);
      });
    $('#seccionControl4').fadeIn('show');
  }
  function SeccionListo() {
    $(".seccionPagoNegocio").fadeOut("slow");
    $('#seccionControl5').fadeIn('show');
    $('#seccionControl6').fadeIn('show');
  }
</script>