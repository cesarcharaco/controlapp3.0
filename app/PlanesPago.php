<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanesPago extends Model
{
    protected $table='planes_pago';

	protected $fillable=['nombre','monto','dias','nombre_img','url_img','color','tipo','status'];
}
