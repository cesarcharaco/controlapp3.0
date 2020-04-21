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

        <div class="carrousel" style="height: 200px;">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
              
            </div>
            @for($i=0; $i< count($residentes);$i++)

                    <div class="card" style="margin-left: 20px;" width="900px">


                        <form class="form-row align-items-center">
                            <div class="form-group mr-4">
                                <img src="{{ asset('assets/images/avatar-user.png') }}" width="90px" height="90px"  style="margin-left: 5px;" />
                            </div>
                            <div class="form-group mr-6">
                                {{$residentes[$i]->nombres}}<br>{{$residentes[$i]->apellidos}}
                                <br>
                                {{$residentes[$i]->rut}}
                            </div>
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
                                    <a href="#" onclick="$('#verF').val('{{$key->id}}');$('#VerFomulario').css('display','block');" class=" btn btn-sm btn-success"> Nuevo</a>
                        </form>
                    </div>
                
            @endfor
            
        </div>

        <input type="hidden" name="numero" id="numero" value="1">
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
                                <select type="text" name="id_residen" id="MostrarArriendos" class="form-control">
                                    @foreach($inmuebles as $key)
                                    <option selected disabled>Seleccione inmueble</option>
                                        <option value="{{$key->id}}">{{$key->idem}}</option>
                                    @endforeach()
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

    <!--   -------------------------------------------------------------- ESTACIONAMIENTOS   -->

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
                                <select type="text" name="id_estacionamiento" id="MostrarEstacionamientos" class="form-control">
                                    @foreach($estacionamientos as $key)
                                    <option selected disabled>Seleccione estacionamiento</option>
                                        <option value="{{$key->id}}">{{$key->idem}}</option>
                                    @endforeach()
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


@section('script')
<script>
    // $('.single-item').slick();

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

        $('#verF').val(id_residente);$('#VerFomulario').css('display','block');
    }

    function editar(argument) {
        // body...
    }

    function eliminar(argument) {
        // body...
    }
</script>

@endsection