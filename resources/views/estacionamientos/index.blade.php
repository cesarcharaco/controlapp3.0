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
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($estacionamientos as $key)
                                    <tr>
                                        <td>{{$key->idem}}</td>
                                        <td>{{$key->status}}</td>
                                        <td>
                                            <a href="#" data-toggle="modal" data-target="#editarEstacionamiento" class="btn btn-warning btn-sm">Editar</a>

                                            <a href="#" data-toggle="modal" data-target="#eliminarEstacionamiento" class="btn btn-danger btn-sm">Eliminar</a>
                                        </td>
                                    </tr>
                                @endforeach()
                            </tbody>
                        </table>

                <!-- <cargaInfinita @infinite="infiniteHandler">
                    <div slot="no-more">No hay mas datos</div>
                    <div slot="spinner">Cargando...</div>
                    <div slot="no-results">Sin Resultados</div>
                </cargaInfinita> -->
                <!-- <infinite-loading @infinite="infiniteHandler"></infinite-loading> -->

            </div>
            
        </div>
        

    </div>

    <form method="POST">
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
		                                    <input type="text" v-model="idem" name="idem" placeholder="Idem del estacionamiento" class="form-control">
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


                                                                @if(date('m') <= 1)
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <input type="text" disabled="disabled" value="Enero" name="mes[]" id="meses1" class="form-control-plaintext">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <div class="input-group mb-2">
                                                                                    <div class="input-group-prepend">
                                                                                        <div class="input-group-text">$</div>
                                                                                    </div>
                                                                                    <input type="number" name="monto[]" id="montoMeses1" class="form-control" placeholder="10">
                                                                                    <div class="input-group-prepend">
                                                                                        <div class="input-group-text">.00</div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endif

                                                                @if(date('m') <= 2)
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <input type="text" disabled="disabled" value="Febrero" name="mes[]" id="meses2" class="form-control-plaintext">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <div class="input-group mb-2">
                                                                                    <div class="input-group-prepend">
                                                                                        <div class="input-group-text">$</div>
                                                                                    </div>
                                                                                    <input type="number" name="monto[]" id="montoMeses2" class="form-control" placeholder="10">
                                                                                    <div class="input-group-prepend">
                                                                                        <div class="input-group-text">.00</div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endif

                                                                @if(date('m') <= 3)
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <input type="text" disabled="disabled" value="Marzo" name="mes[]" id="meses3" class="form-control-plaintext">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <div class="input-group mb-2">
                                                                                    <div class="input-group-prepend">
                                                                                        <div class="input-group-text">$</div>
                                                                                    </div>
                                                                                    <input type="number" name="monto[]" id="montoMeses3" class="form-control" placeholder="10">
                                                                                    <div class="input-group-prepend">
                                                                                        <div class="input-group-text">.00</div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endif

                                                                @if(date('m') <= 4)
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <input type="text" disabled="disabled" value="Abril" name="mes[]" id="meses4" class="form-control-plaintext">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <div class="input-group mb-2">
                                                                                    <div class="input-group-prepend">
                                                                                        <div class="input-group-text">$</div>
                                                                                    </div>
                                                                                    <input type="number" name="monto[]" id="montoMeses4" class="form-control" placeholder="10">
                                                                                    <div class="input-group-prepend">
                                                                                        <div class="input-group-text">.00</div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endif

                                                                @if(date('m') <= 5)
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <input type="text" disabled="disabled" value="Mayo" name="mes[]" id="meses5" class="form-control-plaintext">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <div class="input-group mb-2">
                                                                                    <div class="input-group-prepend">
                                                                                        <div class="input-group-text">$</div>
                                                                                    </div>
                                                                                    <input type="number" name="monto[]" id="montoMeses5" class="form-control" placeholder="10">
                                                                                    <div class="input-group-prepend">
                                                                                        <div class="input-group-text">.00</div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endif

                                                                @if(date('m') <= 6)
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <input type="text" disabled="disabled" value="Junio" name="mes[]" id="meses6" class="form-control-plaintext">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <div class="input-group mb-2">
                                                                                    <div class="input-group-prepend">
                                                                                        <div class="input-group-text">$</div>
                                                                                    </div>
                                                                                    <input type="number" name="monto[]" id="montoMeses6" class="form-control" placeholder="10">
                                                                                    <div class="input-group-prepend">
                                                                                        <div class="input-group-text">.00</div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endif

                                                                @if(date('m') <= 7)
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <input type="text" disabled="disabled" value="Julio" name="mes[]" id="meses7" class="form-control-plaintext">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <div class="input-group mb-2">
                                                                                    <div class="input-group-prepend">
                                                                                        <div class="input-group-text">$</div>
                                                                                    </div>
                                                                                    <input type="number" name="monto[]" id="montoMeses7" class="form-control" placeholder="10">
                                                                                    <div class="input-group-prepend">
                                                                                        <div class="input-group-text">.00</div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endif

                                                                @if(date('m') <= 8)
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <input type="text" disabled="disabled" value="Agosto" name="mes[]" id="meses8" class="form-control-plaintext">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <div class="input-group mb-2">
                                                                                    <div class="input-group-prepend">
                                                                                        <div class="input-group-text">$</div>
                                                                                    </div>
                                                                                    <input type="number" name="monto[]" id="montoMeses8" class="form-control" placeholder="10">
                                                                                    <div class="input-group-prepend">
                                                                                        <div class="input-group-text">.00</div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endif

                                                                @if(date('m') <= 9)
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <input type="text" disabled="disabled" value="Septiembre" name="mes[]" id="meses9" class="form-control-plaintext">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <div class="input-group mb-2">
                                                                                    <div class="input-group-prepend">
                                                                                        <div class="input-group-text">$</div>
                                                                                    </div>
                                                                                    <input type="number" name="monto[]" id="montoMeses9" class="form-control" placeholder="10">
                                                                                    <div class="input-group-prepend">
                                                                                        <div class="input-group-text">.00</div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endif

                                                                @if(date('m') <= 10)
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <input type="text" disabled="disabled" value="Octubre" name="mes[]" id="meses10" class="form-control-plaintext">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <div class="input-group mb-2">
                                                                                    <div class="input-group-prepend">
                                                                                        <div class="input-group-text">$</div>
                                                                                    </div>
                                                                                    <input type="number" name="monto[]" id="montoMeses10" class="form-control" placeholder="10">
                                                                                    <div class="input-group-prepend">
                                                                                        <div class="input-group-text">.00</div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endif

                                                                @if(date('m') <= 11)
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <input type="text" disabled="disabled" value="Noviembre" name="mes[]" id="meses11" class="form-control-plaintext">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <div class="input-group mb-2">
                                                                                    <div class="input-group-prepend">
                                                                                        <div class="input-group-text">$</div>
                                                                                    </div>
                                                                                    <input type="number" name="monto[]" id="montoMeses11" class="form-control" placeholder="10">
                                                                                    <div class="input-group-prepend">
                                                                                        <div class="input-group-text">.00</div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endif

                                                                @if(date('m') <= 12)
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <input type="text" disabled="disabled" value="Diciembre" name="mes[]" id="meses12" class="form-control-plaintext">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <div class="input-group mb-2">
                                                                                    <div class="input-group-prepend">
                                                                                        <div class="input-group-text">$</div>
                                                                                    </div>
                                                                                    <input type="number" name="monto[]" id="montoMeses12" class="form-control" placeholder="10">
                                                                                    <div class="input-group-prepend">
                                                                                        <div class="input-group-text">.00</div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endif
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
                                                                            <label>Especifique el año para el monto</label>
                                                                            <select name="anio" id="anio2" class="form-control" disabled>
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

            <form method="POST">
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
		                                    <input type="text" v-model="idem" name="idem" placeholder="Idem del estacionamiento" class="form-control">
		                                </div>
		                            </div>
		                        </div>
		                        <div class="row">
		                            <div class="col-md-12">
		                                <div class="form-group">
		                                    <select type="text" v-model="status" name="status" placeholder="Status del estacionamiento" class="form-control">
		                                    	<option value="Libre">Libre</option>
		                                    	<option value="Ocupado">Ocupado</option>
		                                    </select>
		                                </div>
		                            </div>
		                        </div>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="id">
                                <button type="submit" class="btn btn-success" >Editar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

             <form method="POST">
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
                                <h2>¡Atención!</h2>
                                <h4>¿Está realmente seguro de querer eliminar este Estacionamiento?</h4>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="id">
                                <button type="submit" class="btn btn-success" >Eliminar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
    

@endsection

<script type="text/javascript">

    function opcion(opcion) {
        var f = new Date();
        var anio=f.getFullYear();
        var mes=['','Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
        $('#opcion').val(opcion);

        if (opcion==2) {
            for (var i = 0; i < 13; i++) {
                $('#meses'+i).prop('disabled',true).val(null).prop('required',false);
                $('#montoMeses'+i).prop('disabled',true).val(null).prop('required',false);
            }
            $('#anio2').prop('disabled',false).val(anio).prop('required',true);
            $('#montoAnio').prop('disabled',false).prop('required',true);
        } else {
            for (var i = 0; i < 13; i++) {
                $('#meses'+i).prop('disabled',false).val(mes[i]).prop('required',true);
                $('#montoMeses'+i).prop('disabled',false).val(null).prop('required',true);
            }
            $('#anio2').prop('disabled',true).val(null).prop('required',false);
            $('#montoAnio').prop('disabled',true).val(null).prop('required',false);
        }

    }
    
</script>