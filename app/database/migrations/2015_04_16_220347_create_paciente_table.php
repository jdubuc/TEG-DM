<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacienteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('paciente', function($table)
        {
		    $table->increments('id');
            $table->string('nombre',45);
            $table->string('apellido',45);
            $table->string('telefono',45);
            $table->string('procedencia',45);
            $table->string('responsable',45);
            $table->string('tlf_responsable',45);
            $table->string('correo_electronico',45);
            $table->string('alergias',450);
            $table->string('num_registro',45);
            
           
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
