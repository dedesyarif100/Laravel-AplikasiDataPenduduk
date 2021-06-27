<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvJakartaLocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prov_jakarta_locs', function (Blueprint $table) {
            $table->id('id_provinsi_jakarta');
            $table->string('nama_kabupaten_jakarta', 100);
            $table->float('luas_wilayah_jakarta', 30)->nullable();
            $table->float('total_penduduk_jakarta', 30)->nullable();
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
        Schema::dropIfExists('prov_jakarta_locs');
    }
}
