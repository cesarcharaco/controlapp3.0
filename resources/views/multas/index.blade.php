@extends('layouts.app')

@section('content')

        <style type="text/css">
        .card {
            border: 1px solid #f6f6f7!important;
            border-color: #ff3e36 !important;
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
        <input type="hidden" id="colorView" value="#ff3e36 !important">
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
                                    float: right;
                                    border: 1px solid #f6f6f7!important;
                                    border-color: #35e930  !important;
                                    background-color: #35e930  !important;">
                                    <span class="PalabraEditarPago "><strong>Asignar M/R</strong>   </span>
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
                                    float: right;
                                    border: 1px solid #f6f6f7!important;
                                    border-color: #ff3e36 !important;
                                    background-color: #ff3e36 !important;">
                                    <span class="PalabraEditarPago "><strong>Nuevo Multa/Recarga</strong>   </span>
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
                            </tr>
                        @endif
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
                                <span class="PalabraEditarPago">Anio</span>
                                <span class="PalabraEditarPago2">A</span>
                            </th>
                        </tr>
                        <tr class="text-white" id="th1" style="background-color: #ff3e36 !important;">
                            <th>#</th>
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
                                <span class="PalabraEditarPago" align="center">Anio</span>
                                <span class="PalabraEditarPago2" align="center">A</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $num=0; ?>
                        @if(\Auth::user()->tipo_usuario == 'Admin')
                            @foreach($mr as $key)
                                <tr id="vista1-{{$key->id}}" onclick="opcionesTabla(1,'{{$key->id}}')">
                                    <td align="center">{{$num=$num+1}}</td>
                                    <td>{{$key->motivo}}</td>
                                    <td>{{$key->observacion}}</td>
                                    <td>{{$key->monto}}</td>
                                    <td>{{$key->tipo}}</td>
                                    <td>{{$key->anio}}</td>
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
                                    <td>{{$key->anio}}</td>
                                    

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
                    <div id="CargandoAsignadosComprobar" style="display: none;">
                            <div class="spinner-border text-warning m-2" role="status">
                            </div>
                        </div>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <center>
                        <table class="table dataTable table-curved table-striped tabla-estilo" style="width: 100%;">
                            <thead>
                                <tr class="table-info text-white">
                                    <th>Nombres</th>
                                    <th>RUT</th>
                                    <th>Status</th>
                            </thead>
                            <tbody id="ver_multas_asignadas">
                                
                            </tbody>
                        </table>
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
        $('#CargandoAsignadosComprobar').css('display','block');
        $('#ver_multas_asignadas').empty();
        $('#verAsignadosMulta').modal('show');
        
        $.get('mr/'+id_multa+'/asignados', function(data) {
        })
        .done(function(data) {
                if(data.length>0){
                    for (var i = 0; i < data.length; i++) {
                        if(data[i].status == 'Pagada'){
                            $('#ver_multas_asignadas').append(
                                '<tr>'+
                                    '<td align="center"><center>'+data[i].nombres+' '+data[i].apellidos+'</center></td>'+
                                    '<td align="center"><center>'+data[i].rut+'</center></td>'+
                                    '<td align="center" class="text-success"><center>'+data[i].status+'</center></td>'+
                                '</tr>'
                            );
                        }else if(data[i].status == 'Por Confirmar'){
                            $('#ver_multas_asignadas').append(
                                '<tr>'+
                                    '<td align="center"><center>'+data[i].nombres+' '+data[i].apellidos+'</center></td>'+
                                    '<td align="center"><center>'+data[i].rut+'</center></td>'+
                                    '<td align="center" class="text-success"><center>'+
                                        '<div class="text-warning"><strong>' +data[i].status+'</strong> | CÓDIGO TRANS.: <b>'+data[i].referencia+'</b></div>'+'</center>'+
                                    '</td>'+
                                '</tr>'
                            );
                        }else{
                            $('#ver_multas_asignadas').append(
                                '<tr>'+
                                    '<td align="center"><center>'+data[i].nombres+' '+data[i].apellidos+'</center></td>'+
                                    '<td align="center"><center>'+data[i].rut+'</center></td>'+
                                    '<td align="center" class="text-info"><center>'+data[i].status+'</center></td>'+
                                '</tr>'
                            );
                        }
                        // $.get('mr/'+data[i].id+'/asignados2',function (data2) {
                        // })
                        // .done(function(data2) {
                        //     if(data2[i].status == 'Por Confirmar'){
                        //         $('#ver_multas_asignadas').append(
                        //             '<p class="text-warning"><strong>' +data2[i].status+'</strong> | CÓDIGO TRANS.: <b>'+data2[i].referencia+'</b></p>'
                        //         );
                        //     }else{
                        //         $('#ver_multas_asignadas').append(
                        //             '<center><label>'+data[i].rut+'</label></center>'+
                        //         );
                        //     }
                        // });
                    }
                }else{
                    $('#ver_multas_asignadas').append(
                                '<tr>'+
                                    '<td align="center" colspan="3"><center>No se encuentra asiganda a ningún residente</center></td>'+
                                '</tr>'
                            );
                }
        });
        $('#CargandoAsignadosComprobar').css('display','none');
    }
</script>