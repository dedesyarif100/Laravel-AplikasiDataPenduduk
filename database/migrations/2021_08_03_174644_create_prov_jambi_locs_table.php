<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvJambiLocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prov_jambi_locs', function (Blueprint $table) {
            $table->id('id_kabupaten_jambi');
            $table->string('nama_kabupaten_jambi', 100);
            $table->integer('luas_wilayah_jambi')->nullable();
            $table->integer('total_penduduk_jambi')->nullable();
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
        Schema::dropIfExists('prov_jambi_locs');
    }
}
