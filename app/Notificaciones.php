<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notificaciones extends Model
{
    protected $table='notificaciones';
	protected $fillable=['titulo','motivo'];
}
