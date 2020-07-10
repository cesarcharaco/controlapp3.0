@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Residentes</h1>
            </div>
        </div>
        @include('flash::message')
        @if(!empty($errors->all()))
            <div class="notification is-danger">
                <h4 class="is-size-4">Por favor, valida los siguientes errores:</h4>
                <ul>
                    @foreach ($errors->all() as $mensaje)
                        <li>
                            {{$mensaje}}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card" style="margin-right: 50px; margin-left: 50px;">
            <div class="card-body">
                
                <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12 offset-md-9">
                            <a class="btn btn-success" onclick="NuevoResidente()" style="border-radius: 30px; color: white;">
                                <span> Nuevo Residente </span>
                            </a>
                        </div>
                    </div>
                </div>
                    
            
            <div class="col-md-12">
                
                <div style="overflow-x: auto;">
                    <table class="data-table-basic table-striped" id="myTable" width="100%">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Nombres</th>
                                    <th>Rut</th>
                                    <th>Correo</th>
                                    <th>Telefono</th>
                                    <th>Inmuebles asignados</th>
                                    <th>Estacionamientos asignados</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($residentes as $key)
                                    <tr>
                                        <td>
                                            <a href="#" data-toggle="modal" data-target="#editarResidente" class="btn btn-warning btn-sm" onclick="Editar('{{$key->id}}','{{$key->nombres}}','{{$key->apellidos}}','{{$key->rut}}','{{$key->telefono}}','{{$key->usuario->email}}')">Editar</a>

                                            <a href="#" data-toggle="modal" data-target="#eliminarResidente" class="btn btn-danger btn-sm" onclick="Eliminar('{{$key->id}}')">Eliminar</a>
                                        </td>
                                        <td>{{$key->nombres}} {{$key->apellidos}}</td>
                                        <td>{{$key->rut}}</td>
                                        <td>{{$key->usuario->email}}</td>
                                        <td>{{$key->telefono}}</td>
                                        <td>
                                            @foreach($key->inmuebles as $key2)
                                                @if($key2->pivot->status=="En Uso")
                                                <p class="text-primary">{{$key2->idem}}</p>
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($key->estacionamientos as $key2)
                                                @if($key2->pivot->status=="En Uso")
                                                    <p class="text-warning">{{$key2->idem}}</p>
                                                @endif
                                            @endforeach
                                        </td>
                                    </tr>
                                @endforeach()
                            </tbody>
                    </table>
                </div>
            </div>
            
        </div>
        





            {!! Form::open(['route' => ['residentes.destroy',1033], 'method' => 'DELETE']) !!}
                <div class="modal fade" id="eliminarResidente" role="dialog">
                    <div class="modal-dialog modals-default">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4>Eliminar Inmueble</h4>
                                <button type="button" class="close" data-dismiss="modal">
                                    <span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h2>¡Atención!</h2>
                                <h4>¿Está realmente seguro de querer eliminar este Inmueble?</h4>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="id" id="id">
                                <button type="submit" class="btn btn-danger" >Eliminar</button>
                            </div>
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}
    
            {!! Form::open(['route' => ['residentes.update',1033], 'method' => 'PUT']) !!}
                <div class="modal fade" id="editarResidente" role="dialog">
                    <div class="modal-dialog modals-default">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4>Editar Residente</h4>
                                <button type="button" class="close" data-dismiss="modal">
                                    <span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <center>
                                    <div class="row">
                                        <div class="col-md-12">
                                            
                                            <div class="form-group">
                                                <label>Nombres</label>
                                                <input type="text" name="nombres" placeholder="Nombres del residente" class="form-control" id="nombres_e" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Apellidos</label>
                                                <input type="text" name="apellidos" placeholder="Apellidos del residente" class="form-control" id="apellidos_e" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <input type="text" name="rut" placeholder="Rut del residente" minlength="7" maxlength="8" id="rut_e" class="form-control" required>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="number" name="verificador" id="verificador_e" minlength="1" maxlength="2" value="1" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Teléfono</label>
                                                <input type="number" name="telefono" placeholder="Teléfono del residente" class="form-control" id="telefono_e" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" name="email" placeholder="Email del residente" class="form-control" id="email_e" required>
                                            </div>
                                        </div>
                                    </div>
                                </center>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="id" id="id_e">
                                <button type="submit" class="btn btn-success" >Editar</button>
                            </div>
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}
    </div>

@endsection

<script type="text/javascript">
        function Editar(id,nombres,apellidos,rut,telefono,email,id_usuario) {
            $('#id_e').val(id);
            $('#nombres_e').val(nombres);
            $('#apellidos_e').val(apellidos);
            $('#rut_e').val(rut.substr(0,(rut.length-2)));
            $('#verificador_e').val(rut.substr(-1,(rut.length)));
            $('#telefono_e').val(telefono);
            $('#email_e').val(email);
        }
        
    </script>
    <script type="text/javascript">

        function Eliminar(id) {
            $('#id').val(id);
        }
    </script>