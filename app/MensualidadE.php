<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MensualidadE extends Model
{
    protected $table='mens_estac';

    protected $fillable=['id_estacionamiento','mes','anio','monto'];

    public function estacionamientos()
    {
    	return $this->belognsTo('App\Estacionamientos','id_estacionamiento');
    }
}
