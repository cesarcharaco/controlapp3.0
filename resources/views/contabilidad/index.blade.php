@extends('layouts.app')

@section('content')
     <style type="text/css">
        .card {
            border: 1px solid #f6f6f7!important;
            border-color: #CB8C4D !important;
        }
        .palabraVerContabilidad2, .palabraVerEstaciona2,.PalabraEditarPago2, .tituloTabla2
        {
            display: none;
        }
        @media only screen and (max-width: 800px)  {

            .PalabraEditarPago, .PalabraRealizarPago, .PalabraPagoConfirmar{
                display: none;
            }
            .palabraVerContabilidad{
                display: none;
            }
            .palabraVerContabilidad2{
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
    <div class="container">
        <div class="row page-title">
            <div class="col-md-12">
                <nav aria-label="breadcrumb" class="float-right mt-1">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Balance General</li>
                    </ol>
                </nav>
                <h4 class="mb-1 mt-0">Balance General</h4>
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
    </div>

    <div class="row">
        
    </div>
    <div class="card rounded card-tabla shadow p-3 mb-5 bg-white rounded">
        <div class="row justify-content-center">
            <div class="col-md-12 col-xl-12">
                <div class="card" style="border: 1px solid #f6f6f7!important; border-color: #CB8C4D !important;">
                    <div class="card-body p-0">
                        <div class="media p-2">
                            <div class="media-body">
                                <center>
                                    <h4 class="header-title mt-0 mb-3">POSICIÓN CONSOLIDADO</h4>
                                </center>
                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                        <div class="form-group" align="center">
                                            <label style="color: #CB8C4D !important">Saldo Disponible</label>
                                            <h6>
                                                <strong>
                                                    <a href="#" style=" width: 100% !important; border: 1px solid #CB8C4D!important; background: white !important;" class="btn">
                                                        <strong class="text-success">{{$saldo->saldo}}</strong> <b class="text-dark">USD</b>
                                                    </a>
                                                </strong>
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group" align="center">
                                            <label style="color: #CB8C4D !important">Registrar Egreso</label>
                                            <h6>
                                                <strong>
                                                    <a href="#" data-toggle="modal" data-target="#registrarEgreso" style="
                                                        width: 100% !important;
                                                        position: relative;
                                                        border: 1px solid #f6f6f7!important;
                                                        border-color: #CB8C4D !important; 
                                                        background-color: #CB8C4D !important; " class="btn shadow"><strong class="text-white">Agregar</strong>
                                                    </a>
                                                </strong>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body" style="position: relative;">
                        <h4 class="header-title mt-0 mb-3" align="center">Balance General (Contabilidad) 
                            <i class='uil uil-comment-exclamation' data-toggle="tooltip" data-placement="right" data-original-title="Aviso:  "></i>
                        </h4>
                        <table class="table dataTable data-table-basic table-curved table-striped tabla-estilo" style="width: 100%;" border="0">
                            <thead>
                                <tr class="text-white" id="th1" style="background-color: #CB8C4D;">
                                    <th>Fecha</th>
                                    <th>
                                        <span class="PalabraEditarPago">Descripción</span>
                                        <span class="PalabraEditarPago2">Desc.</span>
                                    </th>
                                    <th>
                                        <span class="PalabraEditarPago">Ingreso</span>
                                        <span class="PalabraEditarPago2">T</span>
                                    </th>
                                    <!-- <th>Estacionamientos</th> -->
                                    <th>
                                        <span class="PalabraEditarPago">Egreso</span>
                                        <span class="PalabraEditarPago2">
                                            <i data-feather="sliders" class="iconosMetaforas2"></i>
                                        </span>
                                    </th>
                                    <th>Saldo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contabilidad as $key)
                                <tr>
                                    <td>{{$key->created_at}}</td>
                                    <td>{{$key->descripcion}}</td>
                                    <td>{{$key->ingreso}}</td>
                                    <td>{{$key->egreso}}</td>
                                    <td>{{$key->saldo}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
<!-- --------------------------------------------MODAL DE EGRESO------------------------------------------------------ -->
<div class="modal fade" id="registrarEgreso" role="dialog">
    {!! Form::open(['route' => ['contabilidad.store'],'method' => 'POST', 'name' => 'registrarEgreso', 'id' => 'registrarEgreso', 'data-parsley-validate']) !!}
        @csrf
        <div class="modal-dialog modals-default">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>
                        <i class='uil-usd-circle' data-toggle="tooltip" data-placement="right" data-original-title="Aviso: Acá podrá registar un egreso"></i>
                        Registrar Egreso
                    </h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label>Monto de egreso: <b style="color: red;">*</b></label>
                            <input type="number" name="" class="form-control" placeholder="Monto de Egreso" required="required" min="1">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Descripción: <b style="color: red;">*</b></label>
                            <input type="text" name="descripcion" class="form-control" placeholder="Ingrese Descripción" required="required" title="Ingrese la descripción del egreso">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" style="border-radius: 50px;">Registrar Egreso</button>
                </div>
            </div>
        </div>
    {!! Form::close() !!}
</div>
@endsection