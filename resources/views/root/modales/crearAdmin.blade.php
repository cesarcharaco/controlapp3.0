<form action="{{ route('administradores.store') }}" method="POST" name="registrar_admin" data-parsley-validate>
    @csrf
    <div class="modal fade" id="crearAdmin" role="dialog">
        <div class="modal-dialog modals-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Nuevo Admin <small>Todos los campos (<b style="color: red;">*</b>) son requeridos.</small></h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <center>
                        <div class="row">
                            <div class="col-md-12">
                                
                                <div class="form-group">
                                    <label>Nombre del Admin <b style="color: red;">*</b></label>
                                    <input type="text" name="name" placeholder="Nombre"  class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label>RUT <b style="color: red;">*</b></label>
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
                                    <label>Email <b style="color: red;">*</b></label>
                                    <input type="email" name="email" placeholder="Email del admin" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>!Seleccione si desea agregar pasarelas de pago?</label>
                                    <input type="checkbox" name="cambiar_pagos" value="si" id="CheckagregarPasarelas" onclick="agregarPasarelas();">
                                </div>
                            </div>
                        </div>
                        <div class="row" id="pasarelas_pago" style="display: none;">
                            <div class="col-md-6" id="pasarelaPago1">
                                <div class="form-group">
                                    <label for="id_pasarela">Pasarelas de Pago <b style="color: red;">*</b>
                                        <a class="btn text-success btn-sm" onclick="selectPasarela()" style="border-radius: 30px;"  data-toggle="tooltip" data-placement="top" title="Seleccione para agregar una Pasarela de Pago">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line>
                                            </svg>
                                        </a>
                                    </label>
                                    <select name="id_pasarela[]" style="margin-bottom: -50px !important;" id="id_pasarela" class="form-control">
                                        <option selected disabled>Seleccione Pasarela de Pagos</option>
                                        <!-- FOREACH -->
                                        @foreach($pasarelas as $key)
                                            <option value="{{$key->id}}">{{$key->pasarela}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6" id="pasarelaPago1">
                                <div style="margin-top: 2px;">
                                    <div class="form-group">
                                        <label>Link <b style="color: red;">*</b></label>
                                        <input type="text" name="link_pasarela[]" class="form-control" placeholder="Ingrese Link" id="link_pasarela">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="membrecia">Membresía <b style="color: red;">*</b></label>
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
                                    <label>Ingrese contraseña <b style="color: red;">*</b></label>
                                    <input type="password" name="password" placeholder="Contraseña" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Confirmar contraseña <b style="color: red;">*</b></label>
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