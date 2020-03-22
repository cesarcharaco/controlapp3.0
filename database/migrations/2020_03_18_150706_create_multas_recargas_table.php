<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMultasRecargasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multas_recargas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('motivo');
            $table->text('observacion')->nullable();
            $table->float('monto');
            $table->enum('tipo',['Multa','Recarga']);
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
        Schema::dropIfExists('multas_recargas');
    }
}
