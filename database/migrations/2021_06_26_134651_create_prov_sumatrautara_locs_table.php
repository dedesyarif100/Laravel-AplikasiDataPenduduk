<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvSumatrautaraLocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prov_sumatrautara_locs', function (Blueprint $table) {
            $table->id('id_kabupaten_sumatrautara');
            $table->string('nama_kabupaten_sumatrautara', 100);
            $table->float('luas_wilayah_sumatrautara', 30)->nullable();
            $table->float('total_penduduk_sumatrautara', 30)->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prov_sumatrautara_locs');
    }
}
