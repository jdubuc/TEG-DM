<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoriapacienteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('historiapaciente', function($table)
        {
		    $table->increments('id');
            $table->string('sintomas_signos',4500);
            $table->string('diagnostico',4500);
            $table->string('tratamiento',4500);
            $table->integer('citas')->unsigned();
			$table->foreign('citas')->references('id')->on('citas');
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
