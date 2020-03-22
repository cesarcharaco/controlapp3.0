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
                            </div>
                            <div class="modal-footer">
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
    function editar(argument) {
        // body...
    }

    function eliminar(argument) {
        // body...
    }
</script>