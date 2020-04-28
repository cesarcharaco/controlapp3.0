<?php

function alquilados_i_t()
{
	$buscar=\DB::table('residentes_has_inmuebles')->select('*')->get();

	return count($buscar);
}
function alquilados_i_p()
{
	$buscar=\DB::table('residentes_has_inmuebles')->select('*')->get();
	if (existencia_i()>0) {
		$porcentaje=(count($buscar)*100)/existencia_i();
	} else {
		$porcentaje=0;
	}
	
	return $porcentaje=number_format($porcentaje, 2, '.', '');
}

function existencia_i()
{
	$buscar=\DB::table('inmuebles')->select('*')->get();

	return count($buscar);
}

function alquilados_e_t()
{
	$buscar=\DB::table('estacionamientos')->where('status','Ocupado')->select('*')->get();

	return count($buscar);
}

function alquilados_e_p()
{
	$buscar=\DB::table('estacionamientos')->where('status','Ocupado')->select('*')->get();
	if (existencia_e()>0) {
		$porcentaje=(count($buscar)*100)/existencia_e();
	} else {
		$porcentaje=0;
	}
	
	return $porcentaje=number_format($porcentaje, 2, '.', '');
}

function existencia_e()
{
	$buscar=\DB::table('estacionamientos')->select('*')->get();

	return count($buscar);
}

function residentes()
{
	$buscar=\App\Residentes::all();

	return count($buscar);
}

function residentes_alquilados_i()
{
	$cont=0;

	$buscar=\App\Residentes::all();
	foreach ($buscar as $key) {
		$c=0;
		foreach ($key->inmuebles as $key2) {
			$c++;
		}

		if($c>0){
			$cont++;
		}
	}
	return $cont;
}

function residentes_alquilados_e()
{
	$cont=0;

	$buscar=\App\Residentes::all();
	foreach ($buscar as $key) {
		$c=0;
		foreach ($key->estacionamientos as $key2) {
			$c++;
		}

		if($c>0){
			$cont++;
		}
	}

	return $cont;
}

function residentes_alquilados_p()
{
	$cont=0;

	$buscar=\App\Residentes::all();

	foreach ($buscar as $key) {
		$c1=0;
		foreach ($key->inmuebles as $key2) {
			$c1++;
		}


		$c2=0;
		foreach ($key->estacionamientos as $key2) {
			$c2++;
		}

		if($c1>0 || $c2>0){
			$cont++;
		}
	}
	if (count($buscar)>0) {
		$porcentaje=($cont*100)/count($buscar);
	} else {
		$porcentaje=0;
	}

	return $porcentaje=number_format($porcentaje, 2, '.', '');
}

 function buscar_notificacion($id_residente,$id_notificacion)
{
	$buscar=\DB::table('resi_has_notif')
	->where('id_residente',$id_residente)
	->where('id_notificacion',$id_notificacion)
	->select('*')->get();

	return count($buscar);
}