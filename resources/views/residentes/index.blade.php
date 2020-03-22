@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Residentes</h1>
            </div>
        </div>
        @include('flash::message')
        <div class="card">
            <div class="card-body">
                
                <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12 offset-md-9">
                            <a class="btn btn-success" data-toggle="modal" data-target="#crearResidente" style="border-radius: 30px; color: white;">
                                <span> Nuevo Residente </span>
                            </a>
                        </div>
                    </div>
                </div>
                    
            
            <div class="col-md-12">
                <hr>

                        <table class="table table-hover" id="myTable" width="100%">
                            <thead>
                                <tr>
                                    <th>Nombres</th>
                                    <th>Rut</th>
                                    <th>Telefono</th>
                                    <th>Usuario</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($residentes as $key)
                                    <tr>
                                        <td>{{$key->nombres}} {{$key->apellidos}}</td>
                                        <td>{{$key->rut}}</td>
                                        <td>{{$key->telefono}}</td>
                                        <td>{{$key->usuario->email}}</td>
                                        <td>
                                            <a href="#" data-toggle="modal" data-target="#editarResidente" class="btn btn-warning btn-sm" onclick="Editar('{{$key->id}}','{{$key->nombres}}','{{$key->apellidos}}','{{$key->rut}}','{{$key->telefono}}','{{$key->usuario->email}}')">Editar</a>

                                            <a href="#" data-toggle="modal" data-target="#eliminarResidente" class="btn btn-danger btn-sm" onclick="Eliminar('{{$key->id}}')">Eliminar</a>
                                        </td>
                                    </tr>
                                @endforeach()
                            </tbody>
                        </table>

            </div>
            
        </div>
        


    <form action="{{ route('residentes.store') }}" method="POST" name="registrar_residente" data-parsley-validate>
        @csrf
        <div class="modal fade" id="crearResidente" role="dialog">
            <div class="modal-dialog modals-default">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Nuevo Residente</h4>
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                
                                <div class="form-group">
                                    <input type="text" name="nombres" placeholder="Nombres del residente" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" name="apellidos" placeholder="Apellidos del residente" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="number" name="rut" placeholder="Rut del residente" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="number" name="telefono" placeholder="Teléfono del residente" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="email" name="email" placeholder="Email del residente" class="form-control">
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
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        
                                        <div class="form-group">
                                            <input type="text" id="nombres_e" name="nombres" placeholder="Nombres del residente" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" id="apellidos_e" name="apellidos" placeholder="Apellidos del residente" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="number" id="rut_e" name="rut" placeholder="Rut del residente" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="number" id="telefono_e" name="telefono" placeholder="Teléfono del residente" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="email" id="email_e" name="email" placeholder="Email del residente" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="id" id="id_e">
                                <button type="submit" class="btn btn-success" >Editar</button>
                            </div>
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}

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
    
    </div>

@endsection

<script type="text/javascript">
        function Editar(id,nombres,apellidos,rut,telefono,email,id_usuario) {
            // alert('asdasd');
            $('#id_e').val(id);
            $('#nombres_e').val(nombres);
            $('#apellidos_e').val(apellidos);
            $('#rut_e').val(rut);
            $('#telefono_e').val(telefono);
            $('#email_e').val(email);
        }
        
    </script>
    <script type="text/javascript">

        function Eliminar(id) {
            $('#id').val(id);
        }
    </script>