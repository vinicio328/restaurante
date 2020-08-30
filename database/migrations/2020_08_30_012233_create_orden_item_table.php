<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create('orden_item', function (Blueprint $table) {
    		$table->integer('orden_id')
    		->unsigned()
    		->index()
    		->foreign()
    		->references('id')
    		->on('ordenes')
    		->onDelete('cascade');
    		$table->integer('elemento_id')
    		->unsigned();
    		$table->string('elemento_type');
    		$table->integer('estado');
    		// 1= creada;
    		// 2= en proceso
    		// 3= en entrega
    		// 4= completada
    		// 5= cancelada
    		$table->integer('cantidad')->default(1);
    		$table->decimal('precio', 8, 2);
    		$table->boolean('es_custom')->default(false);
    		$table->boolean('es_extra')->default(false);
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
    	Schema::dropIfExists('orden_item');
    }
}
