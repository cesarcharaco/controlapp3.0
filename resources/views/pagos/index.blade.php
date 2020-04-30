@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Pagos</h1>
            </div>
        </div>
        @include('flash::message')
        <div class="card">
            <div class="card-body">
                <div class="form-group ic-cmpint">
                    <div class="nk-int-st">
                        <select class="form-control select2" name="id_residentes" id="residentes" onchange="buscarResidentes(this.value)">
                            @foreach($residentes as $key)
                                <option value="{{$key->id}}">{{$key->nombres}} {{$key->apellidos}} -  {{$key->rut}}</option>
                            @endforeach()
                        </select>
                    </div>
                </div>   

            </div>
        </div>


        <div class="carrousel">

            <div id="carouselExampleSlidesOnly" style="display: none;" class="carousel slide" data-ride="carousel"></div>
            @for($i=0; $i< count($residentes);$i++)

                <div class="card" style="margin-left: 20px; height: auto;">
            <div class="scrollbar scrollbar-primary">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <center>
                                    
                                <img src="{{ asset('assets/images/avatar-user.png') }}" class="avatar-md rounded-circle"/>
                                    @php $cuenta=0; @endphp
                                    @foreach($asignaIn as $key)
                                            @if($key->id_residente == $residentes[$i]->id)
                                                @if($cuenta==0)   
                                                    <div class="dropdown align-self-center profile-dropdown-menu">
                                                        
                                                        <a style="border-radius: 50px;" href="#" class="dropdown-toggle mr-0 btn btn-sm btn-warning"data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false"> <i data-feather="edit"></i></a>

                                                        <div class="dropdown-menu profile-dropdown" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 20px, 0px); top: 0px; left: 0px; will-change: transform;">


                                                            <a href="#" class="dropdown-item notify-item" onclick="EditarPago('{{$residentes[$i]->id}}',1)" >
                                                                <span class="text-primary">Inmuebles</span>
                                                            </a>

                                                            <a href="#" class="dropdown-item notify-item" onclick="EditarPago('{{$residentes[$i]->id}}',2)" >
                                                                <span class="text-warning">Estacionamientos</span>
                                                            </a>

                                                            <a href="#" class="dropdown-item notify-item" onclick="EditarPago('{{$residentes[$i]->id}}',3)" >
                                                                <span class="text-danger">Multas</span>
                                                            </a>

                                                            
                                                            <!-- <div class="dropdown-divider"></div> -->

                                                        </div>
                                                    </div>

                                                    <a style="border-radius: 50px;" href="#" onclick="mostrarFormulario('{{$residentes[$i]->id}}')" class=" btn btn-sm btn-success"> <i data-feather="dollar-sign"></i></a>
                                                    @php $cuenta++; @endphp
                                                @endif
                                            @endif
                                    @endforeach
                                    @foreach($asignaEs as $key2)
                                            @if($key2->id_residente == $residentes[$i]->id)
                                                @if($cuenta==0) 
                                                    <div class="dropdown align-self-center profile-dropdown-menu">
                                                        
                                                        <a style="border-radius: 50px;" href="#" class="dropdown-toggle mr-0 btn btn-sm btn-warning"data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false"> <i data-feather="edit"></i></a>

                                                        <div class="dropdown-menu profile-dropdown" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 20px, 0px); top: 0px; left: 0px; will-change: transform;">


                                                            <a href="#" class="dropdown-item notify-item" onclick="EditarPago('{{$residentes[$i]->id}}',1)" >
                                                                <span class="text-primary">Inmuebles</span>
                                                            </a>

                                                            <a href="#" class="dropdown-item notify-item" onclick="EditarPago('{{$residentes[$i]->id}}',2)" >
                                                                <span class="text-warning">Estacionamientos</span>
                                                            </a>

                                                            <a href="#" class="dropdown-item notify-item" onclick="EditarPago('{{$residentes[$i]->id}}',3)" >
                                                                <span class="text-danger">Multas</span>
                                                            </a>

                                                            
                                                            <!-- <div class="dropdown-divider"></div> -->

                                                        </div>
                                                    </div>


                                                    <a style="border-radius: 50px;" href="#" onclick="mostrarFormulario('{{$residentes[$i]->id}}')" class=" btn btn-sm btn-success"> <i data-feather="dollar-sign"></i></a>
                                                    @php $cuenta++; @endphp
                                                @endif
                                            @endif
                                    @endforeach







                                </center>
                            </div>
                            <div class="col-md-5">
                                {{$residentes[$i]->nombres}}<br>{{$residentes[$i]->apellidos}}
                                <br>
                                {{$residentes[$i]->rut}}
                            </div>
                            <div class="col-md-4">
                                
                                @foreach($asignaIn as $key)
                                    @if($key->id_residente == $residentes[$i]->id)
                                            <a onclick="VerResi('{{$key->id_residente}}')" href="#"><img src="{{ asset('assets/images/house.png') }}" class="avatar-md rounded-circle img-fluid" alt="Responsive image"/></a>
                                    @endif
                                @endforeach

                                @foreach($asignaEs as $key)
                                    @if($key->id_residente == $residentes[$i]->id)
                                            <a onclick="VerEstacionamientos('{{$key->id_residente}}')" href="#"><img src="{{ asset('assets/images/parkin.png') }}" class="avatar-md img-fluid" alt="Responsive image"/></a>
                                    @endif
                                @endforeach

                            </div>
                        </div>
                        <div class="row">
                            <dir></dir>
                        </div>
                    </div>
                </div>
            </div>
            @endfor
            
        </div>
    
</div>

        <div class="card" id="VerFomulario" style="display: none" >
            <div class="card-header">
                <button type="button" class="close" onclick="$('#VerFomulario').css('display','none')">
                    <span>&times;</span>
                </button>
            </div>
           {!! Form::open(['route' => ['pagos.store'],'method' => 'POST', 'name' => 'registrarPago', 'id' => 'registrar_pago', 'data-parsley-validate']) !!}
                @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><div class="text-primary">Inmuebles</div></label>
                            <select class="form-control select2" id="mis_inmuebles" name="inmuebles[]" onchange="montoTotalI(this.value)" data-plugin="multiselect" data-selectable-optgroup="true" disabled>
                                <option value="0" selected disabled>Seleccione</option>
                                
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><div class="text-warning">Estacionamientos</div></label>
                            <select class="form-control select2" id="mis_estacionamientos" name="estacionamientos[]" onchange="montoTotalE(this.value)" data-plugin="multiselect" data-selectable-optgroup="true" disabled>
                                <option value="0" selected disabled>Seleccione</option>
                                
                            </select>
                        </div>
                    </div>
                </div>
                <hr>
                    <div class="row" id="mis_mr">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><div class="text-danger">Multas</div><div class="text-success">Recargas</div></label>
                                <br>
                                <select name="id_mr[]" class="form-control selct2" id="mr" onchange="montoTotalM(this.value)" disabled>
                                    <option value="0" selected disabled>Seleccione</option>
                                    
                                </select>
                                {{-- <font style="vertical-align: inherit; color: red">Multa 1 - 9999.00$</font><br> --}}
                                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="overflow-auto">
                                <table id="mrSeleccionado" class="" style="width: 100%;" alt="Max-width 100%">
                                </table>
                            </div>
                        </div>
                    </div>
                <hr>
                <div class="row justify-content-md-center">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Total a pagar</label>
                            <center style="color: grey; font-size: 100px;">$<span id="TotalPagar">0</span>.00</center>
                            <input type="hidden" name="total" id="total" value="0">
                        </div>
                    </div>
                </div>
                
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Rereferencias</label>
                                <input type="number" required="required" name="referencia" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="float-right">
                            
                            <div style="display: none">
                                <input type="hidden" name="id_residente" id="verF">
                                <select class="form-control" name="id_mensInmueble[]" id="id_mensInmuebleR" multiple></select>
                                <select class="form-control" name="id_mensEstaciona[]" id="id_mensEstacionaR" multiple></select>
                                <select class="form-control" name="id_mensMulta[]" id="id_mensMultaR" multiple></select>
                            </div>
                            <button type="submit" class="btn btn-primary btn-rounded">Aceptar</button>
                    </div>
                {!! Form::close() !!}

                
                
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

     {!! Form::open(['route' => ['pagos.update',1],'method' => 'PUT', 'name' => 'editarPago', 'id' => 'editar_pago', 'data-parsley-validate']) !!}
                @csrf
        <div class="modal fade" id="editar_p" role="dialog">
            <div class="modal-dialog modals-default">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 id="titleE"></h4>
                        <!-- <div class="spinner-border text-warning m-2" role="status" id="cargando_E">
                            <span class="sr-only">Cargando...</span>
                        </div> -->
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class=" col-form-label" for="example-static">Año de pago</label>
                                    <select class="form-control select2" name="anio" id="anio" onchange="BuscarEditar(this.value)" >
                                        
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div id="MuestraInmueble">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="text-primary col-form-label" for="example-static">Inmuebles</label>
                                        <select class="border border-primary form-control select2" name="id_inmueble[]" id="id_inmuebleEditar">
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="MuestraEstacionamiento">
                            <div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="text-warning col-form-label" for="example-static">Estacionamientos</label>
                                        <select class="border border-warning form-control select2" name="id_estacionamiento[]" id="id_estacionamientoEditar">
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="MuestraMulta">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="text-success col-form-label" for="example-static">Multas - Recargas</label>
                                        <select class="border border-success form-control select2" name="id_multa[]" id="id_multaEditar">
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="opcion" id="opcion">
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

    

    <!--   -------------------------------------------------------------- ESTACIONAMIENTOS   -->

    <div class="modal fade" id="VerEsta" role="dialog">
        <div class="modal-dialog modals-default">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Sus <span id="titleModal"></span></h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                              <div class="carousel-inner">
                                
                              </div>
                              <a class="carousel-control-prev" style="background-color: gray; margin-left: -100px;" href="#carouselExampleControls" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                              </a>
                              <a class="carousel-control-next" style="background-color: gray; margin-right: -100px;" href="#carouselExampleControls" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                              </a>
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

<script type="text/javascript">

    function mostrarFormulario(id_residente) {

        $('#mis_inmuebles').empty().append('<option selected disabled>Seleccione los inmuebles</option');
        $('#mis_estacionamientos').empty().append('<option selected disabled>Seleccione los estacionamientos</option');
        $('#mr').empty().append('<option selected disabled>Seleccione las Multas - Recargas</option');
        $('#TotalPagar').html(parseInt(0));
        $('#mrSeleccionado').empty();
        $('#id_mensInmuebleR').empty();
        $('#id_mensEstacionaR').empty();
        $('#id_mensMultaR').empty();



        $('#verF').val(id_residente);
        $('#VerFomulario').css('display','block');

        mostrar_datos(id_residente);
        mostrar_datos2(id_residente);
        mis_mr(id_residente);
    }


    function EditarPago(id_residente, opcion) {
        $('#verF').val(id_residente);
        $('#editar_p').modal('show');
        $('#MuestraInmueble').hide();
        $('#MuestraEstacionamiento').hide();
        $('#MuestraMulta').hide();

        $('#id_inmuebleEditar').empty();
        $('#id_estacionamientoEditar').empty();
        $('#id_multaEditar').empty();

        $('#anio').empty();
        $('#anio').append('<option selected disabled value="0">Seleccione año</option');


        // $('#id_añoE').append('<option></option>');


        if (opcion == 1) {
            $('#opcion').val(1);
            $('#titleE').text('Editar Inmuebles');
            $('#MuestraInmueble').show();

            $.get("inmuebles/"+id_residente+"/buscar_anios",function (data) {
            })
            .done(function(data) {
                    //console.log(data.length);
                    if (data.length>0) {
                        // $("#anio").empty();
                        $("#anio").append('<option value="0">Seleccione el año</option>');
                        for (var i = 0; i < data.length ; i++) {
                            
                            $("#anio").append('<option value="'+data[i].anio+'">'+data[i].anio+'</option>');
                        }
                    }
            });
        }

        if (opcion == 2) {
            $('#opcion').val(2);
            $('#titleE').text('Editar Estacionamientos');
            $('#MuestraEstacionamiento').show();
            $.get("estacionamientos/"+id_residente+"/buscar_anios",function (data) {
            })
            .done(function(data) {
                    //console.log(data.length);
                    if (data.length>0) {
                        // $("#anio").empty();
                        for (var i = 0; i < data.length ; i++) {
                            
                            $("#anio").append('<option value="'+data[i].anio+'">'+data[i].anio+'</option>');
                        }
                    }
            });
        }

        if (opcion == 3) {
            $('#opcion').val(3);
            $('#titleE').text('Editar Multas');
            $('#MuestraMulta').show();
            $.get("mr/"+id_residente+"/buscar_anios",function (data) {
            })
            .done(function(data) {
                    //console.log(data.length);
                    if (data.length>0) {
                        // $("#anio").empty();
                        for (var i = 0; i < data.length ; i++) {
                            
                            $("#anio").append('<option value="'+data[i].anio+'">'+data[i].anio+'</option>');
                        }
                    }
            });
        }

    }

    function BuscarEditar(anio) {

            var id_residente =$('#verF').val();

            $.get("inmuebles/"+id_residente+"/"+anio+"/buscar_inmuebles",function (data) {
            })
            .done(function(data) {
                for(i=0 ; i<data.length ; i++){
                    
                    $('#id_inmuebleEditar').append(
                        '<optgroup label="'+data[i].idem+'" id="id_inmuebleEditar'+data[i].id+'">'+inmuebles_meses_editar(data[i].id)+'</optgroup>'
                    );

                }
            });


            //console.log('holaaa');
            $.get("estacionamientos/"+id_residente+"/"+anio+"/buscar_estacionamientos",function (data) {
            })
            .done(function(data) {
                console.log(data.length);
                for(i=0 ; i<data.length ; i++){
                    
                    $('#id_estacionamientoEditar').append(
                        '<optgroup label="'+data[i].idem+'" id="id_estacionamientoEditar'+data[i].id+'">'+estacionamientos_meses_editar(data[i].id)+'</optgroup>'
                    );

                }
                            
                
            });

            $.get("mr/"+id_residente+"/"+anio+"/buscar_mr",function (data) {
            })
            .done(function(data) {
                if (data.length>0) {
                    for (var i = 0; i < data.length; i++) {
                       $("#id_multaEditar").append('<option value="'+data[i].id+'"><font style="vertical-align: inherit; color: red">'+data[i].motivo+' - '+ data[i].tipo+' - monto: '+data[i].monto+'$</font></option>');
                    }
                }else{
                    $("#id_multaEditar").css('display','none');
                }
            });



            /*
            $.get("estacionamientos/"+id_residente+"/buscar_anios",function (data) {
            })
            .done(function(data) {
                for (var i = 0; i < data.length; i++) {
                    $('#id_estacionamientoEditar').append('<option selected value="'+data[i].id+'"></option>');
                }
            });*/
    }
    function inmuebles_meses_editar(id_inmueble) {

        $.get("mostrar/"+id_inmueble+"/meses_inmuebles",function (data) {
        })
        .done(function(data) {
            if (data.length>0) {
            for(var i=0; i < data.length; i++){
                console.log(i);
                // if (data[i].status=="Pendiente") {
                $('#id_inmuebleEditar'+id_inmueble).append('<option value="'+data[i].id+'"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'+mostrar_mes(data[i].mes)+'</font></font></option>');
                // }
            }
            
            }
        });
    }

    function estacionamientos_meses_editar(id_estacionamiento) {

        $.get("mostrar/"+id_estacionamiento+"/meses_estacionamientos",function (data) {
        })
        .done(function(data) {
            if (data.length>0) {
            for(var i=0; i < data.length; i++){
                console.log(i);
                // if (data[i].status=="Pendiente") {
                $('#id_estacionamientoEditar'+id_estacionamiento).append('<option value="'+data[i].id+'"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'+mostrar_mes(data[i].mes)+'</font></font></option>');
                // }
            }
            
            }
        });
    }

    function mis_mr(id_residente) {
        $.get("arriendos/"+id_residente+"/buscar_mr",function (data) {
        })
        .done(function(data) {
            if (data.length>0) {
                for (var i = 0; i < data.length; i++) {
                   $("#mr").append('<option value="'+data[i].id+'"><font style="vertical-align: inherit; color: red">'+data[i].motivo+' - '+ data[i].tipo+' - monto: '+data[i].monto+'$</font></option>');
                }
            }else{
                $("#mr").css('display','none');
            }
            $('#mr').removeAttr('disabled');

        });       
    }
    function mostrar_datos(id_residente) {
        //console.log('entro'+id_residente);

        $.get("arriendos/"+id_residente+"/buscar_inmuebles2",function (data) {
        })
        .done(function(data) {

            for(i=0 ; i<data.length ; i++){
                
                        $('#mis_inmuebles').append(
                            '<optgroup id="inmuebles'+data[i].id+'" label="'+data[i].idem+'">'+inmuebles_meses(data[i].id)+'</optgroup>'
                        );

            }
                        
            
        });

    }
    function inmuebles_meses(id_inmueble) {

        $.get("arriendos/"+id_inmueble+"/buscar_inmuebles3",function (data) {
        })
        .done(function(data) {
            console.log(data.length);
            //console.log('hola');
            for(var i=0; i < data.length; i++){
                if (data[i].status=="Pendiente") {
                $('#inmuebles'+id_inmueble).append('<option value="'+data[i].id+'"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'+mostrar_mes(data[i].mes)+'</font></font></option>');
                }
            }
            $('#mis_inmuebles').removeAttr('disabled');
        });
    }

    function mostrar_datos2(id_residente) {
        //console.log('entro'+id_residente);

       $.get("arriendos/"+id_residente+"/buscar_estacionamientos2",function (data) {
        })
        .done(function(data) {
            //console.log(data.length);
            for(i=0 ; i<data.length ; i++){
                
                        $('#mis_estacionamientos').append(
                            '<optgroup id="estacionamientos'+data[i].id+'" label="'+data[i].idem+'">'+estacionamientos_meses(data[i].id)+'</optgroup>'
                        );

            }
                        
            
        });

    }
    function estacionamientos_meses(id_estacionamiento) {

        $.get("arriendos/"+id_estacionamiento+"/buscar_estacionamientos3",function (data) {
            })
            .done(function(data) {
            console.log(data.length);
            for(var i=0; i < data.length; i++){
                if (data[i].status=="Pendiente") {
                $('#estacionamientos'+id_estacionamiento).append('<option value="'+data[i].id+'"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'+mostrar_mes(data[i].mes)+'</font></font></option>');
                }
            }
            $('#mis_estacionamientos').removeAttr('disabled');

        });
    }
    var mes = ['','Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre',''];
    var fecha = new Date();
    var anio = fecha.getFullYear();
    var avatar= "{{ asset('assets/images/avatar-user.png') }}";
    var house= "{{ asset('assets/images/house.png') }}";
    var parkin= "{{ asset('assets/images/parkin.png') }}";

    function montoTotalI(id_inmueble){
        if(id_inmueble!= null){
            $.get("mensualidadInmueble/"+id_inmueble+"/buscar",function (data) {
            })
            .done(function(data) {
                $("#mis_inmuebles option[value=" + id_inmueble + "]").attr('disabled',true);
                var monto= parseFloat(data[0].monto);
                $('#mrSeleccionado').append(
                    '<tr id="trInmueble'+data[0].id+'">'+
                        '<td>'+
                            '<div class="text-primary">'+data[0].idem+'</div>'+
                        '</td>'+
                        '<td>'+
                            '<div class="text-primary">'+mostrar_mes(data[0].mes)+' </div>'+
                        '</td>'+
                        '<td>'+
                            '<div class="text-primary">$'+monto+'.00</div>'+
                        '</td>'+
                        '<td>'+
                            '<div class="text-primary"></div>'+
                        '</td>'+
                        '<td>'+
                            '<button type="button" onclick="borrarInmuebleT('+id_inmueble+','+monto+')" class="btn btn-danger btn-rounded btn-sm">Borrar</button>'+
                        '</td>'+
                    '</tr>'
                );
                $('#id_mensInmuebleR').append('<option selected id="inmuebleR'+data[0].id+'" value="'+data[0].id+'">'+data[0].id+'</option>');
                montoTotal(2,monto);
            });
        }
    }
    function montoTotalE(id_estacionamiento){
        if(id_estacionamiento!= null){
            $.get("mensualidadEstacionamiento/"+id_estacionamiento+"/buscar",function (data) {
            })
            .done(function(data) {
                $("#mis_estacionamientos option[value=" + id_estacionamiento + "]").attr('disabled',true);
                var monto= parseFloat(data[0].monto);
                $('#mrSeleccionado').append(
                    '<tr id="trEstacionamiento'+data[0].id+'">'+
                        '<td>'+
                            '<div class="text-warning">'+data[0].idem+'</div>'+
                        '</td>'+
                        '<td>'+
                            '<div class="text-warning">'+mostrar_mes(data[0].mes)+' </div>'+
                        '</td>'+
                        '<td>'+
                            '<div class="text-warning">$'+monto+'.00</div>'+
                        '</td>'+
                        '<td>'+
                            '<div class="text-warning"></div>'+
                        '</td>'+
                        '<td>'+
                            '<button type="button" onclick="borrarEstacionamientoT('+id_estacionamiento+','+monto+');" class="btn btn-danger btn-rounded btn-sm">Borrar</button>'+
                        '</td>'+
                    '</tr>'
                );
                $('#id_mensEstacionaR').append('<option selected id="estacionamientoR'+data[0].id+'" value="'+data[0].id+'">'+data[0].id+'</option>');
                montoTotal(2,monto);
            });
        }
    }
    function montoTotalM(id_multa){
        if(id_multa!= null){
            $.get("multas_recargas/"+id_multa+"/buscar",function (data) {
            })
            .done(function(data) {

                $("#mr option[value=" + id_multa + "]").attr('disabled',true);
                var monto= parseFloat(data[0].monto);
                var tipo= ""+data[0].tipo+"";
                if(data[0].tipo == 'Recarga'){
                    var tipo=1;
                    $('#mrSeleccionado').append(
                        '<tr id="trMulta'+data[0].id+'">'+
                            '<td>'+
                                '<div class="text-success">Recarga </div>'+
                            '</td>'+
                            '<td>'+
                                '<div class="text-success">'+data[0].motivo+'</div>'+
                            '</td>'+
                            '<td>'+
                                '<div class="text-success">$'+monto+'.00</div>'+
                            '</td>'+
                            '<td>'+
                                '<div class="text-success"></div>'+
                            '</td>'+
                            '<td>'+
                                '<button type="button" onclick="borrarMultaT('+data[0].id+','+monto+','+tipo+')" class="btn btn-danger btn-rounded btn-sm">Borrar</button>'+
                            '</td>'+
                        '</tr>'
                    );
                    
                    montoTotal(2,monto);
                }
                if(data[0].tipo == 'Multa'){
                    var tipo=2;
                    $('#mrSeleccionado').append(
                        '<tr id="trMulta'+data[0].id+'">'+
                            '<td>'+
                                '<div class="text-danger">Multa </div>'+
                            '</td>'+
                            '<td>'+
                                '<div class="text-danger">'+data[0].motivo+'</div>'+
                            '</td>'+
                            '<td>'+
                                '<div class="text-danger"></div>'+
                            '</td>'+
                            '<td>'+
                                '<div class="text-danger">$'+monto+'.00</div>'+
                            '</td>'+
                            '<td>'+
                                '<button type="button" onclick="borrarMultaT('+id_multa+','+monto+','+tipo+')" class="btn btn-danger btn-rounded btn-sm">Borrar</button>'+
                            '</td>'+
                        '</tr>'
                    );
                    montoTotal(1,monto);
                }

                $('#id_mensMultaR').append('<option selected id="multaR'+data[0].id+'" value="'+data[0].id+'">'+data[0].id+'</option>');
            });
        }
    }


    function borrarInmuebleT(id_inmueble, monto) {
        $("#mis_inmuebles option[value=" + id_inmueble + "]").removeAttr('disabled');
        $("#trInmueble"+id_inmueble).remove();
        $("#inmuebleR"+id_inmueble).remove();
        montoTotal(1,monto);
    }
    function borrarEstacionamientoT(id_estacionamiento, monto) {
        $("#mis_estacionamientos option[value=" + id_estacionamiento + "]").removeAttr('disabled');
        $("#trEstacionamiento"+id_estacionamiento).remove();
        $("#estacionamientoR"+id_estacionamiento).remove();
        montoTotal(1,monto);
    }
    function borrarMultaT(id_multa, monto, tipo) {
        $("#mis_mr option[value=" + id_multa + "]").removeAttr('disabled');
        $("#trMulta"+id_multa).remove();
        $("#multaR"+id_multa).remove();
        if (tipo == 1) {
            montoTotal(1,monto);
        }else{
            montoTotal(2,monto);
        }
        
    }


    function montoTotal(tipo, monto){
        var total=0;
        var cuentaFilas = $('#mrSeleccionado tr').length;
        if (cuentaFilas == 0) {
            $('#TotalPagar').html(parseInt(0));
            //$('#total').val(0);
        } else {
            if (tipo == 1) {
                $('#TotalPagar').html(parseInt($('#TotalPagar').html())-monto);
                $("#total").val($("#TotalPagar").html());
            } else if(tipo == 2) {
                $('#TotalPagar').html(parseInt($('#TotalPagar').html())+monto);
                $("#total").val($("#TotalPagar").html());
            }
        }
    }







    //-----------------------------------------------------------------------------------CARROUSEL---------------------------------------------------------

    function buscarResidentes(id_residente) {
        $('.carrousel').empty();

        $.get('arriendos/'+id_residente+'/buscar_residente',function (data) {

        })
        .done(function(data) {
            var verF= $('#verF');
            $('.carrousel').append(
                '<div class="card" style="margin-left: 20px;" width="900px">'+
                    '<form class="form-row align-items-center">'+
                        '<div class="form-group mr-4">'+
                            '<img src="'+avatar+'" width="50px" height="50px"  style="margin-left: 5px;" />'+
                        '</div>'+
                        '<div class="form-group mr-6">'
                            +data[0].nombres+ ' ' +data[0].apellidos+
                            '<br>'
                            +data[0].rut+
                        '</div>'+
                            
                                
                            '<div class="btn-group mt-2 mr-1">'+
                                '<a onclick="VerResi('+data[0].id+')" href="#"><img src="'+house+'" class="avatar-md rounded-circle"/></a>'+
                            '</div>'+

                            '<div class="btn-group mt-2 mr-1">'+
                                '<a onclick="VerEstacionamientos('+data[0].id+')" href="#"><img src="'+parkin+'" class="avatar-md"/>'+
                            '</div>'+
                                
                            
                            '<a href="#" onclick="registrarPago('+data[0].id+')" class=" btn btn-sm btn-success"> Pagar</a>'+
                    '</form>'+
                '</div>'
            );
        });
    }

    function registrarPago(id_residente) {
        $('#verF').val(id_residente);
        $('#VerFomulario').css('display','block');
    }

    function VerResi(id_residente) {
        $('#titleModal').empty();
        $('#titleModal').append('Residencias');
        $('.carousel-inner').empty();
        $('#VerEsta').modal('show');
        $('#MostrarEstacionamientos').empty();

        
        $.get("arriendos/"+id_residente+"/buscar_inmuebles2",function (data) {
        })
        .done(function(data) {

            
            //alert(data.length);
            for(i=0 ; i<data.length ; i++){
                if (i==0) {
                        $('.carousel-inner').append(
                            '<div class="carousel-item active">'+
                                '<center>'+
                                    '<h3 alt="'+i+' slide">'+data[i].idem+'</h3>'+
                                '</center>'+
                                '<hr>'+
                                '<label>Montos por mes</label><br>'+
                                '<div class="inner'+data[i].id+'"></div>'
                        );

                        detalles(data[i].id);
                    }else{
                        $('.carousel-inner').append(
                            '<div class="carousel-item">'+
                                '<center>'+
                                    '<h3 alt="'+i+' slide">'+data[i].idem+'</h3>'+
                                '</center>'+
                                '<hr>'+
                                '<label>Montos por mes</label><br>'+
                                '<div class="inner'+data[i].id+'"></div>'
                        );

                        detalles(data[i].id);
                    }
                    $('.carousel-inner').append('</div>');
            }
                        
            
        });
    }
    function detalles(id_inmueble){
        //console.log(id_inmueble);
        $.get("arriendos/"+id_inmueble+"/buscar_inmuebles3",function (data) {
        })
        .done(function(data) {
            //console.log(data.length);
            for(var i=0; i < data.length; i++){
                $('.inner'+id_inmueble).append(
                            '<div class="row">'+
                                '<div class="col-md-4">'+ 
                                        '<label>'+mostrar_mes(data[i].mes)+'</label>'+
                                '</div>'+
                                '<div class="col-md-6">'+
                                    '<label>'+data[i].status+'</label>'+
                                '</div>'+
                            '</div>'
                        );
            }

        });
    }

    
    function mostrar_mes(num) {
        switch (num) {
            case 1:
                return 'Enero';
                break;
            case 2:
                return 'Febrero';
                break;
            
            case 3:
                return 'Marzo';
                break;
            
            case 4:
                return 'Abril';
                break;
            
            case 5:
                return 'Mayo';
                break;
            
            case 6:
                return 'Junio';
                break;
            
            case 7:
                return 'Julio';
                break;
            
            case 8:
                return 'Agosto';
                break;
            
            case 9:
                return 'Septiembre';
                break;
            
            case 10:
                return 'Octubre';
                break;
            
            case 11:
                return 'Noviembre';
                break;
            
            case 12:
                return 'Diciembre';
                break;
            
            
        }
    }

    function buscarArriendos(id_arriendo) {
        $('#buttonCreate').empty();
        $('#createMensuality1').empty();
        $('#createMensuality2').empty();

        // alert(id_arriendo);
        $.get('inmuebles/'+id_arriendo+'/'+anio+'/buscar_mensualidad', function(data) {
        }).done(function(data) {
            if (data.length > 0) {
                // alert('trae');
                var montoT=data.length-1;
                    $('#buttonCreate').append(
                        "<div class='card-box'>"+
                            "<div class='row'>"+
                                "<div class='col-md-12' width='100%'>"+
                                    "<a href='#' disabled class='btn btn-block btn-success'>Montos por mes</a>"+
                                "</div>"+
                                // "<div class='col-md-6' width='100%'>"+
                                //     "<a href='#' class='btn btn-block btn-warning' onclick='mostrarE(2)'>Monto por año</a>"+
                                // "</div>"+
                            "</div>"+
                        "</div"
                    );
                    $('#createMensuality1').append('<label>Montos por mes</label><br>');

                    
                    for (var i = 0; i < data.length; i++) {
                            
                            console.log(i);
                            $('#createMensuality1').append(
                                '<div class="row">'+
                                    '<div class="col-md-4">'+
                                        '<div class="form-group">'+
                                            '<input type="hidden" value="'+data[i].mes+'" name="mes[]" class="form-control-plaintext">'+
                                            '<label>'+mes[data[i].mes]+'</label>'+
                                        '</div>'+
                                    '</div>'+
                                    '<div class="col-md-6">'+
                                        '<div class="form-group">'+
                                            '<div class="input-group mb-2">'+
                                                // '<div class="input-group-prepend">'+
                                                //     '<div class="input-group-text">$</div>'+
                                                // '</div>'+
                                                '<label><strong>$'+data[i].monto+'</strong></label>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'
                            );

                    }
                    $('#createMensuality2').append(
                        '<div class="row">'+
                            '<div class="col-md-12">'+
                                '<div class="form-group">'+
                                    '<label>Monto por todo el año</label>'+
                                    '<div class="input-group mb-2">'+
                                        '<div class="input-group-prepend">'+
                                            '<div class="input-group-text">$</div>'+
                                        '</div>'+
                                        '<input type="text" name="montoaAnio" value="'+data[montoT].monto+'" class="form-control" id="montoAnio_e" placeholder="10" disabled="disabled">'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                        '</div>'
                    );
                    $('#createMensuality2').css('display','none');            
               

            }else{
                // alert('NO TRAE')
                $('#buttonCreate').append('<h3>No hay mensualidades para el año actual</h3>');
            }
        });
    }

    function VerEstacionamientos(id_residente) {
        $('#titleModal').empty();
        $('#titleModal').append('Residencias');
        $('.carousel-inner').empty();
        $('#VerEsta').modal('show');
        $('#MostrarEstacionamientos').empty();

        
        $.get("arriendos/"+id_residente+"/buscar_estacionamientos2",function (data) {
        })
        .done(function(data) {

            
            //alert(data.length);
            for(i=0 ; i<data.length ; i++){
                if (i==0) {
                        $('.carousel-inner').append(
                            '<div class="carousel-item active">'+
                                '<center>'+
                                    '<h3 alt="'+i+' slide">'+data[i].idem+'</h3>'+
                                '</center>'+
                                '<hr>'+
                                '<label>Montos por mes</label><br>'+
                                '<div class="inner'+data[i].id+'"></div>'
                        );

                        detalles2(data[i].id);
                    }else{
                        $('.carousel-inner').append(
                            '<div class="carousel-item">'+
                                '<center>'+
                                    '<h3 alt="'+i+' slide">'+data[i].idem+'</h3>'+
                                '</center>'+
                                '<hr>'+
                                '<label>Montos por mes</label><br>'+
                                '<div class="inner'+data[i].id+'"></div>'
                        );

                        detalles2(data[i].id);
                    }
                    $('.carousel-inner').append('</div>');
            }
                        
            
        });
    }

    function detalles2(id_estacionamiento){
            //console.log(id_inmueble);
            $.get("arriendos/"+id_estacionamiento+"/buscar_estacionamientos3",function (data) {
            })
            .done(function(data) {
                console.log(data.length);
                for(var i=0; i < data.length; i++){
                    $('.inner'+id_estacionamiento).append(
                                '<div class="row">'+
                                    '<div class="col-md-4">'+ 
                                            '<label>'+mostrar_mes(data[i].mes)+'</label>'+
                                    '</div>'+
                                    '<div class="col-md-6">'+
                                        '<label>'+data[i].status+'</label>'+
                                    '</div>'+
                                '</div>'
                            );
                }

            });
        }

    function buscarEstacionamientos(id_arriendo) {
        $('#muestraEsta1').empty();
        $('#muestraEsta2').empty();
        // $('#muestrEsta3').empty();

        $.get('estacionamientos/'+id_arriendo+'/'+anio+'/buscar_mensualidad', function(data) {
        }).done(function(data) {
            if (data.length > 0) {
                // alert('trae');
                var montoT=data.length-1;
                    $('#muestraEsta1').append(
                        "<div class='card-box'>"+
                            "<div class='row'>"+
                                "<div class='col-md-12' width='100%'>"+
                                    "<a href='#' disabled class='btn btn-block btn-success'>Montos por mes</a>"+
                                "</div>"+
                                // "<div class='col-md-6' width='100%'>"+
                                //     "<a href='#' class='btn btn-block btn-warning' onclick='mostrarE(2)'>Monto por año</a>"+
                                // "</div>"+
                            "</div>"+
                        "</div"
                    );
                    $('#muestraEsta2').append('<label>Montos por mes</label><br>');

                    
                    for (var i = 0; i < data.length; i++) {
                            
                        $('#muestraEsta2').append(
                            '<div class="row">'+
                                '<div class="col-md-4">'+
                                    '<div class="form-group">'+
                                        '<input type="hidden" value="'+data[i].mes+'" name="mes[]" class="form-control-plaintext">'+
                                        '<label>'+mes[data[i].mes]+'</label>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="col-md-6">'+
                                    '<div class="form-group">'+
                                        '<div class="input-group mb-2">'+
                                            // '<div class="input-group-prepend">'+
                                            //     '<div class="input-group-text">$</div>'+
                                            // '</div>'+
                                            '<label><strong>$'+data[i].monto+'</strong></label>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'
                        );

                    }
               

            }else{
                // alert('NO TRAE')
                $('#muestrEsta1').append('<h3>No hay mensualidades para el año actual</h3>');
            }
        });
    }
</script>

@section('scripts')

<script type="text/javascript">

</script>

@endsection