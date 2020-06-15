@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Estacionamientos</h1>
            </div>
        </div>
        @include('flash::message')
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-center">
                    @if(\Auth::user()->tipo_usuario == 'Admin')
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12 offset-md-9">
                                    <a class="btn btn-success" data-toggle="modal" data-target="#crearEstacionamiento" style="border-radius: 30px; color: white;">
                                        <span> Nuevo Estacionamiento </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                    
        
            <div class="col-md-12">
                <hr>
                <div style="overflow-x: auto;">
                    <table class="data-table-basic" id="myTable" width="100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Idem</th>
                                <th>Status</th>
                                <!-- <th>Mensualidades</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($estacionamientos as $key)
                                <tr>
                                    <td align="center">
                                        @if(\Auth::user()->tipo_usuario == 'Admin')
                                            <a href="#" class="btn btn-warning btn-sm" style="border-radius: 50px;" onclick="select(2,'{{$key->id}}','{{$key->idem}}','{{$key->status}}')"><i data-feather="edit"></i></a>

                                            <a href="#" class="btn btn-danger btn-sm" style="border-radius: 50px;" onclick="select(3,'{{$key->id}}','{{$key->idem}}','{{$key->status}}')"><i data-feather="trash-2"></i></a>
                                        @endif
                                        
                                    </td>
                                    <td>{{$key->idem}}</td>
                                    <td>{{$key->status}}</td>
                                    <!-- <td>
                                        <select class="form-control" id="selectO" onchange="mensual(this.value,'{{$key->id}}');">
                                            <option value="0">Seleccionar opción</option>
                                            <option value="1">Registrar</option>
                                            <option value="2">Editar</option>
                                            <option value="3">Eliminar</opt     ion>
                                            <option value="4">Ver registros</option>
                                        </select>                                            
                                    </td> -->
                                </tr>
                            @endforeach()
                        </tbody>
                    </table>
                </div>
            </div>
            

<!-- --------------------------------------------VER ESTACIONAMIENTOS--------------------------------------------------------- -->
            <div class="modal fade" id="VerEstacionamiento" role="dialog">
                <div class="modal-dialog modals-default">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>Ver Estacionamiento</h4>
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <center>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Nombre del estacionamiento</label>
                                            <span id="ver_idem"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Estado del estacionamiento</label>
                                            <span id="ver_status"></span>
                                        </div>
                                    </div>
                                </div>
                            </center>
                        </div>                            
                    </div>
                </div>
            </div>
<!-- --------------------------------------------FIN REGISTRAR ESTACIONAMIENTOS--------------------------------------------------------- -->

<!-- --------------------------------------------VER ESTACIONAMIENTOS--------------------------------------------------------- -->
            <div class="modal fade" id="VerMensualidades" role="dialog">
                <div class="modal-dialog modals-default">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>Ver Mensualidades</h4>
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <center>
                                <div id="fechasM"></div>
                                <div id="buttonShow"></div>
                                <div id="MesesM"></div>
                                <input type="hidden" name="id" id="idShowM">
                            </center>
                        </div>                            
                    </div>
                </div>
            </div>
<!-- --------------------------------------------FIN REGISTRAR ESTACIONAMIENTOS--------------------------------------------------------- -->





<!-- --------------------------------------------CREAR MENSUALIDAD--------------------------------------------------------- -->
{!! Form::open(['route' => ['estacionamientos.registrar_mensualidad'],'method' => 'POST', 'name' => 'registrar_mensualidad', 'id' => 'registrar_mensualidad', 'data-parsley-validate']) !!}
    @csrf
            <div class="modal fade" id="createMensualidad" role="dialog">
                <div class="modal-dialog modals-default">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>Registrar una nueva mensualidad</h4>
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <center>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Especifique el año para la mensualidad</label>
                                            <select name="anio" id="SelectAnio1" class="form-control" onchange="accionM(1,this.value);">
                                                <option value="0">Seleccione el año</option>
                                                <?php $anio=date('Y');?>
                                                @for($i=0; $i<10; $i++)
                                                    <option value="{{$anio++}}">{{$anio-1}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="buttonCreate"></div>
                                        <div id="createMensuality1"></div>
                                        <div id="createMensuality2"></div>
                                    </div>
                                </div>
                            </center>
                        </div> 

                        <div class="modal-footer">
                            <input type="hidden" name="id_estacionamiento" id="idCreateM">
                            <input type="hidden" name="anio" id="anioCreateM">
                            <input type="hidden" id="accionCreate" name="accion" value="1">
                            <button type="submit" class="btn btn-success" disabled id="buttonC" style="border-radius: 50px;"><i data-feather="check-circle"></i></button>
                        </div>                           
                    </div>
                </div>
            </div>
{!! Form::close() !!}
<!-- --------------------------------------------FIN CREAR MENSUALIDAD--------------------------------------------------------- -->







<!-- --------------------------------------------EDITAR MENSUALIDAD--------------------------------------------------------- -->
        {!! Form::open(['route' => ['estacionamientos.editar_mensualidad'],'method' => 'POST', 'name' => 'editar_mensualidad', 'id' => 'editar_mensualidad', 'data-parsley-validate']) !!}
        @csrf
            <div class="modal fade" id="editarMensualidad" role="dialog">
                <div class="modal-dialog modals-default">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>Editar mensualidad</h4>
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <center>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Especifique el año para editar la mensualidad</label>
                                            <select name="anio" id="SelectAnio2" class="form-control" onchange="accionM(2,this.value);">
                                                <option value="0">Seleccionar año</option>
                                                <?php $anio=date('Y');?>
                                                @for($i=0; $i<10; $i++)
                                                    <option value="{{$anio++}}">{{$anio-1}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="buttonEdit"></div>
                                        <div id="editMensuality1"></div>
                                        <div id="editMensuality2"></div>
                                    </div>
                                </div>
                            </center>
                        </div> 

                        <div class="modal-footer">
                            <input type="hidden" name="id_estacionamiento" id="idEditM">
                            <input type="hidden" name="anio" id="anioEditM">
                            <input type="hidden" id="accionEdit" name="accion" value="1">
                            <button type="submit" id="buttonE" disabled class="btn btn-warning" style="border-radius: 50px;"><i data-feather="check-circle"></i></button>
                        </div>                                                  
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
<!-- --------------------------------------------FIN EDITAR MENSUALIDAD--------------------------------------------------------- -->






<!-- --------------------------------------------ELIMINAR MENSUALIDAD--------------------------------------------------------- -->
        {!! Form::open(['route' => ['estacionamientos.eliminar_mensualidad'],'method' => 'POST', 'name' => 'eliminar_mensualidad', 'id' => 'eliminar_mensualidad', 'data-parsley-validate']) !!} 
        @csrf   
            <div class="modal fade" id="deleteMensualidad" role="dialog">
                <div class="modal-dialog modals-default">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>Eliminar una mensualidad</h4>
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <center>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Especifique el año para eliminar la mensualidad</label>
                                            <select name="anio" id="SelectAnio3" class="form-control" onchange="accionM(3,this.value);">
                                                <option value="0">Seleccione el año</option>
                                                <?php $anio=date('Y');?>
                                                @for($i=0; $i<10; $i++)
                                                    <option value="{{$anio++}}">{{$anio-1}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="deleteMensuality"></div>
                                    </div>
                                </div>
                            </center>
                        </div> 

                        <div class="modal-footer">
                            <input type="hidden" name="id_estacionamiento" id="idDeleteM">
                            <input type="hidden" name="anio" id="anioDeleteM">
                            <button type="submit" class="btn btn-danger" id="buttonD" disabled style="border-radius: 50px;"><i data-feather="trash-2"></i></button>
                        </div>                            
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
<!-- --------------------------------------------FIN ELIMINAR MENSUALIDAD--------------------------------------------------------- -->



<!-- --------------------------------------------EDITAR ESTACIONAMIENTOS--------------------------------------------------------- -->
         {!! Form::open(['route' => ['estacionamientos.update',1], 'method' => 'PUT', 'name' => 'editar_estac', 'id' => 'editar_estac', 'data-parsley-validate']) !!}
                    @csrf
            <div class="modal fade" id="editarEstacionamiento" role="dialog">
                <div class="modal-dialog modals-default">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>Editar Estacionamiento</h4>
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <center>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Nombre del estacionamiento</label>
                                            <input type="text" id="idem" name="idem" placeholder="Idem del estacionamiento" class="form-control" required="required">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Estado del estacionamiento</label>
                                            <select name="status" id="status_e" class="form-control" required placeholder="Introduzca el status del estacionamiento">
                                                <option value="Libre" selected="selected">Libre</option>
                                                <option value="Ocupado" >Ocupado</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </center>
                        </div>
                            
                        <div class="modal-footer">
                            <input type="hidden" name="id" id="id_e">
                            <input type="hidden" name="opcion" id="opcion_e" value="1">
                            <button type="submit" class="btn btn-warning" style="border-radius: 50px;"><i data-feather="edit"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
        </div>
<!-- --------------------------------------------FIN EDITAR ESTACIONAMIENTOS--------------------------------------------------------- -->




<!-- --------------------------------------------ELIMINAR ESTACIONAMIENTOS--------------------------------------------------------- -->
        {!! Form::open(['route' => ['estacionamientos.destroy',1033], 'method' => 'DELETE']) !!}
            @csrf
            <div class="modal fade" id="eliminarEstacionamiento" role="dialog">
                <div class="modal-dialog modals-default">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>Eliminar Estacionamiento</h4>
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h3>¡ATENCIÓN!</h3>
                            <p>Está a punto de eliminar un estacionamiento con todos sus registros y mensualidades. Esta opción no se podrá deshacer</p>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="id" id="id">
                            <button type="submit" class="btn btn-danger" style="border-radius: 50px;"><i data-feather="trash-2"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
<!-- --------------------------------------------FIN ELIMINAR ESTACIONAMIENTOS--------------------------------------------------------- -->

    </div>




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
                        <center>
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
                        </center>
                    </div> 
                    <div class="modal-footer">
                        <input type="hidden" name="opcion" id="opcion" value="1">
                        <button type="submit" class="btn btn-success" style="border-radius: 50px;"><i data-feather="check-circle"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </form>

<!-- --------------------------------------------FIN REGISTRAR ESTACIONAMIENTOS------------------------------------------------------ -->

    

                
            



@endsection

<script type="text/javascript">

    function select(accion, id, idem, status) {

        if (accion==1) {
            $('#VerEstacionamiento').modal('show');
            $('#ver_idem').val(idem);
            $('#ver_status').val(status);
        }
        if(accion==2){
            editar(id, idem, status);
            $('#editarEstacionamiento').modal('show');
        }
        if (accion==3) {
            $('#id').val(id);
            $('#eliminarEstacionamiento').modal('show');
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

            $.get('estacionamientos/'+id+'/buscar_anios', function(data) {
        
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
                    $('#fechasM').append('El estacionamiento no posee mensualidades');

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

            $.get('estacionamientos/'+id+'/'+anio+'/buscar_mensualidad', function(data) {
        

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

            $.get('estacionamientos/'+id+'/'+anio+'/buscar_mensualidad', function(data) {
        
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

            $.get('estacionamientos/'+id+'/'+anio+'/buscar_mensualidad', function(data) {
        
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
            $.get('estacionamientos/'+id+'/'+anio+'/buscar_mensualidad', function(data) {
        
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

    function editar(id, idem, status) {

        $('#id_e').val(id);
        $('#idem').val(idem);
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
    
</script>