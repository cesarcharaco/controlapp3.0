<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresas extends Model
{
    protected $table='empresas';

    protected $fillable=['nombre','rut_empresa','descripcion','status'];

    
}
