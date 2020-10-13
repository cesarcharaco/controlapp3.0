<div class="vistaColumnaMembresia editarMembresia border border-warning shadow" id="editarMembresia" style="display: none; border-radius: 30px !important;">
	<div class="card-body">
		{!! Form::open(['route' => ['membresias.update',1033], 'enctype' => 'multipart/form-data', 'method' => 'PUT', 'name' => 'editar_membresia', 'id' => 'editar_membresia', 'data-parsley-validate']) !!}
			@csrf
			<h3 align="center" style="
				color: gray;
				font: 18px Arial, sans-serif;">
				Editar Membresía
			</h3>
			<div class="form-group">
				<label>Nombre</label>
				<input type="text" id="nombre_Membresia" name="nombre" class="form-control" required placeholder="Plan Nro. 1" required>
			</div>
			<div class="form-group">
				<label>Cantidad de Inmuebles</label>
				<input type="number" id="cant_inmuebles_membresia" name="cant_inmuebles" class="form-control" required placeholder="Cantidad de Inmuebles" required>
			</div>
			<div class="form-group">
				<label>Monto</label>
				<div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
					<span class="input-group-addon bootstrap-touchspin-prefix input-group-prepend">
						<span class="input-group-text" style="width:39px; height:39px;">
							<i data-feather="dollar-sign"></i>
						</span>
					</span>
					<input name="monto" id="monto_Membresia_e" data-toggle="touchspin" type="text" data-bts-prefix="$" class="form-control" placeholder="3000" required>
    			</div>
			</div>
			<br>
			<div class="form-group">
                <label>Imagen</label>
                <div class="mostrarImagenEditar" align="center"></div>
                <input id="imagenMembresia" type="file" class="form-control" id="example-fileinput" name="url_imagen">
            </div>
            <center>
                <input type="hidden" name="id" class="id_edit_membresia">
                <button type="submit" class="btn btn-success">Actualizar</button>
            </center>
		{!! Form::close() !!}
	</div>
</div>