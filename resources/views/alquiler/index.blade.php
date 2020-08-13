@extends('layouts.app')

@section('content')



    <style type="text/css">
      .seccionControl,#seccionControl1,#seccionControl2,#seccionControl3,#seccionControl4,#seccionControl5,#seccionControl6{
        display: none;
      }
    </style>






     <style type="text/css">
        .card-header, .card-footer{        
            /*-webkit-linear-gradient(to left, #d87602, #d64322);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;*/

            /*background-image:
            linear-gradient(to right, white, gray);*/
            padding: 20px;
            background: rgba(0, 0, 0, 0.6);
            color: gray;
            font: 18px Arial, sans-serif;
        }
        .palabraVerAlquiler2, .palabraVerEstaciona2,.PalabraEditarPago2, .tituloTabla2
        {
            display: none;
        }
        @media only screen and (max-width: 800px)  {

            .PalabraEditarPago, .PalabraRealizarPago, .PalabraPagoConfirmar{
                display: none;
            }
            .palabraVerAlquiler{
                display: none;
            }
            .palabraVerAlquiler2{
                display: block;
            }
            .palabraVerEstaciona{
                display: none;
            }
            .palabraVerEstaciona2{
                display: block;
            }
            .PalabraEditarPago2{
                display: block;
            }
            .iconosMetaforas{
                display: none;    
            }
            .card-table{
                width: 100%
            }

        }
        @media only screen and (max-width: 200px)  {
            .botonesEditEli{
                width: 15px;
                height: 15px;
            }
            .iconosMetaforas2{
                width: 5px;
                height: 5px;    
            }
        }
        @media screen and (max-width: 480px) {
            .tituloTabla{
                display: none;
            }
            .tituloTabla2{
                display: block;
            }
            .iconosMetaforas2{
                width: 15px;
                height: 15px;    
            }
            .botonesEditEli{
                width: 30px;
                height: 30px;
                margin-top: 5px;
                    
            }
        }


    </style>
    <input type="hidden" id="colorView" value="#CB8C4D !important">
    <div class="container">
        <div class="row page-title">
            <div class="col-md-12">
                <nav aria-label="breadcrumb" class="float-right mt-1">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Alquiler</li>
                    </ol>
                </nav>
                <h4 class="mb-1 mt-0">Alquiler</h4>
            </div>
        </div>
        @include('flash::message')
        @if(count($errors))
            <div class="alert-list m-4">
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>
                            {{$error}}
                        </li>
                        @endforeach

                    </ul>
                </div>
            </div>
        @endif
    </div>
    <div class="row justify-content-left">
      <div class="col-md-6">
        <div id="tablaAlquiler" class="card rounded card-tabla shadow bg-white rounded" style="display: none;border: 1px solid #f6f6f7!important;
            border-color: #CB8C4D !important;">
          <div class="card-body">
            <div class="row justify-content-center">
                  @if(\Auth::user()->tipo_usuario == 'Admin')
                      <div class="col-md-12">
                          <div class="row">
                              <div class="col-md-12 offset-md-12">
                                  <a class="btn btn-success boton-tabla shadow" style="
                                      border-radius: 10px;
                                      color: white;
                                      height: 35px;
                                      margin-bottom: 5px;
                                      margin-top: 5px;
                                      float: right;
                                      border: 1px solid #f6f6f7!important;
                                      border-color: #CB8C4D !important;
                                      background-color: #CB8C4D !important" onclick="NuevoAlquiler()">
                                      <span class="PalabraEditarPago text-white">Nuevo Alquiler</span>
                                      <center>
                                          <span class="PalabraEditarPago2 text-white">
                                              <i data-feather="plus" class="iconosMetaforas2"></i>
                                          </span>
                                      </center>
                                  </a>
                              </div>
                          </div>
                      </div>
                    </div>
                    <div class="row justify-content-center">
                  @endif
              <div class="col-md-12">
                  <table class="table dataTable data-table-basic table-curved table-striped tabla-estilo" style="width: 100%;">
                      <thead>
                          <tr class="table-default text-white">
                              <td colspan="2" align="center">
                                  <div class="card border border-info" role="alert">
                                      <span class="text-dark p-1 mb-1"><strong>Aviso: </strong><br>-Seleccione a un Alquiler para ver mas opciones.</span>
                                  </div>
                              </td>
                              <td colspan="2"></td>
                          </tr>
                          <tr class="text-white" class="th1" style="background-color: #CB8C4D;">
                              <th>#</th>
                              <th>
                                  <span class="PalabraEditarPago">Idem</span>
                                  <span class="PalabraEditarPago2">I</span>
                              </th>
                              <th>
                                  <span class="PalabraEditarPago">Tipo</span>
                                  <span class="PalabraEditarPago2">T</span>
                              </th>
                              <th>
                                  <span class="PalabraEditarPago">Status</span>
                                  <span class="PalabraEditarPago2">
                                      <i data-feather="sliders" class="iconosMetaforas2"></i>
                                  </span>
                              </th>
                          </tr>
                          <tr class="bg-primary text-white" class="th2" style="display: none">
                              <th width="10"></th>
                              <th>
                                  <span class="PalabraEditarPago">Idem</span>
                                  <span class="PalabraEditarPago2">Id</span>
                              </th>
                              <th>
                                  <center>
                                      <span class="PalabraEditarPago">Opciones</span>
                                      <span class="PalabraEditarPago2">
                                          <i data-feather="settings" class="iconosMetaforas2"></i>
                                      </span>
                                  </center>
                              </th>
                              <th>
                                  <span class="PalabraEditarPago">Status</span>
                                  <span class="PalabraEditarPago2">
                                      <i data-feather="sliders" class="iconosMetaforas2"></i>
                                  </span>
                              </th>
                          </tr>
                      </thead>
                      <tbody>
                        
                      </tbody>
                  </table>
              </div>
            </div>
        </div>
        </div>
        <div class="col-md-6">
        </div>
      </div>
    </div>
    <form>
      <div class="bg-white seccionControl shadow border border-success disabled" style="border-radius: 30px !important;">
        <br>
        <div class="row container">
          <div class="col-md-2" align="left" id="seccionControl1">
            <div class="card shadow border border-success" style="border-radius: 50%;">
              <div style="right: 0%;position: absolute; border-radius: 100%; width: 30%; height: 30%;" class="text-white" align="right">
                <img align="center" src="{{ asset('assets/images/check.png') }}" class="" style="width:100%; border-radius: 40% !important;">
              </div>  
              <div class="card-body">
                <center>
                  <div style="width: 100%; height: 100%;">
                    <h3>Abrir Negocio</h3>
                    <input type="hidden" name="negocio" id="negocio">
                  </div>
                </center>
              </div>
            </div>
          </div>
          <div class="col-md-2" align="left" id="seccionControl2">
            <div class="card shadow border border-success" style="border-radius: 50%;">
              <div style="right: 0%;position: absolute; border-radius: 100%; width: 30%; height: 30%;" class="text-white" align="right">
                <img align="center" src="{{ asset('assets/images/check.png') }}" class="" style="width:100%; border-radius: 40% !important;">
              </div>  
              <div class="card-body">
                <center>
                <img align="center" id="seccionControl2-2" class="" style="width:75%; border-radius: 40% !important;">
                </center>
              </div>
            </div>
          </div>
          <div class="col-md-2" align="left" id="seccionControl3">
            <div class="card shadow border border-success" style="border-radius: 50%;">
              <div style="right: 0%;position: absolute; border-radius: 100%; width: 30%; height: 30%;" class="text-white" align="right">
                <img align="center" src="{{ asset('assets/images/check.png') }}" class="" style="width:100%; border-radius: 40% !important;">
              </div>  
              <div class="card-body">
                <center>
                  <div style="width: 100%; height: 100%;">
                    <h3>Datos Negocio</h3>
                  </div>
                </center>
              </div>
            </div>
          </div>
          <div class="col-md-2" align="left" id="seccionControl4">
            <div class="card shadow border border-success" style="border-radius: 50%;">
              <div style="right: 0%;position: absolute; border-radius: 100%; width: 30%; height: 30%;" class="text-white" align="right">
                <img align="center" src="{{ asset('assets/images/check.png') }}" class="" style="width:100%; border-radius: 40% !important;">
              </div>  
              <div class="card-body">
                <center>
                <img align="center" src="{{ asset('assets/images/alquiler/calendar.png') }}" class="" style="width:70%;">
                </center>
              </div>
            </div>
          </div>
          <div class="col-md-2" align="left" id="seccionControl5">
            <div class="card shadow border border-success" style="border-radius: 50%;">
              <div style="right: 0%;position: absolute; border-radius: 100%; width: 30%; height: 30%;" class="text-white" align="right">
                <img align="center" src="{{ asset('assets/images/check.png') }}" class="" style="width:100%; border-radius: 40% !important;">
              </div>  
              <div class="card-body">
                <center>
                <img align="center" src="{{ asset('assets/images/alquiler/pago.png') }}" class="" style="width:80%;">
                </center>
              </div>
            </div>
          </div>
          <div class="col-md-2" align="left" id="seccionControl6" style="width: 100%; height: 100%;">
            <center>
              <button type="submit" class="btn btn-success">Agregar</button>
            </center>
          </div>
        </div>
      </div>
      <div class="seccionQueHacer" style="display: none;">
        <h1 align="center" style="font: 30px Arial, sans-serif; display: none;" id="verTabla3-1">¿Qué Desea Hacer?</h1>
        <div class="row justify-content-center">
          <div class="col-md-6">
            <a href="#" onclick="seccionNegocio(1);">
              <div id="verTabla3-2" class="card border border-dark shadow rounded m-7" style="height: 100px;
                    background-image: url('{{ asset('assets/images/alquiler/Negocio.jpg') }}');
                    background-position: center;
                    background-repeat: no-repeat;
                    background-size: cover;
                    display: none;
                    ">
                <div class="card-header">
                  <h3 align="center" class="text-warning">Instalar un Negocio</h3>
                </div>
              </div>
            </a>
          </div>
          <div class="col-md-6">
            <a href="#" onclick="seccionNegocio(2);">
              <div id="verTabla3-3" class="card border border-dark shadow rounded m-7" style="height: 100px;
                    background-image: url('{{ asset('assets/images/alquiler/Reunion.jpg') }}');
                    background-position: center;
                    background-repeat: no-repeat;
                    background-size: cover;
                    display: none;
                    ">
                <div class="card-header">
                  <h3 align="center" class="text-warning">Alquilar Espacio para reunión</h3>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
      <br>
      <div class="seccionTipoNegocio" style="display: none;">
        <input type="hidden" name="tipoNegocio" id="InputTipoNegocio">
        <h1 align="center" style="font: 30px Arial, sans-serif;">¿Qué Tipo de Instalación Desea Abrir?</h1>      
        <div class="row justify-content-center" style="width: auto; height: auto;">
          <div class="col-md-4">
            <div class="card rounded shadow " id="cardTipoNegocio1" style="display: none;">
              <div class="card-body">
                <a href="#" onclick="SelectTipoN(1);">
                <center>
                  <img align="center" class="imagenAnun" src="{{ asset('assets/images/alquiler/gym.png') }}" class="" style="width:70%;">
                  <h3>Gimnasio/Deporte <br><br></h3>
                </center>
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card rounded shadow " id="cardTipoNegocio2" style="display: none;">
              <div class="card-body">
                <a href="#" onclick="SelectTipoN(2);">
                <center>
                  <img align="center" class="imagenAnun" src="{{ asset('assets/images/alquiler/market.png') }}" class="" style="width:70%;max-width:500px; ">
                  <h3>Mercado/Distribuidor de alimentos</h3>
                </center>
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card rounded shadow " id="cardTipoNegocio3" style="display: none;">
              <div class="card-body">
                <a href="#" onclick="SelectTipoN(3);">
                <center>
                  <img align="center" class="imagenAnun" src="{{ asset('assets/images/alquiler/restaurant.png') }}" class="" style="width:70%;max-width:500px;">
                  <h3>Restaurant <br><br></h3>
                </center>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="row justify-content-center" style="width: auto; height: auto;">
          <div class="col-md-4">
            <div class="card rounded shadow " id="cardTipoNegocio4" style="display: none;">
              <div class="card-body">
                <a href="#" onclick="SelectTipoN(4);">
                <center>
                  <img align="center" class="imagenAnun" src="{{ asset('assets/images/alquiler/factory.png') }}" class="" style="width:70%;">
                  <h3>Producción </h3>
                </center>
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card rounded shadow " id="cardTipoNegocio5" style="display: none;">
              <div class="card-body">
                <a href="#" onclick="SelectTipoN(5);">
                <center>
                  <img align="center" class="imagenAnun" src="{{ asset('assets/images/alquiler/oficina.png') }}" class="" style="width:70%;max-width:500px; ">
                  <h3>Oficina</h3>
                </center>
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card rounded shadow " id="cardTipoNegocio6" style="display: none;">
              <div class="card-body">
                <a href="#" onclick="SelectTipoN(6);">
                <center>
                  <img align="center" class="imagenAnun" src="{{ asset('assets/images/alquiler/theater.png') }}" class="" style="width:70%;max-width:500px;">
                  <h3>Entretenimiento </h3>
                </center>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="seccionDatosNegocio" style="display: none;">
        <h1 align="center" style="font: 30px Arial, sans-serif;">Datos de la instalación</h1>  
        <div class="card shadow border border-success">
          <div class="card-body" align="center">
            <!-- <div class="row justify-content-center">
              <div class="col-md-12">
                <label>¿Donde se ubicará el negocio?</label>
                <select class="form-control select2" >
                </select>
              </div>
            </div> -->
            <br>
            <div class="row justify-content-center">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Nombre</label>
                  <input type="text" name="nombre" class="form-control border border-success" placeholder="Nombre del Negocio">
                </div>
              </div>
              <div class="col-md-5">
                <div class="form-group">
                  <label>Rut</label>
                  <input type="text" name="nombre" class="form-control border border-success" placeholder="Rut del Negocio">
                </div>
              </div>
              <div class="col-md-1">
                <div class="form-group">
                  <label><br></label>
                  <input type="text" name="verificador" min="1" minlength="1" maxlength="2" class="form-control border border-success" id="verificadorEdit" value="1" required>
                </div>
              </div>
            </div>
            <div class="row justify-content-center">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Descripcion</label>
                  <textarea class="form-control border border-success" placeholder="Descripción del Negocio"></textarea>
                </div>
              </div>
            </div>
            <div class="float-right">
              <a class="btn btn-success text-white" style="border-radius: 30% !important;" onclick="seccionHorario()">
                <!-- <img src="{{ asset('assets/images/check.png') }}" style="width: 10%; height: 10%; float: right;"> -->
                Listo
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="seccionHorarioNegocio" style="display: none;">
        <h1 align="center" style="font: 30px Arial, sans-serif;">¿En qué Horario Operará la Instalación?</h1>
        <div class="card shadow border border-primary">
          <div class="card-body">
            <div class="row justify-content-left">
              <div class="col-md-6">
                <div class="button-list">
                  <button type="button" class="btn btn-primary" onclick="diaNegocio(1)" id="horarioBotonDia1">Lunes</button>
                  <button type="button" class="btn btn-primary" onclick="diaNegocio(2)" id="horarioBotonDia2">Martes</button>
                  <button type="button" class="btn btn-primary" onclick="diaNegocio(3)" id="horarioBotonDia3">Miércoles</button>
                  <button type="button" class="btn btn-primary" onclick="diaNegocio(4)" id="horarioBotonDia4">Jueves</button>
                  <button type="button" class="btn btn-primary" onclick="diaNegocio(5)" id="horarioBotonDia5">Viernes</button>
                  <button type="button" class="btn btn-primary" onclick="diaNegocio(6)" id="horarioBotonDia6">Sábado</button>
                  <button type="button" class="btn btn-primary" onclick="diaNegocio(7)" id="horarioBotonDia7">Domingo</button>
                </div>
              </div>
              <div class="col-md-6">
                <div class="row justify-content-center">
                  <div class="col-md-6">
                    <div class="form-group" align="center">
                      <label>Desde</label>
                      <input class="form-control" id="example-time" type="time" name="time">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group" align="center">
                      <label>Hasta</label>
                      <input class="form-control" id="example-time" type="time" name="time">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="float-right">
              <a class="btn btn-success text-white" style="border-radius: 30% !important;" onclick="seccionPago()">
                <!-- <img src="{{ asset('assets/images/check.png') }}" style="width: 10%; height: 10%; float: right;"> -->
                Listo
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="seccionPagoNegocio" style="display: none;">
        <h1 align="center" style="font: 30px Arial, sans-serif;">¿Qué plan de pago desea para la instalación?</h1>  
        <div class="card shadow rounded">
          <div class="card-body">
            <div class="">
              <center>
                <div class="row justify-content-left">
                  <?php $num=0; ?>
                  @foreach($planesPago as $key)
                    @if($num==0)
                      <div class="col-md-4">
                        <div class="card shadow border card-tabla rounded" style="border-color: {{$key->color}} !important; height: 400px;">
                          <div class="card-body">
                              <div class="custom-control custom-radio mb-2">
                                <input type="radio" id="customRadio1-{{$key->id}}" name="planP" value="{{$key->id}}" checked>
                              </div>
                             <h3>{{$key->nombre}}</h3>
                             <span>{{$key->dias}} dias</span>
                             <br>
                              <span style="font-size: 30px;">$</span><span style="font-size: 70px;">{{$key->monto}}</span><strong>/Mes</strong>
                             <br>
                             <center>
                              <img align="center" class="imagenAnun2" src="{{ asset($key->url_img) }}">
                             </center>
                          </div>
                        </div>
                      </div>
                    @else
                      <div class="col-md-4">
                        <div class="card shadow border card-tabla rounded" style="border-color: {{$key->color}} !important; height: 400px;">
                          <div class="card-body">
                              <div class="custom-control custom-radio mb-2">
                                <input type="radio" id="customRadio1-{{$key->id}}" name="planP" value="{{$key->id}}">
                              </div>
                             <h3>{{$key->nombre}}</h3>
                             <span>{{$key->dias}} dias</span>
                             <br>
                              <span style="font-size: 30px;">$</span><span style="font-size: 70px;">{{$key->monto}}</span><strong>/Mes</strong>
                             <br>
                             <center>
                              <img align="center" class="imagenAnun2" src="{{ asset($key->url_img) }}">
                             </center>
                          </div>
                        </div>
                      </div>
                    @endif
                    <?php $num++; ?>
                  @endforeach()
                </div>
              </center>
            </div>
            <div class="float-right">
              <a class="btn btn-success text-white" style="border-radius: 30% !important;" onclick="SeccionListo()">
                Listo
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="float-right">
        <button class="btn btn-success" style="display: none;">Agregar</button>
      </div>
    </form>


@endsection

<script type="text/javascript">
  function NuevoAlquiler() {
    $('#verTabla3-2').hide();
    $('#verTabla3-3').hide();
    $("#tablaAlquiler").fadeOut("slow",
      function() {
        $(this).hide();
        $(".seccionQueHacer").fadeIn(100);
        $(function () {
          setTimeout( function(){

              $('#verTabla3-1')
              .css('opacity', 0)
                  .slideDown('slow')
                  .animate(
                      { opacity: 1 },
                      { queue: false, duration: 'slow' }
                  );
              setTimeout( function(){
                  $('#verTabla3-2')
                  .css('opacity', 0)
                  .slideDown('slow')
                  .animate(
                      { opacity: 1 },
                      { queue: false, duration: 'slow' }
                  );
                  setTimeout( function(){
                      $('#verTabla3-3')
                      .css('opacity', 0)
                      .slideDown('slow')
                      .animate(
                          { opacity: 1 },
                          { queue: false, duration: 'slow' }
                      );
                  }  , 500 );
              }  , 500 );
          }  , 500 );
        });
      });
  }
  function seccionNegocio(opcion) {
    if (opcion == 1) {
      $('#cardTipoNegocio1').hide();
      $('#cardTipoNegocio2').hide();
      $('#cardTipoNegocio3').hide();
      $('#cardTipoNegocio4').hide();
      $('#cardTipoNegocio5').hide();
      $('#cardTipoNegocio6').hide();
      $(".seccionQueHacer").fadeOut("slow",
        function() {
          $(this).hide();
          $(".seccionTipoNegocio").fadeIn(300);
        });
      setTimeout( function(){

        $('.seccionControl')
        .css('opacity', 0)
          .slideDown('slow')
          .animate(
              { opacity: 1 },
              { queue: false, duration: 'slow' }
          );
          setTimeout( function(){
            $('#seccionControl1')
            .css('opacity', 0)
                  .slideDown('slow')
                  .animate(
                      { opacity: 1 },
                      { queue: false, duration: 'slow' }
                  );
          }  , 400 );

        $('#cardTipoNegocio1')
          .css('opacity', 0)
              .slideDown('slow')
              .animate(
                  { opacity: 1 },
                  { queue: false, duration: 'slow' }
              );
          setTimeout( function(){
              $('#cardTipoNegocio2')
              .css('opacity', 0)
              .slideDown('slow')
              .animate(
                  { opacity: 1 },
                  { queue: false, duration: 'slow' }
              );
              setTimeout( function(){
                  $('#cardTipoNegocio3')
                  .css('opacity', 0)
                  .slideDown('slow')
                  .animate(
                      { opacity: 1 },
                      { queue: false, duration: 'slow' }
                  );
                  setTimeout( function(){
                    $('#cardTipoNegocio4')
                    .css('opacity', 0)
                    .slideDown('slow')
                    .animate(
                        { opacity: 1 },
                        { queue: false, duration: 'slow' }
                    );
                    setTimeout( function(){
                      $('#cardTipoNegocio5')
                      .css('opacity', 0)
                      .slideDown('slow')
                      .animate(
                          { opacity: 1 },
                          { queue: false, duration: 'slow' }
                      );
                      setTimeout( function(){
                        $('#cardTipoNegocio6')
                        .css('opacity', 0)
                        .slideDown('slow')
                        .animate(
                            { opacity: 1 },
                            { queue: false, duration: 'slow' }
                        );
                    }  , 400 );
                  }  , 400 );
                }  , 400 );
              }  , 400 );
          }  , 400 );
      }  , 1000 );
      $('#negocio').val(1)
    }else{
    }
  }
  function SelectTipoN(opcion){
    $('#InputTipoNegocio').val(opcion);
    $('.seccionTipoNegocio').attr("disabled", "disabled").off('click');
    var a=0;
    for (var i = 0; i < 7; i++) {
      if (i != opcion) {
        $("#cardTipoNegocio"+i).fadeOut("slow");
      }
      a++;
    }
    if(i == 7){
      if(opcion == 1){
        $('#seccionControl2-2').attr('src','{{ asset("assets/images/alquiler/gym.png") }}');
      }else if(opcion == 2){
        $('#seccionControl2-2').attr('src','{{ asset("assets/images/alquiler/market.png") }}');
      }else if(opcion == 3){
        $('#seccionControl2-2').attr('src','{{ asset("assets/images/alquiler/restaurant.png") }}');
      }else if(opcion == 4){
        $('#seccionControl2-2').attr('src','{{ asset("assets/images/alquiler/factory.png") }}');
      }else if(opcion == 5){
        $('#seccionControl2-2').attr('src','{{ asset("assets/images/alquiler/oficina.png") }}');
      }else{
        $('#seccionControl2-2').attr('src','{{ asset("assets/images/alquiler/theater.png") }}');
      }
      $("#cardTipoNegocio"+opcion).fadeOut("slow");
      setTimeout( function(){
        $('#seccionControl2')
        .css('opacity', 0)
              .slideDown('slow')
              .animate(
                  { opacity: 1 },
                  { queue: false, duration: 'slow' }
              );
      }  , 400 );
    }
    $('.seccionTipoNegocio').fadeOut("slow");
    $('.seccionDatosNegocio').fadeIn(300);
  }

  function seccionHorario() {
    $(".seccionDatosNegocio").fadeOut("slow",
      function() {
        $(this).hide();
        $(".seccionHorarioNegocio").fadeIn(300);
      });
    $('#seccionControl3').fadeIn('show');
  }

  function diaNegocio(dia) {
    if(dia == 1){
      if($('#horarioBotonDia1').hasClass('btn-primary')){
        $('.seccionHorarioNegocio').append('<input type="hidden" name="dia[]" class="inputDia1" value="1">');
        $('#horarioBotonDia1').removeClass('btn-primary').addClass('btn btn-success');
      }else{
        $('.inputDia1').remove();
        $('#horarioBotonDia1').removeClass('btn-success').addClass('btn btn-primary');
      }
    }else if(dia == 2){
      if($('#horarioBotonDia2').hasClass('btn-primary')){
        $('.seccionHorarioNegocio').append('<input type="hidden" name="dia[]" class="inputDia2" value="2">');
          $('#horarioBotonDia2').removeClass('btn-primary').addClass('btn btn-success');
      }else{
        $('.inputDia2').remove();
        $('#horarioBotonDia2').removeClass('btn-success').addClass('btn btn-primary');
      }
    }else if(dia == 3){
      if($('#horarioBotonDia3').hasClass('btn-primary')){
        $('.seccionHorarioNegocio').append('<input type="hidden" name="dia[]" class="inputDia3" value="3">');
          $('#horarioBotonDia3').removeClass('btn-primary').addClass('btn btn-success');
      }else{
        $('.inputDia3').remove();
        $('#horarioBotonDia3').removeClass('btn-success').addClass('btn btn-primary');
      }
    }else if(dia == 4){
      if($('#horarioBotonDia4').hasClass('btn-primary')){
        $('.seccionHorarioNegocio').append('<input type="hidden" name="dia[]" class="inputDia4" value="4">');
          $('#horarioBotonDia4').removeClass('btn-primary').addClass('btn btn-success');
      }else{
        $('.inputDia4').remove();
        $('#horarioBotonDia4').removeClass('btn-success').addClass('btn btn-primary');
      }
    }else if(dia == 5){
      if($('#horarioBotonDia5').hasClass('btn-primary')){
        $('.seccionHorarioNegocio').append('<input type="hidden" name="dia[]" class="inputDia5" value="5">');
          $('#horarioBotonDia5').removeClass('btn-primary').addClass('btn btn-success');
      }else{
        $('.inputDia5').remove();
        $('#horarioBotonDia5').removeClass('btn-success').addClass('btn btn-primary');
      }
    }else if(dia == 6){
      if($('#horarioBotonDia6').hasClass('btn-primary')){
        $('.seccionHorarioNegocio').append('<input type="hidden" name="dia[]" class="inputDia6" value="6">');
          $('#horarioBotonDia6').removeClass('btn-primary').addClass('btn btn-success');
      }else{
        $('.inputDia6').remove();
        $('#horarioBotonDia6').removeClass('btn-success').addClass('btn btn-primary');
      }
    }else{
      if($('#horarioBotonDia7').hasClass('btn-primary')){
        $('.seccionHorarioNegocio').append('<input type="hidden" name="dia[]" class="inputDia7" value="7">');
        $('#horarioBotonDia7').removeClass('btn btn-primary').addClass('btn btn-success');
      }else{
        $('.inputDia7').remove();
        $('#horarioBotonDia7').removeClass('btn-success').addClass('btn btn-primary');
      }
    }
  }

  function seccionPago() {
    $(".seccionHorarioNegocio").fadeOut("slow",
      function() {
        $(this).hide();
        $(".seccionPagoNegocio").fadeIn(300);
      });
    $('#seccionControl4').fadeIn('show');
  }
  function SeccionListo() {
    $(".seccionPagoNegocio").fadeOut("slow");
    $('#seccionControl5').fadeIn('show');
    $('#seccionControl6').fadeIn('show');
  }
</script>