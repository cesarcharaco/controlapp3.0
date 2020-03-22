<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estacionamientos extends Model
{
    protected $table='estacionamientos';

    protected $fillable=['idem','status'];

    public function mensualidad()
    {
    	return $this->hasMany('App\MensualidadE','id_estacionamiento','id');
    }
}
