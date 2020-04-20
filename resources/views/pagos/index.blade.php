@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Pagos</h1>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="form-group ic-cmpint">
                    <div class="nk-int-st">
                        <select class="form-control select2" name="id_residentes" id="residentes">
                            @foreach($residentes as $key)
                                <option value="{{$key->id}}">{{$key->nombres}} {{$key->apellidos}} -  {{$key->rut}}</option>
                            @endforeach()
                        </select>
                    </div>
                </div>   

            </div>
        </div>
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">

                                                <!-- <div class="shadow-none p-3 mb-5 bg-light rounded"> -->
                        <div class="carousel-inner">
                            <br>
                                    <!-- <div class="row"> -->
                            @for($i=0; $i < count($residentes); $i++)
                                @if($i>1)
                                            <!-- <div class="shadow p-3 mb-5 bg-white rounded"> -->
                                    <div class="row">
                                        
                                    
                                        <div class="col-md-2"></div>
                                        <div class="col-md-8">
                                            <div class="carousel-item active">
                                                <div class="shadow rounded">

                                                    <div class="card">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <img src="{{ asset('assets/images/avatar-user.png') }}" width="180px" height="180px" />
                                                            </div>
                                                            <div class="col-md-5">
                                                                <h5 class="font-size-15 mt-2 mb-1"><a href="#" class="text-dark">{{$residentes[0]->nombres}} {{$residentes[0]->apellidos}}</a></h5>
                                                                <p class="text-muted font-size-13 text-truncate mb-0">
                                                                    {{$residentes[0]->rut}}
                                                                </p>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="shadow p-3 mb-5 bg-white rounded">




                                                                    <div class="btn-group mt-2 mr-1">
                                                                        <div class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            <img src="{{ asset('assets/images/house.png') }}" class="avatar-md rounded-circle"/>

                                                                        </div>
                                                                        <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-58px, 39px, 0px);">
                                                                            <a class="dropdown-item" onclick="VerResi('{{$key->id}}')" href="#">Residencias registradas</a>
                                                                            <!-- <a class="dropdown-item" href="#">Another action</a> -->
                                                                            <!-- <a class="dropdown-item" href="#">Something else here</a> -->
                                                                        </div>
                                                                    </div>

                                                                    <div class="btn-group mt-2 mr-1">
                                                                        <div class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            <img src="{{ asset('assets/images/parkin.png') }}" class="avatar-md"/>

                                                                        </div>
                                                                        <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-58px, 39px, 0px);">
                                                                            <a class="dropdown-item" onclick="VerEstacionamiento('{{$key->id}}')" href="#">Estacionamientos registrados</a>
                                                                            <!-- <a class="dropdown-item" href="#">Another action</a> -->
                                                                            <!-- <a class="dropdown-item" href="#">Something else here</a> -->
                                                                        </div>
                                                                    </div>
                                                                    <hr>





                                                                        <a href="#" onclick="verForm('{{$key->id}}')" class=" btn btn-sm btn-success"> Nuevo</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-2"></div>
                                    </div>
                                        
                                @else

                                        <!-- <div class="col-md-6">
                                            <div class="carousel-item active">
                                                <div class="shadow rounded">
                                                    <div class="card">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <img src="{{ asset('assets/images/avatar-user.png') }}" width="180px" height="180px" />
                                                            </div>
                                                            <div class="col-md-5">
                                                                <h5 class="font-size-15 mt-2 mb-1"><a href="#" class="text-dark">{{$residentes[1]->nombres}} {{$residentes[1]->apellidos}}</a></h5>
                                                                <p class="text-muted font-size-13 text-truncate mb-0">
                                                                    {{$residentes[1]->rut}}
                                                                </p>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="shadow p-3 mb-5 bg-white rounded">
                                                                        <img src="{{ asset('assets/images/house.png') }}" onclick="VerResi('{{$key->id}}')" class="avatar-md rounded-circle"/>
                                                                        <img src="{{ asset('assets/images/parkin.png') }}" onclick="VerEstacionamiento('{{$key->id}}')" class="avatar-md"/>


                                                                        <a href="#" onclick="verForm('{{$key->id}}')" class=" btn btn-sm btn-success"> <i data-feather="plus-circle"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div> -->

                                @endif
                            @endfor()
                                    <!-- </div> -->
                                                <!-- </div> -->
                        </div>




                  <a class="carousel-control-prev" style="background-color: grey;" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" style="background-color: grey;" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>

                <!-- <div class="shadow-none p-3 mb-5 bg-light rounded">
                    <div class="shadow p-3 mb-5 bg-white rounded">
                        <ul class="list-unstyled">
                            <li class="py-3 border-bottom">
                                <div class="media">
                                    <div class="mr-3">
                                        
                                        <img src="{{ asset('assets/images/avatar-user.png') }}" alt=""class="avatar-md rounded-circle" />
                                    </div>
                                    <div class="media-body overflow-hidden">
                                        <h5 class="font-size-15 mt-2 mb-1"><a href="#" class="text-dark">John Jack</a></h5>
                                        <p class="text-muted font-size-13 text-truncate mb-0">
                                            123123
                                        </p>
                                    </div>
                                    <div class="mr-4">
                                        
                                        <div class="shadow p-3 mb-5 bg-white rounded">
                                            <div class="card">
                                                asdasd
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div> -->
                <br>
        <div class="card" id="VerFomulario" style="display: none;">
            <div class="card-header">
                <button type="button" class="close" onclick="$('#VerFomulario').css('display','none')">
                    <span>&times;</span>
                </button>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Inmuebles</label>
                            <select class="form-control" multiple="multiple" >
                                @foreach($inmuebles as $key)
                                    <option value="{{$key->id}}">{{$key->idem}}</option>
                                @endforeach()
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Meses</label>
                            <select class="form-control" multiple="multiple" >
                               @foreach($meses as $key)
                                    <option value="{{$key->id}}">{{$key->mes}}</option>
                                @endforeach()
                            </select>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label>Estacionamientos</label>
                            <select class="form-control" multiple="multiple" >
                                @foreach($estacionamientos as $key)
                                    <option value="{{$key->id}}">{{$key->idem}}</option>
                                @endforeach()
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Meses</label>
                            <select class="form-control" multiple="multiple" >
                               @foreach($meses as $key)
                                    <option value="{{$key->id}}">{{$key->mes}}</option>
                                @endforeach()
                            </select>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label>Rereferencias</label>
                            <input type="number" name="" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <input type="hidden" name="id_residente" id="verF">
                <button type="button" class="btn btn-primary btn-rounded">Enviar</button>
            </div>
        </div>
    </div>

    <!-- <form method="POST">
        <div class="modal fade" id="crearPago" role="dialog">
            <div class="modal-dialog modals-default">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Nuevo Pago</h4>
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <select type="text" name="id_mensualidad" placeholder="Mensualidad" class="form-control">
                                        
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-bottom">
                        <button type="submit" class="btn btn-success" id="botonG" disabled>Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </form> -->

    <form method="POST">
        <div class="modal fade" id="editarPago" role="dialog">
            <div class="modal-dialog modals-default">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Editar Pago</h4>
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" v-model="idem" name="idem" placeholder="Idem del Pago" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <select type="text" v-model="id_mensualidad" name="id_mensualidad" placeholder="Status de Pago" class="form-control">
                                        
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <select type="text" v-model="status" name="status" placeholder="Status del Pago" class="form-control">
                                    	<option value="Cancelado">Cancelado</option>
                                    	<option value="Pendiente">Pendiente</option>
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
        <div class="modal fade" id="eliminarPago" role="dialog">
            <div class="modal-dialog modals-default">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Eliminar Pago</h4>
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h2>¡Atención!</h2>
                        <h4>¿Está realmente seguro de querer eliminar este Pago?</h4>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id">
                        <button type="submit" class="btn btn-success" >Eliminar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    
    <!--   -------------------------------------------------------------- RESIDENCIAS   -->

    <div class="modal fade" id="VerResidencias" role="dialog">
        <div class="modal-dialog modals-default">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Sus residencias</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <select type="text" name="id_residen" disabled id="MostrarArriendos" class="form-control">
                                    
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-bottom">
                    <button type="submit" class="btn btn-success" >Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <!--   -------------------------------------------------------------- RESIDENCIAS   -->

    <div class="modal fade" id="VerEstacionamientos" role="dialog">
        <div class="modal-dialog modals-default">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Sus estacionamientos</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <select type="text" name="id_estacionamiento" disabled id="MostrarEstacionamientos" class="form-control">
                                    
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-bottom">
                    <button type="submit" class="btn btn-success" >Guardar</button>
                </div>
            </div>
        </div>
    </div>


@endsection

<script>

    $(document).ready( function(){
        $('#residentes').on("change",function (event) {

            alert('adasd');
            var id_residente= event.target.value;
            $.get('arriendos/'+id_residente+'/buscar_residente', function(data) {

            }).done(function(data) {

            });
        });
    });

    function VerResi(id_residente) {
        $('#VerResidencias').modal('show');
        $('#MostrarArriendos').empty();


        $.get('arriendos/'+id_residente+'/buscar_inmuebles', function(data) {

        }).done(function(data) {
            if (data.length > 0) {
                $('#MostrarArriendos').attr('disabled',false);
                for (var i = 0; i < data.length; i++) {
                    $('#MostrarArriendos').append('<option value="'+data[i].id+'">'+data[i].id+'</option>');
                }
            }else{
                $('#MostrarArriendos').empty();
                $('#MostrarArriendos').append('<option>El residente no tiene arriendos registrados</option>');
                $('#MostrarArriendos').attr('disabled',true);
            }
        });
    }

    function VerEstacionamiento(id_residente) {
        $('#VerEstacionamientos').modal('show');
        $('#MostrarEstacionamientos').empty();

        $.get('arriendos/'+id_residente+'/buscar_estacionamientos', function(data) {

        }).done(function(data) {
            if (data.length > 0) {
                $('#MostrarEstacionamientos').attr('disabled',false);

                for (var i = 0; i < data.length; i++) {

                    $('#MostrarEstacionamientos').append('<option value="'+data[i].id+'">'+data[i].id+'</option>');
                }
            }else{
                $('#MostrarEstacionamientos').empty();
                $('#MostrarEstacionamientos').append('<option>El residente no tiene estacionamientos registrados</option>');
                $('#MostrarEstacionamientos').attr('disabled',true);
            }
        });
    }

    function verForm(id_residente) {

        $('#verF').val(id_residente);
        $('#VerFomulario').css('display','block');
    }

    function editar(argument) {
        // body...
    }

    function eliminar(argument) {
        // body...
    }
</script>