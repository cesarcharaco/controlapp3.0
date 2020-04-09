<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MultasRecargas extends Model
{
    protected $table='multas_recargas';

    protected $fillable=['motivo','observacion','monto','tipo'];

    public function residentes()
    {
    	return $this->belongsToMany('App\Residentes','resi_has_mr','id_mr','id_residente')->withPivot('status');
    }
}
