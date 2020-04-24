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
                                @foreach($asignaIn as $key)
                                    @foreach($asignaEs as $key2)
                                        @if($key->id_residente == $residentes[$i]->id && $key2->id_residente == $residentes[$i]->id)
                                            <a style="border-radius: 50px;" href="#" onclick="$('#verF').val('{{$residentes[$i]->id}}');$('#VerFomulario').css('display','block');mostrar_datos('{{$residentes[$i]->id}}');mostrar_datos2('{{$residentes[$i]->id}}');" class=" btn btn-sm btn-success"> <i data-feather="dollar-sign"></i></a>
                                            <a style="border-radius: 50px;" href="#" class=" btn btn-sm btn-warning"> <i data-feather="edit"></i></a>
                                        @endif
                                    @endforeach
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
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Inmuebles</label>
                            <select multiple class="form-control select2" id="mis_inmuebles" name="inmuebles[]" data-plugin="multiselect" data-selectable-optgroup="true">
                                {{-- <optgroup label="NOMBRE DE INMUEBLE">
                                    <option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Marzo</font></font></option>
                                    <option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Abril</font></font></option>
                                    <option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Mayo</font></font></option>
                                    <option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Junio</font></font></option>
                                </optgroup>
                                <optgroup label="NOMBRE DE INMUEBLE 2">
                                    <option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Agosto</font></font></option>
                                    <option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Aeptiembre</font></font></option>
                                    <option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Octubre</font></font></option>
                                    <option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Noviembre</font></font></option>
                                </optgroup> --}}
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Estacionamientos</label>
                            <select multiple class="form-control select2" id="mis_estacionamientos" name="estacionamientos[]" data-plugin="multiselect" data-selectable-optgroup="true">
                                {{-- <optgroup label="NOMBRE DE ESTACIONAMIENTO">
                                    <option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Marzo</font></font></option>
                                    <option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Abril</font></font></option>
                                    <option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Mayo</font></font></option>
                                    <option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Junio</font></font></option>
                                </optgroup>
                                <optgroup label="NOMBRE DE ESTACIONAMIENTO 2">
                                    <option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Agosto</font></font></option>
                                    <option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Aeptiembre</font></font></option>
                                    <option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Octubre</font></font></option>
                                    <option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Noviembre</font></font></option>
                                </optgroup> --}}
                            </select>
                        </div>
                    </div>
                </div>
                <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Multas</label>
                                <br>
                                <font style="vertical-align: inherit; color: red">Multa 1 - 9999.00$</font><br>
                                <font style="vertical-align: inherit; color: red">Multa 2 - 9999.00$</font><br>
                                <font style="vertical-align: inherit; color: red">Multa 3 - 9999.00$</font>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Recargas</label>
                                <br>
                                <font style="vertical-align: inherit; color: green;">Recarga 1 - 9999.00$</font><br>
                                <font style="vertical-align: inherit; color: green;">Recarga 2 - 9999.00$</font><br>
                                <font style="vertical-align: inherit; color: green;">Recarga 3 - 9999.00$</font>
                            </div>
                        </div>
                    </div>
                <hr>
                <div class="row justify-content-md-center">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Total a pagar</label>
                            <center><h1 style="color: grey; font-size: 100px;">$ 0.00</h1></center>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Rereferencias</label>
                            <input type="number" name="" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="float-right">
                    <input type="hidden" name="id_residente" id="verF">
                    <button type="button" class="btn btn-primary btn-rounded">Aceptar</button>
                </div>

                
                
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

    function mostrar_datos(id_residente) {
        //console.log('entro'+id_residente);

        $.get("arriendos/"+id_residente+"/buscar_inmuebles2",function (data) {
        })
        .done(function(data) {

            //console.log(data.length);
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
            for(var i=0; i < data.length; i++){
                if (data[i].status=="Pendiente") {
                $('#inmuebles'+id_inmueble).append('<option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'+mostrar_mes(data[i].mes)+'</font></font></option>');
                }
            }

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
                $('#estacionamientos'+id_estacionamiento).append('<option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'+mostrar_mes(data[i].mes)+'</font></font></option>');
                }
            }

        });
    }
    var mes = ['','Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre',''];
    var fecha = new Date();
    var anio = fecha.getFullYear();
    var avatar= "{{ asset('assets/images/avatar-user.png') }}";
    var house= "{{ asset('assets/images/house.png') }}";
    var parkin= "{{ asset('assets/images/parkin.png') }}";

    

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