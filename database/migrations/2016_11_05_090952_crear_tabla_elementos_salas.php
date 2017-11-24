<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaElementosSalas extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('elementos_salas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('cantidad');
			$table->timestamps();
			$table->integer('elemento_id')->unsigned();
			$table->foreign('elemento_id')->references('id')->on('elementos');
			$table->integer('sala_id')->unsigned();
			$table->foreign('sala_id')->references('id')->on('salas');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('elementos_salas');
	}

}
