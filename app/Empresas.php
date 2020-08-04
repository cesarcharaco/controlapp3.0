<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresas extends Model
{
    protected $table='empresas';

    protected $fillable=['nombre','rut_empresa','descripcion','status'];

    public function anuncios() {
    	return $this->belongsToMany('App\EmpresasAnuncios','empresas_has_anuncios','id_empresa','id_anuncios');
    }
}
