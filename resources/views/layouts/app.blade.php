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
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div div="form-group">
                                                            <label>Multas - Recargas</label>
                                                            <select multiple class="custom-select custom-select-sm" name="id_mr[]" id="campoMultaRecarga">
                                                            </select>
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
                                                                            <input type="text" readonly="" class="form-control-plaintext" id="nombres_profile" value="Nelson">
                                                                            <input type="text" name="nombres" class="form-control" id="nombres_profileE" value="Nelson" style="display: none;">

                                                                            <input type="text" readonly="" class="form-control-plaintext" id="apellidos_profile" value="Mandela">
                                                                            <input type="text" name="apellidos" class="form-control" id="apellidos_profileE" value="Mandela" style="display: none;">
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
                                                                            <input type="email" readonly="" class="form-control-plaintext" id="email_profile"value="email@example.com">
                                                                            <input type="email" name="email" class="form-control" id="email_profileE"value="email@example.com" style="display: none;">
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
