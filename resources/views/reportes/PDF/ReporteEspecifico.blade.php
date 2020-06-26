<!DOCTYPE html>
<html>
<head>
	<title>Reporte Específico</title>
	<style type="text/css">

		body {
			/*background-image: url('../../public/assets/images/fondos.png');
			background-repeat: no-repeat;
			background-attachment: fixed;*/

		  	font-family: 'helvetica neue', helvetica, arial, sans-serif;
		}

		table {
			table-layout: fixed;
			width: 100%;
			border-collapse: collapse;
			border: 3px solid grey;
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
		  color: white;
		  text-shadow: 1px 1px 1px black;
		}

		thead th, tfoot th, tfoot td {
		  background: linear-gradient(to bottom, rgba(0,0,0,0.1), rgba(0,0,0,0.5));
		  border: 3px solid blue;
		}


		/* --------------------------------------------------------- */
		tbody tr:nth-child(odd) {
		  background-color: white;
		}

		tbody tr:nth-child(even) {
		  background-color: #D5D7D8;
		}

		table {
		  background-color: #D5D7D8;
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
					<td>{{ $anio }}</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div style="text-align: right">
		<center><img width="300" height="300" style="border-radius: 50px;" src="../public/assets/images/logo.jpg"></center>
	</div>
@if(count($residentes)>0)
	<table width="100%" border="1">
		<!-- <tr><th colspan="6">RESIDENTES</th></tr> -->
		@for($i=0; $i < count($meses); $i++)	
		<tr>
			<th colspan="6" align="center"><div align="float-right">MES:{{ meses($meses[$i]) }}</div></th>
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
				<td colspan="2">{{ $key->email }}</td>
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
				<td>{{ gasto_comun_mes($meses[$i],$key->id,$anio) }}</td>
				<td> 
					{{ status_gastos_i($meses[$i],$key->id,$anio) }}
					<br>
					{{ status_gastos_e($meses[$i],$key->id,$anio) }}
				</td>
				<td>{{ montos_mr($meses[$i],$key->id,$anio) }}</td>
				<td>{{ status_montos_mr($meses[$i],$key->id,$anio) }}</td>
				<td></td>
			</tr>
			<tr>
				<td colspan="6" style="background-color: gray;"><div class="page-break"></div></td>
			</tr>

			@endforeach
			<!-- <tr>
				<td colspan="6" style="background-color: blue;"><br></td>
			</tr> -->
		@endfor
		<tr>
			<td colspan="6" style="background-color: blue;"><br></td>
		</tr>
	</table>
@endif
@if(count($inmuebles)>0)
<hr><br>
<table width="100%" border="1">
	<tbody>
		<tr>
			<th>INMUEBLES</th>
		</tr>
		@for($i=0; $i < count($meses); $i++)
			<tr>
				<th colspan="6">Mes: {{ meses($meses[$i]) }}</th>
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
				<td>{{ alquiler_i($meses[$i],$key->id,$anio) }}</td>
			</tr>
			@endforeach
		@endfor
		<tr>
			<td colspan="6" style="background-color: green;"><br></td>
		</tr>
	</tbody>
</table>
@endif
@if(count($estacionamientos)>0)
<table width="100%" border="1">
	<tbody>
		<tr>
			<th colspan="3">ESTACIONAMIENTOS</th>
		</tr>
		@for($i=0; $i < count($meses); $i++)
			<tr>
				<th>Año: {{ $anio }} </th>
				<th >Mes: {{ meses($meses[$i]) }}</th>
				<th></th>
			</tr>
		<tr>
			<th>IDEM</th>
			<th>STATUS</th>
			<th>ESTADO DE ALQUILER</th>
		</tr>
			@foreach($estacionamientos as $key)
			<tr>
				<td>{{ $key->idem }}</td>
				<td>{{ $key->status }}</td>
				<td>{{ alquiler_e($meses[$i],$key->id,$anio) }}</td>
			</tr>
			@endforeach
		@endfor
		<tr>
			<td colspan="6" style="background-color: green;"><br></td>
		</tr>
	</tbody>
</table>
@endif
@if(count($residentes)==0 && count($inmuebles)==0 && count($estacionamientos)==0)
<center><h1></h1></center>
@endif
</body>
</html>