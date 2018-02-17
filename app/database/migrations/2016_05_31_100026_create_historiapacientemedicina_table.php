<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoriapacientemedicinaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Historiapacientemedicina', function($table)
        {
            $table->increments('id');
            $table->integer('Historiapaciente')->unsigned();
			$table->foreign('Historiapaciente')->references('id')->on('Historiapaciente');
            $table->integer('medicina')->unsigned();
			$table->foreign('medicina')->references('id')->on('medicina');
            
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
		Schema::drop('Historiapacientemedicina');
	}

}
