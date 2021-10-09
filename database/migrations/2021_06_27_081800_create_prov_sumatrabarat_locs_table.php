<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvSumatrabaratLocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prov_sumatrabarat_locs', function (Blueprint $table) {
            $table->id('id_kabupaten_sumatrabarat');
            $table->string('nama_kabupaten_sumatrabarat', 100);
            $table->float('luas_wilayah_sumatrabarat', 30)->nullable();
            $table->float('total_penduduk_sumatrabarat', 30)->nullable();
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
        Schema::dropIfExists('prov_sumatrabarat_locs');
    }
}
