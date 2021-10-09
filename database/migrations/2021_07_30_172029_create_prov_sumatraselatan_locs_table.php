<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvSumatraselatanLocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prov_sumatraselatan_locs', function (Blueprint $table) {
            $table->id('id_kabupaten_sumatraselatan');
            $table->string('nama_kabupaten_sumatraselatan', 100);
            $table->float('luas_wilayah_sumatraselatan', 30)->nullable();
            $table->float('total_penduduk_sumatraselatan', 30)->nullable();
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
        Schema::dropIfExists('prov_sumatraselatan_locs');
    }
}
