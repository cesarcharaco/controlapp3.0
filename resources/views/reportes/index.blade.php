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


<<<<<<< HEAD
			    <form>
			    	{{-- <div class="row justify-content-center">
			    		<div class="col-md-6">
			    			<label class="text-primary">Seleccione años</label>
			        			<select class="form-control select2 border border-default" multiple name="id_meses[]">
			        				@foreach($años as $key)
			        					<option value="{{$key->id}}">{{$key->años}}</option>
			        				@endforeach
			        			</select>
			    		</div>
			    	</div> --}}
			    	
=======
			    <form action="{{ route('reportes.store') }}" method="POST" accept-charset="utf-8">
			   	@csrf
>>>>>>> 0b9e96e29dd655212df7a3e6f3c70569a572b1bd
			        <div class="row justify-content-center">
			        	<div class="col-md-6">
			        		<div class="form-group">
			        			<label class="text-primary">Meses</label>
			        			<select class="form-control select2 border border-default" multiple name="id_meses[]" id="selectTodosMeses">
			        				@foreach($meses as $key)
			        					<option value="{{$key->id}}">{{$key->mes}}</option>
			        				@endforeach
			        			</select>
			        		</div>
			        		<div class="form-group">
			        			<label>¿Todos los meses del año?</label>
			        			<input type="checkbox" value="MesesTodos" name="MesesTodos" id="MesesTodos" onchange="TodosMeses()">
			        		</div>
			        	</div>

			        	<div class="col-md-6">
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
			        	</div>
			        </div>

			        <div class="row justify-content-center">
			        	@if(\Auth::user()->tipo_usuario == 'Admin')
				        	<div class="col-md-6">
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
				        	</div>

				        	<div class="col-md-6">
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
				        	</div>
				        @else
				        	<div class="col-md-12">
				        		<div class="form-group">
				        			<label class="text-primary">Inmuebles</label>
				        			<select class="form-control select2 border border-primary" multiple name="id_inmuebles[]">
				        				@foreach($inmuebles as $key)
				        					<option value="{{$key->id}}">{{$key->idem}}</option>
				        				@endforeach
				        			</select>
				        		</div>
				        		<div class="form-group">
				        			<label>¿Todos los inmuebles?</label>
				        			<input type="checkbox" value="Si" name="InmueblesTodos">
				        		</div>
				        	</div>
			        	@endif
			        </div>
			        <hr>
			        <div class="form-group">
			        	<label>¿Incluir Multas y recargas? </label>
			        	<input type="checkbox" value="Si" name="MultasRecargas">
			        </div>
<<<<<<< HEAD

				        <!-- <div class="float-right">
				        	<h3><button type="button" class="btn btn-danger btn-rounded">Generar PDF</button></h3>
				        </div> -->
=======
			        
				        <div class="float-right">
				        	<h3><button type="submit" class="btn btn-danger btn-rounded">Generar PDF</button></h3>
				        </div>
>>>>>>> 0b9e96e29dd655212df7a3e6f3c70569a572b1bd
			    </form>

		    </div>

    

@endsection

<script type="text/javascript">

</script>
<script type="text/javascript">

    function Eliminar(id) {
        $('#id').val(id);
    }

    function TodosMeses() {
    	var valor = $('#MesesTodos').val();
    	if(valor==0){
    		$('#selectTodosMeses').attr('disabled',true);
    	}else{
    		$('#selectTodosMeses').removeAtrr('disabled',false);
    	}
    }

    function TodosEstacionamientos() {
    	var valor = $('#EstacionamientosTodos').val();
    	if(valor==0){
    		$('#selectTodosEstacionamientos').attr('disabled',true);
    	}else{
    		$('#selectTodosEstacionamientos').removeAtrr('disabled',false);
    	}
    }

    function TodosInmuebles() {
    	var valor = $('#InmueblesTodos').val();
    	if(valor==0){
    		$('#selectTodosInmuebles').attr('disabled',true);
    	}else{
    		$('#selectTodosInmuebles').removeAtrr('disabled',false);
    	}
    }

    function TodosResidentes() {
    	var valor = $('#ResidentesTodos').val();
    	if(valor==0){
    		$('#selectTodosResidentes').attr('disabled',true);
    	}else{
    		$('#selectTodosResidentes').removeAtrr('disabled',false);
    	}
    }

    
</script>