@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Reportes</h1>
            </div>
        </div>
        @include('flash::message')

        <div class="card">
        	<div class="card-header">
        		<h3>Reporte General</h3>
        	</div>
        	<div class="card-body">



        		<form action="{{ route('reportes.general') }}" method="POST" accept-charset="utf-8">
			   	@csrf

	        		<div class="row">
	        			<div class="col-md-4">
			        		<div class="form-group">
			        			<label class="text-primary">Meses</label>
			        			<select class="form-control select2 border border-default" multiple name="id_mes[]">
			        				@foreach($meses as $key)
			        					<option value="{{$key->id}}">{{$key->mes}}</option>
			        				@endforeach
			        			</select>
			        		</div>
	        			</div>

	        			<div class="col-md-4">
			        		<div class="form-group">
			        			<label class="text-primary">Año</label>
			        			<select class="form-control select2 border border-default" name="anio">
			        				@for($j=0;$j<count($anio);$j++)
			        					<option value="{{ $anio[$j] }}">{{ $anio[$j] }}</option>}
			        					option
			        				@endfor
			        			</select>
			        		</div>
	        			</div>

	        			<div class="col-md-2"><br>
	        				<h3><button type="submit" class="btn btn-danger btn-rounded">Generar PDF</button></h3>
	        			</div>
	        		</div>

	        	</form>
        	</div>
        </div>

				        
        @if(\Auth::user()->tipo_usuario == 'Admin')
	        <div class="card">
	            <div class="card-header">
	    			<h3>Reporte</h3>
	    		</div>
	            <div class="card-body">
	                <div class="row justify-content-center">
			            <!-- <div class="col-md-12">
			                <div class="row">
			                    <div class="col-md-12 offset-md-9">
			                        <a class="btn btn-success" data-toggle="modal" data-target="#crearMensualidad" style="border-radius: 30px; color: white;">
			                            <span> Reportes </span>
			                        </a>
			                    </div>
			                </div>
			            </div> -->                    

			        </div>

				    	

				    <form action="{{ route('reportes.store') }}" method="POST" accept-charset="utf-8">
				   	@csrf

				    	{{--<div class="row justify-content-center">
				    		<div class="col-md-12">
				    			<label  data-toggle="tooltip" data-placement="top" title="Seleccione el año para el reporte">Seleccione el año</label>
			        			<select class="form-control select2 border border-default" name="anio">
			        				@php 
			        					echo $fecha=date('Y');
			        					$fecha=$fecha-1;
			        				@endphp
			        				@for($i=$fecha; $i<($fecha+4); $i++)
			        					@if($i != '2019')
			        						<option value="{{ $i }}">{{ $i }}</option>
			        					@endif
			        				@endfor
			        			</select>
				    		</div>
				    	</div>--}}





					        <div class="row justify-content-center">
					        	<div class="col-md-6">
				        			<div class="card border border-primary rounded">
				        				<div class="card-body">
							        		<div class="form-group">
							        			<label class="text-primary">Inmuebles</label>
							        			<select class="form-control select2 border border-primary" multiple name="id_inmuebles[]" id="selectTodosInmuebles">
							        				@foreach($inmuebles as $key)
							        					<option value="{{$key->id}}">{{$key->idem}}</option>
							        				@endforeach
							        			</select>
							        		</div>
							        		<div class="form-group">
							        			<label>¿Todos los inmuebles?</label>
							        			<input type="checkbox" value="Si" name="InmueblesTodos" id="InmueblesTodos" onchange="TodosInmuebles()">
							        		</div>

				        					<div class="row justify-content-center">
					        					<div class="col-md-6">
									        		<div class="form-group">
									        			<select class="form-control select2 border border-default" multiple name="meses_inmuebles[]" id="selectMesesInmuebles">
									        				@foreach($meses as $key)
									        					<option value="{{$key->id}}">{{$key->mes}}</option>
									        				@endforeach
									        			</select>
									        		</div>
									        		<div class="form-group">
									        			<label>¿Todos los meses del año?</label>
									        			<input type="checkbox" value="MesesTodosInmuebles" name="MesesTodosInmuebles" id="MesesTodosInmuebles" onchange="TodosMesesInmuebles()">
									        		</div>
									        	</div>
									        	<div class="col-md-6">
									        		<div class="form-group">
									        			<select class="form-control select2 border border-default" multiple name="anios_inmueble[]" id="selectTodosAniosInmuebles">
									        				@for($i=0; $i< count($anio); $i++)
									        					<option value="{{$anio[$i]}}">{{$anio[$i]}}</option>
									        				@endfor
									        			</select>
									        		</div>
									        		<div class="form-group">
									        			<label>¿Todos los años?</label>
									        			<input type="checkbox" value="AniosTodosInmuebles" name="AniosTodosInmuebles" id="AniosTodosInmuebles" onchange="TodosAniosInmuebles()">
									        		</div>
									        	</div>
									        </div>
				        				</div>
				        			</div>
					        	</div>

					        	<div class="col-md-6">
					        		<div class="card border border-warning rounded">
				        				<div class="card-body">
							        		<div class="form-group">
							        			<label class="text-warning">Estacionamientos</label>
							        			<select class="form-control select2 border border-warning" multiple name="id_estacionamientos[]" id="selectTodosEstacionamientos">
							        				@foreach($estacionamientos as $key)
							        					<option value="{{$key->id}}">{{$key->idem}}</option>
							        				@endforeach
							        			</select>
							        		</div>
							        		<div class="form-group">
							        			<label>¿Todos los estacionamientos?</label>
							        			<input type="checkbox" value="Si" name="EstacionamientosTodos" id="EstacionamientosTodos" onchange="TodosEstacionamientos()">
							        		</div>

							        		<div class="row justify-content-center">
					        					<div class="col-md-6">
									        		<div class="form-group">
									        			<select class="form-control select2 border border-default" multiple name="meses_estaciona[]" id="selectMesesEstaciona">
									        				@foreach($meses as $key)
									        					<option value="{{$key->id}}">{{$key->mes}}</option>
									        				@endforeach
									        			</select>
									        		</div>
									        		<div class="form-group">
									        			<label>¿Todos los meses del año?</label>
									        			<input type="checkbox" value="MesesTodosEstaciona" name="MesesTodosEstaciona" id="MesesTodosEstaciona" onchange="TodosMesesEstaciona()">
									        		</div>
									        	</div>
									        	<div class="col-md-6">
									        		<div class="form-group">
									        			<select class="form-control select2 border border-default" multiple name="anios_estaciona[]" id="selectAniosEstaciona">
									        				@for($i=0; $i< count($anio); $i++)
									        					<option value="{{$anio[$i]}}">{{$anio[$i]}}</option>
									        				@endfor
									        			</select>
									        		</div>
									        		<div class="form-group">
									        			<label>¿Todos los años?</label>
									        			<input type="checkbox" value="AniosTodosEstaciona" name="AniosTodosEstaciona" id="AniosTodosEstaciona" onchange="TodosAniosEstaciona()">
									        		</div>
									        	</div>
									        </div>
							        	</div>
							        </div>
					        	</div>
					        </div>
					         <div class="row justify-content-center">
					        	<div class="col-md-6">
					        		<div class="card border border-success rounded">
				        				<div class="card-body">
							        		<div class="form-group">
							        			<label class="text-success">Residentes</label>
							        			<select class="form-control select2 border border-success" multiple name="id_residentes[]" id="selectTodosResidentes">
							        				@foreach($residentes as $key)
							        					<option value="{{$key->id}}">{{$key->nombres}} {{$key->apellidos}} - {{$key->rut}}</option>
							        				@endforeach
							        			</select>
							        		</div>
							        		<div class="form-group">
							        			<label>¿Todos los residentes?</label>
							        			<input type="checkbox" value="Si" name="ResidentesTodos" id="ResidentesTodos" onchange="TodosResidentes()">
							        		</div>
									        <div class="row justify-content-center">
					        					<div class="col-md-6">
									        		<div class="form-group">
									        			<select class="form-control select2 border border-default" multiple name="meses_residentes[]" id="selectMesesResidentes">
									        				@foreach($meses as $key)
									        					<option value="{{$key->id}}">{{$key->mes}}</option>
									        				@endforeach
									        			</select>
									        		</div>
									        		<div class="form-group">
									        			<label>¿Todos los meses del año?</label>
									        			<input type="checkbox" value="MesesTodosResidentes" name="MesesTodosResidentes" id="MesesTodosResidentes" onchange="TodosMesesResidentes()">
									        		</div>
									        	</div>
									        	<div class="col-md-6">
									        		<div class="form-group">
									        			<select class="form-control select2 border border-default" multiple name="anios_residentes[]" id="selectAniosResidentes">
									        				@for($i=0; $i< count($anio); $i++)
									        					<option value="{{$anio[$i]}}">{{$anio[$i]}}</option>
									        				@endfor
									        			</select>
									        		</div>
									        		<div class="form-group">
									        			<label>¿Todos los años?</label>
									        			<input type="checkbox" value="AniosTodosResidentes" name="AniosTodosResidentes" id="AniosTodosResidentes" onchange="TodosAniosResidentes()">
									        		</div>
									        	</div>
									        </div>
							        	</div>
							        </div>
					        	</div>

					        	<div class="col-md-6">
					        		<div class="card border border-danger rounded">
				        				<div class="card-body">
							        		<div class="form-group">
							        			<label class="text-danger">Multas - Recargas</label>
							        			<select class="form-control select2 border border-success" multiple name="id_multa[]" id="selectTodosMultas">
							        				@foreach($multas as $key)
							        					<option value="{{$key->id}}">{{$key->motivo}} {{$key->tipo}} - {{$key->monto}}</option>
							        				@endforeach
							        			</select>
							        		</div>
							        		<div class="form-group">
									        	<label>¿Todas las Multas y recargas? </label>
									        	<input type="checkbox" value="Si" name="MultasRecargas" id="MultasTodas" onclick="TodosMultas()">
									        </div>
									        <div class="row justify-content-center">
					        					<div class="col-md-6">
									        		<div class="form-group">
									        			<select class="form-control select2 border border-default" multiple name="meses_multas[]" id="selectMesesMultas">
									        				@foreach($meses as $key)
									        					<option value="{{$key->id}}">{{$key->mes}}</option>
									        				@endforeach
									        			</select>
									        		</div>
									        		<div class="form-group">
									        			<label>¿Todos los meses del año?</label>
									        			<input type="checkbox" value="MesesTodosMultas" name="MesesTodosMultas" id="MesesTodosMultas" onchange="TodosMesesMultas()">
									        		</div>
									        	</div>
									        	<div class="col-md-6">
									        		<div class="form-group">
									        			<select class="form-control select2 border border-default" multiple name="anios_multas[]" id="selectAniosMultas">
									        				@for($i=0; $i< count($anio); $i++)
									        					<option value="{{$anio[$i]}}">{{$anio[$i]}}</option>
									        				@endfor
									        			</select>
									        		</div>
									        		<div class="form-group">
									        			<label>¿Todos los años?</label>
									        			<input type="checkbox" value="AniosTodosMultas" name="AniosTodosMultas" id="AniosTodosMultas" onchange="TodosAniosMultas()">
									        		</div>
									        	</div>
									        </div>
							        	</div>
							        </div>
					        	</div>
					        </div>


			        	<!-- <div class="card border border-warning rounded"> -->
				        	<!-- <div class="card-body"> -->
						        
						    <!-- </div> -->
						<!-- </div> -->


					        <!-- <div class="float-right">
					        	<h3><button type="button" class="btn btn-danger btn-rounded">Generar PDF</button></h3>
					        </div> -->

				        
					        <div class="float-right">
					        	<h3><button type="submit" class="btn btn-danger btn-rounded">Generar PDF</button></h3>
					        </div>

				    </form>

			    </div>
			</div>
		@endif()

    

@endsection

<script type="text/javascript">

</script>
<script type="text/javascript">

    function Eliminar(id) {
        $('#id').val(id);
    }


    // -----------------------------INMUEBLES --------------------------------------
    function TodosInmuebles() {
    	if($('#InmueblesTodos').prop('checked')){
    		$('#selectTodosInmuebles').attr('disabled',true);
    	}else{
    		$('#selectTodosInmuebles').removeAttr('disabled',false);
    	}
    }

    function TodosMesesInmuebles() {
    	if($('#MesesTodosInmuebles').prop('checked')){
    		$('#selectMesesInmuebles').attr('disabled',true);
    	}else{
    		$('#selectMesesInmuebles').removeAttr('disabled',false);
    	}
    }

    function TodosAniosInmuebles() {
    	if($('#AniosTodosInmuebles').prop('checked')){
    		$('#selectTodosAniosInmuebles').attr('disabled',true);
    	}else{
    		$('#selectTodosAniosInmuebles').removeAttr('disabled',false);
    	}
    }

    //-------------------------------ESTACIONAMIENTOS-------------------------------

    function TodosEstacionamientos() {
    	if($('#EstacionamientosTodos').prop('checked')){
    		$('#selectTodosEstacionamientos').attr('disabled',true);
    	}else{
    		$('#selectTodosEstacionamientos').removeAttr('disabled',false);
    	}
    }
    function TodosMesesEstaciona() {
    	if($('#MesesTodosEstaciona').prop('checked')){
    		$('#selectMesesEstaciona').attr('disabled',true);
    	}else{
    		$('#selectMesesEstaciona').removeAttr('disabled',false);
    	}
    }

    function TodosAniosEstaciona() {
    	if($('#AniosTodosEstaciona').prop('checked')){
    		$('#selectAniosEstaciona').attr('disabled',true);
    	}else{
    		$('#selectAniosEstaciona').removeAttr('disabled',false);
    	}
    }

    //-------------------------------------residentes------------------------------
    function TodosResidentes() {
    	if($('#ResidentesTodos').prop('checked')){
    		$('#selectTodosResidentes').attr('disabled',true);
    	}else{
    		$('#selectTodosResidentes').removeAttr('disabled',false);
    	}
    }

    function TodosMesesResidentes() {
    	if($('#MesesTodosResidentes').prop('checked')){
    		$('#selectMesesResidentes').attr('disabled',true);
    	}else{
    		$('#selectMesesResidentes').removeAttr('disabled',false);
    	}
    }

    function TodosAniosResidentes() {
    	if($('#AniosTodosResidentes').prop('checked')){
    		$('#selectAniosResidentes').attr('disabled',true);
    	}else{
    		$('#selectAniosResidentes').removeAttr('disabled',false);
    	}
    }

    //-------------------------------------MULTAS------------------------------
    function TodosMultas() {
    	if($('#MultasTodas').prop('checked')){
    		$('#selectTodosMultas').attr('disabled',true);
    	}else{
    		$('#selectTodosMultas').removeAttr('disabled',false);
    	}
    }

    function TodosMesesMultas() {
    	if($('#MesesTodosMultas').prop('checked')){
    		$('#selectMesesMultas').attr('disabled',true);
    	}else{
    		$('#selectMesesMultas').removeAttr('disabled',false);
    	}
    }

    function TodosAniosMultas() {
    	if($('#AniosTodosMultas').prop('checked')){
    		$('#selectAniosMultas').attr('disabled',true);
    	}else{
    		$('#selectAniosMultas').removeAttr('disabled',false);
    	}
    }

    
</script>