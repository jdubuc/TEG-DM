<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserespecialidadTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('userespecialidad', function($table)
        {
            $table->increments('id');
            $table->integer('User')->unsigned();
			$table->foreign('User')->references('id')->on('users');
            $table->integer('Especialidad')->unsigned();
			$table->foreign('Especialidad')->references('id')->on('especialidades');
            
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
		Schema::drop('userespecialidad');
	}

}
