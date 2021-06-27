<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvYogyakartaLocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prov_yogyakarta_locs', function (Blueprint $table) {
            $table->id('id_kabupaten_yogyakarta');
            $table->string('nama_kabupaten_yogyakarta', 100);
            $table->float('luas_wilayah_yogyakarta', 30)->nullable();
            $table->float('total_penduduk_yogyakarta', 30)->nullable();
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
        Schema::dropIfExists('prov_yogyakarta_locs');
    }
}
