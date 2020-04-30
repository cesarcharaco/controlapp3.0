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
		            <div class="col-md-6">
		            	
		            </div>

		            <div class="col-md-6">
		            	<h3><button type="button" class="btn btn-outline-danger btn-rounded">Danger</button></h3>
		            </div>
		        </div>

		        <div class="row justify-content-center">
		        	<div class="col-md-6">
		        		<div class="form-group">
		        			<label>Meses</label>
		        			<select class="form-control select2"></select>
		        		</div>
		        	</div>

		        	<div class="col-md-6">
		        		<div class="form-group">
		        			<label>¿Todos los meses del año?</label>
		        			<input type="checkbox" value="MesesTodos" name="MesesTodos">
		        		</div>
		        	</div>
		        </div>

		        <div class="row justify-content-center">
		        	<div class="col-md-6">
		        		<div class="form-group">
		        			<label>Inmuebles</label>
		        			<select class="form-control select2"></select>
		        		</div>
		        	</div>

		        	<div class="col-md-6">
		        		<div class="form-group">
		        			<label>¿Todos los inmuebles?</label>
		        			<input type="checkbox" value="Si" name="InmueblesTodos">
		        		</div>
		        	</div>
		        </div>

		        <div class="row justify-content-center">
		        	<div class="col-md-6">
		        		<div class="form-group">
		        			<label>Estacionamientos</label>
		        			<select class="form-control select2"></select>
		        		</div>
		        	</div>

		        	<div class="col-md-6">
		        		<div class="form-group">
		        			<label>¿Todos los estacionamientos?</label>
		        			<input type="checkbox" value="Si" name="EstacionamientosTodos">
		        		</div>
		        	</div>
		        </div>

		        <div class="row justify-content-center">
		        	<div class="col-md-6">
		        		<div class="form-group">
		        			<label>Residente</label>
		        			<select class="form-control select2"></select>
		        		</div>
		        	</div>

		        	<div class="col-md-6">
		        		<div class="form-group">
		        			<label>¿Todos los residentes?</label>
		        			<input type="checkbox" value="Si" name="ResidentesTodos">
		        		</div>
		        	</div>
		        </div>

		        <hr>
		        <div class="form-group row">
		        	<label>¿Incluir Multas y recargas?</label>
		        	<input type="checkbox" value="Si" name="MultasRecargas">
		        </div>
		        

		    </div>

    

@endsection

<script type="text/javascript">

</script>
<script type="text/javascript">

    function Eliminar(id) {
        $('#id').val(id);
    }
</script>