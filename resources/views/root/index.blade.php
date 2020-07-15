@extends('layouts.app')

@section('content')

    <style type="text/css">
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
    <div class="container">
        <div class="row page-title">
            <div class="col-md-12">
                <nav aria-label="breadcrumb" class="float-right mt-1">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Root</li>
                    </ol>
                </nav>
                <h4 class="mb-1 mt-0">Root</h4>
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
    <div class="card border border-info rounded card-tabla shadow p-3 mb-5 bg-white rounded" style="display: none;">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12 offset-md-12">
                        <a class="btn btn-success boton-tabla shadow" data-toggle="modal" data-target="#crearAdmin" style="
                            border-radius: 10px;
                            color: white;
                            height: 35px;
                            margin-bottom: 5px;
                            margin-top: 5px;
                            float: right;">
                            <span class="PalabraEditarPago ">Nuevo Admin</span>
                            <center>
                                <span class="PalabraEditarPago2 ">
                                    <i data-feather="plus" class="iconosMetaforas2"></i>
                                </span>
                            </center>
                        </a>
                    </div>
                </div>
            </div>
            

            <div class="col-md-12">
                <table class="table dataTable data-table-basic table-curved table-striped tabla-estilo" style="width: 100%;">
                    <thead>
                        <tr class="table-default text-white">
                            <td colspan="3" align="center">
                                <div class="card border border-info" style="background-color: #D6EAF8" role="alert">
                                    <span class="text-dark p-1 mb-1"><strong>Aviso: </strong><br>-Seleccione a un usuario administrador para ver mas opciones.</span>
                                </div>
                            </td>
                            <td colspan="3"></td>
                        </tr>
                        <tr class="bg-primary text-white" id="th2" style="display: none">
                            <th width="10"></th>
                            <th>
                                <span class="PalabraEditarPago">Nombres</span>
                                <span class="PalabraEditarPago2">N</span>
                            </th>
                            <th>
                                <span class="PalabraEditarPago">Rut</span>
                                <span class="PalabraEditarPago2">R</span>
                            </th>
                            <th colspan="2">
                                <center>
                                    <span class="PalabraEditarPago">Opciones</span>
                                    <span class="PalabraEditarPago2">O</span>
                                </center>
                            </th>
                            <th>
                                <span class="PalabraEditarPago">Status</span>
                                <span class="PalabraEditarPago2">S</span>
                            </th>
                        </tr>
                        <tr class="bg-info text-white" id="th1">
                            <th></th>
                            <th>
                                <span class="PalabraEditarPago">Nombres</span>
                                <span class="PalabraEditarPago2">N</span>
                            </th>
                            <th>
                                <span class="PalabraEditarPago">Rut</span>
                                <span class="PalabraEditarPago2">R</span>
                            </th>
                            <th>
                                <span class="PalabraEditarPago">Email</span>
                                <span class="PalabraEditarPago2">@</span>
                            </th>
                            <th>
                                <span class="PalabraEditarPago">Registrado el</span>
                                <span class="PalabraEditarPago2">R</span>
                            </th>
                            <th>
                                <span class="PalabraEditarPago">Status</span>
                                <span class="PalabraEditarPago2">S</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($admin as $key)
                            <tr id="vista1-{{$key->id}}" onclick="opcionesTabla(1,'{{$key->id}}')">
                                <td align="center">
                                    
                                </td>
                                <td style="position: all;">{{$key->name}}</td>
                                <td style="position: all;">{{$key->rut}}</td>
                                <td style="position: all;">{{$key->email}}</td>
                                <td style="position: all;">{{$key->created_at}}</td>
                                 @if($key->status == 'activo')
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
                                    <span>{{$key->name}}</span>
                                </td>
                                <td>
                                    
                                    <span>{{$key->rut}}</span>
                                </td>
                                <td style="display: none"></td>
                                <td align="center" colspan="2">
                                    <a href="#" class="btn btn-warning btn-sm boton-tabla shadow botonesEditEli" style="border-radius: 5px;" data-toggle="modal" data-target="#editarResidente" onclick="Editar('{{$key->id}}','{{$key->name}}','{{$key->rut}}','{{$key->email}}','{{$key->status}}')">
                                        <span class="PalabraEditarPago ">Editar</span>
                                        <center>
                                            <span class="PalabraEditarPago2 ">
                                                <i data-feather="edit" class="iconosMetaforas2"></i>
                                            </span>
                                        </center>
                                    </a>

                                    <a href="#" class="btn btn-danger btn-sm boton-tabla shadow botonesEditEli" style="border-radius: 5px;"data-toggle="modal" data-target="#eliminarResidente" onclick="Eliminar('{{$key->id}}')">
                                        <span class="PalabraEditarPago ">Eliminar</span>
                                        <center>
                                            <span class="PalabraEditarPago2 ">
                                                <i data-feather="trash" class="iconosMetaforas2"></i>
                                            </span>
                                        </center>
                                    </a>
                                </td>
                                @if($key->status == 'activo')
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
                        <!-- <tr style="display: none;">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr> -->
                        @endforeach()
                    </tbody>
                </table>
            </div>
        </div>
    </div>

        




@include('root.modales.crearAdmin')
@include('root.modales.eliminarAdmin')
@include('root.modales.editarAdmin')
    </div>
@endsection

<script type="text/javascript">
        function Editar(id,name,rut,email,status) {
            $('#editarAdmin').modal('show');
            $('#id_admin_e').val(id);
            $('#name_e').val(name);
            $('#rut_e').val(rut.substr(0,(rut.length-2)));
            $('#verificador_e').val(rut.substr(-1,(rut.length)));
            $('#email_e').val(email);
            $('#status_e').val(status);
        }

        function CambiarContraseña() {
            if($('#CheckCambiarContraseña').prop('checked')){

                $('#verCambiarContraseña').fadeIn(300);
                $('#contraseñaE').attr('required',true);
                $('#confirmarContraseñaE').attr('required',true);
                
            }else{

                $('#verCambiarContraseña').fadeOut('slow',
                    function() { 
                        $(this).css('display','none');
                });
                $('#contraseñaE').removeAttr('required',false);
                $('#confirmarContraseñaE').removeAttr('required',false);               
            }
        }
        
    </script>
    <script type="text/javascript">

        function Eliminar(id) {
            $('#eliminarAdmin').modal('show');
            $('#id_admin').val(id);
        }
        // function decimal(valor) {
        //     alert(valor.length);
        //     var valor2='';

        //     if(valor.length=<3){
        //         valor2=String(valor.substr(1,2,3)+'.'+valor.substr(4,5,6));
        //     }

        //     alert(valor2);



        // }
    </script>