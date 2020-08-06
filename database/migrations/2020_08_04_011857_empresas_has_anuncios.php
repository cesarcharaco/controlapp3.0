<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EmpresasHasAnuncios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas_has_anuncios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_empresa');
            $table->unsignedBigInteger('id_anuncios');
            $table->unsignedBigInteger('id_planP')->nullable();
            $table->date('fecha_orden');
            $table->date('fecha_termino');
            $table->string('referencia');
            $table->enum('status',['Activo','Inactivo'])->default('Activo');

            $table->foreign('id_empresa')->references('id')->on('empresas')->onDelete('cascade');
            $table->foreign('id_anuncios')->references('id')->on('anuncios')->onDelete('cascade');
            $table->foreign('id_planP')->references('id')->on('planes_pago')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
