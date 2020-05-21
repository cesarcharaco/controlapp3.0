<?php

function alquilados_i_t()
{
	$buscar=\DB::table('residentes_has_inmuebles')->where('status','En Uso')->select('*')->get();

	return count($buscar);
}
function alquilados_i_p()
{
	$buscar=\DB::table('residentes_has_inmuebles')->where('status','En Uso')->select('*')->get();
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
			if ($key2->pivot->status=="En Uso") {
				$c++;
			}
			
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
			if ($key2->pivot->status=="En Uso") {
				$c++;
			}
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
			if ($key2->pivot->status=="En Uso") {
				$c1++;
			}
		}


		$c2=0;
		foreach ($key->estacionamientos as $key2) {
			if ($key2->pivot->status=="En Uso") {
				$c2++;
			}
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

function pc_i()
{
	$anio=date('Y');

	$buscar=App\PagosComunes::where('anio',$anio)->where('tipo','Inmueble')->get();

	return count($buscar);
}

function pc_e()
{
	$anio=date('Y');

	$buscar=App\PagosComunes::where('anio',$anio)->where('tipo','Estacionamiento')->get();

	return count($buscar);
}

function meses($num_mes)
{
	switch ($num_mes) {
		case 1:
			return "Enero";
			break;
		case 2:
			return "Febrero";
			break;
		case 3:
			return "Marzo";
			break;
		case 4:
			return "Abril";
			break;
		case 5:
			return "Mayo";
			break;
		case 6:
			return "Junio";
			break;
		case 7:
			return "Julio";
			break;
		case 8:
			return "Agosto";
			break;
		case 9:
			return "Septiembre";
			break;
		case 10:
			return "Octubre";
			break;
		case 11:
			return "Noviembre";
			break;
		case 12:
			return "Diciembre";
			break;
	}
}

function inmuebles_asig($id_residente)
{
	$mostrar="";

	$residente=App\Residentes::find($id_residente);
	foreach ($residente->inmuebles as $key) {
		if($key->pivot->status=="En Uso"){
			$mostrar.=$key->idem."\n";
		}
	}

	return $mostrar;
}
function estacionamientos_asig($id_residente)
{
	$mostrar="";

	$residente=App\Residentes::find($id_residente);
	foreach ($residente->estacionamientos as $key) {
		if($key->pivot->status=="En Uso"){
			$mostrar.=$key->idem."\n";
		}
	}

	return $mostrar;
}
function gasto_comun_mes($mes,$id_residente,$anio)
{
	
	$cont=0;
	$cont2=0;
	$residente=App\Residentes::find($id_residente);
	
	foreach ($residente->inmuebles as $key) {
		if($key->pivot->status=="En Uso"){
			$cont++;
		}
	}

	foreach ($residente->estacionamientos as $key) {
		if($key->pivot->status=="En Uso"){
			$cont2++;
		}
	}
	$total=0;
	$monto_i=App\PagosComunes::where('anio',$anio)->where('mes',$mes)->where('tipo','Inmueble')->first();
	$total+=($cont*$monto_i->monto);
	$monto_i=App\PagosComunes::where('anio',$anio)->where('mes',$mes)->where('tipo','Estacionamiento')->first();
	$total+=($cont2*$monto_i->monto);

	return $total;


}

function status_gastos_i($mes,$id_residente,$anio)
{
	$inmueble="";
	$residente=App\Residentes::find($id_residente);
	
	foreach ($residente->inmuebles as $key) {
        $inmueble.=$key->idem.": ";
        foreach ($key->mensualidades as $key2) {
            if($key2->mes==$mes && $key2->anio==$anio){
                foreach ($key2->pago as $key3) {
                    $inmueble.=$key3->status." \n ";
                }
            }
        }
    }
	
	return $inmueble;
}

function status_gastos_e($mes,$id_residente,$anio)
{
	$estacionamiento="";
	$residente=App\Residentes::find($id_residente);
	
	
    foreach ($residente->estacionamientos as $key) {
        $estacionamiento.=$key->idem.": ";
        foreach ($key->mensualidad as $key2) {
            if($key2->mes==$mes && $key2->anio==$anio){
                foreach ($key2->pago as $key3) {
                    $estacionamiento.=$key3->status." \n ";
                }
            }
        }
    }
    
    return $estacionamiento;
}

function montos_mr($mes,$id_residente,$anio)
{
	$total=0;
	$residente=App\Residentes::find($id_residente);

	foreach ($residente->mr as $key) {
		if($key->pivot->mes==$mes && $key->anio==$anio){
			$total+=$key->monto;
		}
	}
	return $total;
}
function status_montos_mr($mes,$id_residente,$anio)
{
$enviada=0;
$pagada=0;
$por_confirmar=0;
$resumen="";
	$residente=App\Residentes::find($id_residente);
	
	foreach ($residente->mr as $key) {
		if($key->pivot->mes==$mes && $key->anio==$anio){
			switch ($key->pivot->status) {
			case 'Enviada':
				$enviada++;
				break;
			case 'Pagada':
				$pagada++;
				break;
			case 'Por Confirmar':
				$por_confirmar++;
				break;
			
			default:
				# code...
				break;
		}			
		}
	}
	$resumen='Enviada: '.$enviada.' | Pagada: '.$pagada.' | Por Confirmar: '.$por_confirmar;
	return $resumen;
}

