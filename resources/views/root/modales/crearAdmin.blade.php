<form action="{{ route('administradores.store') }}" method="POST" name="registrar_admin" data-parsley-validate>
    @csrf
    <div class="modal fade" id="crearAdmin" role="dialog">
        <div class="modal-dialog modals-default">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Nuevo Admin</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <center>
                        <div class="row">
                            <div class="col-md-12">
                                
                                <div class="form-group">
                                    <label>Nombre del Admin</label>
                                    <input type="text" name="name" placeholder="Nombre"  class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label>RUT</label>
                                    <input type="text" name="rut" id="rut" placeholder="Rut" minlength="7" maxlength="8" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <div style="float: left !important;">
                                        <label><br></label>
                                        <input type="number" name="verificador" min="0" minlength="1" maxlength="2" max="9" value="0" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" placeholder="Email del admin" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <div class="row" id="pasarelas_pago">
                            <div class="col-md-6" id="pasarelaPago1">
                                <div class="form-group">
                                    <label for="id_pasarela">Pasarelas de Pago</label>
                                    <select name="id_pasarela[]" id="selectP" class="form-control" onchange="selectPasarela(1,this.value)">
                                        <option selected disabled>Seleccione Pasarela de Pagos</option>
                                        <!-- FOREACH -->
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6" id="pasarelaPago1">
                                <div class="form-group">
                                    <label>Link</label>
                                    <input type="text" name="link_pasarela[]" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <label>Opciones de pago</label>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Flow</label>
                                    <input type="checkbox" name="opciones_pago" value="si" id="check_flow" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>TransBank</label>
                                    <input type="checkbox" name="opciones_pago" value="si" id="check_tb" onclick="CambiarContraseña();">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="link_flow">Link de Flow</label>
                                    <input type="url" name="link_flow" id="link_flow" class="form-control" placeholder="Link de Flow" disabled="disabled">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="link_tb">Link de TransBank</label>
                                    <input type="url" name="link_tb" id="link_tb" class="form-control" placeholder="Link de TransBank" disabled="disabled">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="membrecia">Membresía</label>
                                    <select name="id_membresia" id="id_membresia" required="required" class="form-control">
                                        <option value="">Seleccione una membresía...</option>
                                        @foreach($membresias as $key)
                                            <option value="{{$key->id}}">{{$key->nombre}} | Monto: {{$key->monto}} $</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="membrecia">Pasarelas de pago</label>
                                    <select name="id_membresia" id="id_membresia" required="required" class="form-control">
                                        <option value="">Seleccione una pasarela</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="link[]">Link de la pasarela</label>
                                    <input type="text" name="link[]" class="form-control" placeholder="Link de la pasarela de pago">
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
                    </center>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" >Guardar</button>
                </div>
            </div>
        </div>
    </div>
</form>