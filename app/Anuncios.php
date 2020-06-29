<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anuncios extends Model
{
    protected $table='anuncios';

    protected $fillable=['titulo','link','descripcion','nombre_img','url_img'];

    public function admins() {
    	return $this->belongsToMany('App\UsersAdmin','admins_has_anuncios','id_users_admin','id_anuncio');
    }
}
