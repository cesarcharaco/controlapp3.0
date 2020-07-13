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
                        <tr class="bg-info text-white">
                            <th></th>
                            <th>
                                <span class="tituloTabla">Nombres</span>
                                <span class="tituloTabla2">N</span>
                            </th>
                            <th>
                                <span class="tituloTabla">Rut</span>
                                <span class="tituloTabla2">R</span>
                            </th>
                            <th>
                                <span class="tituloTabla">Email</span>
                                <span class="tituloTabla2">@</span>
                            </th>
                            <th>
                                <span class="tituloTabla">Registrado el</span>
                                <span class="tituloTabla2">R</span>
                            </th>
                            <th>
                                <span class="tituloTabla">Status</span>
                                <span class="tituloTabla2">S</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($admin as $key)
                            <tr>
                                <td align="center">
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