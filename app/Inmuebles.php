<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inmuebles extends Model
{
protected $table='inmuebles';

protected $fillable=['idem','tipo','status','estacionamiento','cuantos'];

public function residentes()
{
return $this->belongsToMany('App\Residentes','residentes_has_inmuebles','id_inmueble','id_residente')->withPivot('status');
}

public function mensualidades()
{
return $this->hasMany('App\Mensualidades','id_inmueble','id');
}
}