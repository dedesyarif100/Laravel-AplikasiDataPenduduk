<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvJawabaratLocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prov_jawabarat_locs', function (Blueprint $table) {
            $table->id('id_kabupaten_jawabarat');
            $table->string('nama_kabupaten_jawabarat', 100);
            $table->float('luas_wilayah_jawabarat', 30)->nullable();
            $table->float('total_penduduk_jawabarat', 30)->nullable();
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
        Schema::dropIfExists('prov_jawabarat_locs');
    }
}
