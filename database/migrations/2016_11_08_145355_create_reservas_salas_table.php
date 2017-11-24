<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservasSalasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reservas_salas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->time('hora_inicio');
			$table->time('hora_final');
			$table->date('fecha_servicio');
			$table->tinyInteger('confirmar');
			$table->string('detalle_reserva', 60);
			$table->timestamps();
			$table->integer('usuario_id')->unsigned();
			$table->foreign('usuario_id')->references('id')->on('users');
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
		Schema::drop('reservas_salas');
	}

}
