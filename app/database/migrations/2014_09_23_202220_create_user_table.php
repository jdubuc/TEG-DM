<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	Schema::create('users', function($table)
        {
            $table->increments('id');  
            $table->string('email')->unique();
            $table->string('password');
            $table->string('username')->unique();
            $table->string('nombre',50);
            $table->string('apellido',50);
            $table->string('telefono1',12);
            $table->string('telefono2',12);
            $table->string('informacion',5000);
            $table->string('horario',30);
            $table->string('direccion',100);
            $table->string('foto',200);
            $table->string('mapa',200);
            
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
		Schema::drop('users');
	}

}
