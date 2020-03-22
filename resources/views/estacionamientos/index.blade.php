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
                                                                                <input type="text" disabled="disabled" value="Enero" name="mes[]" class="form-control-plaintext">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <div class="input-group mb-2">
                                                                                    <div class="input-group-prepend">
                                                                                        <div class="input-group-text">$</div>
                                                                                    </div>
                                                                                    <input type="number" name="monto[]" class="form-control" placeholder="Monto">
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
                                                                                <input type="text" disabled="disabled" value="Febrero" name="mes[]" class="form-control-plaintext">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <div class="input-group mb-2">
                                                                                    <div class="input-group-prepend">
                                                                                        <div class="input-group-text">$</div>
                                                                                    </div>
                                                                                    <input type="number" name="monto[]" class="form-control" placeholder="Monto">
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
                                                                                <input type="text" disabled="disabled" value="Marzo" name="mes[]" class="form-control-plaintext">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <div class="input-group mb-2">
                                                                                    <div class="input-group-prepend">
                                                                                        <div class="input-group-text">$</div>
                                                                                    </div>
                                                                                    <input type="number" name="monto[]" class="form-control" placeholder="Monto">
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
                                                                                <input type="text" disabled="disabled" value="Abril" name="mes[]" class="form-control-plaintext">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <div class="input-group mb-2">
                                                                                    <div class="input-group-prepend">
                                                                                        <div class="input-group-text">$</div>
                                                                                    </div>
                                                                                    <input type="number" name="monto[]" class="form-control" placeholder="Monto">
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
                                                                                <input type="text" disabled="disabled" value="Mayo" name="mes[]" class="form-control-plaintext">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <div class="input-group mb-2">
                                                                                    <div class="input-group-prepend">
                                                                                        <div class="input-group-text">$</div>
                                                                                    </div>
                                                                                    <input type="number" name="monto[]" class="form-control" placeholder="Monto">
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
                                                                                <input type="text" disabled="disabled" value="Junio" name="mes[]" class="form-control-plaintext">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <div class="input-group mb-2">
                                                                                    <div class="input-group-prepend">
                                                                                        <div class="input-group-text">$</div>
                                                                                    </div>
                                                                                    <input type="number" name="monto[]" class="form-control" placeholder="Monto">
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
                                                                                <input type="text" disabled="disabled" value="Julio" name="mes[]" class="form-control-plaintext">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <div class="input-group mb-2">
                                                                                    <div class="input-group-prepend">
                                                                                        <div class="input-group-text">$</div>
                                                                                    </div>
                                                                                    <input type="number" name="monto[]" class="form-control" placeholder="Monto">
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
                                                                                <input type="text" disabled="disabled" value="Agosto" name="mes[]" class="form-control-plaintext">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <div class="input-group mb-2">
                                                                                    <div class="input-group-prepend">
                                                                                        <div class="input-group-text">$</div>
                                                                                    </div>
                                                                                    <input type="number" name="monto[]" class="form-control" placeholder="Monto">
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
                                                                                <input type="text" disabled="disabled" value="Septiembre" name="mes[]" class="form-control-plaintext">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <div class="input-group mb-2">
                                                                                    <div class="input-group-prepend">
                                                                                        <div class="input-group-text">$</div>
                                                                                    </div>
                                                                                    <input type="number" name="monto[]" class="form-control" placeholder="Monto">
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
                                                                                <input type="text" disabled="disabled" value="Octubre" name="mes[]" class="form-control-plaintext">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <div class="input-group mb-2">
                                                                                    <div class="input-group-prepend">
                                                                                        <div class="input-group-text">$</div>
                                                                                    </div>
                                                                                    <input type="number" name="monto[]" class="form-control" placeholder="Monto">
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
                                                                                <input type="text" disabled="disabled" value="Noviembre" name="mes[]" class="form-control-plaintext">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <div class="input-group mb-2">
                                                                                    <div class="input-group-prepend">
                                                                                        <div class="input-group-text">$</div>
                                                                                    </div>
                                                                                    <input type="number" name="monto[]" class="form-control" placeholder="Monto">
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
                                                                                <input type="text" disabled="disabled" value="Diciembre" name="mes[]" class="form-control-plaintext">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <div class="input-group mb-2">
                                                                                    <div class="input-group-prepend">
                                                                                        <div class="input-group-text">$</div>
                                                                                    </div>
                                                                                    <input type="number" name="monto[]" class="form-control" placeholder="Monto">
                                                                                    <div class="input-group-prepend">
                                                                                        <div class="input-group-text">.00</div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                                <!-- <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <select type="text" name="anio" placeholder="Inmueble" class="form-control">
                                                                                <option value="" disabled="" selected="">Especifique el año</option>
                                                                                <option value="2020">2020</option>
                                                                                <option value="2021">2021</option>
                                                                                <option value="2022">2022</option>
                                                                                <option value="2023">2023</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div> -->

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
                                                                            <label>Año actual</label>
                                                                            <input type="number" disabled="disabled" value="{{date('Y')}}" name="anio" class="form-control-plaintext">
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
                                                                                <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Monto">
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
        $('#opcion').val(opcion);
    }
    function editar(argument) {
        // body...
    }

    function eliminar(argument) {
        // body...
    }
</script>