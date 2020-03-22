@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Multas y Recargas</h1>
            </div>
        </div>
        @include('flash::message')
        <div class="card">
            <div class="card-body">
                
                <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12 offset-md-9">
                        <a class="btn btn-success" data-toggle="modal" data-target="#crearMulta" style="border-radius: 30px; color: white;">
                            <span> Nuevo Multa - Recarga </span>
                        </a>
                    </div>
                </div>
            </div>
                    
        
            <div class="col-md-12">
                <hr>

                <table class="table table-hover" id="myTable" width="100%">
                    <thead>
                        <tr>
                            <th>Mensualidad</th>
                            <th>Motivo</th>
                            <th>Observación</th>
                            <th>Monto</th>
                            <th>Tipo</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        
                            <tr>
                                <td></td>
                                <td></td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#editarMulta" class="btn btn-warning btn-sm">Editar</a>

                                    <a href="#" data-toggle="modal" data-target="#eliminarMulta" class="btn btn-danger btn-sm">Eliminar</a>
                                </td>
                            </tr>
                    </tbody>
                </table>

            </div>
            
        </div>
        

    </div>

    <form method="POST">
        <div class="modal fade" id="crearMulta" role="dialog">
            <div class="modal-dialog modals-default">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Nuevo Multa</h4>
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" name="motivo" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea name="observacion" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="number" name="monto" class="form-control" placeholder="Monto">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <select type="text" name="tipo" placeholder="Tipo de Multa" class="form-control">
                                    	<option value="Multa">Multa</option>
                                    	<option value="Recarga">Recarga</option>
                                    </select>
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
        <div class="modal fade" id="editarMulta" role="dialog">
            <div class="modal-dialog modals-default">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Editar Multa</h4>
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" name="motivo" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea name="observacion" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="number" name="monto" class="form-control" placeholder="Monto">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <select type="text" name="tipo" placeholder="Tipo de Multa" class="form-control">
                                    	<option value="Multa">Multa</option>
                                    	<option value="Recarga">Recarga</option>
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