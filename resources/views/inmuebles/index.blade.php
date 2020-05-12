@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Inmuebles</h1>
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
                                    <a class="btn btn-success" data-toggle="modal" data-target="#crearInmueble" style="border-radius: 30px; color: white;">
                                        <span> Nuevo Inmueble </span>
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
                                <th>Tipo</th>
                                <th>Estacionamientos</th>
                                <th>Status</th>
                                <!-- <th>Mensualidades</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($inmuebles as $key)
                                <tr>
                                    <td align="center">
                                        @if(\Auth::user()->tipo_usuario == 'Admin')
                                            <a href="#" class="btn btn-warning btn-sm" style="border-radius: 50px;" onclick="select(2,'{{$key->id}}','{{$key->idem}}','{{$key->tipo}}','{{$key->status}}')"><i data-feather="edit"></i></a>

                                            <a href="#" class="btn btn-danger btn-sm" style="border-radius: 50px;" onclick="select(3,'{{$key->id}}','{{$key->idem}}','{{$key->tipo}}','{{$key->status}}')"><i data-feather="trash-2"></i></a>
                                        @endif
                                    </td>
                                    <td>{{$key->idem}}</td>
                                    <td>{{$key->tipo}}</td>
                                    <td>Si</td>
                                    <td>{{$key->status}}</td>
                                    {{--<td>
                                        @if(\Auth::user()->tipo_usuario == 'Admin')
                                            <select class="form-control" id="selectO" onchange="mensual(this.value,'{{$key->id}}');">
                                                <option value="0">Seleccionar opción</option>
                                                <option value="1">Registrar</option>
                                                <option value="2">Editar</option>
                                                <option value="3">Eliminar</opt     ion>
                                                <option value="4">Ver registros</option>
                                            </select>
                                        @endif                                          
                                    </td>--}}
                                </tr>
                            @endforeach()
                        </tbody>
                    </table>
                </div>
            </div>
            

<!-- --------------------------------------------VER InmuebleS--------------------------------------------------------- -->
            <div class="modal fade" id="VerInmueble" role="dialog">
                <div class="modal-dialog modals-default">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>Ver Inmueble</h4>
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nombre del Inmueble</label>
                                        <span id="ver_idem"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Tipo de Inmueble</label>
                                        <span id="ver_tipo"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Estado del Inmueble</label>
                                        <span id="ver_status"></span>
                                    </div>
                                </div>
                            </div>
                        </div>                            
                    </div>
                </div>
            </div>
<!-- --------------------------------------------FIN REGISTRAR InmuebleS--------------------------------------------------------- -->

<!-- --------------------------------------------VER InmuebleS--------------------------------------------------------- -->
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
                            <div id="fechasM"></div>
                            <div id="buttonShow"></div>
                            <div id="MesesM"></div>
                            <input type="hidden" name="id" id="idShowM">
                        </div>                            
                    </div>
                </div>
            </div>
<!-- --------------------------------------------FIN REGISTRAR InmuebleS--------------------------------------------------------- -->





<!-- --------------------------------------------CREAR MENSUALIDAD--------------------------------------------------------- -->
{!! Form::open(['route' => ['inmuebles.registrar_mensualidad'],'method' => 'POST', 'name' => 'registrar_mensualidad', 'id' => 'registrar_mensualidad', 'data-parsley-validate']) !!}
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
                        </div> 

                        <div class="modal-footer">
                            <input type="hidden" name="id_inmueble" id="idCreateM">
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
        {!! Form::open(['route' => ['inmuebles.editar_mensualidad'],'method' => 'POST', 'name' => 'editar_mensualidad', 'id' => 'editar_mensualidad', 'data-parsley-validate']) !!}
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
                        </div> 

                        <div class="modal-footer">
                            <input type="hidden" name="id_inmueble" id="idEditM">
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
        {!! Form::open(['route' => ['inmuebles.eliminar_mensualidad'],'method' => 'POST', 'name' => 'eliminar_mensualidad', 'id' => 'eliminar_mensualidad', 'data-parsley-validate']) !!} 
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
                        </div> 

                        <div class="modal-footer">
                            <input type="hidden" name="id_inmueble" id="idDeleteM">
                            <input type="hidden" name="anio" id="anioDeleteM">
                            <button type="submit" class="btn btn-danger" id="buttonD" disabled style="border-radius: 50px;"><i data-feather="trash-2"></i></button>
                        </div>                            
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
<!-- --------------------------------------------FIN ELIMINAR MENSUALIDAD--------------------------------------------------------- -->



<!-- --------------------------------------------EDITAR InmuebleS--------------------------------------------------------- -->
         {!! Form::open(['route' => ['inmuebles.update',1], 'method' => 'PUT', 'name' => 'editar_inmueble', 'id' => 'editar_inmueble', 'data-parsley-validate']) !!}
                    @csrf
            <div class="modal fade" id="editarInmueble" role="dialog">
                <div class="modal-dialog modals-default">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>Editar Inmueble</h4>
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nombre del Inmueble</label>
                                        <input type="text" id="idem" name="idem" placeholder="Idem del Inmueble" class="form-control" required="required">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Tipo de Inmueble</label>
                                        <select name="tipo" id="tipo" class="form-control" required placeholder="Introduzca el tipo de Inmueble">
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
                                        <select name="status" id="status_e" class="form-control" required placeholder="Introduzca el status del Inmueble">
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
                                        <select name="estacionamiento" class="form-control select2" required placeholder="¿Algún estacionamiento para el inmueble?">
                                            <option value="Si" selected="selected">Si</option>
                                            <option value="No">No</option>

                                            
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="row">
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
                            </div> -->
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
<!-- --------------------------------------------FIN EDITAR InmuebleS--------------------------------------------------------- -->




<!-- --------------------------------------------ELIMINAR InmuebleS--------------------------------------------------------- -->
        {!! Form::open(['route' => ['inmuebles.destroy',1033], 'method' => 'DELETE']) !!}
            @csrf
            <div class="modal fade" id="eliminarInmueble" role="dialog">
                <div class="modal-dialog modals-default">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>Eliminar Inmueble</h4>
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h3>¡ATENCIÓN!</h3>
                            <p>Está a punto de eliminar este inmueble con todos sus registros y mensualidades. Esta opción no se podrá deshacer</p>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="id" id="id">
                            <button type="submit" class="btn btn-danger" style="border-radius: 50px;"><i data-feather="trash-2"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
<!-- --------------------------------------------FIN ELIMINAR InmuebleS--------------------------------------------------------- -->

    </div>




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
                                        <select name="estacionamiento" class="form-control select2" required placeholder="¿Algún estacionamiento para el inmueble?">
                                            <option value="Si" selected="selected">Si</option>
                                            <option value="No">No</option>

                                            
                                        </select>
                                    </div>
                                </div>
                            </div>

                        <!-- <div class="row">
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
                        </div> -->

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
    </form>

<!-- --------------------------------------------FIN REGISTRAR InmuebleS------------------------------------------------------ -->

    

                
            



@endsection

<script type="text/javascript">

    function select(accion, id, idem, tipo, status) {

        if (accion==1) {
            $('#VerInmueble').modal('show');
            $('#ver_idem').val(idem);
            $('#ver_tipo').val(tipo);
            $('#ver_status').val(status);
        }
        if(accion==2){
            editar(id, idem, tipo, status);
            $('#editarInmueble').modal('show');
        }
        if (accion==3) {
            $('#id').val(id);
            $('#eliminarInmueble').modal('show');
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

            $.get('inmuebles/'+id+'/buscar_anios', function(data) {
        
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
                    $('#fechasM').append('El Inmueble no posee mensualidades');

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

            $.get('inmuebles/'+id+'/'+anio+'/buscar_mensualidad', function(data) {
        

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

            $.get('inmuebles/'+id+'/'+anio+'/buscar_mensualidad', function(data) {
        
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

            $.get('inmuebles/'+id+'/'+anio+'/buscar_mensualidad', function(data) {
        
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
            $.get('inmuebles/'+id+'/'+anio+'/buscar_mensualidad', function(data) {
        
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

    function editar(id, idem, tipo,status) {

        $('#id_e').val(id);
        $('#idem').val(idem);
        $('#tipo').val(tipo);
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