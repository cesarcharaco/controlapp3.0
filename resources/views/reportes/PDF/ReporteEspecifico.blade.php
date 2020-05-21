<!DOCTYPE html>
<html>
<head>
	<title>Reporte Específico</title>
</head>
<body>
	<hr>
@if(count($residentes)>0)
	<table width="100%" border="1">
		<tr><th colspan="6">RESIDENTES</th></tr>
		@for($i=0; $i < count($meses); $i++)	
		<tr>
			<th><div align="float-left">AÑO: {{ $anio }}</div></th>
			<th><div align="float-right">MES:{{ meses($meses[$i]) }}</div></th>
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
				<td>{{ $key->email }}</td>
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
		<tr>
			<td colspan="6" style="background-color: green;"><br></td>
		</tr>
	</table>
@endif
@if(count($inmuebles)>0)
<table width="100%" border="1">
	<tbody>
		<tr>
			<th>INMUEBLES</th>
		</tr>
		@for($i=0; $i < count($meses); $i++)
			<tr>
				<th>Año: {{ date('Y') }}</th>
				<th >Mes: {{ meses($meses[$i]) }}</th>
				<th colspan="4"></th>
			</tr>
		<tr>
			<th>IDEM</th>
			<th>TIPO</th>
			<th>DISPONIBLIDAD</th>
			<th>ESTACIONAMIENTO</th>
			<th>CUANTOS</th>
			<th>ESTADO DE ALQUILER</th>
		</tr>
			@foreach($inmuebles as $key)
			<tr>
				<td>{{ $key->idem }}</td>
				<td>{{ $key->tipo }}</td>
				<td>{{ $key->status }}</td>
				<td>{{ $key->estacionamiento }}</td>
				<td>{{ $key->cuantos }}</td>
				<td>{{ $key->estado_pago }}</td>
			</tr>
			@endforeach
		@endfor

	</tbody>
</table>
@endif
</body>
</html>