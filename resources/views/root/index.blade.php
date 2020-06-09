@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Gestión de admin</h1>
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
        <div class="card">
            <div class="card-body">
                
                <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12 offset-md-9">
                            <a class="btn btn-success" data-toggle="modal" data-target="#crearAdmin" style="border-radius: 30px; color: white;">
                                <span> Nuevo usuario Admin </span>
                            </a>
                        </div>
                    </div>
                </div>
                    
            
            <div class="col-md-12">
                <hr>
                <div style="overflow-x: auto;">
                    <table class="data-table-basic table-striped" id="myTable" width="100%">
                            <thead>
                                <tr>
                                    <th>Nombres</th>
                                    <th>Rut</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($admin as $key)
                                    <tr>
                                        <td>{{$key->name}}</td>
                                        <td>{{$key->rut}}</td>
                                        <td>{{$key->email}}</td>
                                        <td>
                                            @if($key->status == 'activo')
                                                <a href="#" class="btn btn-success" style="border-radius: 50px;">{{$key->status}}</a>
                                            @else
                                                <a href="#" class="btn btn-warning" style="border-radius: 50px;">{{$key->status}}</a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="#" data-toggle="modal" data-target="#editarResidente" class="btn btn-warning btn-sm" onclick="Editar('{{$key->id}}','{{$key->name}}','{{$key->rut}}','{{$key->email}}','{{$key->status}}')">Editar</a>

                                            <a href="#" data-toggle="modal" data-target="#eliminarResidente" class="btn btn-danger btn-sm" onclick="Eliminar('{{$key->id}}')">Eliminar</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                    </table>
                </div>
            </div>
            
        </div>
        




@include('root.modales.crearAdmin')
@include('root.modales.eliminarAdmin')
@include('root.modales.editarAdmin')
    </div>
@endsection

<script type="text/javascript">
        function Editar(id,name,rut,email,status) {
            $('#editarAdmin').modal('show');
            $('#id_admin_e').val(id);
            $('#name_e').val(name);
            $('#rut_e').val(rut);
            $('#email_e').val(email);
            $('#status_e').val(status);
        }
        
    </script>
    <script type="text/javascript">

        function Eliminar(id) {
            $('#eliminarAdmin').modal('show');
            $('#id_admin').val(id);
        }
    </script>