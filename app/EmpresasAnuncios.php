<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmpresasAnuncios extends Model
{
    protected $table='empresas_has_anuncios';

    protected $fillable=['id_empresa','id_anuncio'];

    public function empresas()
	  {
	  	return $this->belongsTo('App\Empresas','id_empresa','id');
	  }

	public function anuncios()
	  {
	  	return $this->belongsTo('App\Anuncios','id_anuncios','id');
	  }
}
