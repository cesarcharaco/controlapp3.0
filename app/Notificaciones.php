<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notificaciones extends Model
{
    protected $table='notificaciones';
	protected $fillable=['titulo','motivo','publicar'];

	public function residentes()
    {
    	return $this->belongsToMany('App\Residentes','resi_has_notif','id_notificacion','id_residente')->withPivot('status');
    }
}
