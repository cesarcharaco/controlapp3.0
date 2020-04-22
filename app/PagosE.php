<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PagosE extends Model
{
    protected $table='pagos_estac';

	protected $fillable=['id','id_mens_estac','status'];

	public function mensualidad()
	{
		return $this->belongsTo('App\MensualidadesE','id_mens_estac');
	}
}
