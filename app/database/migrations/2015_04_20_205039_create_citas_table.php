<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('citas', function($table)
        {
            $table->increments('id');
            $table->string('hora');
            $table->string('nombre_paciente',50);
            $table->string('cedula_paciente',10);
            $table->string('numero_expediente_paciente',10);
            $table->string('razon_cita',5000);
            $table->string('fecha_cita',10);
            $table->integer('User')->unsigned();
			$table->foreign('User')->references('id')->on('users');
			$table->integer('paciente')->unsigned();
			$table->foreign('paciente')->references('id')->on('paciente');
           
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
		Schema::drop('citas');
	}

}
