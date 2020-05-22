<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ControlApp') }}</title>

    
    <link rel="shortcut icon" href="{{ asset('assets/images/logo.jpg') }}">
    
    @include('layouts.css')

    

    <!-- <style type="text/css">
        
        }
    </style> -->
    
</head>
<body>
    <div id="app">
        <div class="" style="min-height: 100% !important; position: relative !important;">
            @include('layouts.admin.header')
            
            
            @include('layouts.admin.menu')
            


            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        <!-- <div class="row page-title">
                            <div class="col-md-12">
                                <h4 class="mb-1 mt-0">ControlApp <label class="badge badge-soft-danger">v1.0.1</label>
                                </h4>
                            </div>
                        </div> -->
                            
                            <app></app>
                            @yield('statusarea')
                            @yield('breadcomb')
                            @yield('content')




                            {!! Form::open(['route' => ['asignar_mr'],'method' => 'POST', 'name' => 'asignar_multa', 'id' => 'asignar_multa', 'data-parsley-validate']) !!}
                                @csrf
                                <div class="modal fade" id="AsignarMR" role="dialog">
                                    <div class="modal-dialog modals-default">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4>Asignar M/R</h4>
                                                <button type="button" class="close" data-dismiss="modal">
                                                    <span>&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                @if(\Auth::user()->tipo_usuario == 'Admin')
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div div="form-group">
                                                                <label>Multas - Recargas</label>
                                                                <pre><select multiple class="custom-select custom-select-sm" name="id_mr[]" id="campoMultaRecarga" required>
                                                                </select></pre>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div div="form-group">
                                                                <label>Residentes</label>
                                                                <select multiple class="custom-select custom-select-sm" name="id_residente[]" id="campoResidentes">
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label>¿Quiere asignar las multas y recargas a todos los residentes?</label>
                                                            <input type="checkbox" value="AsignarTodos" name="registrarTodos" onclick="cambiarResiT()">
                                                            <input type="hidden" name="opcion" id="opcionAsignaT" value="1">
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div div="form-group">
                                                                <label>Multas - Recargas</label>
                                                                <pre><select multiple class="custom-select custom-select-sm" name="id_mr[]" id="campoMultaRecarga" required>
                                                                </select></pre>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    
                                                @endif


                                            </div>
                                            <div class="modal-footer border-bottom">
                                                <button type="submit" class="btn btn-success">Asignar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            {!! Form::close() !!}

                                                
                            {!! Form::open(['route' => ['asignar_mr'],'method' => 'POST', 'name' => 'asignar_multa', 'id' => 'asignar_multa', 'data-parsley-validate']) !!}
                                @csrf
                                <div class="modal fade" id="Profile" role="dialog" aria-labelledby="myLargeModalLabel">
                                    <div class="modal-dialog modals-default">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <button type="button" class="close" data-dismiss="modal">
                                                    <span>&times;</span>
                                                </button>
                                                <div class="row">
                                                    
                                                
                                                    <div class="col-lg-6">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="text-center mt-3">
                                                                    <img src="assets/images/logo.jpg" alt="" class="avatar-lg rounded-circle">
                                                                    <div class="form-group row">
                                                                        <label class="col-lg-6 col-form-label" for="example-static">Nombres</label>

                                                                        
                                                                        <div class="col-lg-6">
                                                                            <input type="text" readonly="" class="form-control-plaintext" id="nombres_profile" value="{{Auth::user()->name}}">
                                                                            <input type="text" name="nombres" class="form-control" id="nombres_profileE" value="{{Auth::user()->name}}" style="display: none;">

                                                                            <!-- <input type="text" readonly="" class="form-control-plaintext" id="apellidos_profile" value="Mandela">
                                                                            <input type="text" name="apellidos" class="form-control" id="apellidos_profileE" value="Mandela" style="display: none;"> -->
                                                                        </div>
                                                                    </div>
                                                                    <h6 class="text-muted font-weight-normal mt-1 mb-4">
                                                                        <div class="form-group row">
                                                                            <label class="col-lg-4 col-form-label" for="example-static">Rut</label>
                                                                            <div class="col-lg-8">
                                                                                <input type="number" readonly="" class="form-control-plaintext" id="rut_profile" value="123124123">
                                                                                <input type="number" name="rut" class="form-control" id="rut_profileE" value="123124123" style="display: none;">
                                                                            </div>
                                                                        </div>
                                                                    </h6>

                                                                </div>

                                                                <!-- <div class="mt-5 pt-2 border-top">
                                                                    <h4 class="mb-3 font-size-15">Servicios adquiridos</h4>
                                                                    <p class="text-muted mb-4">Estacionamientos</p>
                                                                </div> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <a href="#" onclick="EditarProfile()" class="btn btn-success btn-sm" id="buttonEditP" style="width: 100%; border-radius: 30px;">Editar</a>
                                                                        <a href="#" onclick="EditarProfile2()" class="btn btn-primary btn-sm" id="buttonEditP2" style="width: 100%; border-radius: 30px; display: none;">Volver</a>
                                                                    </div>

                                                                    <div class="col-lg-6">
                                                                        <button type="submit" class="btn btn-success btn-sm" id="btnGuardarProfile" style="display: none; border-radius: 30px;">Guardar</button>
                                                                    </div>
                                                                </div>
                                                                <div class="mt-3 pt-2 border-top">
                                                                    <h4 class="mb-3 font-size-15">Información de contacto</h4>

                                                                    <div class="form-group row">
                                                                        <label class="col-lg-4 col-form-label" for="example-static">Email</label>
                                                                        <div class="col-lg-8">
                                                                            <input type="email" readonly="" class="form-control-plaintext" id="email_profile"value="{{Auth::user()->email}}">
                                                                            <input type="email" name="email" class="form-control" id="email_profileE"value="{{Auth::user()->email}}" style="display: none;">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-lg-6 col-form-label" for="example-static">Teléfono</label>
                                                                        <div class="col-lg-6">
                                                                            <input type="number" readonly="" class="form-control-plaintext" id="telefono_profile"value="13123123">
                                                                            <input type="number" name="telefono" class="form-control" id="telefono_profileE"value="13123123" style="display: none;">
                                                                        </div>
                                                                    </div>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                        </div>
                                    </div>
                                </div>
                            {!! Form::close() !!}

<!-- --------------------------------------------REGISTRAR ESTACIONAMIENTOS--------------------------------------------------------- -->    

                            <form action="{{ route('estacionamientos.store') }}" method="POST">
                                @csrf
                                <div class="modal fade" id="crearEstacionamiento" role="dialog">
                                    <div class="modal-dialog modals-default">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4>Nuevo Estacionamiento</h4>
                                                <button type="button" class="close" data-dismiss="modal">
                                                    <span>&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="text" name="idem" placeholder="Idem del estacionamiento" class="form-control" required="required">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Estado del estacionamiento</label>
                                                            <select name="status" class="form-control" required placeholder="Introduzca el status del estacionamiento">
                                                                <option value="Libre" selected="selected">Libre</option>
                                                                <option value="Ocupado" >Ocupado</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                

                                                
                                                <!-- <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Especifique el año para los montos</label>
                                                            <select name="anio" id="anio2" class="form-control">
                                                                <?php $anio=date('Y');?>
                                                                @for($i=0; $i<10; $i++)
                                                                    <option value="{{$anio++}}">{{$anio-1}}</option>
                                                                @endfor
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div> -->
                                                

                                                {{--
                                                <hr>
                                                <h4>Mensualidad del estacionamiento</h4>


                                                    <div class="widget-tabs-list">
                                                    <ul class="nav nav-tabs tab-nav-left">
                                                        <li class="active"><a class="active" data-toggle="tab" href="#mes" onclick="opcion(1)">Montos por mes</a></li>
                                                        <li><a data-toggle="tab" href="#anio" onclick="opcion(2)">Montos por año</a></li>
                                                    </ul>
                                                    <div class="tab-content tab-custom-st">
                                                        <div id="mes" class="tab-pane fade in active show">
                                                            <div class="tab-ctn">
                                                                <div class="row">
                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                        <div class="add-todo-list notika-shadow ">
                                                                            <div class="card-box">
                                                                                @php $i=0; @endphp
                                                                                @foreach($meses as $key)
                                                                                    <div class="row">
                                                                                        <div class="col-md-4">
                                                                                            <div class="form-group">
                                                                                                <input type="hidden" value="{{$key->mes}}" name="mes[]" id="meses{{$i}}" class="form-control-plaintext">
                                                                                                <label>{{$key->mes}}</label>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-6">
                                                                                            <div class="form-group">
                                                                                                <div class="input-group mb-2">
                                                                                                    <div class="input-group-prepend">
                                                                                                        <div class="input-group-text">$</div>
                                                                                                    </div>
                                                                                                    <input type="number" name="monto[]" id="montoMeses{{$i}}" class="form-control" placeholder="10">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    @php $i++; @endphp
                                                                                @endforeach()

                                                                                
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div id="anio" class="tab-pane fade">
                                                            <div class="tab-ctn">
                                                                <div class="row">
                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                        <div class="add-todo-list notika-shadow ">
                                                                            <div class="card-box">
                                                                                <div class="row">
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group">
                                                                                            <label>Monto por todo el año</label>
                                                                                            <div class="input-group mb-2">
                                                                                                <div class="input-group-prepend">
                                                                                                    <div class="input-group-text">$</div>
                                                                                                </div>
                                                                                                <input type="text" name="montoAnio" class="form-control" id="montoAnio" placeholder="10" disabled>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 
                                                --}}
                                                <div class="modal-footer">
                                                    <input type="hidden" name="opcion" id="opcion" value="1">
                                                    <button type="submit" class="btn btn-success" style="border-radius: 50px;"><i data-feather="check-circle"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
<!-- --------------------------------------------REGISTRAR RESIDENTE--------------------------------------------------------- -->    
                            <form action="{{ route('residentes.store') }}" method="POST" name="registrar_residente" data-parsley-validate>
                                @csrf
                                <div class="modal fade" id="crearResidente" role="dialog">
                                    <div class="modal-dialog modals-default">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4>Nuevo Residente</h4>
                                                <button type="button" class="close" data-dismiss="modal">
                                                    <span>&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        
                                                        <div class="form-group">
                                                            <input type="text" name="nombres" placeholder="Nombres del residente" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="text" name="apellidos" placeholder="Apellidos del residente" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="number" name="rut" placeholder="Rut del residente" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="number" name="telefono" placeholder="Teléfono del residente" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="email" name="email" placeholder="Email del residente" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>¿Asignar inmueble?</label>
                                                            <select name="id_inmuebles" class="form select2" multiple="" id="asignaInmueResidente">
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>¿Asignar estacionamiento?</label>
                                                            <select name="id_estacionamientos" class="form select2" multiple="" id="asignaEstaResidente">

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success" >Guardar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            
                <!-----------------------------------------------PAGAR MESES RESIDENTE---------------------------------------- -->
                            <form action="#" method="POST">
                                @csrf
                                <div class="modal fade" id="pagarMesesModal" role="dialog">
                                    <div class="modal-dialog modals-default">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4>Pagar meses</h4>
                                                <button type="button" class="close" data-dismiss="modal">
                                                    <span>&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Meses</label>
                                                            <select class="form-control select2" required name="id_mes[]" id="MesPagarResi" onchange="pagarMultasResidentes(this.value)">
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="muestraMesesAPagar" style="display: none;">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="text-primary">Inmuebles</label>
                                                                <select class="form-control select2" name="id_inmuebles[]" id="InmuPagarResi">
                                                                    
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="text-warning">Estacionamientos</label>
                                                                <select class="form-control select2" name="id_estacionamientos[]" id="EstaPagarResi">
                                                                    
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="muestraMesesAPagar2" style="display: none;">
                                                    <h3 align="center">No hay inmuebles que pagar</h3>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="hidden" name="opcion" id="opcion" value="1">
                                                <button type="submit" class="btn btn-success" style="border-radius: 50px;"><i data-feather="check-circle"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                <!-----------------------------------------------PAGAR MULTAS RESIDENTE---------------------------------------- -->
                            <form action="#" method="POST">
                                @csrf
                                <div class="modal fade" id="pagarMultasModal" role="dialog">
                                    <div class="modal-dialog modals-default">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4>Pagar Multas</h4>
                                                <div id="CargandoMultasResi" style="display: none;">
                                                    <div class="spinner-border text-warning m-2" role="status">
                                                        <!-- <span class="sr-only">Cargando multas y recargas...</span> -->
                                                    </div>
                                                </div>
                                                <button type="button" class="close" data-dismiss="modal">
                                                    <span>&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Multas</label>
                                                            <select class="form-control select2" required multiple name="id_multa[]" id="MultasPagarResi">
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="modal-footer">
                                                <input type="hidden" name="opcion" id="opcion" value="1">
                                                <button type="submit" class="btn btn-success" style="border-radius: 50px;"><i data-feather="check-circle"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

<!-- --------------------------------------------PAGO COMÚN INMUEBLE--------------------------------------------------------- -->
                        
                            
                            <form action="{{ route('pagoscomunes.store') }}" method="POST">
                                @csrf
                                <div class="modal fade" id="PagoCInmueble" role="dialog">
                                    <div class="modal-dialog modals-default">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4>Costo - Inmuebles - Registrar</h4>                
                                                <div class="row justify-content-md-center">
                                                    <div class="col-md-12">
                                                        <div id="spinnerI" style="display: none;">
                                                            <div class="spinner-border text-warning m-2" role="status" id="CargandoPCInmueble">
                                                                <!-- <span class="sr-only">Cargando multas y recargas...</span> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="button" class="close" data-dismiss="modal">
                                                    <span>&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                               <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Seleccione año</label>
                                                            <select name="anioI" id="anioPagoComunI" class="form-control select2" onchange="montosInmuebleAnio(this.value,1)">
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div id="PagoCInmuebles1"></div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="float-right">
                                                    <input type="hidden" name="tipo" value="Inmueble">
                                                    <input type="hidden" name="accion" value="1">
                                                    <button type="submit" class="btn btn-success" >Guardar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>


                            {!! Form::open(['route' => ['pagoscomunes.update',1], 'method' => 'PUT', 'name' => 'editar_pagosComunesInmueble', 'id' => 'editar_pagosComunesInmueble', 'data-parsley-validate']) !!}
                                @csrf
                                <div class="modal fade" id="PagoCInmuebleE" role="dialog">
                                    <div class="modal-dialog modals-default">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4>Costo - Inmuebles - Editar</h4>                
                                                <div class="row justify-content-md-center">
                                                    <div class="col-md-12">
                                                        <div id="spinnerI2" style="display: none;">
                                                            <div class="spinner-border text-warning m-2" role="status" id="CargandoPCInmueble2">
                                                                <!-- <span class="sr-only">Cargando multas y recargas...</span> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="button" class="close" data-dismiss="modal">
                                                    <span>&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                               <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Seleccione año</label>
                                                            <select name="anioI" id="anioPagoComunI_E" class="form-control select2" onchange="montosInmuebleAnio(this.value,2)">
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div id="PagoCInmuebles2"></div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="float-right">
                                                    <input type="hidden" name="tipo" value="Inmueble">
                                                    <input type="hidden" name="accion" value="1">
                                                    <button type="submit" class="btn btn-success" >Editar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            {!! Form::close() !!}
                            
                        
                            

<!-- --------------------------------------------PAGO COMÚN ESTACIONAMIENTO--------------------------------------------------------- -->
                    <form action="{{ route('pagoscomunes.store') }}" method="POST">
                        @csrf
                        <div class="modal fade" id="PagoCEstacionamiento" role="dialog">
                            <div class="modal-dialog modals-default">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4>Costo - Estacionamientos - Registrar</span></h4>                
                                        <div class="row justify-content-md-center">
                                            <div class="col-md-12">
                                                <div id="spinnerE" style="display: none;">
                                                    <div class="spinner-border text-warning m-2" role="status" id="CargandoPCEstaciona">
                                                        <!-- <span class="sr-only">Cargando multas y recargas...</span> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" class="close" data-dismiss="modal">
                                            <span>&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                       <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Seleccione año</label>
                                                    <select name="anioE" id="anioPagoComunE" class="form-control select2" onchange="montosEstacionaAnio(this.value,1)" >
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div id="PagoCEstaciona1"></div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="float-right">
                                            <input type="hidden" name="tipo" value="Estacionamiento">
                                            <input type="hidden" name="accion" value="1">
                                            <button type="submit" class="btn btn-success" >Guardar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    {!! Form::open(['route' => ['pagoscomunes.update',1], 'method' => 'PUT', 'name' => 'editar_pagosComunesEstacionamiento', 'id' => 'editar_pagosComunesEstacionamiento', 'data-parsley-validate']) !!}
                        @csrf
                        <div class="modal fade" id="PagoCEstacionamiento2" role="dialog">
                            <div class="modal-dialog modals-default">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4>Costo - Estacionamientos - Editar</h4>                
                                        <div class="row justify-content-md-center">
                                            <div class="col-md-12">
                                                <div id="spinnerE2" style="display: none;">
                                                    <div class="spinner-border text-warning m-2" role="status" id="CargandoPCEstaciona">
                                                        <!-- <span class="sr-only">Cargando multas y recargas...</span> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" class="close" data-dismiss="modal">
                                            <span>&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                       <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Seleccione año</label>
                                                    <select name="anioE" id="anioPagoComunE2" class="form-control select2" onchange="montosEstacionaAnio(this.value,2)" >
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div id="PagoCEstaciona2"></div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="float-right">
                                            <input type="hidden" name="tipo" value="Estacionamiento">
                                            <input type="hidden" name="accion" value="2">
                                            <button type="submit" class="btn btn-success" >Editar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    {!! Form::close() !!}

<!-- --------------------------------------------REGISTRAR InmuebleS--------------------------------------------------------- -->    

                            <form action="{{ route('inmuebles.store') }}" method="POST">
                                @csrf
                                <div class="modal fade" id="crearInmueble" role="dialog">
                                    <div class="modal-dialog modals-default">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4>Nuevo Inmueble</h4>
                                                <button type="button" class="close" data-dismiss="modal">
                                                    <span>&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="text" name="idem" placeholder="Idem del Inmueble" class="form-control" required="required">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Tipo de Inmueble</label>
                                                            <select name="tipo" class="form-control" required placeholder="Introduzca el tipo de Inmueble" required="required">
                                                                <option value="Casa" selected="selected">Casa</option>
                                                                <option value="Apartamento" >Apartamento</option>
                                                                <option value="Anexo" >Anexo</option>
                                                                <option value="Habitación" >Habitación</option>
                                                                <option value="Otro" >Otro</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Estado del Inmueble</label>
                                                            <select name="status" class="form-control" required placeholder="Introduzca el status del Inmueble">
                                                                <option value="Disponible" selected="selected">Disponible</option>
                                                                <option value="No Disponible" >No Disponible</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>¿El inmueble posee estacionamientos?</label>
                                                            <select name="estacionamiento" class="form-control select2" onchange="(
                                                            $('#cuantosEstaciona').css('display','block'))" required placeholder="¿Algún estacionamiento para el inmueble?">
                                                                <option value="Si">Si</option>
                                                                <option value="No" selected="selected">No</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row" id="cuantosEstaciona" style="display: none;">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>¿Cuántos?</label>
                                                            <input type="number" name="Cuantos" class="form-control" placeholder="1">
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                

                                                {{--<div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Asignar estacionamientos al inmueble</label><label class="badge badge-soft-warning">Opcional</label>
                                                            <select name="id_estacionamientos" class="form-control select2" required placeholder="¿Algún estacionamiento para el inmueble?">
                                                                <option value="0" selected="selected">Seleccionar estacionamientos</option>
                                                                @foreach($estacionamientos as $key)
                                                                    <option value="{{$key->id}}">{{$key->idem}}</option>
                                                                @endforeach()
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div> --}}

                                                <!-- <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Especifique el año para los montos</label>
                                                            <select name="anio" id="anio2" class="form-control" onchange="mostrarMCreate(this.value);">
                                                                <?php $anio=date('Y');?>
                                                                @for($i=0; $i<10; $i++)
                                                                    <option value="{{$anio++}}">{{$anio-1}}</option>
                                                                @endfor
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div> -->

                                                {{--<h4>Mensualidad del Inmueble</h4>
                                                <hr>


                                                <div class="widget-tabs-list">
                                                    <ul class="nav nav-tabs tab-nav-left">
                                                        <li class="active"><a class="active" data-toggle="tab" href="#mes" onclick="opcion(1)">Montos por mes</a></li>
                                                        <li><a data-toggle="tab" href="#anio" onclick="opcion(2)">Montos por año</a></li>
                                                    </ul>
                                                    <div class="tab-content tab-custom-st">
                                                        <div id="mes" class="tab-pane fade in active show">
                                                            <div class="tab-ctn">
                                                                <div class="row">
                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                        <div class="add-todo-list notika-shadow ">
                                                                            <div class="card-box">
                                                                                @php $i=0; @endphp
                                                                                @foreach($meses as $key)
                                                                                    <div class="row">
                                                                                        <div class="col-md-4">
                                                                                            <div class="form-group">
                                                                                                <input type="hidden" value="{{$key->mes}}" name="mes[]" id="meses{{$i}}" class="form-control-plaintext">
                                                                                                <label>{{$key->mes}}</label>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-6">
                                                                                            <div class="form-group">
                                                                                                <div class="input-group mb-2">
                                                                                                    <div class="input-group-prepend">
                                                                                                        <div class="input-group-text">$</div>
                                                                                                    </div>
                                                                                                    <input type="number" name="monto[]" id="montoMeses{{$i}}" class="form-control" placeholder="10">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    @php $i++; @endphp
                                                                                @endforeach()

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div id="anio" class="tab-pane fade">
                                                            <div class="tab-ctn">
                                                                <div class="row">
                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                        <div class="add-todo-list notika-shadow ">
                                                                            <div class="card-box">
                                                                                <div class="row">
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group">
                                                                                            <label>Monto por todo el año</label>
                                                                                            <div class="input-group mb-2">
                                                                                                <div class="input-group-prepend">
                                                                                                    <div class="input-group-text">$</div>
                                                                                                </div>
                                                                                                <input type="text" name="montoAnio" class="form-control" id="montoAnio" placeholder="10" disabled>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                --}}
                                                <div class="modal-footer">
                                                    <input type="hidden" name="opcion" id="opcion" value="1">
                                                    <button type="submit" class="btn btn-success" style="border-radius: 50px;"><i data-feather="check-circle"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>


                        
                    </div> <!-- container-fluid -->

                </div> <!-- content -->

            </div>


            
        </div>
    @include('layouts.admin.footer')
    </div>
    

    <!-- Scripts -->
        
        @include('layouts.scripts')
        
    @section('scripts')
    @endsection
</body>
</html>
