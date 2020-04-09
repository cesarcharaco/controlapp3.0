<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Residentes extends Model
{
	protected $table='residentes';

	protected $fillable=['nombres','apellidos','rut','telefono','id_usuario'];

	public function usuario()
	{
		return $this->belongsTo('App\User','id_usuario');
	}

		public function inmuebles()
	{
		return $this->belongsToMany('App\Inmuebles','residentes_has_inmuebles','id_residente','id_inmueble');
	}

	public function mr()
    {
    	return $this->belongsToMany('App\MultasRecargas','resi_has_mr','id_residente','id_mr')->withPivot('status');
    }
}