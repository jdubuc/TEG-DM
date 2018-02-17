<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrecitasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('precitas', function($table)
        {
            $table->increments('id');
            $table->string('hora');
            $table->string('orden',50);
            $table->string('hora_vence',10);
            $table->string('fecha_precita',10);
            $table->integer('User')->unsigned();
			$table->foreign('User')->references('id')->on('users');
            
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
		$table->dropForeign('posts_precitas_id_foreign');
		Schema::drop('precitas');
	}

}
