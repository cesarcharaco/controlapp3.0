<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagosHasAlquilerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos_has_alquiler', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('referencia');
            $table->decimal('monto',11, 2);
            $table->unsignedBigInteger('id_alquiler');
            $table->unsignedBigInteger('id_planesPago');
            $table->enum('status',['Pagado','En Proceso','No Pagado'])->default('En Proceso');;

            $table->foreign('id_alquiler')->references('id')->on('alquiler')->onDelete('cascade');
            $table->foreign('id_planesPago')->references('id')->on('planes_pago')->onDelete('cascade');

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
        Schema::dropIfExists('pagos_has_alquiler');
    }
}
