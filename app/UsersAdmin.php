<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersAdmin extends Model
{
    protected $table='users_admin';

    protected $fillable=['name','rut','email','status'];
	
    public function residentes()
    {
    	return $this->hasMany('App\Residentes','id_admin','id');
    }

    public function inmuebles()
    {
    	return $this->hasMany('App\Inmuebles','id_admin','id');
    }

    public function estacionamientos()
    {
    	return $this->hasMany('App\Estacionamientos','id_admin','id');
    }

    public function mr()
    {
    	return $this->hasMany('App\MultasRecargas','id_admin','id');
    }

    public function noticias()
    {
    	return $this->hasMany('App\Noticias','id_admin','id');
    }
    
    public function notificaciones()
    {
    	return $this->hasMany('App\Notificaciones','id_admin','id');
    }

    public function pagos_comunes()
    {
        return $this->hasMany('App\PagosComunes','id_admin','id');
    }
}