<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordens', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nit')->default('CF');
            $table->string('nombre')->default('CF');
            $table->integer('estado')->default(1);
            // 1= creada;
            // 2= en proceso
            // 3= en entrega
            // 4= completada
            // 5= cancelada
            $table->decimal('total', 8, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordens');
    }
}
