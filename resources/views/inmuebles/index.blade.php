@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Inmuebles</h1>
            </div>
        </div>
        @include('flash::message')
        <div class="card">
            <div class="card-body">
                
                <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12 offset-md-9">
                        <a class="btn btn-success" data-toggle="modal" data-target="#crearInmueble" style="border-radius: 30px; color: white;">
                            <span> Nuevo Inmueble </span>
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
                            <th>Tipo</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($inmuebles as $key)
                            <tr>
                                <td>{{$key->idem}}</td>
                                <td>{{$key->tipo}}</td>
                                <td>{{$key->status}}</td>
                                <td>
                                    
                                    <a href="#" data-toggle="modal" data-target="#editarInmueble" class="btn btn-warning btn-sm" onclick="Editar('{{$key->id}}','{{$key->idem}}','{{$key->tipo}}','{{$key->status}}')">Editar</a>

                                    <a href="#" data-toggle="modal" data-target="#eliminarInmueble" class="btn btn-danger btn-sm" onclick="Eliminar('{{$key->id}}')">Eliminar</a>
                                </td>
                            </tr>
                        @endforeach()
                    </tbody>
                </table>

            </div>
            
        </div>
        

    </div>

    <form action="{{ route('inmuebles.store') }}" method="POST" name="registrar_inmueble" data-parsley-validate>
        @csrf
        <div class="modal fade" id="crearInmueble" role="dialog">
            <div class="modal-dialog modals-default">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Nuevo Inmueble</h4>
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" name="idem" placeholder="Idem del Inmueble" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <select type="text" name="tipo" placeholder="Tipo de inmueble" class="form-control">
                                        <option value="Casa">Casa</option>
                                        <option value="Apartamento">Apartamento</option>
                                        <option value="Anexo">Anexo</option>
                                        <option value="Habitación">Habitación</option>
                                        <option value="Otro">Otro</option>
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

    {!! Form::open(['route' => ['inmuebles.update',1033], 'method' => 'PUT']) !!}
        <div class="modal fade" id="editarInmueble" role="dialog">
            <div class="modal-dialog modals-default">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Editar Inmueble</h4>
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" id="idem_e" name="idem_e" placeholder="Idem del Inmueble" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <select type="text" id="tipo_e" name="tipo_e" placeholder="Status de inmueble" class="form-control">
                                        <option value="Casa">Casa</option>
                                        <option value="Apartamento">Apartamento</option>
                                        <option value="Anexo">Anexo</option>
                                        <option value="Habitación">Habitación</option>
                                        <option value="Otro">Otro</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <select type="text" id="status_e" name="status_e" placeholder="Status del Inmueble" class="form-control">
                                        <option value="Disponible">Disponible</option>
                                        <option value="No Disponible">No Disponible</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="text" name="id_e" id="id_e">
                        <button type="submit" class="btn btn-success" >Editar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    {!! Form::open(['route' => ['inmuebles.destroy',1033], 'method' => 'DELETE']) !!}
        <div class="modal fade" id="eliminarInmueble" role="dialog">
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
                        <input type="text" name="id" id="id">
                        <button type="submit" class="btn btn-danger" >Eliminar</button>
                    </div>
                </div>
            </div>
        </div>
    {!! Form::close() !!}
    

@endsection

    <script type="text/javascript">
        function Editar(id, idem, tipo, status) {
            // alert('asdasd');
            $('#id_e').val(id);
            $('#idem_e').val(idem);
            $('#tipo_e').val(tipo);
            $('#status_e').val(status);
        }
        
    </script>
    <script type="text/javascript">

        function Eliminar(id) {
            $('#id').val(id);
        }
    </script>

