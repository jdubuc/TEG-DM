<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoriapacientesintomasysignosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Historiapacientesintomasysignos', function($table)
        {
            $table->increments('id');
            $table->integer('Historiapaciente')->unsigned();
			$table->foreign('Historiapaciente')->references('id')->on('Historiapaciente');
            $table->integer('sintomasysignos')->unsigned();
			$table->foreign('sintomasysignos')->references('id')->on('sintomasysignos');
            
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
		Schema::drop('Historiapacientesintomasysignos');
	}

}
