<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElementoMenuTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('elemento_menu', function (Blueprint $table) {
			$table->integer('elemento_id')
			->unsigned()
			->index()
			->foreign()
			->references('id')
			->on('elementos')
			->onDelete('cascade');

			$table->integer('menu_id')
			->unsigned()
			->index()
			->foreign()
			->references('id')
			->on('menuss')
			->onDelete('cascade');

			$table->integer('cantidad')
				->default(1);
			$table->boolean('custom')
				->default(false);
			
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
		Schema::dropIfExists('elemento_menu');
	}
}
