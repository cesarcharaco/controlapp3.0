<?php
  libxml_use_internal_errors(true);
  
?>
<!DOCTYPE html>
<html>
<head>
	<title>Reporte General</title>
</head>
<body>
	<table width="100%" border="1">
		{{-- <thead>
			<th>Asignación de inmueble</th>
			<th>Nombre residente</th>
			<th>Monto gasto común</th>
			<th>Estado de pago de gasto común</th>
			<th>Monto de Recarga</th>
			<th>Detalle de recarga</th>
			<th>Estado de pago de recarga</th>
			<th>Rut/Clave</th>
			<th>Correo</th>
			<th>Teléfono de contacto</th>
			<th>Asignación de estacionamiento</th>
		</thead> --}}
		<tbody>
	@for($i=0; $i < count($meses); $i++)
	<tr>
		<th>Año: {{ date('Y') }}</th>
		<th >Mes: {{ meses($meses[$i]) }}</th>
		<th colspan="4"></th>
	</tr>
		@foreach($residentes as $key)
			<tr>
				<th>Inmueble(s)</th>
				<th>Nombre residente</th>
				<th>Rut/Clave</th>
				<th>Correo</th>
				<th colspan="2">Teléfono de contacto</th>
			</tr>
			<tr>
				<td>{{ inmuebles_asig($key->id) }}</td>
				<td>{{ $key->apellidos }}, {{ $key->nombres }}</td>
				<td>{{ $key->rut }}</td>
				<td>{{ $key->usuario->email }}</td>
				<td colspan="2">{{ $key->telefono }}</td>
			</tr>
			<tr>
				<th>Estacionamiento(s)</th>
				<th>Monto gasto común</th>
				<th>Estado de pago de gasto común</th>
				<th>Monto de Recarga</th>
				<th>Estado de pago de recarga</th>
				<th>Detalle de recarga</th>
			</tr>
			<tr>
				<td>{{ estacionamientos_asig($key->id) }}</td>
				<td>{{ gasto_comun_mes($meses[$i],$key->id) }}</td>
				<td> 
					{{ status_gastos_i($meses[$i],$key->id) }}
					<br>
					{{ status_gastos_e($meses[$i],$key->id) }}
				</td>
				<td>{{ montos_mr($meses[$i],$key->id) }}</td>
				<td>{{ status_montos_mr($meses[$i],$key->id) }}</td>
				<td></td>
			</tr>
			<tr>
				<td colspan="6" style="background-color: black;"><div class="page-break"></div></td>
			</tr>

		@endforeach
		<tr>
			<td colspan="6" style="background-color: blue;"><br></td>
		</tr>
		
	@endfor
		</tbody>
	</table>

</body>
</html>