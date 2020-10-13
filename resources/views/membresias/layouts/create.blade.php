<div class="vistaColumnaMembresia nuevaMembresia border shadow" id="nuevaMembresia" align="center" style="border-radius: 30px !important;">
	<div class="card-body">
		{!! Form::open(['route' => ['membresias.store'], 'enctype' => 'multipart/form-data', 'method' => 'POST', 'name' => 'nueva_membresia', 'id' => 'nueva_membresia', 'data-parsley-validate']) !!}
			@csrf
			<h3 align="center" style="
				color: gray;
				font: 18px Arial, sans-serif;">
				Nueva Membresía
			</h3>
			<div class="form-group">
				<label>Nombre</label>
				<input type="text" name="nombre" class="form-control" required placeholder="Plan Nro. 1" required>
			</div>
			<div class="form-group">
				<label>Cantidad de Inmuebles</label>
				<input type="number" name="cant_inmuebles" class="form-control" required placeholder="Cantidad de Inmuebles" required>
			</div>
			<div class="form-group">
				<label>Monto</label>
				<div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
					<span class="input-group-addon bootstrap-touchspin-prefix input-group-prepend">
						<span class="input-group-text" style="width:39px; height:39px;">
							<i data-feather="dollar-sign"></i>
						</span>
					</span>
					<input name="monto" data-toggle="touchspin" type="text" data-bts-prefix="$" class="form-control" placeholder="15" required>
    			</div>
			</div>
			<div class="form-group">
                <label>Imagen</label>
                <div class="mostrarImagenEditar" align="center"></div>
                <input id="imagen_membresia" type="file" class="form-control-file" id="example-fileinput" name="url_imagen" required>
            </div>
            <button type="submit" class="btn btn-success">Agregar</button>
		{!! Form::close() !!}
	</div>
</div>