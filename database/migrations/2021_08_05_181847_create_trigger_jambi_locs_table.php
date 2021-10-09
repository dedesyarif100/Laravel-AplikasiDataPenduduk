<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTriggerJambiLocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trigger_jambi_locs', function (Blueprint $table) {
            $table->id();
            $table->integer('id_kabupaten_jambi');
            $table->string('old_kabupaten', 100);
            $table->string('new_kabupaten', 100);
            $table->integer('old_wilayah')->nullable();
            $table->integer('new_wilayah')->nullable();
            $table->integer('old_penduduk')->nullable();
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
        Schema::dropIfExists('trigger_jambi_locs');
    }
}
