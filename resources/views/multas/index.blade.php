@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Multas y Recargas</h1>
            </div>
        </div>
        @include('flash::message')
        <div class="card" style="margin-right: 50px; margin-left: 50px;">
            <div class="card-body">
                @if(\Auth::user()->tipo_usuario == 'Admin')
                    <div class="float-right">
                        <a class="btn btn-warning" onclick="asignar_mr()" data-toggle="modal" data-target="#AsignarMR" style="border-radius: 30px; color: white;">
                            <span> Asignar M/R </span>
                        </a>

                        <a class="btn btn-success" data-toggle="modal" data-target="#crearMulta" style="border-radius: 30px; color: white;">
                            <span> Nuevo Multa - Recarga </span>
                        </a>
                    </div>
                @endif
            
                <br> <br>
        
                <div class="col-md-12">
                    <div class="data-table-list">
                        <div class="table-responsive">
                            <div class="data-table-list">
                                <div class="table-responsive">
                                     <div style="overflow-x: auto;">
                                        <table class="data-table-basic" id="myTable" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Motivo</th>
                                                    <th>Observación</th>
                                                    <th>Monto</th>
                                                    <th>Tipo</th>
                                                    <th>Status</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(\Auth::user()->tipo_usuario == 'Admin')
                                                    @foreach($mr as $key)
                                                        <tr>
                                                            <td>{{$key->motivo}}</td>
                                                            <td>{{$key->observacion}}</td>
                                                            <td>{{$key->monto}}</td>
                                                            <td>{{$key->tipo}}</td>
                                                            <td>
                                                                @if($key->status == 'Enviada')
                                                                    <span class="text-primary"><strong>Enviada</strong></span>
                                                                    
                                                                @elseif($key->status == 'Pagada')
                                                                    <span class="text-success"><strong>Pagada</strong></span>

                                                                @else
                                                                    <span class="text-warning"><strong>Por Confirmar</strong></span>

                                                                @endif
                                                            </td>
                                                            <td>
                                                                <a href="#" data-toggle="modal" data-target="#editarMulta" onclick="EditarMR('{{$key->id}}','{{$key->motivo}}','{{$key->monto}}','{{$key->tipo}}','{{$key->observacion}}')" class="btn btn-warning btn-sm">Editar</a>

                                                                <a href="#" data-toggle="modal" data-target="#eliminarMulta" onclick="eliminar('{{$key->id}}')" class="btn btn-danger btn-sm">Eliminar</a>

                                                                <a href="#" onclick="verAsignados('{{$key->id}}')" class="btn btn-info btn-sm">Ver asignados</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach()
                                                @else
                                                    @foreach($asignacion as $key)
                                                        <tr>
                                                            <td>{{$key->motivo}}</td>
                                                            <td>{{$key->observacion}}</td>
                                                            <td>{{$key->monto}}</td>
                                                             <td>{{$key->tipo}}</td>
                                                            <td>
                                                                @if($key->status == 'Enviada')
                                                                    <span class="text-primary"><strong>Enviada</strong></span>
                                                                    
                                                                @elseif($key->status == 'Pagada')
                                                                    <span class="text-success"><strong>Pagada</strong></span>

                                                                @else
                                                                    <span class="text-warning"><strong>Por Confirmar</strong></span>

                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach()
                                                @endif
                                            </tbody>
                                        </table>
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