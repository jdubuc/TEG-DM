<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoriapacienteenfermedadTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Historiapacienteenfermedad', function($table)
        {
            $table->increments('id');
            $table->integer('Historiapaciente')->unsigned();
			$table->foreign('Historiapaciente')->references('id')->on('Historiapaciente');
            $table->integer('enfermedad')->unsigned();
			$table->foreign('enfermedad')->references('id')->on('enfermedad');
            
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
		Schema::drop('Historiapacienteenfermedad');
	}

}
