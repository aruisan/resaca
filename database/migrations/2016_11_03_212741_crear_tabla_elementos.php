<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaElementos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('elementos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre', 80);
			$table->string('descripcion', 200);
			$table->string('serial', 80);
			$table->timestamps();
			$table->integer('tipo_elemento_id')->unsigned();
			$table->foreign('tipo_elemento_id')->references('id')->on('tipo_elementos');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('elementos');
	}

}
