<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTriggerCreatejambiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trigger_createjambi', function (Blueprint $table) {
            $table->id();
            $table->integer('id_kabupaten_jambi');
            $table->string('new_kabupaten', 100);
            $table->integer('new_wilayah')->nullable();
            $table->integer('new_penduduk')->nullable();
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
        Schema::dropIfExists('trigger_createjambi');
    }
}
