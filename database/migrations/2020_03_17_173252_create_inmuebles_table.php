<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInmueblesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inmuebles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('idem')->unique();
            $table->enum('tipo',['Casa','Apartamento','Anexo','Habitación','Otro']);
            $table->enum('status',['Disponible','No Disponible'])->default('Disponible');
            $table->enum('estacionamiento',['Si','No'])->default('Si');
            $table->integer('cuantos');
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
        Schema::dropIfExists('inmuebles');
    }
}
