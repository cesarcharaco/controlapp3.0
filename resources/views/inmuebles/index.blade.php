@extends('layouts.app')

@section('content')
     <style type="text/css">
        .card {
            border: 1px solid #f6f6f7!important;
            border-color: #CB8C4D !important;
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
        <div class="row page-title">
            <div class="col-md-12">
                <nav aria-label="breadcrumb" class="float-right mt-1">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Inmuebles</li>
                    </ol>
                </nav>
                <h4 class="mb-1 mt-0">Inmuebles</h4>
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
    <div class="card rounded card-tabla shadow p-3 mb-5 bg-white rounded" style="display: none;">
        <div class="row justify-content-center">
            @if(\Auth::user()->tipo_usuario == 'Admin')
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12 offset-md-12">
                            <a class="btn btn-success boton-tabla shadow" data-toggle="modal" data-target="#crearInmueble" style="
                                border-radius: 10px;
                                color: white;
                                height: 35px;
                                margin-bottom: 5px;
                                margin-top: 5px;
                                float: right;
                                border: 1px solid #f6f6f7!important;
                                border-color: #CB8C4D !important;
                                background-color: #CB8C4D !important">
                                <span class="PalabraEditarPago text-white">Nuevo Inmueble</span>
                                <center>
                                    <span class="PalabraEditarPago2 text-white">
                                        <i data-feather="plus" class="iconosMetaforas2"></i>
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
                    <tr class="table-default text-white">
                        <td colspan="2" align="center">
                            <div class="card border border-info" role="alert">
                                <span class="text-dark p-1 mb-1"><strong>Aviso: </strong><br>-Seleccione a un inmueble para ver mas opciones.</span>
                            </div>
                        </td>
                        <td colspan="2"></td>
                    </tr>
                    <tr class="text-white" id="th1" style="background-color: #CB8C4D;">
                        <th></th>
                        <th>
                            <span class="tituloTabla">Idem</span>
                            <span class="tituloTabla2">I</span>
                        </th>
                        <th>
                            <span class="tituloTabla">Tipo</span>
                            <span class="tituloTabla2">T</span>
                        </th>
                        <!-- <th>Estacionamientos</th> -->
                        <th>
                            <span class="tituloTabla">Status</span>
                            <span class="tituloTabla2">S</span>
                        </th>
                        <!-- <th>Mensualidades</th> -->
                    </tr>
                    <tr class="bg-primary text-white" id="th2" style="display: none">
                        <th width="10"></th>
                        <th>
                            <span class="PalabraEditarPago">Idem</span>
                            <span class="PalabraEditarPago2">I</span>
                        </th>
                        <th>
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
                </thead>
                <tbody>
                    @foreach($inmuebles as $key)
                        <tr id="vista1-{{$key->id}}" onclick="opcionesTabla(1,'{{$key->id}}')">
                            <td align="center">
                                
                            </td>
                            <td style="position: all;">{{$key->idem}}</td>
                            <td style="position: all;">{{$key->tipo}}</td>
                            <!-- <td>Si</td> -->
                            @if(\Auth::user()->tipo_usuario == 'Disponible')
                                <td style="position: all;">
                                        <span class="tituloTabla text-success"><strong>Disponible</strong></span>
                                        <span class="tituloTabla2 text-success"><strong>D</strong></span>
                                </td>
                            @else
                                <td style="position: all;">
                                        <span class="tituloTabla text-danger"><strong>No Disponible</strong></span>
                                        <span class="tituloTabla2 text-danger"><strong>N/D</strong></span>
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
                                
                                <span>{{$key->idem}}</span>
                            </td>
                            <td align="center">
                                @if(\Auth::user()->tipo_usuario == 'Admin')
                                    <a href="#" class="btn btn-warning btn-sm boton-tabla shadow botonesEditEli" style="border-radius: 5px;" onclick="select(2,'{{$key->id}}','{{$key->idem}}','{{$key->tipo}}','{{$key->status}}')">
                                        <span class="PalabraEditarPago ">Editar</span>
                                        <center>
                                            <span class="PalabraEditarPago2 ">
                                                <i data-feather="edit" class="iconosMetaforas2"></i>
                                            </span>
                                        </center>
                                    </a>

                                    <a href="#" class="btn btn-danger btn-sm boton-tabla shadow botonesEditEli" style="border-radius: 5px;" onclick="select(3,'{{$key->id}}','{{$key->idem}}','{{$key->tipo}}','{{$key->status}}')">
                                        <span class="PalabraEditarPago ">Eliminar</span>
                                        <center>
                                            <span class="PalabraEditarPago2 ">
                                                <i data-feather="trash" class="iconosMetaforas2"></i>
                                            </span>
                                        </center>
                                    </a>
                                @endif
                            </td>
                            @if(\Auth::user()->tipo_usuario == 'Disponible')
                                <td style="position: all;">
                                        <span class="tituloTabla text-success"><strong>Disponible</strong></span>
                                        <span class="tituloTabla2 text-success"><strong>D</strong></span>
                                </td>
                            @else
                                <td style="position: all;">
                                        <span class="tituloTabla text-danger"><strong>No Disponible</strong></span>
                                        <span class="tituloTabla2 text-danger"><strong>N/D</strong></span>
                                </td>
                            @endif

                        </tr>
                        <tr style="display: none;">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
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
                            <center>
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

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Pago común</label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">$</div>
                                                </div>
                                                <input type="number" name="monto[]" class="form-control" placeholder="10">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </center>
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
                            <input type="hidden" name="id_inmueble" id="idCreateM">
                            <input type="hidden" name="anio" id="anioCreateM">
                            <input type="hidden" id="accionCreate" name="accion" value="1">
                            <button type="submit" class="btn btn-success" disabled id="buttonC" style="border-radius: 50px;">Guardar</button>
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
                            <input type="hidden" name="id_inmueble" id="idEditM">
                            <input type="hidden" name="anio" id="anioEditM">
                            <input type="hidden" id="accionEdit" name="accion" value="1">
                            <button type="submit" id="buttonE" disabled class="btn btn-warning" style="border-radius: 50px;">Guardar</button>
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
                            <input type="hidden" name="id_inmueble" id="idDeleteM">
                            <input type="hidden" name="anio" id="anioDeleteM">
                            <button type="submit" class="btn btn-danger" id="buttonD" disabled style="border-radius: 50px;">Eliminar</button>
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
                            <center>
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

                                <!-- <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>¿El inmueble posee estacionamientos?</label>
                                            <select name="estacionamiento" class="form-control select2" required placeholder="¿Algún estacionamiento para el inmueble?">
                                                <option value="Si" selected="selected">Si</option>
                                                <option value="No">No</option>

                                                
                                            </select>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>¿Cuántos?</label>
                                            <input type="number" name="Cuantos[]" class="form-control" placeholder="1">
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
                            </center>
                        </div>
                            
                        <div class="modal-footer">
                            <input type="hidden" name="id" id="id_e">
                            <input type="hidden" name="opcion" id="opcion_e" value="1">
                            <button type="submit" class="btn btn-warning" style="border-radius: 50px;">Editar</button>
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
                            <center>
                            <h3>¡ATENCIÓN!</h3>
                            <p>Está a punto de eliminar este inmueble con todos sus registros y mensualidades. Esta opción no se podrá deshacer</p>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="id" id="id">
                            <button type="submit" class="btn btn-danger" style="border-radius: 50px;">Eliminar</button>
                        </div>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
<!-- --------------------------------------------FIN ELIMINAR InmuebleS--------------------------------------------------------- -->

    </div>






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