{!! Form::open(['route' => ['administradores.update',1033], 'method' => 'PUT']) !!}
    <div class="modal fade" id="editarAdmin" role="dialog">
        <div class="modal-dialog modals-default">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Editar admin</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                    <div class="row">
                        <div class="col-md-12">
                            
                            <div class="form-group">
                                <input type="text" id="name_e" name="name_e" placeholder="Nombre del admin" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="number" id="rut_e" name="rut_e" placeholder="Rut del admin" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="email" id="email_e" name="email_e" placeholder="Email del admin" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <select name="status" id="status_e" class="form-control">
                                    <option value="activo">Activo</option>
                                    <option value="suspendido">Suspendido</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>¿Desea cambiar la contraseña de usuario?</label>
                                <input type="checkbox" name="cambiar" value="si" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Ingrese contraseña</label>
                                <input type="password" name="password" placeholder="Contraseña" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Confirmar contraseña</label>
                                <input type="password" name="password_confirmation" placeholder="Confirmar contraseña" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" id="id_admin_e">
                    <button type="submit" class="btn btn-success" >Editar</button>
                </div>
            </div>
        </div>
    </div>
{!! Form::close() !!}
