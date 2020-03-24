@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Estacionamientos</h1>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                
                <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12 offset-md-9">
                        <a class="btn btn-success" data-toggle="modal" data-target="#crearEstacionamiento" style="border-radius: 30px; color: white;">
                            <span> Nuevo Estacionamiento </span>
                        </a>
                    </div>
                </div>
            </div>
                    
        
            <div class="col-md-12">
                <hr>

                <table class="table table-hover" id="myTable" width="100%">
                    <thead>
                        <tr>
                            <th>Idem</th>
                            <th>Año</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($estacionamientos as $key)
                            @foreach($mensualidadE as $key2)
                                @if($key->id == $key2->id_estacionamiento)
                                    <tr>
                                        <td>{{$key->idem}}</td>
                                        <td>{{$key2->anio}}</td>
                                        <td>{{$key->status}}</td>
                                        <td>
                                            <a href="#" data-toggle="modal" data-target="#editarEstacionamiento" onclick="editar('{{$key->id}}','{{$key->idem}}','{{$key2->anio}}','{{$key->status}}')" class="btn btn-warning btn-sm">Editar</a>

                                            <a href="#" data-toggle="modal" data-target="#eliminarEstacionamiento" onclick="eliminar('{{$key->id}}')" class="btn btn-danger btn-sm">Eliminar</a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach()
                        @endforeach()
                    </tbody>
                </table>

            </div>
            
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
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
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

                            <div class="row">
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
                            </div>

                            <hr>
                            <h4>Mensualidad del estacionamiento</h4>


                            <div class="widget-tabs-list">
                                <ul class="nav nav-tabs tab-nav-left">
                                    <li class="active"><a class="active" data-toggle="tab" href="#mes_e" onclick="opcion(1)">Montos por mes</a></li>
                                    <li><a data-toggle="tab" href="#anio_e" onclick="opcion(2)">Montos por año</a></li>
                                </ul>
                                <div class="tab-content tab-custom-st">
                                    <div id="mes_e" class="tab-pane fade in active show">
                                        <div class="tab-ctn">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="add-todo-list notika-shadow ">
                                                        <div class="card-box">
                                                            @php $i=0; @endphp
                                                            @foreach($meses as $key)
                                                                @if(date('m') <= $key->id)
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <input type="hidden" value="{{$key->mes}}" name="mes[]" id="meses_e{{$i+1}}" class="form-control-plaintext">
                                                                                <label>{{$key->mes}}</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <div class="input-group mb-2">
                                                                                    <div class="input-group-prepend">
                                                                                        <div class="input-group-text">$</div>
                                                                                    </div>
                                                                                    <input type="number" name="monto[]" id="montoMese_e{{$i+1}}" class="form-control" placeholder="10">
                                                                                    <div class="input-group-prepend">
                                                                                        <div class="input-group-text">.00</div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                                @php $i++; @endphp
                                                            @endforeach()

                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="anio_e" class="tab-pane fade">
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
                                                                            <input type="text" name="monto" class="form-control" id="montoAnio_e" placeholder="10" disabled>
                                                                            <div class="input-group-prepend">
                                                                                <div class="input-group-text">.00</div>
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
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="id" id="id_e">
                                <input type="hidden" name="opcion" id="opcion_e" value="1">
                                <button type="submit" class="btn btn-success" >Guardar</button>
                            </div>
                        </div>
                    </div>
            </div>
        {!! Form::close() !!}
        </div>


        <form action="{{ route('estacionamientos.destroy',1033) }}" method="DELETE">
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
                            <input type="text" name="id" id="id">
                            <button type="submit" class="btn btn-danger" >Eliminar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>

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

                        <div class="row">
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
                        </div>

                        <hr>
                        <h4>Mensualidad del estacionamiento</h4>


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
                                                            @if(date('m') <= $key->id)
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
                                                                                <div class="input-group-prepend">
                                                                                    <div class="input-group-text">.00</div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
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
                                                                        <input type="text" name="monto" class="form-control" id="montoAnio" placeholder="10" disabled>
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text">.00</div>
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
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="opcion" id="opcion" value="1">
                            <button type="submit" class="btn btn-success" >Guardar</button>
                        </div>
                    </div>
                </div>
        </div>
    </form>

    

                
            



@endsection

<script type="text/javascript">

    function eliminar(id) {
        $('#id').val(id);
    }

    function editar(id, idem, anio, status) {

        var f = new Date();
        var m = f.getMonth();

        $.get('estacionamientos/'+id+'/'+anio+'/buscar_mensualidad', function(data) {
            
            $('#id_e').val(id);
            $('#idem').val(idem);
            $('#status_e').val(status);
            $('#anio2').val(anio);

            for (var i = 0; i < 13; i++) {
                $('#montoMese_e'+i).empty();
            }
            $('#montoAnio_e').empty();

            if (data.length > 0) {
                for (var i = 0; i < 13; i++) {
                    if (data[i].mes >= m) {
                        $('#montoMese_e'+data[i].mes).val(data[i].monto);
                        console.log(data[i].mes);
                        $('#montoAnio_e').val(data[i].monto).prop('disabled',false);
                    }
                }
            }
        });
    }

    function opcion(opcion) {
        var f = new Date();
        var anio=f.getFullYear();
        // var mes=['','Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
        $('#opcion').val(opcion);
        $('#opcion_e').val(opcion);

        if (opcion==2) {
            for (var i = 0; i < 13; i++) {
                // $('#meses'+i).prop('disabled',true).prop('required',false);
                $('#montoMeses'+i).prop('disabled',true).val(null).prop('required',false);
            }
            // $('#anio2').prop('disabled',false).val(anio).prop('required',true);
            $('#montoAnio').prop('disabled',false).prop('required',true);
        }else {
            for (var i = 0; i < 13; i++) {
                // $('#meses'+i).prop('disabled',false).prop('required',true);
                $('#montoMeses'+i).prop('disabled',false).val(null).prop('required',true);
            }
            // $('#anio2').prop('disabled',true).val(null).prop('required',false);
            $('#montoAnio').prop('disabled',true).val(null).prop('required',false);
        }

    }
    
</script>