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
                        <li class="breadcrumb-item active" aria-current="page">Multas/Recargas</li>
                    </ol>
                </nav>
                <h4 class="mb-1 mt-0">Multas/Recargas</h4>
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
    <div class="card border border-danger rounded card-tabla shadow p-3 mb-5 bg-white rounded" style="display: none;">
            <div class="row justify-content-center">
                @if(\Auth::user()->tipo_usuario == 'Admin')
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12 offset-md-12">
                                <a class="btn btn-warning boton-tabla shadow" data-toggle="modal" data-target="#AsignarMR" onclick="asignar_mr()" style="
                                    border-radius: 10px;
                                    color: white;
                                    height: 35px;
                                    margin-bottom: 5px;
                                    margin-top: 5px;
                                    float: right;">
                                    <span class="PalabraEditarPago ">Asignar M/R</span>
                                    <center>
                                        <span class="PalabraEditarPago2 ">
                                            <i data-feather="plus" class="iconosMetaforas2"></i>
                                        </span>
                                    </center>
                                </a>
                                <a class="btn btn-success boton-tabla shadow" data-toggle="modal" data-target="#crearMulta" onclick="asignar_mr()" style="
                                    border-radius: 10px;
                                    color: white;
                                    height: 35px;
                                    margin-bottom: 5px;
                                    margin-top: 5px;
                                    float: right;">
                                    <span class="PalabraEditarPago ">Nuevo Multa/Recarga</span>
                                    <center>
                                        <span class="PalabraEditarPago2 ">
                                            <i data-feather="key" class="iconosMetaforas2"></i>
                                        </span>
                                    </center>
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
                
    
            <div class="col-md-12">
                <table class="table dataTable data-table-basic table-curved table-striped tabla-estilo" style="width: 100%;">
                    <thead>
                        @if(\Auth::user()->tipo_usuario == 'Admin')
                            <tr class="table-default text-white">
                            <td colspan="3" align="center">
                                <div class="card border border-danger" style="" role="alert">
                                    <span class="text-dark p-1 mb-1"><strong>Aviso: </strong><br>-Seleccione a una multa/recarga para ver mas opciones.</span>
                                </div>
                            </td>
                            <td colspan="3"></td>
                        @endif
                        </tr>
                        <tr class="bg-primary text-white" id="th2" style="display: none">
                            <th width="10"></th>
                            <th>
                                <span class="PalabraEditarPago">Motivo</span>
                                <span class="PalabraEditarPago2">M</span>
                            </th>
                            <th colspan="2" align="center">
                                <center>
                                    <span class="PalabraEditarPago">Opciones</span>
                                    <span class="PalabraEditarPago2">O</span>
                                </center>
                            </th>
                            <th><span class="PalabraEditarPago">Asignados</span>
                                <span class="PalabraEditarPago2">A</span></th>
                            <th>
                                <span class="PalabraEditarPago">Status</span>
                                <span class="PalabraEditarPago2">S</span>
                            </th>
                        </tr>
                        <tr class="bg-danger text-white" id="th1">
                            <th></th>
                            <th>
                                <span class="PalabraEditarPago" align="center">Motivo</span>
                                <span class="PalabraEditarPago2" align="center">M</span>
                            </th>
                            <th>
                                <span class="PalabraEditarPago" align="center">Observación</span>
                                <span class="PalabraEditarPago2" align="center">O</span>
                            </th>
                            <th>
                                <span class="PalabraEditarPago" align="center">Monto</span>
                                <span class="PalabraEditarPago2" align="center">$</span>
                            </th>
                            <th>
                                <span class="PalabraEditarPago" align="center">Tipo</span>
                                <span class="PalabraEditarPago2" align="center">T</span>
                            </th>
                            <th>
                                <span class="PalabraEditarPago" align="center">Status</span>
                                <span class="PalabraEditarPago2" align="center">I</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(\Auth::user()->tipo_usuario == 'Admin')
                            @foreach($mr as $key)
                                <tr id="vista1-{{$key->id}}" onclick="opcionesTabla(1,'{{$key->id}}')">
                                    <td></td>
                                    <td>{{$key->motivo}}</td>
                                    <td>{{$key->observacion}}</td>
                                    <td>{{$key->monto}}</td>
                                    <td>{{$key->tipo}}</td>
                                    @if($key->status == 'Pagada')
                                        <td style="position: all;">
                                                <span class="tituloTabla text-success"><strong>Pagada</strong></span>
                                                <span class="tituloTabla2 text-success"><strong>P</strong></span>
                                        </td>
                                     @elseif($key->status == 'Enviada')
                                        <td style="position: all;">
                                                <span class="tituloTabla text-info"><strong>Enviada</strong></span>
                                                <span class="tituloTabla2 text-info"><strong>W</strong></span>
                                        </td>
                                    @else
                                        <td style="position: all;">
                                                <span class="tituloTabla text-warning"><strong>Por Confirmar</strong></span>
                                                <span class="tituloTabla2 text-warning"><strong>P/C</strong></span>
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
                                        <span>{{$key->motivo}}</span>
                                    </td>
                                    <td colspan="2" align="center">
                                        <a href="#" class="btn btn-warning btn-sm boton-tabla shadow botonesEditEli" data-toggle="modal" data-target="#editarMulta" onclick="EditarMR('{{$key->id}}','{{$key->motivo}}','{{$key->monto}}','{{$key->tipo}}','{{$key->observacion}}')" >
                                            <span class="PalabraEditarPago ">Editar</span>
                                            <center>
                                                <span class="PalabraEditarPago2 ">
                                                    <i data-feather="edit" class="iconosMetaforas2"></i>
                                                </span>
                                            </center>
                                        </a>

                                        <a href="#" class="btn btn-danger btn-sm boton-tabla shadow botonesEditEli"data-toggle="modal" data-target="#eliminarMulta" onclick="eliminar('{{$key->id}}')" class="btn btn-danger btn-sm">
                                            <span class="PalabraEditarPago ">Eliminar</span>
                                            <center>
                                                <span class="PalabraEditarPago2 ">
                                                    <i data-feather="trash" class="iconosMetaforas2"></i>
                                                </span>
                                            </center>
                                        </a>

                                        
                                    </td>
                                    <td style="display: none"></td>
                                    <td>
                                        <a href="#" class="btn btn-info btn-sm boton-tabla shadow botonesEditEli" onclick="verAsignados('{{$key->id}}')" class="btn btn-danger btn-sm">
                                            <span class="PalabraEditarPago ">Ver Asignados</span>
                                            <center>
                                                <span class="PalabraEditarPago2 ">
                                                    <i data-feather="eye" class="iconosMetaforas2"></i>
                                                </span>
                                            </center>
                                        </a>
                                    </td>
                                    @if($key->status == 'Pagada')
                                        <td style="position: all;">
                                                <span class="tituloTabla text-success"><strong>Pagada</strong></span>
                                                <span class="tituloTabla2 text-success"><strong>P</strong></span>
                                        </td>
                                     @elseif($key->status == 'Enviada')
                                        <td style="position: all;">
                                                <span class="tituloTabla text-info"><strong>Enviada</strong></span>
                                                <span class="tituloTabla2 text-info"><strong>W</strong></span>
                                        </td>
                                    @else
                                        <td style="position: all;">
                                                <span class="tituloTabla text-warning"><strong>Por Confirmar</strong></span>
                                                <span class="tituloTabla2 text-warning"><strong>P/C</strong></span>
                                        </td>
                                    @endif
                                    

                                </tr>
                                <tr style="display: none;">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @endforeach()
                        @else
                            @foreach($asignacion as $key)
                                <tr>
                                    <td align="center">
                                    </td>
                                    <td>{{$key->motivo}}</td>
                                    <td>{{$key->observacion}}</td>
                                    <td>{{$key->monto}}</td>
                                    <td>{{$key->tipo}}</td>
                                    @if($key->status == 'Pagada')
                                        <td style="position: all;">
                                                <span class="tituloTabla text-success"><strong>Pagada</strong></span>
                                                <span class="tituloTabla2 text-success"><strong>P</strong></span>
                                        </td>
                                     @elseif($key->status == 'Enviada')
                                        <td style="position: all;">
                                                <span class="tituloTabla text-info"><strong>Enviada</strong></span>
                                                <span class="tituloTabla2 text-info"><strong>W</strong></span>
                                        </td>
                                    @else
                                        <td style="position: all;">
                                                <span class="tituloTabla text-warning"><strong>Por Confirmar</strong></span>
                                                <span class="tituloTabla2 text-warning"><strong>P/C</strong></span>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach()
                        @endif
                        
                    </tbody>
                    
                </table>
            </div>
    </div>

    <form action="{{ route('multas_recargas.store') }}" method="POST">
        @csrf
        <div class="modal fade" id="crearMulta" role="dialog">
            <div class="modal-dialog modals-default">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Nueva Multa</h4>
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <center>
                        
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="motivo" placeholder="Motivo" class="form-control" required="required">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea name="observacion" placeholder="Observación" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="number" name="monto" class="form-control" placeholder="Monto" required="required">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <select name="tipo" placeholder="Tipo de Multa" class="form-control select2" required="required">
                                        	<option value="Multa">Multa</option>
                                        	<option value="Recarga">Recarga</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </center>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" >Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    {!! Form::open(['route' => ['multas_recargas.update',1033],'method' => 'PUT', 'name' => 'EditarMulta', 'id' => 'editar_multa', 'data-parsley-validate']) !!}
        @csrf
        <div class="modal fade" id="editarMulta" role="dialog">
            <div class="modal-dialog modals-default">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Editar <span id="mensajeEditar"></span></h4>
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <center>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input id="motivo_e" type="text" name="motivo" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea id="observacion_e" name="observacion" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input id="monto_e" type="number" name="monto" class="form-control" placeholder="Monto">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <select name="tipo" id="tipo_edit" class="select2">
                                        	<option value="Multa">Multa</option>
                                        	<option value="Recarga">Recarga</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </center>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="id_edit" name="id">
                        <button type="submit" class="btn btn-success" >Editar</button>
                    </div>
                </div>
            </div>
        </div>
    {!! Form::close() !!}

    {!! Form::open(['route' => ['multas_recargas.destroy',1033],'method' => 'DELETE', 'name' => 'EliminarMulta', 'id' => 'eliminar_multa', 'data-parsley-validate']) !!}
        @csrf
        <div class="modal fade" id="eliminarMulta" role="dialog">
            <div class="modal-dialog modals-default">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Eliminar Multa</h4>
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h2>¡Atención!</h2>
                        <h4>¿Está realmente seguro de querer eliminar este Multa?</h4>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id_mr" id="id_delete">
                        <button type="submit" class="btn btn-success" >Eliminar</button>
                    </div>
                </div>
            </div>
        </div>
    {!! Form::close() !!}

    <div class="modal fade" id="verAsignadosMulta" role="dialog">
        <div class="modal-dialog modals-default">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Asignaciones de la Multa/Recarga</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <center>
                        <div id="ver_multas_asignadas"></div>
                    </center>
                </div>
            </div>
        </div>
    </div>
    

@endsection

<script type="text/javascript">
    
    function EditarMR(id,motivo,monto,tipo,observacion) {

        $('#id_edit').val(id);
        $('#motivo_e').val(motivo);
        $('#monto_e').val(monto);
        $('#observacion_e').val(observacion);
        $("#tipo_edit").val(tipo);
        $("#mensajeEditar").val(tipo);
    }

    function eliminar(id) {
        $('#id_delete').val(id);
    }
    function verAsignados(id_multa){
        $('#ver_multas_asignadas').empty();
        $('#verAsignadosMulta').modal('show');
        
        $.get('mr/'+id_multa+'/asignados', function(data) {
        })
        .done(function(data) {
            if(data.length>0){
                for (var i = 0; i < data.length; i++) {
                    $('#ver_multas_asignadas').append(
                        '<div style="background-color:#AEFBFF; border-radius:10px; height:30px;">'+
                            '<div class="row justify-content-md-center">'+
                                '<div class="col-md-4">'+
                                    '<div class="form-group">'+
                                        '<center><label>'+data[i].nombres+' '+data[i].apellidos+'</label></center>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="col-md-4">'+
                                    '<div class="form-group">'+
                                        '<center><label>'+data[i].rut+'</label></center>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="col-md-4">'+
                                    '<div class="form-group">'+
                                        '<center><label>'+data[i].telefono+'</label></center>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                        '</div><br>'
                    );
                }
            }else{
                $('#ver_multas_asignadas').append('<h5>No se encuentra asignada a ningún residente</5>');
            }
        });
    }
</script>