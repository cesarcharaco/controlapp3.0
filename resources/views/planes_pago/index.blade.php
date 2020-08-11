@extends('layouts.app')

@section('content')
     <style type="text/css">
        .card {
            border: 1px solid #f6f6f7!important;
            border-color: #43d39e !important;
        }
        .palabraVerPlanesPago2, .palabraVerEstaciona2,.PalabraEditarPago2, .tituloTabla2
        {
            display: none;
        }
        @media only screen and (max-width: 800px)  {

            .PalabraEditarPago, .PalabraRealizarPago, .PalabraPagoConfirmar{
                display: none;
            }
            .palabraVerPlanesPago{
                display: none;
            }
            .palabraVerPlanesPago2{
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
    <input type="hidden" id="colorView" value="#43d39e !important">
    <div class="container">
        <div class="row page-title">
            <div class="col-md-12">
                <nav aria-label="breadcrumb" class="float-right mt-1">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Planes de pago</li>
                    </ol>
                </nav>
                <h4 class="mb-1 mt-0">Planes de pago</h4>
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
    <div class="card rounded card-tabla shadow p-3 mb-5 bg-white rounded" style="display: none;">
        <div class="row justify-content-center">
		    <div class="col-md-6">
		    	<div class="listarPlanPago" id="listarPlanPago">
			        <div class="row justify-content-center">
			            <div class="col-md-12">
			                <div class="row">
			                    <div class="col-md-12 offset-md-12">
			                        <a href="#nuevoPlanPago" class="btn btn-success boton-tabla shadow" onclick="nuevoPlanPago()" style="
			                            border-radius: 10px;
			                            color: white;
			                            height: 35px;
			                            margin-bottom: 5px;
			                            margin-top: 5px;
			                            float: right;
			                            border: 1px solid #f6f6f7!important;
			                            border-color: #43d39e !important;
			                            background-color: #43d39e !important">
			                            <span class="PalabraEditarPago text-white">Nuevo Plan de pago</span>
			                            <center>
			                                <span class="PalabraEditarPago2 text-white">
			                                    <i data-feather="plus" class="iconosMetaforas2"></i>
			                                </span>
			                            </center>
			                        </a>
			                    </div>
			                </div>
			            </div>
			            <table class="table dataTable data-table-basic table-curved table-striped tabla-estilo" style="width: 100%;">
			                <thead>
			                    <tr class="table-default text-white">
			                        <th colspan="2" align="center">
			                            <div class="card border border-info" role="alert">
			                                <span class="text-dark p-1 mb-1"><strong>Aviso: </strong><br>-Seleccione a un plan de pago para ver mas opciones.</span>
			                            </div>
			                        </th>
			                        <th colspan="3"></th>
			                    </tr>
			                    <tr class="text-white" id="th1" style="background-color: #43d39e;">
			                        <th>
			                            <span class="PalabraEditarPago">Nombre</span>
			                            <span class="PalabraEditarPago2">N</span>
			                        </th>
			                        <th>
			                            <span class="PalabraEditarPago">Monto</span>
			                            <span class="PalabraEditarPago2">
			                            	<i data-feather="dollar-sign" class="iconosMetaforas2"></i>
			                            </span>
			                        </th>
			                        <th>
			                            <span class="PalabraEditarPago">Dias</span>
			                            <span class="PalabraEditarPago2">
			                            	<i data-feather="calendar" class="iconosMetaforas2"></i>
			                            </span>
			                        </th>
			                        <!-- <th>Estacionamientos</th> -->
			                        <th></th>
			                        <th>
			                            <span class="PalabraEditarPago">Status</span>
			                            <span class="PalabraEditarPago2">
			                                <i data-feather="sliders" class="iconosMetaforas2"></i>
			                            </span>
			                        </th>
			                        <!-- <th>Mensualidades</th> -->
			                    </tr>
			                    <tr class="bg-primary text-white" id="th2" style="display: none">
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
			                        <th></th>
			                        <th>
			                            <span class="PalabraEditarPago">Status</span>
			                            <span class="PalabraEditarPago2">
			                                <i data-feather="sliders" class="iconosMetaforas2"></i>
			                            </span>
			                        </th>
			                    </tr>
			                </thead>
			                <tbody>
			                    @php $num=0 @endphp
			                    @foreach($planes_pago as $key)
			                    	<tr class="vista1-{{$key->id}}" onclick="opcionesTabla(1,'{{$key->id}}')">
			                    		<td>{{$key->nombre}}</td>
	                                    <td align="right">{{$key->monto}} $</td>
	                                    <td>{{$key->dias}}</td>
			                    		<td>
			                    			<img class="imagenAnun" src="{{ asset($key->url_img) }}" class="avatar" style="width:100%;max-width:640px;">
			                    		</td>
	                                    @if($key->status == 'Activo')
	                                        <td style="position: all;">
                                                <span class="tituloTabla text-success"><strong>Activo</strong></span>
                                                <span class="tituloTabla2 text-success"><strong>A</strong></span>
	                                        </td>
	                                    @else
	                                        <td style="position: all;">
                                                <span class="tituloTabla text-danger"><strong>Inactivo</strong></span>
                                                <span class="tituloTabla2 text-danger"><strong>I</strong></span>
	                                        </td>
	                                    @endif
			                    	</tr>
			                    	<tr class="vista2-{{$key->id}}" class="table-success" style="display: none;">
                                    <td>
                                        <button class="btn btn-success btn-sm boton-tabla shadow botonesEditEli" onclick="opcionesTabla(2,'{{$key->id}}')">
                                            <span class="PalabraEditarPago ">Regresar</span>
                                            <center>
                                                <span class="PalabraEditarPago2 ">
                                                    <i data-feather="arrow-left" class="iconosMetaforas2"></i>
                                                </span>
                                            </center>
                                        </button>
                                    </td>
                                    <td>
                                        	
                                        <span>{{$key->nombre}}</span>
                                    </td>
                                    <td>
                                        <span>{{$key->monto}}</span>
                                    </td>
                                    <td colspan="2" align="center">

                                       <a href="#editarPlanPago" class="btn btn-warning btn-sm" onclick="editarPlanP(
                                       '{{$key->id}}',
                                       '{{$key->nombre}}',
                                       '{{$key->monto}}',
                                       '{{$key->dias}}',
                                       '{{$key->color}}',
                                       '{{$key->tipo}}',
                                       '{{$key->status}}')">
                                            <span class="PalabraEditarPago ">Editar</span>
                                            <center>
                                                <span class="PalabraEditarPago2 ">
                                                    <i data-feather="edit" class="iconosMetaforas2"></i>
                                                </span>
                                            </center>
                                        </a>
                                    <a href="#EliminarPlanPago" class="btn btn-danger btn-sm" onclick="eliminarPlanP('{{$key->id}}')">
                                            <span class="PalabraEditarPago ">Eliminar</span>
                                            <center>
                                                <span class="PalabraEditarPago2 ">
                                                    <i data-feather="trash" class="iconosMetaforas2"></i>
                                                </span>
                                            </center>
                                        </a>
                                    </td>
                                    <td style="display: none"></td>
                                    

                                </tr>
			                        <tr style="display: none;">
			                            <td></td>
			                            <td></td>
			                            <td></td>
			                            <td></td>
			                            <td></td>
			                        </tr>
			                    @endforeach()
			                </tbody>
			            </table>
			        </div>
			    </div>
		    </div>
	        <div class="col-md-6">
	        	<div class="vistaColumnaPlanP nuevoPlanPago border shadow" id="nuevoPlanPago" align="center" style="display: none; border-radius: 30px !important;">
	        		<div class="card-body">
		        		{!! Form::open(['route' => ['planes_pago.store'], 'enctype' => 'multipart/form-data', 'method' => 'POST', 'name' => 'nuevp_planP', 'id' => 'nuevp_planP', 'data-parsley-validate']) !!}
	            			@csrf
		        			<h3 align="center" style="
		        				color: gray;
	            				font: 18px Arial, sans-serif;">
	            				Nuevo Plan de Pago
	            			</h3>
	            			<div class="form-group">
	            				<label>Nombre</label>
	            				<input type="text" name="nombre" class="form-control" required placeholder="Plan Nro. 1" required>
	            			</div>
	            			<div class="form-group">
	            				<label>Monto</label>
	            				<div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
	            					<span class="input-group-addon bootstrap-touchspin-prefix input-group-prepend">
	            						<span class="input-group-text" style="width:39px; height:39px;">
	            							<i data-feather="dollar-sign"></i>
	            						</span>
	            					</span>
	            					<input name="monto" data-toggle="touchspin" type="text" data-bts-prefix="$" class="form-control" placeholder="3000" required>
		            			</div>
	            			</div>
	            			<div class="form-group">
	            				<label>Dias</label>
	            				<div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
	            					<span class="input-group-addon bootstrap-touchspin-prefix input-group-prepend">
	            						<span class="input-group-text" style="width:39px; height:39px;">
	            							<i data-feather="calendar"></i>
	            						</span>
	            					</span>
	            					<input name="dias" min="1" minlength="1" max="365" data-toggle="touchspin" type="number" data-bts-prefix="$" class="form-control" placeholder="7" required>
		            			</div>
	            			</div>
	            			<div class="form-group">
	            				<label>Color</label>
	            				<div id="component-colorpicker" class="input-group colorpicker-element" title="Using format option" data-colorpicker-id="3">
	            					<span class="input-group-addon bootstrap-touchspin-prefix input-group-prepend">
	            						<span class="input-group-text" style="width:39px; height:39px;">
	            							<i data-feather="pen-tool"></i>
	            						</span>
	            					</span>
	                                <input name="color" type="color" class="form-control input-lg" value="#564ab1" required>
	                            </div>
	            			</div>
	            			<label>Plan dirigido a:</label>
	            			<div class="row justify-content-center">
	            				<div class="col-md-6" align="center">
	            					<h3 align="center" style="color: gray; font: 18px Arial, sans-serif;">Anuncios</h3>
	            					<div class="custom-control custom-radio">
                                      	<input type="radio" id="customRadio1" name="tipo" value="Anuncio" checked>
                                    </div>
		            				<div class="border border-success p-3 shadow" align="center" style="

		            				background-image: url('{{ asset('assets/images/planes_p/anuncios.jpg') }}');
	                                background-position: center;
	                                background-repeat: no-repeat;
	                                background-size: cover;

		            				border-radius: 10px !important;
		            				height: 130px !important;
		            				width: 130px !important;">
		            				</div>
		            			</div>
		            			<div class="col-md-6" align="center">
	            					<h3 align="center" style="color: gray; font: 18px Arial, sans-serif;">Alquiler</h3>
	            					<div class="custom-control custom-radio">
                                      	<input type="radio" id="customRadio2" name="tipo" value="Alquiler">
                                    </div>
		            				<div class="border border-success p-3 shadow" align="center" style="

		            				background-image: url('{{ asset('assets/images/planes_p/alquiler.jpg') }}');
	                                background-position: center;
	                                background-repeat: no-repeat;
	                                background-size: cover;

		            				border-radius: 10px !important;
		            				height: 130px !important;
		            				width: 130px !important;">
		            				</div>
		            			</div>
	            			</div>
	            			<br>
	            			<div class="form-group">
	                            <label>Imagen</label>
	                            <div id="mostrarImagenEditar" align="center"></div>
	                            <input id="imagenAnunE" type="file" class="form-control" id="example-fileinput" name="imagen" required>
	                        </div>
	                        <button type="submit" class="btn btn-success">Agregar</button>
		        		{!! Form::close() !!}
		        	</div>
	        	</div>
	        	<div class="vistaColumnaPlanP editarPlanPago border border-warning shadow" id="editarPlanPago" style="display: none; border-radius: 30px !important;">
	        		<div class="card-body">
	        			{!! Form::open(['route' => ['planes_pago.update',1033], 'enctype' => 'multipart/form-data', 'method' => 'PUT', 'name' => 'editar_planP', 'id' => 'editar_planP', 'data-parsley-validate']) !!}
	            			@csrf
		        			<h3 align="center" style="
		        				color: gray;
	            				font: 18px Arial, sans-serif;">
	            				Editar Plan de Pago
	            			</h3>
	            			<div class="form-group">
	            				<label>Nombre</label>
	            				<input type="text" id="nombre_PlanP" name="nombre" class="form-control" required placeholder="Plan Nro. 1" required>
	            			</div>
	            			<div class="form-group">
	            				<label>Monto</label>
	            				<div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
	            					<span class="input-group-addon bootstrap-touchspin-prefix input-group-prepend">
	            						<span class="input-group-text" style="width:39px; height:39px;">
	            							<i data-feather="dollar-sign"></i>
	            						</span>
	            					</span>
	            					<input name="monto" id="monto_PlanP" data-toggle="touchspin" type="text" data-bts-prefix="$" class="form-control" placeholder="3000" required>
		            			</div>
	            			</div>
	            			<div class="form-group">
	            				<label>Dias</label>
	            				<div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
	            					<span class="input-group-addon bootstrap-touchspin-prefix input-group-prepend">
	            						<span class="input-group-text" style="width:39px; height:39px;">
	            							<i data-feather="calendar"></i>
	            						</span>
	            					</span>
	            					<input name="dias" id="dias_PlanP" min="1" minlength="1" max="365" data-toggle="touchspin" type="number" data-bts-prefix="$" class="form-control" placeholder="7" required>
		            			</div>
	            			</div>
	            			<div class="form-group">
	            				<label>Color</label>
	            				<div id="component-colorpicker" class="input-group colorpicker-element" title="Using format option" data-colorpicker-id="3">
	            					<span class="input-group-addon bootstrap-touchspin-prefix input-group-prepend">
	            						<span class="input-group-text" style="width:39px; height:39px;">
	            							<i data-feather="pen-tool"></i>
	            						</span>
	            					</span>
	                                <input name="color" id="color_PlanP" type="color" class="form-control input-lg" value="#564ab1" required>
	                            </div>
	            			</div>
	            			<label>Plan dirigido a:</label>
	            			<div class="row justify-content-center">
	            				<div class="col-md-6" align="center">
	            					<h3 align="center" style="color: gray; font: 18px Arial, sans-serif;">Anuncios</h3>
	            					<div class="custom-control custom-radio">
                                      	<input type="radio" class="customRadio1" name="tipo" value="Anuncio" checked>
                                    </div>
		            				<div class="border border-success p-3 shadow" align="center" style="

		            				background-image: url('{{ asset('assets/images/planes_p/anuncios.jpg') }}');
	                                background-position: center;
	                                background-repeat: no-repeat;
	                                background-size: cover;

		            				border-radius: 10px !important;
		            				height: 130px !important;
		            				width: 130px !important;">
		            				</div>
		            			</div>
		            			<div class="col-md-6" align="center">
	            					<h3 align="center" style="color: gray; font: 18px Arial, sans-serif;">Alquiler</h3>
	            					<div class="custom-control custom-radio">
                                      	<input type="radio" class="customRadio2" name="tipo" value="Alquiler">
                                    </div>
		            				<div class="border border-success p-3 shadow" align="center" style="

		            				background-image: url('{{ asset('assets/images/planes_p/alquiler.jpg') }}');
	                                background-position: center;
	                                background-repeat: no-repeat;
	                                background-size: cover;

		            				border-radius: 10px !important;
		            				height: 130px !important;
		            				width: 130px !important;">
		            				</div>
		            			</div>
	            			</div>
	            			<br>
	            			<div class="form-group">
	                            <label>Imagen</label>
	                            <div id="mostrarImagenEditar" align="center"></div>
	                            <input id="imagenAnunE" type="file" class="form-control" id="example-fileinput" name="imagen" required>
	                        </div>
	                        <button type="submit" class="btn btn-success">Agregar</button>
		        		{!! Form::close() !!}
	        		</div>
	        	</div>
	        	<div class="vistaColumnaPlanP EliminarPlanPago border border-danger shadow" id="EliminarPlanPago" style="display: none; border-radius: 30px !important;">
	        		<div class="card-body">
	        			
		        		{!! Form::open(['route' => ['planes_pago.destroy',1033], 'method' => 'DELETE']) !!}
	        				@csrf
	        				<h3>¿Está realmente seguro de querer eliminar este Plan de Pago?</h3> 
	        				Se eliminarán todos los pagos y promociones realizados con este plan. Sugerimos que cambie su status.
	        				<div class="float-right">
	        					<input type="hidden" name="id" class="id_PlanP">
	        					<button type="submit" class="btn btn-danger">Eliminar</button>
	        				</div>
	        			{!! Form::close() !!}
	        		</div>
	        	</div>
	        </div>
	    </div>
    </div>

@endsection

<script type="text/javascript">
    function nuevoPlanPago() {
    	$(".vistaColumnaPlanP").fadeOut("slow",
            function() {
                $(this).hide();
                // $('.vistaColumnaPlanP').hide();
                // $(".nuevoPlanPago").fadeIn(300);
                // $(".nuevoPlanPago")
                //     .css('opacity', 0)
                //     .slideDown('slow')
                //     .animate(
                //         { opacity: 1 },
                //         { queue: false, duration: 'slow' }
                //     );
            });
    	$('.nuevoPlanPago').fadeIn(300);
    }
    function editarPlanP(id,nombre,monto,dias,color,tipo,status){
    	$(".vistaColumnaPlanP").fadeOut("fast",
            function() {
                $(this).hide();
                // $('.vistaColumnaPlanP').hide();
                // $(".editarPlanPago").fadeIn(300);
                // $(".editarPlanPago")
                //     .css('opacity', 0)
                //     .slideDown('slow')
                //     .animate(
                //         { opacity: 1 },
                //         { queue: false, duration: 'slow' }
                //     );
				$('#id_PlanP').val(id);
				$('#nombre_PlanP').val(nombre);
				$('#monto_PlanP').val(monto);
				$('#dias_PlanP').val(dias);
				$('#color_PlanP').val(color);
				$('#tipo_PlanP').val(tipo);
				$('#status_PlanP').val(status);
            });
    	$('.editarPlanPago').fadeIn(300);
    }
	function eliminarPlanP(id){
		$('.id_PlanP').val(id);
		$(".vistaColumnaPlanP").fadeOut("slow",
            function() {
                $(this).hide();
                // $('.vistaColumnaPlanP').hide();
                // $(".EliminarPlanPago").fadeIn(300);
                // $(".EliminarPlanPago")
                //     .css('opacity', 0)
                //     .slideDown('slow')
                //     .animate(
                //         { opacity: 1 },
                //         { queue: false, duration: 'slow' }
                //     );
            });
		$('.EliminarPlanPago').fadeIn(300);
	}
</script>