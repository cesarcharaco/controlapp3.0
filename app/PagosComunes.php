<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PagosComunes extends Model
{
    protected $table='pagos_comunes';

    protected $fillable=['tipo','mes','anio','monto'];
}
