<!DOCTYPE html>
<html>
<head>
	<title>Reporte Específico</title>
</head>
<body>

	
	
	<hr>
	<table width="100%" border="1">
		@for($i=0; $i < count($meses); $i++)	
		<tr>
			<th><div align="float-left">AÑO: {{ date('Y') }}</div></th>
			<th><div align="float-right">MES:{{ meses($meses[$i]) }}</div></th>
			<th colspan="2"></th>
		</tr>
			@foreach($inmuebles as $key)
				<tr>
					<th>Residente</th>
					<th>Rut/Clave</th>
					<th>Correo</th>
					<th>Teléfono de contacto</th>
				</tr>
				<tr>
					<td>{{ $key->apellidos }}, {{ $key->nombres }}</td>
					<td>{{ $key->rut }}</td>
					<td>{{ $key->email }}</td>
					<td>{{ $key->telefono }}</td>
				</tr>
			@endforeach
		@endfor
	</table>
</body>
</html>