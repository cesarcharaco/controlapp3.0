<div class="vistaColumnaMembresia EliminarMembresia border border-danger shadow" id="EliminarMembresia" style="display: none; border-radius: 30px !important;">
	{!! Form::open(['route' => ['membresias.destroy',1033], 'method' => 'DELETE']) !!}
		@csrf
		<div class="card-body">
		
			<h3>¿Está realmente seguro de querer eliminar esta membresía?</h3> 
			Se eliminarán todos los pagos y datos relacionadas a esta membresía.
			<center>
				<input type="hidden" name="id" id="id_membresia">
				<button type="submit" class="btn btn-danger">Eliminar</button>
			</center>
		</div>
	{!! Form::close() !!}
</div>