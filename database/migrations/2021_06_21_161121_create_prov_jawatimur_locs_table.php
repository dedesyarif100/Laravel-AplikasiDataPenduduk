<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvJawatimurLocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prov_jawatimur_locs', function (Blueprint $table) {
            $table->id('id_kabupaten_jawatimur');
            $table->string('nama_kabupaten_jawatimur', 100);
            $table->float('luas_wilayah_jawatimur', 30)->nullable();
            $table->float('total_penduduk_jawatimur', 30)->nullable();
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
        Schema::dropIfExists('prov_jawatimur_locs');
    }
}
