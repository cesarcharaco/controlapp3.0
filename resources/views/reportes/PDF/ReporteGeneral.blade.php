<?php
  libxml_use_internal_errors(true);
  
?>
<!DOCTYPE html>
<html>
<head>
	<title>Reporte General</title>
	<style type="text/css">
		table {
			table-layout: fixed;
			width: 100%;
			border-collapse: collapse;
			border: 3px solid blue;
  			border-radius: 1em;
  			overflow: hidden;
		}

		thead th:nth-child(1) {
		  width: 30%;
		}

		thead th:nth-child(2) {
		  width: 20%;
		}

		thead th:nth-child(3) {
		  width: 15%;
		}

		thead th:nth-child(4) {
		  width: 35%;
		}

		th, td {
		  padding: 20px;
		}

		/* --------------------------------------------------- */
		html {
		  font-family: 'helvetica neue', helvetica, arial, sans-serif;
		}

		thead th, tfoot th {
		  font-family: 'Rock Salt', cursive;
		}

		th {
		  /*letter-spacing: 2px;*/
		}

		td {
		  letter-spacing: 1px;
		}

		tbody td {
		  text-align: center;
		}

		tfoot th {
		  text-align: right;
		}


		/* --------------------------------------------------------- */

		thead, tfoot {
		  background: url(leopardskin.jpg);
		  color: white;
		  text-shadow: 1px 1px 1px black;
		}

		thead th, tfoot th, tfoot td {
		  background: linear-gradient(to bottom, rgba(0,0,0,0.1), rgba(0,0,0,0.5));
		  border: 3px solid purple;
		}


		/* --------------------------------------------------------- */
		tbody tr:nth-child(odd) {
		  background-color: #70FFE6;
		}

		tbody tr:nth-child(even) {
		  background-color: #D5D7D8;
		}

		tbody tr {
		  background-image: url(noise.png);
		}

		table {
		  background-color: grey;
		}
	</style>
</head>
<body>

	<div style="float: left">
		<table style="width: 500px !important;">
			<tbody>
				<tr>
					<th>Año</th>
				</tr>
				<tr>
					<td>{{ date('Y') }}</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div style="text-align: right">
		<img width="250" height="250" style="border-radius: 50px;" src="../public/assets/images/logo.jpg">
	</div>
	<!-- <p> Formato PDF para explicar la gestión y datos que se han almacenado hasta ahora</p> -->
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
		<th colspan="6">Mes: {{ meses($meses[$i]) }}</th>
	</tr>
		@foreach($residentes as $key)
			<tr>
				<th>Inmueble(s)</th>
				<th>Nombre residente</th>
				<th>Rut/Clave</th>
				<th colspan="2">Correo</th>
				<th>Teléfono de contacto</th>
			</tr>
			<tr>
				<td>{{ inmuebles_asig($key->id) }}</td>
				<td>{{ $key->apellidos }}, {{ $key->nombres }}</td>
				<td>{{ $key->rut }}</td>
				<td colspan="2">{{ $key->usuario->email }}</td>
				<td>{{ $key->telefono }}</td>
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
			

		@endforeach
		<tr>
			<td colspan="6" style="background-color: blue;"><br></td>
		</tr>
		
	@endfor
		</tbody>
	</table>

</body>
</html>